
<!--Header-->
@include('includes.header')
<!--Header/-->


    <!--Navbar-->
    @include('includes.navbar')
    <!--Navbar/-->


    <!--Course Slider-->
    @include('includes.course_slider')
    <!--Course Slider/-->



    
<!--Lessons-->

<!--start title -->
<div class="title-courese text-center">
    <H1>Lessons</H1>
</div>
<!--end title-->

<!--Courses-->

<!-- strat courese card-->
<div class="card-slider">
    <div class="container">
        <div class="row">
            
            @foreach ($lessons as $lesson)
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <div class="card card-coureses">
                        <img src="{{$lesson->image_path}}" class="card-img-top" width="400" height="200">
                        <a type="button" class="btn btn-warning btn-block" href="{{$lesson->path()}}">{{$lesson->title}}</a>
                    </div>
                </div>
            @endforeach
            
        </div>

        <!--Pagination-->
        {{$lessons->links()}}
        <!--Pagination/-->


    </div>
</div>

<!--Lessons/-->
    



<!--Footer-->
@include('includes.footer')
<!--Footer/-->
