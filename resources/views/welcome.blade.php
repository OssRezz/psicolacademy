<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Jquery -->
    <script type="text/javascript" src="{{ asset('lib/jquery-3.6.1.min.js') }}"></script>

    <link href="{{ asset('lib/Bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <link href="{{ asset('lib/fontawesome/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/fontawesome/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/fontawesome/css/solid.css') }}" rel="stylesheet">

    {{-- Animted Css --}}
    <link href="{{ asset('lib/animate.min.css') }}" rel="stylesheet">

    {{-- Layout --}}
    <script type="text/javascript" src="{{ asset('lib/sweetalert2@11.js') }}"></script>

    <!-- Datatables-->
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/DataTables/datatables.min.css') }}" />
    <script type="text/javascript" src="{{ asset('lib/DataTables/datatables.min.js') }}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-light">
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-lg-6">
                        @if (session('message'))
                            <div class="alert alert-primary alert-dismissible fade show d-flex justify-content-bewteen align-items-center mb-1"
                                role="alert">
                                <div class="col-10">
                                    <i class="fa-solid fa-circle-info"></i> <b>{{ session('message') }}</b>
                                </div>
                                <div class="col-2 d-flex align-items-center text-center">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="" style="width: 35rem">
                        <div class="card border-0 shadow-sm">

                            {{-- <div class="card-body d-flex justify-content-center">
                                <img src="{{ asset('images/logo.png') }}" height="150">
                            </div> --}}

                            <div class="card-body p-4">
                                <div class="row mb-4">
                                    <div class="col-12 text-center">
                                        <img src="{{ asset('images/logo.png') }}" height="150">
                                        <div class="col-12 text-center fs-3 text-muted">
                                            PsicolAcademy
                                        </div>
                                    </div>
                                </div>
                                <form method="POST" action="{{ url('login/in') }}">
                                    @csrf

                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" placeholder="Email" name="email"
                                            {{ $errors->has('email') ? 'is-invalid' : '' }}
                                            value="academy@admin.com" />
                                        <label>Email <b class="text-rosado">*</b></label>
                                        @if ($errors->has('email'))
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                        @endif
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" placeholder="Password"
                                            name="password" value="1234"
                                            {{ $errors->has('password') ? 'is-invalid' : '' }} />
                                        <label>Password <b class="text-rosado">*</b></label>
                                        @if ($errors->has('password'))
                                            <small class="text-danger">{{ $errors->first('password') }}</small>
                                        @endif
                                    </div>
                                    <div class="row mb-0">
                                        <div class="  d-grid">
                                            <button type="submit" class="btn btn-primary btn-table border-0 btn-lg">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <div class="d-flex justify-content-center">
        <footer class="bg-light text-center text-lg-start " style="z-index: -10">
            <!-- Copyright -->
            <div class="text-center p-3">
                © 2022 - James Osorio Florez</a>
            </div>
            <!-- Copy
        </div>
        right -->
        </footer>
    </div>

</body>

</html>
