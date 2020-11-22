@extends('layouts.app')

@section('content')

<!--Show Single Lesson-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card_style">
                <img src="{{$lesson->image_path}}" class="card-img-top top_style" alt="Course Image">
                <div class="card-header card_header text-header">{{$lesson->title}}</div>

                <div class="card-body">
                    <h5 class="card-title">{{$lesson->subtitle}}</h5>
                    <p class="card-text">{{$lesson->description}}</p>

                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://youtube.com/embed/{{ $lesson->youtube_id }}" allowfullscreen></iframe>
                        </div>
                    
                </div>

                <div class="modal-footer modal_footer_sty">
                    <a type="button" href="{{route('lessons')}}" class="btn btn-warning btn-edit float-right" data-dismiss="modal">Close <i class="far fa-times-circle"></i></a>
                </div>

            </div>
        </div>

    </div>
</div>

<!--Show Single Lesson/-->
@endsection
