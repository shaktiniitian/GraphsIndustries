@extends('layouts.frontend')

@section('content')


<section class="" style="padding-top: 50px">
    <div class="container">
        <div class="row">
            @foreach('\App\Product'::where('status',1)->get() as $item)
            <div class="col-md-3 col-sm-3 col-xs-12" style="padding-bottom: 20px">
                <a href="{{ url('product/'.$item->id) }}" class="card" style="padding: 0px; background:#fff">
                    <img class="img-responsive" style="min-height: 200px"
                        src="{{asset('normal_images/products/'.$item->file)}}" alt="Card image cap">
                    <div class="card-body" style="padding:1px">
                        <h6 class="card-title text-left text-capitalize" style="color:#292828">
                            {{substr(strtolower($item->title), 0, 45)}}

                            {{strlen($item->title) > 50 ? '...' : '' }}
                        </h6>

                        <p class="card-text" style="padding:2px">{{ substr(strip_tags($item->description), 0, 200)}}
                            {{
                            substr(strip_tags($item->description), 0, 200) > 200 ? '...' : ''
                            }}
                        </p>
                    </div>

                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Read More</button>

                    </div>
                </a>

            </div>

            @endforeach
        </div>

    </div>
</section>



@endsection