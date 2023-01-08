@extends('layouts.frontend')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/isotope.css')}}" media="screen" />
    <link rel="stylesheet" href="{{ asset('frontend/js/fancybox/jquery.fancybox.css')}}" type="text/css" media="screen" />
@append

@section('content')


<header id="head" class="secondary" style="background-size: unset;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12" align="center">
                <h1 style="padding-top: 3.5em;">Gallery</h1>
                <p>
                    
                </p>
            </div>
        </div>
    </div>
</header>


 <section id="portfolio" class="text-center">
   
                    <div class="container">
                        <nav id="filter" class="col-md-12">
                            <ul>
                             <li><a href="javascript:" class="current btn-theme btn-small" data-filter="*">All</a></li>

                              @foreach($item as $category)    

                                <li><a href="javascript:" class="btn-theme btn-small" data-filter=".gal{{ $category->id }}">{{ $category->title }}</a></li>

                            @endforeach    
                            </ul>
                        </nav>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="portfolio-items isotopeWrapper clearfix" id="3">
                                    
                                    
                              @foreach($item as $cat)
                              
                              @foreach($cat->gallery as $image)
                                <article class="col-sm-4 isotopeItem gal{{ $cat->id }}">
                                    <div class="portfolio-item">
                                        <img src="{{ asset('normal_images/'.$image->image) }}" alt="{{$image->title}}"  style="max-height:300px; min-height:300px;" />
                                        <div class="portfolio-desc align-center">
                                            <div class="folio-info">
                                                <a href="{{ asset('normal_images/'.$image->image) }}" class="fancybox">
                                                    <h5>{{$image->title}}</h5>
                                                    <i class="fa fa-link fa-2x"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                            @endforeach
                            @endforeach



                                 
                                </div>

                            </div>
                        </div>
                    </div>

                </section>




@endsection

@section('script')
    <script src="{{ asset('frontend/js/jquery.isotope.min.js')}}"></script>
    <script src="{{ asset('frontend/js/fancybox/jquery.fancybox.pack.js')}}" type="text/javascript"></script>
@endsection

