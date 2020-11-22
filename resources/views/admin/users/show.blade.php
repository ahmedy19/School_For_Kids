@extends('layouts.app')

@section('content')

<!--Show Users-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card_style">
                <div class="card-header card_header text-header">Users</div>

                <div class="card-body">
                    
                    <table class="table">
                        <thead class="table_header">
                          <tr class="table_row">
                            <th class="table_row" scope="col">Name</th>
                            <th class="table_row" scope="col">Email</th>
                            <th class="table_row" scope="col">Roles</th>
                            <th class="table_row" scope="col">Edit</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="table_row">
                                    <td class="table_row">{{$user->name}}</td>
                                    <td class="table_row">{{$user->email}}</td>
                                    <td class="table_row">{{implode(' - ',$user->roles()->get()->pluck('role')->toArray())}}</td>
                                    <td class="table_row">
                                        <a class="btn btn-primary btn-edit" href="{{route('admin.users.edit',$user->id)}}" role="button"><i class="fa fa-edit"></i></a>
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

<!--Show Users/-->
@endsection
