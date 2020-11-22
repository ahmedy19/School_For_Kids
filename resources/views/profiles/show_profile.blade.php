@extends('layouts.app')

@section('content')

<!--Show Single Profile-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card mb-3 card_style">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="{{$profile->image_path}}" class="card-img" alt="Profile Image">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-header">
                            @foreach ($users as $user)
                                @if($profile->id == $user->profile_id)
                                    {{$user->name}}
                                @endif
                            @endforeach
                        </h5>
                        <p class="card-text"><span class="profile_card">Phone:</span> {{$profile->phone_number}}</p>
                        <p class="card-text"><span class="profile_card">Age:</span> {{$profile->age}}</p>
                        <p class="card-text"><span class="profile_card">First Address:</span> {{$profile->first_address}}</p>
                        <p class="card-text"><span class="profile_card">Second Address:</span> {{$profile->second_address}}</p>
                        <p class="card-text"><span class="profile_card">City:</span> {{$profile->city}}</p>
                        <p class="card-text"><span class="profile_card">Province:</span> {{$profile->province}}</p>
                        <p class="card-text"><span class="profile_card">Facebook:</span> <a href="{{$profile->facebook}}">{{$profile->facebook}}</a></p>
                        <p class="card-text"><span class="profile_card">Twitter:</span> <a href="{{$profile->twitter}}">{{$profile->twitter}}</a></p>
                        <p class="card-text"><span class="profile_card">Github:</span> <a href="{{$profile->github}}">{{$profile->github}}</a></p>
                        <p class="card-text"><span class="profile_card">Biography:</span> {{$profile->biography}}</p>
                        <div class="modal-footer modal_footer_sty">
                            <a type="button" href="{{route('profiles.all')}}" class="btn btn-warning btn-edit float-right" data-dismiss="modal">Close <i class="far fa-times-circle"></i></a>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

        </div>

    </div>
</div>

<!--Show Single Profile/-->
@endsection
