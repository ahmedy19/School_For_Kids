<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Lesson;
use App\Service;
use Image;

class LessonsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    // Manage courses for Admin 
    public function manageLessons()
    {
        $lessons = Lesson::latest()->paginate(6);
        return view('lessons.manage_lessons')->with('lessons',$lessons);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::where('user_id','=',Auth::user()->id)->latest()->paginate(6);
        if(count($lessons) > 0)
        {
            return view('lessons.index_lessons')->with('lessons',$lessons);
        }
        else
        {
            return redirect()->route('create.lesson')->with('toast_info', 'Please, Create at least one lesson');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('lessons.create_lesson')->with('services',$services);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'service_id' => 'required',
            'title' => 'required|string|max:200',
            'subtitle' => 'required|string|max:255',
            'video_link' => 'required|string|unique:lessons|max:300',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,jpg,png',
        ],[],[

            'service_id' => 'Service ',
            'title' => 'Title ',
            'subtitle' => 'Subtitle ',
            'video_link' => 'Lesson link ',
            'description' => 'Description ',
            'image' => 'Photo ',

        ]);

        //Check for Lesson Image Upload 
        if($request->image){
            Image::make($request->image)->fit(400,400)->save('uploads/lesson/'. $request->image->hashName());
        }

        auth()->user()->lessons()->create([

            'service_id' => $request->service_id,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'video_link' => $request->video_link,
            'description' => $request->description,
            'image' => $request->image->hashName(),

        ]);

        return redirect()->back()->with('toast_success', 'Lesson Created Successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);
        return view('lessons.show_lesson')->with('lesson',$lesson);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = Service::all();
        $lesson = Lesson::find($id);
        return view('lessons.edit_lesson')->with('lesson',$lesson)->with('services',$services);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lesson=Lesson::find($id);

        // Validation
        $request->validate([
            'service_id' => 'required',
            'title' => 'required|string|max:200',
            'subtitle' => 'required|string|max:255',
            'video_link' => 'required|string|max:300',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,jpg,png',
        ],[],[

            'service_id' => 'Service ',
            'title' => 'Title ',
            'subtitle' => 'Subtitle ',
            'video_link' => 'Lesson link ',
            'description' => 'Description ',
            'image' => 'Photo ',

        ]);

        //Check for Lesson Image Upload 
        if($request->image){
            Image::make($request->image)->fit(400,400)->save('uploads/lesson/'. $request->image->hashName());
        }

        $lesson->service_id = $request->service_id;
        $lesson->title = $request->title;
        $lesson->subtitle = $request->subtitle;
        $lesson->video_link = $request->video_link;
        $lesson->description = $request->description;
        $lesson->image = $request->image->hashName();
        $lesson->save();

        return redirect()->route('lessons')->with('toast_success', 'Your lesson updated sucessfully');
    }


    //Lessons Search
    public function search(Request $request)
    {
        // Validation
        $request->validate([
            'search' => 'required|string|min:4|max:200'
        ],[],[
            'search' => 'Title '
        ]);

        $search = $request->input('search');
        $lessons = Lesson::where('title','like',"%$search%")->get();

        if(count($lessons) >0)
        {
            foreach($lessons as $lesson)
            {
                if($lesson->user_id == auth()->user()->id)
                {
                    return view('lessons.results')->with('lessons',$lessons);
                }
                else if(auth()->user()->hasAnyRole('admin'))
                {
                    return view('lessons.results')->with('lessons',$lessons);
                }
                else
                {
                    return redirect()->route('lessons')->with('toast_info', 'Not found');
                }
            }
        }
        else
        {
            if(auth()->user()->hasAnyRole('admin'))
            {
                return redirect()->route('lessons.all')->with('toast_info', 'Not found');
            }
            else
            {
                return redirect()->route('lessons')->with('toast_info', 'Not found');
            }
        }
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Lesson::find($id);
        $del->destroy($id);

        return redirect()->route('lessons.all')->with('toast_success', 'Lesson deleted Successfully');
    }

}
