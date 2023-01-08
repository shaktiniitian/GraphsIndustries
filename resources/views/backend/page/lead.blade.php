@extends('layouts.admin')

@section('content')




<div class="wrapper content-wrapper">

    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-body">
                <div class="flexbox mb-4m">
           
                    <div class="flexbox  col-md-12">
                    <h5 class="font-strong mb-4">Manage Product Leads</h5>

                        <!-- <a class="btn btn-rounded btn-pink btn-air right" href="{{route('page.create')}}">Add New</a> -->
                    </div>
                </div>
                <div class="table-responsive row">
                    <table class="table table-bordered table-hover" id="products-table">
                        <thead class="thead-default thead-lg">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Product</th>
                                
                                <th>Created On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $key=>$data)
                            <tr>
                                <td>{{$key+1}}</td>

                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->mobile}}</td>
                                <td>{{$data->product }}</td>
                                <td>{{date("d-m-Y",strtotime($data->created_at))}}</td>

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