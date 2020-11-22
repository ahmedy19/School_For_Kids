@extends('layouts.app')

@section('content')

<!--Manage Users-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card_style">
                <div class="card-header card_header text-header">Manage Users</div>

                <form class="mt-2" action="{{route('search.users')}}" method="GET">
                    @csrf

                    <div class="form-group row justify-content-center ml-4 mr-4">
                            <input type="text" class="form-control form-control-sty" name="search" placeholder="Search by Name">
                    </div>
                </form>

                <div class="card-body">
                    
                    <table class="table">
                        <thead class="table_header">
                          <tr class="table_row">
                            <th class="table_row" scope="col">Name</th>
                            <th class="table_row" scope="col">Email</th>
                            <th class="table_row" scope="col">Roles</th>
                            <th class="table_row" scope="col">Profile</th>
                            <th class="table_row" scope="col">Edit</th>
                            <th class="table_row" scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="table_row">
                                    <td class="table_row">{{$user->name}}</td>
                                    <td class="table_row">{{$user->email}}</td>
                                    <td class="table_row">{{implode(' - ',$user->roles()->get()->pluck('role')->toArray())}}</td>
                                    <td class="table_row">
                                        @foreach ($profiles as $profile)
                                            @if($user->profile_id == $profile->id)
                                                <a href="{{route('show.profile',['id'=>$profile->id])}}"><span class="badge badge-pill badge-primary badge_green_profile"><i class="far fa-arrow-alt-circle-right"></i></span></a>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="table_row">
                                        <a class="btn btn-primary btn-edit" href="{{route('admin.users.edit',$user->id)}}" role="button"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td class="table_row">
                                        <form action="{{route('admin.users.destroy',$user->id)}}" method="POST">
                                        
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-primary btn-delete" role="button"><i class="fa fa-trash-alt"></i></button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>

                      {{$users->links()}}

                </div>
            </div>
        </div>
    </div>
</div>

<!--Manage Users/-->
@endsection
