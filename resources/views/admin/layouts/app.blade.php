<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('private.name_web') }}</title>

    {{-- <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Font Awesome --> --}}
    {{-- <link href="{{ asset('css/all.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('assets') }}/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('assets') }}/demo/demo.css" rel="stylesheet" /> --}}
    {{-- <link href="{{ asset('css/animate/animate.min.css') }}" rel="stylesheet"> --}}
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    {{-- <link href="{{ asset('css/main.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('assets') }}/css/bootstrap.css" rel="stylesheet" /> --}}

    {{-- Alziro  --}}
    <link rel="stylesheet" href="{{ asset('demo/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('dechbord/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dechbord/css/framework.css') }}" />
    <link rel="stylesheet" href="{{ asset('dechbord/css/main.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&#038;display=swap" rel="stylesheet" />
    @if (Config::get('languages')[App::getLocale()]['language'] == 'Arabic')
        <link rel="stylesheet" href="{{ asset('css/Arabic.css') }}">
    @endif
</head>

<body>


    <div class="page d-flex">
        @include('admin.layouts.nav.sidebar')
        <div class="content w-full overflow-hidden">
            @include('admin.layouts.nav.Topbar')
            @yield('content')
        </div>
    </div>

    {{-- Alziro --}}
    <script>
        // Change Content View
        let changeContentView = document.querySelector(".content .change-view");
        let viewLi = document.querySelectorAll(".title .view li i");
        viewLi.forEach(e => {
            e.addEventListener("click", (e) => {
                viewLi.forEach(e => {
                    e.classList.remove("active");
                });
                e.target.classList.add("active");
                if (e.target.classList.contains("list")) {
                    changeContentView.classList.add("grid-full");
                    localStorage.setItem("contentView", "grid-full");
                } else {
                    changeContentView.classList.remove("grid-full");
                    localStorage.setItem("contentView", "grid");
                }
            });
        });
        // Save in LocalStorage
        let savedContetnView = localStorage.getItem("contentView");
        if (savedContetnView === "grid-full") {
            document.querySelectorAll(".title .view li i").forEach(e => {
                e.classList.remove("active");
            });
            changeContentView.classList.add("grid-full");
            document.querySelector(".title .view i.list").classList.add("active");
        } else {
            changeContentView.classList.remove("grid-full");
            document.querySelector(".title .view i.grid").classList.add("active");
        };
    </script>
    @stack('js')
    <script src="{{ asset('dechbord/JS/main.js') }}"></script>
    <script src="{{ asset('demo/chartjs.min.js') }}"></script>
    <script src="{{ asset('demo/demo.js') }}"></script>

</body>

</html>
