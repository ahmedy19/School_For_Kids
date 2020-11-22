@extends('layouts.app')

@section('content')

<!--Search Services-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card_style">
                <div class="card-header card_header text-header">Search Results
                    
                    @hasrole('user')
                    <a class="float-right" href="{{route('services')}}"><span class="badge badge-secondary badge_green"><i class="fas fa-arrow-alt-circle-left"></i></span></a>
                    @endhasrole

                    @hasrole('admin')
                    <a class="float-right" href="{{route('services.all')}}"><span class="badge badge-secondary badge_green"><i class="fas fa-arrow-alt-circle-left"></i></span></a>
                    @endhasrole

                </div>

                <div class="card-body">
                    
                    <table class="table">
                        <thead class="table_header">
                          <tr class="table_row">
                            <th class="table_row" scope="col">Title</th>
                            <th class="table_row" scope="col">Description</th>
                            <th class="table_row" scope="col">Show</th>
                            <th class="table_row" scope="col">Edit</th>
                            @hasrole('admin')
                            <th class="table_row" scope="col">Delete</th>
                            @endhasrole
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr class="table_row">
                                    <td class="table_row">{{$service->title}}</td>
                                    <td class="table_row">{{substr($service->description,0,25)}}</td>
                                    {{-- <td class="table_row">
                                        <a class="btn btn-primary btn-green" href="{{route('show.service',['id'=>$service->id])}}" type="button"><i class="fa fa-eye"></i></a>
                                    </td> --}}

                                    <td class="table_row">
                                        <button class="btn btn-primary btn-green" data-toggle="modal" data-target="#showServiceModal" data-service_id="{{$service->id}}" data-title="{{$service->title}}" data-image="{{$service->image}}" data-description="{{$service->description}}" type="button"><i class="fa fa-eye"></i></button>
                                    </td>

                                    <td class="table_row">
                                        <a class="btn btn-primary btn-edit" href="{{route('edit.service',['id'=>$service->id])}}" role="button"><i class="fa fa-edit"></i></a>
                                    </td>

                                    @hasrole('admin')
                                    <td  class="table_row">
                                        <a href="{{route('delete.service',['id'=>$service->id])}}" class="btn btn-primary btn-delete" role="button"><i class="fa fa-trash-alt"></i></a>
                                    </td>
                                    @endhasrole

                                </tr>
                            @endforeach 
                        </tbody>
                    </table>

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

<!--Search Services/-->
@endsection
