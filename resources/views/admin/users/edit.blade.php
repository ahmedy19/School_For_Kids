@extends('layouts.app')

@section('content')

<!--Edit Users-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card form-sty">
                <div class="card-header card_header text-header">Edit Roles</div>

                <div class="card-body">
                    
                    <form action="{{route('admin.users.update',['user'=>$user->id])}}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}

                        <label class="card_label">Roles</label>

                        @foreach ($roles as $role)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="roles[]" value="{{$role->id}}"
                                {{$user->hasAnyRole($role->role)? 'checked':''}}>
                                <label>{{$role->role}}</label>
                            </div>
                        @endforeach
                        
                        <button type="submit" class="btn btn-primary btn-green">Update</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!--Edit Users/-->
@endsection
