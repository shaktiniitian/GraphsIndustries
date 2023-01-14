@extends('layouts.admin')

@section('content')




<div class="wrapper content-wrapper">

    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-body">
                <div class="flexbox mb-4m">

                    <div class="flexbox  col-md-12">
                        <h5 class="font-strong mb-4"><span class="text-info">{{ Session::get('pageTitle') }}</span>
                            Product List</h5>

                        <a class="btn btn-rounded btn-pink btn-air right" href="{{route('products.create')}}">Add
                            New</a>
                    </div>
                </div>
                <div class="table-responsive row">
                    <table class="table table-bordered table-hover" id="products-table">
                        <thead class="thead-default thead-lg">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $key=>$data)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td> <img src="{{ asset('normal_images/products/'.$data->file) }}" width="50"></td>
                                <td>{{$data->title}}</td>
                                <td>{{ substr($data->description, 0,200) }}</td>
                                <td class="align-top">
                                    <span class="badge badge-{{ $data->status ? 'success' : 'danger' }} badge-pill">{{
                                        $data->status ? 'Active' : 'Inactive' }}</span>
                                </td>
                                <td width="12%" valigan="top" class="align-top">

                                    <div class="d-flex flex-row justify-content-center">

                                        <a href="{{ route('products.edit', $data->id) }}">
                                            <button data-toggle="tooltip" title="Edit" class=" btn-sm btn btn-info"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </a>

                                        <a style="padding-left:5px; padding-right:5px;" href="{{ url('admin/product-gallery?id='.$data->id) }}">
                                            <button data-toggle="tooltip" title="Add/Edit Gallery"
                                                class="btn-sm btn btn-warning"><i class="fa fa-image"
                                                    aria-hidden="true"></i></button>
                                        </a>

                                        <form class="align-top" action="{{ url('admin/gallery' , $data->id ) }}"
                                            method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button data-toggle="tooltip" title="Trash"
                                                class=" btn-sm btn btn-danger"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></button>
                                        </form>
                                    </div>
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