<!--Courses Cards-->

<!--start title -->
<div class="title-courese text-center">
    <H1>Courses</H1>
</div>
<!--end title-->

<!--Courses-->
<div class="card-slider">
    <div class="container">
        <div class="row">
            
            @foreach ($services as $service)
                @if ($service->lessons->count() > 0)
                    <!--start card-->
                    <div class="col-sm-12 col-lg-4 col-md-4">
                        <div class="card card-coureses">
                            <img src="{{$service->image_path}}" class="card-img-top" width="400" height="200">
                            <a type="button" class="btn btn-warning btn-block" href="{{route('all.lessons.users',['id'=>$service->id ,'slug'=>$service->title])}}">{{$service->title}}</a>
                        </div>
                    </div>
                    <!--end card-->
                @endif
            @endforeach
            
        </div>

    </div>
</div>

<!--Courses/-->



{{-- @foreach($services as $service)
        @if ($service->lessons->count() >0)
            <div class="row courese-body courese-sec">
                <div class="title">
                    <img src="../layout/image/99.png" alt="">
                    <p>{{$service->title}}</p>
                </div>
                @foreach ($service->lessons->take(3) as $lesson)
                    <div class="col-sm-6 col-lg-4 col-md-6">
                        <div class="card-courese">
                            <div class="card-body">
                                <img src="{{$lesson->image_path}}">
                            </div>
                            <button type="button" class="btn btn-primary btn-lg btn-block">{{$lesson->title}}</button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endforeach --}}
