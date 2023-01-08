@extends('layouts.admin')

@section('content')
@php
$action = !empty($item) ? 'contact-save': '';
@endphp





<div class="content-wrapper">
    <!-- START PAGE CONTENT-->

    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-10">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit Contact Details </div>

                    </div>
                    <div class="ibox-body">

                        <form action="{{ url('admin/contact-save/'.$item->id) }}" method="POST" enctype="multipart/form-data">

                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p class="error_item">{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif
                            @if (\Session::has('success'))


                            <div class="alert alert-primary alert-dismissable fade show has-icon"><i
                                    class="la la-check alert-icon"></i>
                                <button class="close" data-dismiss="alert" aria-label="Close"></button><strong>Well
                                    done!</strong><br>{!! \Session::get('success') !!}
                            </div>

                            @endif

                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <!-- @if(!empty($item))
                            <input type="hidden" name="_method" value="PATCH">
                            @endif -->
                            <div class="form-group mb-4">
                                <label>Enter Heading</label>
                                <input class="form-control" name="title"
                                    value="{{ !empty($item) ? $item->title : old('title') }}" type="text"
                                    placeholder="Enter Title">
                            </div>
                    

                            <!--<div class="form-group mb-4">-->
                            <!--    <label>Enter Sub Heading</label>-->
                            <!--    <input class="form-control" name="sub_title"-->
                            <!--        value="{{ !empty($item && $other) ? $other->sub_title : old('sub_title') }}"-->
                            <!--        type="text" placeholder="Enter Sub Heading">-->
                            <!--</div>-->

                            <div class="form-group mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Enter Address</label>
                                        <input class="form-control" name="address"
                                            value="{{ !empty($item && $other) ? $other->address : old('address') }}"
                                            placeholder="Enter Address" type="text">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Enter Visit Time</label>
                                        <input class="form-control" name="touch_time"
                                            value="{{ !empty($item && $other) ? $other->touch_time : old('address') }}"
                                            placeholder="Enter Visit Time" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Enter Contact Number</label>
                                        <input class="form-control" name="phone"
                                            value="{{ !empty($item && $other) ? $other->phone : old('phone') }}"
                                            placeholder="Enter Contact Number" type="text">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Enter Call Time</label>
                                        <input class="form-control" name="call_time"
                                            value="{{ !empty($item && $other) ? $other->call_time : old('call_time') }}"
                                            placeholder="Enter Call Time" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Enter Contact Email</label>
                                        <input class="form-control" name="email"
                                            value="{{ !empty($item && $other) ? $other->email : old('email') }}"
                                            placeholder="Enter Contact Email" type="text">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Enter Email Time</label>
                                        <input class="form-control" name="mail_time"
                                            value="{{ !empty($item && $other) ? $other->mail_time : old('mail_time') }}"
                                            placeholder="Enter Email Time" type="text">
                                    </div>
                                </div>
                            </div>



                            <div class="form-group mb-4">
                                <label>Enter Google Map</label>
                                <textarea name="map"
                                    class="summernote">{{!empty($item) ? $item->content : old('map') }}</textarea>
                            </div>

                            <!--<div class="form-group mb-4">-->
                            <!--    <label>Upload Banner </label>-->
                            <!--    <input type="file" id="photo" name="photo" class="form-control col-md-7 col-xs-12">-->
                            <!--    <input type="hidden" id="photo" name="banner" value="{{$item->image}}">-->

                            <!--    @if(!empty($item) && $item->image)-->
                            <!--    <div class="form-group-inner">-->
                            <!--        <img src="{{asset('normal_images/'.$item->image )}}" width="100" height="100">-->
                            <!--    </div>-->
                            <!--    @endif-->
                            <!--</div>-->
                            <!--<div class="form-group mb-4">-->
                            <!--    <label class="ui-switch switch-icon switch-solid-success mr-3 mb-0">-->
                            <!--        <input type="checkbox" name="status" value="1"-->
                            <!--            {{ !empty($item) ? ($item->status==1 ? 'checked' : '') : 'checked' }}>-->
                            <!--        <span></span>-->
                            <!--    </label>Status</div>-->
                            <div class="text-right">
                                <button type="submit" class="btn btn-pink">Save</button>
                                <a href="{{url('contact/list')}}">
                                    <button type="button" class="btn btn-secondary">Cancel</button>
                                </a>
                            </div>
                        </form>


                    </div>
                </div>


            </div>

        </div>
    </div>

</div>





@endsection