<!-- start card our service -->
<div class="title-courese text-center">
    <H1>Our Services</H1>
</div>

            <!--Services-->
            <div class="card-slider">
                <div class="container">
                    <div class="row">
                        
                        @foreach ($services as $service)
                            <!--start card-->
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                <div class="card card-coureses">
                                    <img src="{{$service->image_path}}" class="card-img-top" width="400" height="200">
                                    <a type="button" class="btn btn-warning btn-block" href="{{route('our.courses')}}">{{$service->title}}</a>
                                </div>
                            </div>
                            <!--end card-->
                        @endforeach
                        
                    </div>

                </div>
            </div>
            <!--Services/-->

        </div>
    </div>
</div>