<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Role;
use App\Profile;
Use Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(6);
        $profiles = Profile::all();
        return view('admin.users.index')->with('users',$users)->with('profiles',$profiles);
    }

    public function viewUsers()
    {
        $users = User::latest()->paginate(6);
        return view('admin.users.show')->with('users',$users);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Logged in user can't edit himself
        if(Auth::user()->id == $id)
        {
            return redirect()->route('admin.users.index')->with('toast_warning', 'You\'re admin can\'t edit yourself');
        }

        return view('admin.users.edit')->with(['user' => User::find($id),'roles' => Role::all()]);
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
        //Logged in user can't update himself
        if(Auth::user()->id == $id)
        {
            return redirect()->route('admin.users.index')->with('toast_warning', 'You\'re admin can\'t edit yourself');
        }

        $user = User::find($id);
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')->with('toast_success', 'Updated Successfully');
    }


    //Users Search
    public function search(Request $request)
    {
        // Validation
        $request->validate([
            'search' => 'required|string|min:4|max:200'
        ],[],[
            'search' => 'Name '
        ]);

        $search = $request->input('search');
        $users = User::where('name','like',"%$search%")->get();

        return view('admin.users.results')->with('users',$users);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Logged in user can't delete himself
        if(Auth::user()->id == $id)
        {
            return redirect()->route('admin.users.index')->with('toast_warning', 'You\'re admin can\'t delete yourself');
        }

        User::destroy($id);

        return redirect()->route('admin.users.index')->with('toast_success', 'User deleted Successfully');
    }
}
