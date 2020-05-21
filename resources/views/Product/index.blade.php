@extends('layouts.backend.app')
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endpush
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">Master</li>
                        <li class="breadcrumb-item ">Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product List</h3>
                        <a class="btn btn-info btn-sm float-right" href="{{route('product.create')}}" title="Create">Create</a>
                    </div>
                    <!-- /.card-header -->
                    <ul class="nav nav-tabs" role="tablist" id="myTab">
                        <li class="nav-item">
                            <a class="nav-link active" id="active-panel" data-toggle="tab" href="#activePanel" role="tab">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="trash-panel" data-toggle="tab" href="#trashPanel" role="tab">Trash</a>
                        </li>

                    </ul>
                    <div class=""card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active show" id="activePanel" role="tabpanel">
                                    <table id="example1" class="table table-bordered table-striped" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Purchase Price</th>
                                            <th>Information</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Purchase Price</th>
                                            <th>Information</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                            </div>
                            <div class="tab-pane fade" id="trashPanel" role="tabpanel">
                                <table id="example2" class="table table-bordered table-striped" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Purchase Price</th>
                                        <th>Information</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Purchase Price</th>
                                        <th>Information</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                <!-- /.card-body -->
                            </div>
                    </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.content -->
@endsection
@push('js')
    <!-- DataTables -->
    <script src="{{asset('asset/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                responsive:true,
                processing:true,
                pagingType: 'full_numbers',
                stateSave:false,
                scrollY:true,
                scrollX:true,
                ajax:"{{url('product/datatable')}}",
                order:[0,'desc'],
                columns:[
                    {data:'code',name:'code'},
                    {data:'name',name:'name'},
                    {data:'purchase_price',name:'purchasePrice'},
                    {data:'information', name:'information'},
                    {data:'active',
                        render:function(data){
                            if(data=='1'){
                                return '<span class="badge badge-success">Active</span>';

                            }
                            if(data=='0'){
                                return '<span class="badge badge-warning">Inactive</span>';

                            }
                        },
                    },
                    {data:'action',name:'action', searchable:false, sortable:false}
                ]
            });
            $("#example2").DataTable({
                responsive:true,
                processing:true,
                pagingType: 'full_numbers',
                stateSave:false,
                scrollY:true,
                scrollX:true,
                ajax:"{{url('product/datatableTrash')}}",
                order:[0,'desc'],
                columns:[
                    {data:'code',name:'code'},
                    {data:'name',name:'name'},
                    {data:'purchase_price',name:'purchase_price'},
                    {data:'information', name:'information'},
                    {data:'active',
                        render:function(data){
                            if(data=='2'){
                                return '<span class="badge badge-warning">Deleted</span>';

                            }

                        },
                    },
                    {data:'action',name:'action', searchable:false, sortable:false}
                ]
            });

        });
    </script>
    <script>
        function deleteData(dt){
            if (confirm("Are you sure you want to delete this data ?")){
                $.ajax({
                    type:'DELETE',
                    url:$(dt).data("url"),
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success:function(response){
                        if(response.status){
                            location.reload();
                        }
                    },
                    error:function(response){
                        console.log(response);
                    }
                });


            }
            return false;
        }
        function undoTrash(dt) {
            if (confirm("Are you sure you want to activate this data ?")) {
                $.ajax({
                    type: 'POST',
                    url: $(dt).data("url"),
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        if (response.status) {
                            location.reload();
                        }
                    },
                    error: function (response) {
                        console.log(response);
                    }
                });


            }
            return false;


        }
    </script>
    <script>
        $(document).ready(function(){
        $('a[data-toggle="tab"]').on('shown.bs.tab',function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
        });
    </script>

    <script>
        $('#modal-default').bind("show.bs.modal", function(e){
            var link = $(e.relatedTarget);
            $(this).find(".modal-body").load(link.attr("href"));
        });
    </script>
}
@endpush
