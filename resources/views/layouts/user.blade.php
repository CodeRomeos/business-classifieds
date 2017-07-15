<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,600|Source+Sans+Pro:400,700" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @yield('head')
</head>
<body>
    <div id="app">
        @include('web.partials.nav')
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-3">
                    <div class="list-group">
                        <a href='{{ route("userDashboard") }}' class="list-group-item">Dashboard</a>
                        <a href='{{ route("userProfile") }}' class="list-group-item">My Profile</a>
                        <a href='{{ route("userBusiness") }}' class="list-group-item">My Business Page</a>
                        <a href='{{ route("userPassword") }}' class="list-group-item">Change Password</a>
                        <a href='{{ route("logout") }}' class="list-group-item">Logout</a>
                    </div>
                </div>
                <div class="col-sm-8 col-md-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
