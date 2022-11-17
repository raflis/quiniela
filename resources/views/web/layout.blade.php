<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QUINIELA</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png" />
    <link href="{{ asset('css/app.css?v=0') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('slick/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/web.css?v='.time()) }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b46a337495.js" crossorigin="anonymous"></script>
    <!--<link href="{{ asset('css/all.css') }}" rel="stylesheet">-->
    @yield('css')
</head>
<body>
    <div class="loading">
        <div id="loader" class="center-all"></div>
    </div>
    @include('web.partials.header')
    @yield('content')
    @include('web.partials.footer')
    <script src="{{ asset('js/app.js?v=0') }}"></script>
    <script src="{{ asset('js/main.js?v='.time()) }}"></script>
    <script src="{{ asset('slick/slick.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script>
        $(function(){
            @if(request('mode') == 'login')
            $('#loginModal').modal('show');
            @endif
        })
    </script>
    @yield('script')
    
</body>
</html>