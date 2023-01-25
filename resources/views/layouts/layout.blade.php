<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="{{ asset('images/logo.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Jquery -->
    <script type="text/javascript" src="{{ asset('lib/jquery-3.6.1.min.js') }}"></script>

    <link href="{{ asset('lib/Bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <link href="{{ asset('lib/fontawesome/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/fontawesome/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/fontawesome/css/solid.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('lib/ckeditor.js') }}"></script>

    {{-- Animted Css --}}
    <link href="{{ asset('lib/animate.min.css') }}" rel="stylesheet">

    {{-- Layout --}}
    <script type="text/javascript" src="{{ asset('lib/sweetalert2@11.js') }}"></script>

    <!-- Datatables-->
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/DataTables/datatables.min.css') }}" />
    <script type="text/javascript" src="{{ asset('lib/DataTables/datatables.min.js') }}"></script>

    @yield('cdn')

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body class="bg-light">
    @include('components.navbar')

    <div class="container py-4">
        @yield('content')
    </div>

    <script src="{{ asset('lib/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
