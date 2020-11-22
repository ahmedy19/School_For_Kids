
<!--Header-->
@include('includes.header')
<!--Header/-->


    <!--Navbar-->
    @include('includes.navbar')
    <!--Navbar/-->


    <div class="video">
        <div class="container">

            <div class="card">
                <div class="card-body">
                    <iframe src="https://youtube.com/embed/{{ $lesson->youtube_id }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="card-footer">{{$lesson->title}}
                    <div class="next-video">
                        <a href="{{route('our.courses')}}">Return <i class="far fa-arrow-alt-circle-left"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>



<!--Footer-->
@include('includes.footer')
<!--Footer/-->
        