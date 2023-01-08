@extends('layouts.frontend')
@section('content')
@section('css')
<style>
.right-img ol li{
    line-height: 2.8;
    font-weight: normal !important;
} 

.rightimg img {
    vertical-align: top !important;
    height: 250px;
    
}
</style>

@endsection

<section class="about-section">
    <div class="container">
        <div class="row">
      
            <div class="col-md-12 col-sm-12 col-xs-12">
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