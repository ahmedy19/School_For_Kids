<!--start title -->
<div class="title-courese text-center">
    <H1>program</H1>
</div>
<!--end title-->
<div class="card-slider">
    <div class="container">
        <div class="row">
        @foreach ($services as $service)
        <div class="col-sm-12 col-lg-4 col-md-4">
             <div class="card card-coureses">
                  <img src="{{$service->image_path}}" class="card-img-top" width="400" height="200">
                        <a href="{{route('our.courses')}}" type="button"
                        class="btn btn-warning btn-block">{{$service->title}}</a>
                    </div>

                  
                      
                    </div>
               
            
        @endforeach
        
    </div>
</div>
</div>