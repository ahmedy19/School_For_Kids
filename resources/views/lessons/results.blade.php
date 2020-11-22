@extends('layouts.app')

@section('content')

<!--Search Lessons-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card_style">
                <div class="card-header card_header text-header">Search Results
                    
                    @hasrole('admin')
                    <a class="float-right" href="{{route('lessons.all')}}"><span class="badge badge-secondary badge_green"><i class="fas fa-arrow-alt-circle-left"></i></span></a>
                    @endhasrole

                    @hasrole('user')
                    <a class="float-right" href="{{route('lessons')}}"><span class="badge badge-secondary badge_green"><i class="fas fa-arrow-alt-circle-left"></i></span></a>
                    @endhasrole

                </div>

                <div class="card-body">
                    
                    <table class="table">
                        <thead class="table_header">
                          <tr class="table_row">
                            <th class="table_row" scope="col">Service</th>
                            <th class="table_row" scope="col">Title</th>
                            <th class="table_row" scope="col">Subtitle</th>
                            <th class="table_row" scope="col">Show</th>
                            <th class="table_row" scope="col">Edit</th>
                            @hasrole('admin')
                            <th class="table_row" scope="col">Delete</th>
                            @endhasrole
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($lessons as $lesson)
                                <tr class="table_row">
                                    <td class="table_row">{{$lesson->service->title}}</td>
                                    <td class="table_row">{{$lesson->title}}</td>
                                    <td class="table_row">{{substr($lesson->subtitle,0,25)}}...</td>
                                    <td class="table_row">
                                        <a class="btn btn-primary btn-green" href="{{route('show.lesson',['id'=>$lesson->id])}}" type="button"><i class="fa fa-eye"></i></a>
                                    </td>
                                    <td class="table_row">
                                        <a class="btn btn-primary btn-edit" href="{{route('edit.lesson',['id'=>$lesson->id])}}" role="button"><i class="fa fa-edit"></i></a>
                                    </td>
                                    @hasrole('admin')
                                        <td  class="table_row">
                                            <a href="{{route('delete.lesson',['id'=>$lesson->id])}}" class="btn btn-primary btn-delete" role="button"><i class="fa fa-trash-alt"></i></a>
                                        </td>
                                    @endhasrole
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</div>

<!--Search Lessons/-->
@endsection
