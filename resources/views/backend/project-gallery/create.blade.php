@extends('layouts.admin')

@section('content')
@php
$action = !empty($item) ? route('project-gallery.update', $item->id) : route('project-gallery.store');
@endphp





<div class="content-wrapper">
    <!-- START PAGE CONTENT-->

    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-10">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title"><span class="text-info">{{ Session::get('pageTitle') }}</span> ADD NEW</div>
                        <a href="{{url('admin/project-gallery')}}">
                            <button class="btn btn-pink btn-sm btn-rounded">Show Lists</button>
                        </a>

                    </div>
                    <div class="ibox-body">

                        <form action="{{ $action }}" method="POST" enctype="multipart/form-data">

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
                            <input type="hidden" value="{{csrf_token()}}" name="_token" />

                            @if(!empty($item))
                            <input type="hidden" name="_method" value="PATCH">
                            @endif
                            
                        <div class="form-group mb-4">
                                <label>Select Project</label>
                                <select name="project_id" class="form-control">
                                    <option value="">-Select one-</option>
                                    @foreach('\App\Page'::whereIn('type',[11,12,13])->get() as $type)
                                    <option
                                        {{ !empty($item) && $item->project_id==$type->id ? 'selected' : ($type==old('type') ? 'selected':'') }}
                                        value="{{$type->id}}">{{ ucfirst($type->title)}}</option>
                                    @endforeach
                                </select>
                            </div>
     
                            <div class="form-group mb-4">
                                <label>Upload Image </label>
                                <input type="file" id="photo" name="photo" class="form-control col-md-7 col-xs-12">

                                @if(!empty($item) && $item->image)
                                <div class="form-group-inner">
                                    <img src="{{asset('normal_images/'.$item->image )}}" width="100" height="100">
                                </div>
                                @endif
                            </div>


                            <div class="form-group mb-4">
                                <label class="ui-switch switch-icon switch-solid-success mr-3 mb-0">
                                    <input type="checkbox" name="status" value="1"
                                        {{ !empty($item) ? ($item->status==1 ? 'checked' : '') : 'checked' }}>
                                    <span></span>
                                </label>Status
                            </div>


                            <div class="text-right">
                                <button type="submit" class="btn btn-pink">Save</button>
                                <a href="{{route('project-gallery.index')}}">
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