@extends('layouts.frontend')
@section('content')
@section('css')
<style>
.right-img p{
    font-size: 14px !important;
    line-height: 1.9;
    text-align: justify !important;
} 
</style>

@endsection

<section class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="about-img">
                    <img src="{{ asset('normal_images/'.$item->image ) }}" />
                </div>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="right-img">
                    <div class="">
                        <p>
                            {!! $item->content !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection