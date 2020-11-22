<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Lesson;

class UIController extends Controller
{
    //Index
    public function index()
    {
        return view('index');
    }

    //Services
    public function services()
    {
        // Get Random color of two colors
        $background_colors = array('#FCB606', '#23C2CA');
        $color = $background_colors[array_rand($background_colors)];

        $services = Service::latest()->get();
        return view('UI.our_services')->with(['services'=>$services,'color'=>$color]);
    }

    //Programs
    public function programs()
    {
        $services = Service::latest()->get();
        return view('UI.programs')->with('services',$services);
    }

    //Courses
    public function courses()
    {
        // $services = Service::with('lessons')->latest()->get();
        // return view('UI.courses', ['services' => $services]);

        $lessons = Lesson::latest()->paginate(3);
        $services = Service::latest()->get();
        return view('UI.courses', ['services' => $services , 'lessons' => $lessons]);
    }

    //Lessons
    public function allLessons(Service $id)
    {
        $lessons = $id->lessons()->latest()->paginate(6);
        return view('UI.all_lessons',compact('lessons'));
    }

    //Show Lesson
    public function showLesson($id)
    {
        $lesson = Lesson::find($id);
        return view('UI.lesson')->with('lesson',$lesson);
    }

    //About
    public function abouts()
    {
        return view('UI.abouts');
    }

    //Contact
    public function contacts()
    {
        return view('UI.contact');
    }


}
