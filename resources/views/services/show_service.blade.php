@extends('layouts.app')

@section('content')

<!--Show Single Profile-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card mb-3 card_style">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="{{$service->image_path}}" class="card-img" alt="Profile Image">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-header">
                            {{$service->user->name}}
                        </h5>
                        <p class="card-text">{{$service->title}}</p>
                        <p class="card-text">{{$service->description}}</p>
                        
                        @hasrole('admin')
                            <div class="modal-footer modal_footer_sty">
                                <a type="button" href="{{route('services.all')}}" class="btn btn-warning btn-edit float-right" data-dismiss="modal">Close <i class="far fa-times-circle"></i></a>
                            </div>
                        @endhasrole

                        @hasrole('user')
                        <div class="modal-footer modal_footer_sty">
                            <a type="button" href="{{route('services')}}" class="btn btn-warning btn-edit float-right" data-dismiss="modal">Close <i class="far fa-times-circle"></i></a>
                        </div>
                        @endhasrole
                    </div>
                  </div>
                </div>
              </div>

        </div>

    </div>
</div>

<!--Show Single Profile/-->
@endsection
