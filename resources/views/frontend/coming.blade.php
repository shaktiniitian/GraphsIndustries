@extends('layouts.frontend')

@section('content')


<header id="head" class="secondary" style="background-size: unset;">
    <<div class="container">
        <div class="row">
            <div class="col-sm-12" align="center">
                <h1 style="padding-top: 3em;">{{$item->title}}</h1>
                <p>
                    
                </p>
            </div>
        </div>
    </div>
</header> 

<div class="container">
    <div class="row offs1">                        
        <div class="col-md-9 col-sm-6 col-xs-12">
            <div class="thumbnail thumbnail4">
                <img src="{{asset('normal_images/'.$item->image)}}" alt="">

                <div class="caption">
                    <h4><a href="javascript:">{{$item->title}}</a></h4>

                    <p align="justify">{!! $item->content !!}</p>
                    
                </div>
            </div>
        </div>


        <div class="col-lg-3 col-md-3 col-xs-6 flat" style="margin-top: 0px;">
            <ul class="plan plan1">
                <li class="plan-name">{{$item->title}}</li>
                
                <li class="plan-price" style="color: #000;">
                    <h5>LOCATION</h5>
                    <strong>{{$item->location}}</strong>
                </li>

                <li class="plan-price" style="color: #000;">
                    <h5>PLOT SIZES</h5>
                    <strong>{{$item->size}}</strong>
                </li>

                <li class="plan-price" style="color: #000;">
                    <h5>LAUNCH DATE</h5>
                    <strong>{{$item->date}}</strong>
                </li>

                <li class="plan-price" style="color: #000;">
                    <h5>PRICE</h5>
                    <strong><i class="fa fa-inr"></i></strong> {{$item->price}}
                </li>
                
                @if(!empty($item->brochures))

                <li class="plan-price" style="color: #000;">
                    <h5>DOWNLOAD BROCHURES</h5>
                </li>

                    @foreach($item->brochures as $brochure)

                    @php
                    $info = pathinfo($brochure->image);
                    $ext = $info['extension'];
                    @endphp
                        <li class="plan-action">
                            <a href="{{asset('normal_images/'.$brochure->image)}}" target="_blank" class="btn">DOWNLOAD .{{$ext}}</a>
                        </li>
                    @endforeach 

                @endif
            </ul>


            <div class="team-member">
                
                <h4>FOLLOW US ON</h4>
                <!-- Designation -->
                <!-- <span class="pos">CEO</span> -->
                <div class="team-socials">
                    <a href="javascript:"><i class="fa fa-facebook"></i></a>
                    <a href="javascript:"><i class="fa fa-google-plus"></i></a>
                    <a href="javascript:"><i class="fa fa-twitter"></i></a>
                    <a href="javascript:"><i class="fa fa-dribbble"></i></a>
                    <a href="javascript:"><i class="fa fa-github"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
    
    
    

@endsection
