@extends('layouts.app')

@section('content')

<!--Manage Services-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card_style">
                <div class="card-header card_header text-header">My Services</div>

                <form class="mt-2" action="{{route('search.service')}}" method="GET">
                  @csrf

                  <div class="form-group row justify-content-center ml-4 mr-4">
                          <input type="text" class="form-control form-control-sty" name="search" placeholder="Search by Title">
                  </div>
                </form>

                <div class="card-body">
                    
                    <table class="table">
                        <thead class="table_header">
                          <tr class="table_row">
                            <th class="table_row" scope="col">Title</th>
                            <th class="table_row" scope="col">image</th>
                            <th class="table_row" scope="col">Description</th>
                            <th class="table_row" scope="col">Show</th>
                            <th class="table_row" scope="col">Edit</th>
                          </tr>
                        </thead>
                        <tbody>
                                @foreach ($services as $service)
                                    <tr class="table_row">
                                        <td class="table_row">{{$service->title}}</td>
                                        <td class="table_row">
                                            <img src="{{$service->image_path}}" alt="Service Image" width="50" height="50">
                                        </td>

                                        <td class="table_row">{{substr($service->description, 0,80)}}...</td>
                                        <td class="table_row">
                                            <button class="btn btn-primary btn-green" data-toggle="modal" data-target="#showServiceModal" data-service_id="{{$service->id}}" data-title="{{$service->title}}" data-image="{{$service->image}}" data-description="{{$service->description}}" type="button"><i class="fa fa-eye"></i></button>
                                        </td>
                                        <td class="table_row">
                                            <a class="btn btn-primary btn-edit" href="{{route('edit.service',$service->id)}}" role="button"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                      </table>

                      {{$services->links()}}

                </div>
            </div>
        </div>



                
<!--Show Service Modal -->
  <div class="modal fade" id="showServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header modal_footer_sty"">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            <div class="card card_style">
                <div class="card-body">
                  
                    <form>
                        @csrf

                        <input type="hidden" id="service_id" name="id">

                        <img id="image" class="modal_image mb-4" src="" alt="" width="100" height="100">
                        <h5 id="title" class="card-title"></h5>
                        
                        <p id="description" class="card-text"></p>
                </div>
                <div class="modal-footer modal_footer_sty">
                    <button type="button" class="btn btn-warning btn-edit" data-dismiss="modal">Close <i class="far fa-times-circle"></i></button>
                </div>
        
            </form>

                </div>
            </div>

      </div>
    </div>
  </div>
<!--Show Service Modal /-->




    </div>
</div>

<!--Manage Services/-->
@endsection
