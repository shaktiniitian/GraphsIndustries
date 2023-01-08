@extends('layouts.frontend')

@section('content')


<section tyle="padding-top: 50px">
    <div class="container">
        <div class="row" style="padding-top: 40px; padding-bottom:20px">
            <div class="col-md-6">
                <div class="images p-3">
                    <div class="text-center p-4">
                         <img id="main-image"
                            src="{{asset('normal_images/products/'.$item->file)}}" width="80%" style="margin: auto" class="img-responsive" />
                         </div>
                </div>
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