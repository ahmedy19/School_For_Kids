@extends('layouts.app')

@section('content')
<!--Main Page-->
<div class="container">
    <div class="row justify-content-center ml-4">
        <div class="col-md-12 pt-5 justify-content-center">

            <div class="container">
                <div class="row">

                  
                    <div class="col">
                        <div class="card shadow" style="width:16rem;">
                                <div class="card-header main_card">
                                    <span class="text_color">Total Users</span> 
                                    <span class="ml-5"><i class="fas fa-users"></i></span>
                                </div>
                                <div class="card-header main_card">{{$users}}
                                    @hasrole('admin') 
                                        <a href="{{route('admin.users.index')}}">
                                            <span class="ml-5 align-top"><i class="fa fa-arrow-alt-circle-right icon_color"></i></span>
                                        </a>
                                    @endhasrole

                                </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow" style="width:16rem;">
                                <div class="card-header main_card">
                                    <span class="text_color">Total Services</span> 
                                    <span class="ml-5"><i class="fas fa-school"></i></span>
                                </div>
                                <div class="card-header main_card">{{$services}}
                                    @hasrole('admin') 
                                        <a href="{{route('services.all')}}">
                                            <span class="ml-5 align-top"><i class="fa fa-arrow-alt-circle-right icon_color"></i></span>
                                        </a>
                                    @endhasrole

                                </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow" style="width:16rem;">
                                <div class="card-header main_card">
                                    <span class="text_color">Total Lessons</span> 
                                    <span class="ml-5"><i class="fab fa-buffer"></i></span>
                                </div>
                                <div class="card-header main_card">{{$lessons}}
                                    @hasrole('admin') 
                                        <a href="{{route('lessons.all')}}">
                                            <span class="ml-5 align-top"><i class="fa fa-arrow-alt-circle-right icon_color"></i></span>
                                        </a>
                                    @endhasrole

                                </div>
                        </div>
                    </div>
                  

                  

                </div>
              </div>


        </div>
    </div>
</div>
<!--Main Page/-->
@endsection
