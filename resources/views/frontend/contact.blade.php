@extends('layouts.frontend')
@section('content')
@section('css')
<style>
    .right-img p {
        line-height: 2.5;
        font-weight: normal !important;
    }

    label {
        color: rgb(28, 28, 28);
    }
</style>

@endsection

<section class="about-section">
    <div class="container">
        <div class="row contactbox">
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

        <div class="row" style="padding-top: 20px">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d28057.589092918053!2d77.136899!3d28.473564!3m2!1i1024!2i768!4f13.1!2m1!1sB2%20Block%2C%20Aya%20Nagar%20Extension%2C%20Phase%20V%2C%20Aya%20Nagar%2C%20New%20Delhi%2C%20South%20Delhi%2C%20Delhi%20110047!5e0!3m2!1sen!2sin!4v1673089165902!5m2!1sen!2sin"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12" style="border: 1px solid #ddd; padding:15px">

                <h4 class="pb-5 pt-2" style="color: rgb(171, 41, 9)">FILL YOUR ENQUIRY
                </h4>
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif

                <form action="{{route('save-lead')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name">
                        @if($errors->has('name'))
                        <div class="error text-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email">
                        @if($errors->has('email'))
                        <div class="error text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="pwd">Mobile:</label>
                        <input type="number" name="mobile" value="{{old('mobile')}}" class="form-control" id="mobile">
                        @if($errors->has('mobile'))
                        <div class="error text-danger">{{ $errors->first('mobile') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="pwd">Select Product:</label>
                        <select name="product" class="form-control">
                            <option value="">Select Product</option>
                            @foreach ('\App\Product'::where('status',1)->get() as $item)
                            <option value="{{ $item->title}}">{{ $item->title}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('product'))
                        <div class="error text-danger">{{ $errors->first('product') }}</div>
                        @endif
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>


                </form>

            </div>
        </div>
    </div>
</section>


@endsection