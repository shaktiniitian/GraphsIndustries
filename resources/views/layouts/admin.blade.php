<!Doctype html>
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
    <link href="{{ asset('backend/assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('backend/assets/vendors/summernote/dist/summernote.css') }}" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <!-- THEME STYLES-->
    <link href="{{ asset('backend/assets/css/main.min.css') }}" rel="stylesheet" />

</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a href="index.html">
                    <span class="brand">Graphs Industries </span>
                    <span class="brand-mini">Graphs Industries </span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler" href="javascript:;">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link search-toggler js-search-toggler"><i class="ti-search"></i>
                            <span>Search here...</span>
                        </a>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">



                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <span> {{ Auth::user()->name }}</span>
                            <img src="{{ asset('frontend/images/logo.pg') }}" alt="image" />
                        </a>
                        <div class="dropdown-menu dropdown-arrow dropdown-menu-right admin-dropdown-menu">
                            <div class="dropdown-arrow"></div>

                            <div class="admin-menu-features">
                                <a class="admin-features-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                        class="ti-user"></i>
                                    <span>LogOut</span>
                                </a>
                                <a class="admin-features-item" href="javascript:;"><i class="ti-lock"></i>
                                    <span>Change Password</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                            </div>

                        </div>
                    </li>

                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <ul class="side-menu metismenu">
                    <li class="active">
                        <a href="#"><i class="sidebar-item-icon ti-home"></i>
                            <span class="nav-label">Dashboards</span></a>

                    </li>
                    <li class="heading">FEATURES</li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon ti-paint-roller"></i>
                            <span class="nav-label">Manage Home</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{url('admin/home-slider')}}">Home Slider</a>
                            </li>
                            <!--<li>-->
                            <!--    <a href="{{url('facility')}}">Facility</a>-->
                            <!--</li>-->
                            <!--<li>-->
                            <!--    <a href="{{url('castle-glance')}}">Castle AT A Glance</a>-->
                            <!--</li>-->


                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon ti-paint-roller"></i>
                            <span class="nav-label">Manage Project</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{url('admin/projects')}}">Manage Message</a>
                            </li>

                            <!--  <li>
                                <a href="{{url('admin/project-gallery')}}">Manage Project Gallery</a>
                            </li>-->

                        </ul>
                    </li>


                    <li>
                        <a href="{{url('admin/products')}}"><i class="sidebar-item-icon ti-image"></i>
                            <span class="nav-label">Products</span></a>

                    </li>

                    <li>
                        <a href="{{url('admin/videos')}}"><i class="sidebar-item-icon ti-image"></i>
                            <span class="nav-label">Videos</span></a>

                    </li>

                    {{-- <li>
                        <a href="{{url('admin/category')}}"><i class="sidebar-item-icon ti-image"></i>
                            <span class="nav-label">Product Category</span></a>

                    </li> --}}


                    {{-- <li>
                        <a href="{{url('admin/gallery')}}"><i class="sidebar-item-icon ti-image"></i>
                            <span class="nav-label">Manage Product</span></a>

                    </li> --}}

{{-- 
                    <li>
                        <a href="{{ url('admin/news') }}"><i class="sidebar-item-icon ti-announcement"></i>
                            <span class="nav-label">Manage News & Events</span></a>

                    </li> --}}

                    <li>
                        <a href="{{url('admin/content')}}"><i class="sidebar-item-icon ti-comments"></i>
                            <span class="nav-label">Manage Content</span></a>

                    </li>


                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon ti-paint-roller"></i>
                            <span class="nav-label">Manage Other</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{url('admin/contact/list')}}">Contact Us</a>
                            </li>

                            <li>
                                <a href="{{url('admin/lead')}}">Manage Leads</a>
                            </li>
                            <!-- <li>-->
                            <!--    <a href="{{url('admin/lead/booking')}}">Manage Enquiry Leads</a>-->
                            <!--</li>-->



                        </ul>
                    </li>

                </ul>
                <div class="sidebar-footer">
                    <a href="javascript:;"><i class="ti-announcement"></i></a>
                    <a href="calendar.html"><i class="ti-calendar"></i></a>
                    <a href="javascript:;"><i class="ti-comments"></i></a>
                    <a href="login.html"><i class="ti-power-off"></i></a>
                </div>
            </div>
        </nav>
        <!-- END SIDEBAR-->



        @yield('content')



    </div>


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
    <script src="{{ asset('backend/assets/vendors/summernote/dist/summernote.min.js')}}"></script>
    <script src="{{ asset('backend/assets/vendors/bootstrap-markdown/js/bootstrap-markdown.js')}}"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('backend/assets/js/app.min.js')}}"></script>
    <script src="{{ asset('backend/assets/vendors/dataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.min.js')}}"></script>


    <!-- PAGE LEVEL SCRIPTS-->
    <script>
        $(function() {
            $('.summernote').summernote();
            $('#summernote_air').summernote({
                airMode: true
            });


        });
    </script>
    @yield('scripts')

</body>

</html>