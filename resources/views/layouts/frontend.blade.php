<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Graphs Industries</title>
    <link rel="favicon" href="{{ asset('frontend/images/favicon.png') }}">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css" media="all">
    @yield('css')


</head>

<body>
    <div class="top-header hidden-xs">
        <div class="top-header-detaila"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="mobile-area">
                        <ul>
                            <li><a href="mailto:sales@graphsindustries.com"><i class="fa-solid fa-envelope"></i>
                                    sales@graphsindustries.com</a></li>
                            <li>
                                <a href="tel:98105 78961"> <i class="fa fa-phone"></i> 91-98105 78961</a>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="content-area custom-content">
                        <ul>
                            <li>
                                <a href="{{asset('Catlouge.pdf')}}" target="_blank">
                                    <i class="fa-solid fa-file-pdf"></i> Download Our Catalogue </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <header class="header-section">
        <nav class="navbar navbar-default navbar-static">
            <div class="container-fluid">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{url('/')}}">
                        <img src="{{ asset('logo.jpeg')}}" class="img-responsive">
                        </a>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="collapse navbar-collapse js-navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="dropdown dropdown-large">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{route('about')}}">About us
                                </a>

                            </li>
                            <li>
                                <a href="{{route('products')}}">Products
                                </a>

                            </li>

                            <li>
                                <a href="{{route('faq')}}">Application/Faq's</a>
                            </li>
                            <li>
                                <a href="{{route('videos')}}" role="button">Videos
                                </a>

                            </li>
                            <li>
                                <a href="{{route('contact')}}">Contact Us</a>
                            </li>
                        </ul>

                    </div>
                </div>
                <!-- /.nav-collapse -->
            </div>
        </nav>

    </header>
    @yield('content')


    <footer class="Footer-section">
        <div class="footer_deatals"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="use-link">
                        <h3>Important <span class="text_primary">Links</span></h3>
                        <ul>
                            <li>
                                <a href="index.php"> <i class="fa-solid fa-angles-right"></i>Home</a>
                            </li>
                            <li>
                                <a href="about.php"> <i class="fa-solid fa-angles-right"></i> About Us </a>
                            </li>
                            <li>
                                <a href="{{route('products')}}"> <i class="fa-solid fa-angles-right"></i>Products</a>
                            </li>
                            <li>
                                <a href="{{route('videos')}}"> <i class="fa-solid fa-angles-right"></i> Videos</a>
                            </li>
                            <li>
                                <a href="photoGallery.php"> <i class="fa-solid fa-angles-right"></i> Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="use-link">
                        <h3>Contact <span class="text_primary">information</span></h3>
                        <p>Office : Graphs Industries .
                            G - 16 PHASE VI
                            AAYA NAGAR,
                            NEW DELHI - 110047. India</p>
                        <ul>
                            <li> <i class="fas fa-envelope"></i> graphsindustries@yahoo.com</li>
                            <li> <i class="fa fa-mobile"></i> +91-9810578961 , 9818961742</li>


                        </ul>
                    </div>
                </div>




                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="address-link">
                        <h3 class="sub_heading fontWeight600">Subscribe <span class="text_primary">Now</span></h3>

                        <form class="form-inline subscrobe footer-subscribe-form" onsubmit="return validateSubsForm();"
                            method="post">
                            <input type="email" name="Subscribe_email" id="Subscribe_email"
                                placeholder="Enter Email Address...">
                            <input type="submit" name="subSubmit" value="Submit" class="button subs_submit">
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </footer>


    <div class="Footerflex-box">
        <div class="container">
            <div class="row">
                <div class="copy-right">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h5>
                            Copyright © 2023 <span>Graphs Industries</span>. All rights reserved
                        </h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h4 class="copy-left">
                            Design &amp; Developed by: <a href="#">Doplus School ERP</a>
                        </h4>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script type='text/javascript' src="{{ asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
    <script type='text/javascript' src="{{ asset('frontend/js//bootstrap.min.js')}}"></script>


    @yield('script')

</body>

</html>