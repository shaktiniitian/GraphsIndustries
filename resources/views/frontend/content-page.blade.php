@extends('layouts.frontend')

@section('content')

                      
<header id="head" class="secondary" style="background-size: unset;" >
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
    

<!-- container -->
<div class="container">
    <div class="row">
        <!-- Article content -->
        <section class="col-sm-12 maincontent">
            <h3>{{$item->title}}</h3>
            <p>{!! $item->content !!}</p>
        </section>
    </div>
</div>
<!-- /container -->    

@endsection
