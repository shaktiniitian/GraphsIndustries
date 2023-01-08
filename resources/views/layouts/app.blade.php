<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Graphs Industries</title>
    <link href="{{ asset('backend/assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/vendors/line-awesome/css/line-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/vendors/animate.css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/vendors/toastr/toastr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <!-- THEME STYLES-->
    <link href="{{ asset('backend/assets/css/main.min.css') }}" rel="stylesheet" />
    <style>
        body {
            background-image: url(frontend/images/main-slider/image-1.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .login-content {
            max-width: 400px;
            margin: 100px auto 50px;
        }

        .auth-head-icon {
            position: relative;
            height: 60px;
            width: 60px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            background-color: #fff;
            color: #ff4081;
            box-shadow: 0 5px 20px #d6dee4;
            border-radius: 50%;
            transform: translateY(-50%);
            z-index: 2;
        }
    </style>
</head>
<body>
@yield('content')


<script src="{{ asset('backend/assets/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('backend/assets/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('backend/assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('backend/assets/vendors/metisMenu/dist/metisMenu.min.js')}}"></script>
    <script src="{{ asset('backend/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{ asset('backend/assets/vendors/jquery-idletimer/dist/idle-timer.min.js')}}"></script>
    <script src="{{ asset('backend/assets/vendors/toastr/toastr.min.js')}}"></script>
    <script src="{{ asset('backend/assets/vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('backend/assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('backend/assets/js/app.min.js')}}"></script>
    <script>
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
</body>
</html>
