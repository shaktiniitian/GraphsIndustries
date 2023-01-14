@extends('layouts.admin')

@section('content')




<div class="wrapper content-wrapper">

    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-body">
                <form action="{{ route('product-gallery.store')}}" enctype="multipart/form-data" method="POST">
                <div class="row ">
                    <div class="col-md-4">
                      
                            <div class="form-group">
                                @csrf
                                <input type="hidden" value="{{ Request::get('id')}}" name="product_id">
                                <label for="">Select Images</label>
                                <input type="file" class="form-control" name="photo" id="">
                            </div>


                       
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Add Images</button>
                    </div>
                </div>
            </form>

                <div class="table-responsive row">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-default thead-lg">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Project</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $key=>$data)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><img src="{{ asset('normal_images/'.$data->image) }}" width="50"></td>
                                <td>{{ $data->product->title ?? '' }}</td>
                                
                                <td width="100">

                                    <form action="{{ url('admin/product-gallery' , $data->id ) }}" method="POST">
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