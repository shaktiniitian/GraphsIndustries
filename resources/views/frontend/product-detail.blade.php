@extends('layouts.frontend')

@section('content')

@section('title')
{{$item->title}}
@endsection
@section('description')
{{$item->description}}
@endsection
@section('image')
{{asset('normal_images/products/'.$item->file)}}
@endsection
<section tyle="padding-top: 50px">
    <div class="container">
        <div class="row" style="padding-top: 40px; padding-bottom:20px">
            <div class="col-md-6">
                @if(!empty($item->galleries))
                <div id="myCarousel" class="carousel slide images" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($item->galleries as $key=>$gallery)
                        <div class="item {{$key==0 ? 'active' : ''}}">
                            <img id="main-image" style="margin: auto" class="img-responsive" src="{{asset('normal_images/'.$gallery->image)}}" alt="gallery">
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="images p-3">
                    <div class="text-center p-4">
                        <img id="main-image" src="{{asset('normal_images/products/'.$item->file)}}" width="80%"
                            style="margin: auto" class="img-responsive" />
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-6">
                <div class="product p-4" style="padding:20px">
                    <h4>{{$item->title}}</h4>
                    <div class="d-flex justify-content-between align-items-center" style="line-height: 2">
                        {!! $item->description !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>



@endsection