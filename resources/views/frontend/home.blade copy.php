@extends('layouts.frontend')

@section('css')
<link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
@endsection

@section('content')


<section class="Sliderbanner-section">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
    
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @foreach($sliders as $k=>$slider)
          <div class="item {{$k==0 ? 'active' : ''}}">
            <img src="{{ asset('normal_images/'.$slider->image)}}" alt="Los Angeles" style="width:100%;">
          </div>
          @endforeach
    
   
        </div>
    
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


    <div class="Modern-Slider">
        @foreach($sliders as $slider)
        <div class="item">
            <div class="img-fill3">
                <img src="{{ asset('normal_images/'.$slider->image)}}" alt="">
                <div class="info hidden-xs">
                    <div class="banner1txt">

                        {{-- <h4>Care For Lifetime<br>Care For Your Smile</h4> --}}
                        <h5>{{$slider->title}}
                            <br> 
                            <a href="{{route('about')}}">Read More <i class="fa fa-angles-right"></i></a>
                        </h5>

                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

</section>

<section class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="about-img">
                    <img src="{{asset('frontend/images/About/photo0212.jpg') }}">
                </div>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="right-img">
                    <h2>Welcome To GraphsIndustries</h2>
                    <div class="right-text">
                        <p><strong>Graphs Industries</strong> manufactured stroboscopes in India from 2009 . Graphs
                            Industries produces variety of Stroboscopes like Digital Stroboscope, Industrial
                            Stroboscope ,Analogue Stroboscope, Hand Held Stroboscope, Desktop stroboscope unit, LED
                            - Stroboscope.
                            Graphs Industries products are used for various applications like textile industry,flexo
                            printing,rotogravure printing, flexography, gas power generations, aircraft industry,
                            automotive industry, car manufacturer, turbine manufacturer, vibrations analysis, motion
                            study, defence industry, research and development and case studies,quality control and
                            in various types of industries.
                        </p>

                        <a href="{{route('about')}}">Read More <i class="fa fa-angles-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<section class="all-exams">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="about-tittle-heading">
                    <h2>Products </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                       <div class="tab-content">
                    <div id="products" class="tab-pane fade in active">
                        @foreach($products as $product)
                        <div class="col-md-3 col-sm-3 col-xs-12 pl-0">
                            <div class="service-box2">
                                <img src="{{asset('normal_images/products/'.$product->file)}}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>


@endsection

@section('script')
<script type='text/javascript' src="{{ asset('frontend/js/wow.min.js')}}"></script>
<script type='text/javascript' src="{{ asset('frontend/js/slick.js')}}"></script>
<script>
    wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated', 
        offset: 0, 
        mobile: true,
        live: true
    })
    wow.init();

    $(document).ready(function () {

$(".Modern-Slider").slick({
    autoplay: true,
    autoplaySpeed: 10000,
    speed: 600,
    slidesToShow: 1,
    slidesToScroll: 1,
    pauseOnHover: false,
    dots: true,
    pauseOnDotsHover: true,
    cssEase: 'linear',
    fade:true,
    draggable: false,
    prevArrow: '<button class="PrevArrow"></button>',
    nextArrow: '<button class="NextArrow"></button>',
});

})
</script>

@endsection