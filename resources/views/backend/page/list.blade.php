@extends('layouts.admin')

@section('content')




<div class="wrapper content-wrapper">

    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-body">
                <div class="flexbox mb-4m">
           
                    <div class="flexbox  col-md-12">
                    <h5 class="font-strong mb-4">Manage Post</h5>

                        <a class="btn btn-rounded btn-pink btn-air right" href="{{route('page.create')}}">Add New</a>
                    </div>
                </div>
                <div class="table-responsive row">
                    <table class="table table-bordered table-hover" id="products-table">
                        <thead class="thead-default thead-lg">
                            <tr>
                                <th>ID</th>
                                <th>Banner Image</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Gallery</th>
                                <th>Map</th>
                                <th>Brochure</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $key=>$data)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><img width="50" class="mr-3" src="{{asset('normal_images/'.$data->image )}}"></td>

                                <td>{{$data->title}}
                                </td>
                                <td>{{ucfirst($data->type)}}</td>
                                <td><a href="{{ url('post-gallery/'.$data->id)}}">
                                        <button data-toggle="tooltip" title="Add Gallery"
                                            class="pull-left btn-sm btn btn-pink"><i
                                                class="fa fa-plus" aria-hidden="true"></i></button>
                                    </a></td>

                                    <td><a href="{{ url('map/'.$data->id)}}">
                                        <button data-toggle="tooltip" title="Add Map Image"
                                            class="pull-left btn-sm btn btn-primary"><i
                                                class="fa fa-plus" aria-hidden="true"></i></button>
                                    </a></td>

                                <td><a href="{{ url('brochure/'.$data->id)}}">
                                        <button data-toggle="tooltip" title="Add Brochure"
                                            class="pull-left btn-sm btn btn-warning"><i
                                                class="fa fa-plus" aria-hidden="true"></i></button>
                                    </a></td>
                                <td>

                                
                                    <span
                                        class="badge badge-{{ $data->status ? 'success' : 'danger' }} badge-pill">{{ $data->status ? 'Active' : 'Inactive' }}</span>
                                </td>
                                <td width="100">



                                    <a href="{{ route('page.edit', $data->id) }}">
                                        <button data-toggle="tooltip" title="Edit"
                                            class="pull-left btn-sm btn btn-info"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    </a>

                                    <form action="{{ url('page' , $data->id ) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button data-toggle="tooltip" title="Trash"
                                            class="pull-right btn-sm btn btn-danger"><i class="fa fa-trash"
                                                aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</div>
@endsection

@section('scripts')
<script>
        $(function() {
            var table = $('#products-table').DataTable();
            $('#key-search').on('keyup', function() {
                table.search(this.value).draw();
            });
            $('#type-filter').on('change', function() {
                table.column(4).search($(this).val()).draw();
            });
        });
    </script>
@endsection