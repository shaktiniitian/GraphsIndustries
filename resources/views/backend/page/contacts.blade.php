@extends('layouts.admin')

@section('content')




<div class="wrapper content-wrapper">

    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-body">
                <div class="flexbox mb-4m">
           
                    <div class="flexbox  col-md-12">
                    <h5 class="font-strong mb-4">Manage Contact Details</h5>

                    </div>
                </div>
                <div class="table-responsive row">
                    <table class="table table-bordered table-hover" id="">
                        <thead class="thead-default thead-lg">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Address</th>
                                <th>Contact No</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $key=>$data)
                            @php
                              $detail = json_decode($data->datas);
                            @endphp
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$data->title}}
                                <td>{{!empty($detail->address) ? $detail->address : '' }}
                                <td>{{ !empty($detail->phone) ? $detail->phone : '' }}
                                </td>

          
                                <td width="100">



                                    <a href="{{ url('admin/contact/edit/'.$data->id) }}">
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