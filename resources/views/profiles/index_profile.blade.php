@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card_style">

                <div class="card-body">

                    <h4 class="register_header ml-5">Profile</h4>

                    @foreach ($profiles as $profile)

                    <form class="mt-4" action="{{route('update.profile',['id'=>$profile->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-sty input_style" name="phone_number" value="{{$profile->phone_number}}">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <input type="date" class="form-control form-control-sty" name="age" value="{{$profile->age}}" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-sty" name="first_address" value="{{$profile->first_address}}">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-sty" name="second_address" value="{{$profile->second_address}}">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-sty" name="city" value="{{$profile->city}}">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <select class="form-control form-control-sty" name="province">
                                    <option>{{$profile->province}}</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{$province->name}}">{{$province->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-sty" name="facebook" value="{{$profile->facebook}}">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-sty" name="twitter" value="{{$profile->twitter}}">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-sty" name="github" value="{{$profile->github}}">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <div class="custom-file">
                                    <input type="file" name="image" class="form-control custom-file-input">
                                    <label class="custom-file-label" for="customFile">Choose Photo</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <textarea class="form-control form-control-sty" name="biography" rows="3" placeholder="Biography">{{$profile->biography}}</textarea>
                            </div>
                        </div>
                        
                        
                        <div class="form-group row justify-content-center">
                            <div class="col-md-8 text-center">
                                <button class="col-md-8 btn btn-primary btn-green" type="submit" >
                                    Update
                                </button>
                            </div>
                        </div>
                        
                        
                    </form>

                    @endforeach

                    <!--Show errors Here-->
                    @if(count($errors)>0)
                        <ul class="navbar-nav mr-auto">
                            @foreach ($errors->all() as $error)
                            <li class="nav-item active">  
                                <div class="alert alert-danger" role="alert">
                                    {{$error}}
                                </div>
                            </li>
                            @endforeach    
                        </ul>
                    @endif
                    <!--Show errors Here/-->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
