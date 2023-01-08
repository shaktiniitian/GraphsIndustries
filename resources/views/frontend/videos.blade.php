@extends('layouts.frontend')

@section('content')


<section class="" style="padding-top: 50px">
    <div class="container">
        <div class="row">
            @foreach('\App\Video'::where('status',1)->get() as $item)
            <div class="col-md-3 col-sm-3 col-xs-12" style="padding-bottom: 20px">
                <div class="card" style="padding: 0px; background:#fff">

                    <iframe width="100%" height="315" src="{{$item->url}}" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                    </iframe>


                    <div class="card-body">
                        <h5 class="card-title text-center">{{$item->title}}</h5>
                        <p class="card-text">{{$item->description}}</p>
                        {{-- <a href="#" class="btn btn-primary p-5">Go somewhere</a> --}}
                    </div>

                </div>


            </div>
            @endforeach

        </div>
</section>



@endsection

@section('script')

<script src="https://cdn.jsdelivr.net/gh/thelevicole/youtube-to-html5-loader@4.0.1/dist/YouTubeToHtml5.js"></script>
<script>
    new YouTubeToHtml5();
</script>

@endsection