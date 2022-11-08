<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'AVN System') }}</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link href="{{ asset('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <style>
        .auth-box .auth-box-right .form-head img {
            width: 350px;
        }
    </style>
</head>

<body class="vertical-layout">
    <!-- Start Containerbar -->
    <div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container">
            <div class="auth-box login-box">
                <!-- Start row -->
                <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-6">
                        <!-- Start Auth Box -->
                        <div class="auth-box-right">
                            <div class="card">
                                <div class="card-body">

                                    <div class="form-head">
                                        <a href="{{ url('/') }}" class="logo">
                                            <img src="{{ asset('images/sbcc_smeda_govt_logo.jpg') }}" class="img-fluid"
                                                alt="logo"></a>
                                    </div>

                                    @if (Route::has('login'))
                                        @auth
                                            <a href="{{ url('/admin/home') }}"
                                                class="btn btn-dark btn-lg btn-block font-18">Home</a>
                                        @else
                                            <a href="{{ route('login') }}"
                                                class="btn btn-dark btn-lg btn-block font-18">Log in</a>
                                            {{-- @if (Route::has('register'))
                                                    <a href="{{ route('register') }}"
                                                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                                @endif --}}
                                        @endauth
                                    @endif

                                    <p class="mb-0 mt-3 text-center">
                                        <a href="https://sharasol.com" class="text-dark small">
                                            Development by SHARA Solutions SMC-Pvt Ltd.
                                        </a>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <!-- End Auth Box -->
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
        </div>
        <!-- End Container -->
    </div>
    <!-- End Containerbar -->
</body>

</html>
