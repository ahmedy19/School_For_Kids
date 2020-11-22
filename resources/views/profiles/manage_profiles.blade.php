@extends('layouts.app')

@section('content')

<!--Manage Profiles-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card_style">
                <div class="card-header card_header text-header">Manage Profiles</div>

                {{-- <form class="mt-2" action="{{route('search.lesson')}}" method="GET">
                    @csrf

                    <div class="form-group row justify-content-center ml-4 mr-4">
                            <input type="text" class="form-control form-control-sty" name="search" placeholder="Search">
                    </div>
                </form> --}}

                <div class="card-body">
                    
                    <table class="table">
                        <thead class="table_header">
                          <tr class="table_row">
                            <th class="table_row" scope="col">User</th>
                            <th class="table_row" scope="col">Phone No.</th>
                            <th class="table_row" scope="col">Facebook</th>
                            <th class="table_row" scope="col">Twitter</th>
                            <th class="table_row" scope="col">Github</th>
                            <th class="table_row" scope="col">Show</th>
                          </tr>
                        </thead>
                        <tbody>
                                @foreach ($profiles as $profile)
                                    <tr class="table_row">
                                        <td class="table_row">
                                            @foreach ($users as $user)
                                                @if($profile->id == $user->profile_id)
                                                    {{$user->name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="table_row">{{$profile->phone_number}}</td>
                                        <td class="table_row">{{$profile->facebook}}</td>
                                        <td class="table_row">{{$profile->twitter}}</td>
                                        <td class="table_row">{{$profile->github}}</td>
                                        
                                        <td class="table_row">
                                            <a class="btn btn-primary btn-green" href="{{route('show.profile',['id'=>$profile->id])}}" type="button"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                      </table>

                      {{$profiles->links()}}

                </div>
            </div>
        </div>

    </div>
</div>

<!--Manage Profiles/-->
@endsection
