@extends('layouts.app')

@section('content')

<!--Create Lesson-->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card_style">

                <div class="card-body">

                    <h4 class="register_header ml-5">Lesson</h4>

                    <form class="mt-4" action="{{route('lesson.new')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <select class="form-control form-control-sty" name="service_id">
                                    <option selected disabled>Choose Service</option>
                                    @foreach ($services as $service)
                                        <option value="{{$service->id}}">{{$service->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-sty" name="title" value="{{ old('title') }}" placeholder="Title">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-sty" name="subtitle" value="{{ old('subtitle') }}" placeholder="Subtitle">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-sty" name="video_link" value="{{ old('video_link') }}" placeholder="Youtube link">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <textarea class="form-control form-control-sty" name="description" rows="3" placeholder="Description">{{old('description')}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <div class="custom-file">
                                    <input type="file" name="image" class="form-control form-control-sty input_style custom-file-input">
                                    <label class="custom-file-label" for="customFile">Choose Photo</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row justify-content-center">
                            <div class="col-md-8 text-center">
                                <button class="col-md-8 btn btn-primary btn-green" type="submit" >
                                    Create
                                </button>
                            </div>
                        </div>
                        
                        
                    </form>

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
<!--Create Lesson/-->