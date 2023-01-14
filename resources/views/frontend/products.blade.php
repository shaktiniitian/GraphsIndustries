@extends('layouts.frontend')

@section('content')


<section class="" style="padding-top: 50px">
    <div class="container">
        <div class="row">
            @foreach('\App\Product'::where('status',1)->get() as $item)
            <div class="col-md-3 col-sm-3 col-xs-12" style="padding-bottom: 20px">
                <div class="card">
                    <div class="card-body">

                        <img class="img-responsive" style="min-height: 200px"
                            src="{{asset('normal_images/products/'.$item->file)}}" alt="Card image cap">
                        <div class="card-body" style="padding:1px">
                            <h6 class="card-title text-left text-capitalize" style="color:#292828">
                                {{substr(strtolower($item->title), 0, 40)}}

                                {{strlen($item->title) > 41 ? '...' : '' }}
                            </h6>

                            <p class="card-text" style="padding:2px">{{ substr(strip_tags($item->description), 0,
                                200)}}
                                {{
                                substr(strip_tags($item->description), 0, 200) > 200 ? '...' : ''
                                }}
                            </p>
                        </div>
                    </div>

                    <div class="card-footer text-right" style="padding-bottom:5px">
                        <a href="{{ url('product/'.$item->id) }}" >
                            <button class="btn btn-primary">Read More</button>
                        </a>
                    </div>
                </div>

            </div>

            @endforeach
        </div>

    </div>
</section>



@endsection