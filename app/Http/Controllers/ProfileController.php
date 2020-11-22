<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\User;
use App\Profile;
use App\Province;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //Manage Profiles for Admin
    public function manageProfiles()
    {
        $profiles = Profile::latest()->paginate(6);
        $users = User::all();
        return view('profiles.manage_profiles')->with('profiles',$profiles)->with('users',$users);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::where('id','=',auth()->user()->profile_id)->get();
        $provinces = Province::all();

        return view('profiles.index_profile')->with('profiles',$profiles)->with('provinces',$provinces);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all();
        return view('profiles.create_profile')->with('provinces',$provinces);
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
            'phone_number' => 'nullable|string|unique:profiles|max:100',
            'age' => 'nullable|date|max:100',
            'first_address' => 'nullable|string|max:150',
            'second_address' => 'nullable|string|max:150',
            'city' => 'nullable|string|max:100',
            'province' => 'nullable|string|max:100',
            'facebook' => 'nullable|string|max:100',
            'twitter' => 'nullable|string|max:100',
            'github' => 'nullable|string|max:100',
            'image' => 'image|mimes:jpeg,jpg,png',
            'biography' => 'nullable|string',
        ],[],[

            'phone_number' => 'Phone Number ',
            'age' => 'Age ',
            'first_address' => 'First Address ',
            'second_address' => 'Second Address ',
            'city' => 'City ',
            'province' => 'Province ',
            'facebook' => 'Facebook ',
            'twitter' => 'Twitter ',
            'github' => 'Github ',
            'image' => 'Photo ',
            'biography' => 'Biography ',

        ]);

        if($request->image){
            Image::make($request->image)->fit(400,400)->save('uploads/profile/'. $request->image->hashName());
        }

        $profile = Profile::create([
            'phone_number' => $request->phone_number,
            'age' => $request->age,
            'first_address' => $request->first_address,
            'second_address' => $request->second_address,
            'city' => $request->city,
            'province' => $request->province,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'github' => $request->github,
            'image' => $request->image->hashName(),
            'biography' => $request->biography
        ]);

        auth()->user()->update([
            'profile_id' => $profile->id
        ]);
        

        return redirect()->route('home')->with('toast_success', 'Profile Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profiles = Profile::find($id);
        $users = User::all();
        return view('profiles.show_profile')->with('profile',$profiles)->with('users',$users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $profile=Profile::find($id);

        // Validation
        $request->validate([
            'phone_number' => 'nullable|string|unique:profiles|max:100',
            'age' => 'nullable|date|max:100',
            'first_address' => 'nullable|string|max:150',
            'second_address' => 'nullable|string|max:150',
            'city' => 'nullable|string|max:100',
            'province' => 'nullable|string|max:100',
            'facebook' => 'nullable|string|max:100',
            'twitter' => 'nullable|string|max:100',
            'github' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,jpg,png',
            'biography' => 'nullable|string',
        ],[],[

            'phone_number' => 'Phone Number ',
            'age' => 'Age ',
            'first_address' => 'First Address ',
            'second_address' => 'Second Address ',
            'city' => 'City ',
            'province' => 'Province ',
            'facebook' => 'Facebook ',
            'twitter' => 'Twitter ',
            'github' => 'Github ',
            'image' => 'Photo ',
            'biography' => 'Biography ',

        ]);

        //Check for Profile Image Upload 
        if($request->image){
            Image::make($request->image)->fit(400,400)->save('uploads/profile/'. $request->image->hashName());
        }

        $profile->phone_number = $request->phone_number;
        $profile->age = $request->age;
        $profile->first_address = $request->first_address;
        $profile->second_address = $request->second_address;
        $profile->city = $request->city;
        $profile->province = $request->province;
        $profile->facebook = $request->facebook;
        $profile->twitter = $request->twitter;
        $profile->github = $request->github;
        $profile->image = $request->image->hashName();
        $profile->biography = $request->biography;
        $profile->save();

        return redirect()->route('home')->with('toast_success', 'Your profile updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

}
