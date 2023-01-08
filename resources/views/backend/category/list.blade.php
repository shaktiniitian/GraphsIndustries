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
                            CATEGORY LIST</h5>

                        <a class="btn btn-rounded btn-pink btn-air right" href="{{route('category.create')}}">Add New</a>
                    </div>
                </div>
                <div class="table-responsive row">
                    <table class="table table-bordered table-hover" id="products-table">
                        <thead class="thead-default thead-lg">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $key=>$data)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$data->title}}</td>
                                <td>
                                    <span
                                        class="badge badge-{{ $data->status ? 'success' : 'danger' }} badge-pill">{{ $data->status ? 'Active' : 'Inactive' }}</span>
                                </td>
                                <td width="100">



                                    <a href="{{ route('category.edit', $data->id) }}">
                                        <button data-toggle="tooltip" title="Edit"
                                            class="pull-left btn-sm btn btn-info"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i></button>
                                    </a>

                                    <form action="{{ url('admin/category' , $data->id ) }}" method="POST">
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