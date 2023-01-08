@extends('layouts.frontend')
@section('content')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/isotope.css')}}" media="screen" />
    <link rel="stylesheet" href="{{ asset('frontend/js/fancybox/jquery.fancybox.css')}}" type="text/css" media="screen" />
@append

<header id="head" class="secondary" style="background-size: unset;">
    <<div class="container">
        <div class="row">
            <div class="col-sm-12" align="center">
                <h1 style="padding-top: 3em;">{{ $item->title }}</h1>
                <p>

                </p>
            </div>
        </div>
        </div>
</header>
<section class="bg-light">
    <!-- container -->
    <div class="container bg-white plr-40">
        <div class="row">
            <!-- Article content -->
            <h3>{{$item->title}}</h3>
            @if(!empty($item->image))
            <img src="{{ asset('normal_images/'.$item->image) }}" class="img-responsive" style="width:100%">

            @endif
            <p>{!! $item->content !!}</p>
        </div>
        

@if(!empty($item->gallery) && count($item->gallery) > 0)
        <div class="row" id="portfolio">
            
                    <div class="container">
                        <h5 style="padding:20px"><span style="font-weight: 700; color: rgb(255, 0, 0);"> IMAGES</span></h5>
 
                        <div class="col-md-12">
                            <div class="row">
                                <div class="portfolio-items isotopeWrapper clearfix">
                              @foreach($item->gallery as $image)
                                <div class="col-sm-3 col-md-3 isotopeItem gal{{ $image->id }}">
                                    <div class="portfolio-item">
                                        <img src="{{ asset('normal_images/'.$image->image) }}" style="min-height:180px; max-height:180px" class="img-responsive"  />
                                        <div class="portfolio-desc align-center">
                                            <div class="folio-info">
                                                <a href="{{ asset('normal_images/'.$image->image) }}" class="fancybox">
                                                    <i class="fa fa-link fa-2x"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach



                                 
                                </div>

                            </div>
                        </div>
                    </div>
            
        </div>
@endif        
    </div>
</section>


<!-- /container -->

@endsection

@section('script')
<script src="{{ asset('frontend/js/jquery.isotope.min.js')}}"></script>
<script src="{{ asset('frontend/js/fancybox/jquery.fancybox.pack.js')}}" type="text/javascript"></script>
@endsection