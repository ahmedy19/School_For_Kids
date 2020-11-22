<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--Bootstrap,Fontawesome,Dropzone-->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">

    <!--mystyle-->
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">

</head>
<body class="{{ (auth()->user())?'body_style':'register_style'}}">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    School for Kids
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        @hasrole('admin')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Users
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('admin.users.index')}}">Manage Users</a>
                                <a class="dropdown-item" href="{{route('view.users')}}">Show</a>
                                </div>
                            </li>
                        @endhasrole

                        @hasrole('admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('profiles.all')}}">Manage Profiles</a>
                            </li>
                        @endhasrole

                        <!--Services-->
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Services
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @hasrole('admin')
                                    <a class="dropdown-item" href="{{route('services.all')}}">Manage Services</a>
                                @endhasrole
                                <a class="dropdown-item" href="{{route('create.service')}}">Create</a>
                                <a class="dropdown-item" href="{{route('services')}}">My Services</a>
                                </div>
                            </li>
                        @endauth
                        <!--Services/-->

                        <!--Lessons-->
                            @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Lessons
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @hasrole('admin')
                                    <a class="dropdown-item" href="{{route('lessons.all')}}">Manage Lessons</a>
                                @endhasrole
                                <a class="dropdown-item" href="{{route('create.lesson')}}">Create</a>
                                <a class="dropdown-item" href="{{route('lessons')}}">My Lessons</a>
                                </div>
                            </li>
                            @endauth
                        <!--Lessons/-->

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                
                                {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a> --}}
                                
                                <a id="navbarDropdown" class="nav-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @auth     
                                    <img class="circle_image" src="{{optional(auth()->user()->profile)->image_path ?? asset('uploads/profile/1.png') }}" width="30" height="30" alt="{{auth()->user()->name}}">
                                @endauth
                                @guest
                                    <img class="circle_image" src="{{asset('uploads/profile/1.png')}}" width="30" height="30" alt="{{auth()->user()->name}}">
                                @endguest
                                </a>


                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(auth()->user()->profile_id)
                                        <a class="dropdown-item" href="{{route('profiles')}}">
                                            My Profile
                                        </a>
                                    @else
                                        <a class="dropdown-item" href="{{route('create.profile')}}">
                                            My Profile
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @include('sweetalert::alert')
            @yield('content')
        </main>
    </div>


    <!--Bootstrap , Fontawesome -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    

    <script src="{{ asset('js/app.js') }}"></script>


    <script>

        //Show Single Service modal 
        $('#showServiceModal').on('show.bs.modal', function(e){
            
            var button = $(e.relatedTarget);

            var image = button.data('image');
            var title = button.data('title');    // title is id of modal input 
            var description = button.data('description');
            var service_id = button.data('service_id');
            
            var modal = $(this);
            
            modal.find('.modal-title').text('Service');
            
            modal.find('.modal-body #service_id').html(service_id);
            modal.find('.modal-body #image').attr('src','/uploads/service/'+image);
            modal.find('.modal-body #title').html(title);
            modal.find('.modal-body #description').html(description);

            });

            //Progress bar

            $(function() {
                    $(document).ready(function()
                    {
                        var bar = $('.bar');
                        var percent = $('.percent');

                $('.form_ajax').ajaxForm({
                    beforeSend: function() {
                        var percentVal = '0%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        var percentVal = percentComplete + '%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    complete: function(xhr) {
                        toast('Video Created Successfully','success');
                        window.location.href = "/videos";
                    }
                });
            }); 
            });

            //Recaptcha 
            // $(document).ready(function(){
            //     // $('#recaptcha').submit();
            // });

    </script>


</body>
</html>
