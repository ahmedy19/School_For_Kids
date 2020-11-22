@extends('layouts.app')

@section('content')

<!--Lessons-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card_style">
                <div class="card-header card_header text-header">My Lessons</div>

                <form class="mt-2" action="{{route('search.lesson')}}" method="GET">
                    @csrf

                    <div class="form-group row justify-content-center ml-4 mr-4">
                            <input type="text" class="form-control form-control-sty" name="search" placeholder="Search">
                    </div>
                </form>

                <div class="card-body">
                    
                    <table class="table">
                        <thead class="table_header">
                          <tr class="table_row">
                            <th class="table_row" scope="col">Service</th>
                            <th class="table_row" scope="col">Title</th>
                            <th class="table_row" scope="col">Subtitle</th>
                            <th class="table_row" scope="col">Image</th>
                            <th class="table_row" scope="col">Show</th>
                            <th class="table_row" scope="col">Edit</th>
                          </tr>
                        </thead>
                        <tbody>
                                @foreach ($lessons as $lesson)
                                    <tr class="table_row">
                                        <td class="table_row">{{$lesson->service->title}}</td>
                                        <td class="table_row">{{$lesson->title}}</td>
                                        <td class="table_row">{{substr($lesson->subtitle,0,25)}}...</td>
                                        <td class="table_row">
                                            <img class="circle_image" src="{{$lesson->image_path}}" alt="Service Image" width="50" height="50">
                                        </td>
                                        
                                        <td class="table_row">
                                            <a class="btn btn-primary btn-green" href="{{route('show.lesson',['id'=>$lesson->id])}}" type="button"><i class="fa fa-eye"></i></a>
                                        </td>
                                        <td class="table_row">
                                            <a class="btn btn-primary btn-edit" href="{{route('edit.lesson',['id'=>$lesson->id])}}" role="button"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                      </table>

                      {{$lessons->links()}}

                </div>
            </div>
        </div>

    </div>
</div>

<!--Lessons/-->
@endsection
