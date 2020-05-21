@extends('layouts.backend.app')

@push('css')
    <!--Date -->
    <link rel="stylesheet" href="{{asset('asset/plugins/jquery-ui/jquery-ui.css')}}">
@endpush

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sales Order</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">Transaction</li>
                        <li class="breadcrumb-item active">Create Sales Order</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Create Sales Order</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="POST" action="{{route('sales.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="date" class="col-sm-4 col-form-label">Date</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="date" id="date" placeholder="Date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="invoice_no" class="col-sm-4 col-form-label">Invoice No</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="invoice_no" name="invoice_no" placeholder="Invoice No">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="information" class="col-sm-4 col-form-label">Information</label>
                                            <div class="col-sm-12">
                                                <textarea name ="information" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="shop_name" class="col-sm-6 col-form-label">Shop Name</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text"  class="form-control" name="shop_name" id="shop_name" placeholder="Shop Name">
                                            </div>
                                            <div class="col-sm-4">
                                            </div>
                                        </div>
                                        <div class="col-md-12 field-wrapper">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="id_raw_product" class="col-sm-4 col-form-label">Product Name</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="hidden" readonly="true" class="form-control" name="id_raw_product[]" id="id_raw_product_1" placeholder="Product Name">
                                                    <input type="text" readonly="true" class="form-control" name="name_raw_product[]" id="name_raw_product_1" placeholder="Product Name">
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="/transaction/sales/product/popup_media/1" class="btn btn-info" title="Product" data-toggle="modal" data-target="#modal-default">Product</a>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" name="price[]" id="price_1" placeholder="Price">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="total[]" id="total_1" placeholder="Total">
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="javascript:void(0)" class="btn btn-primary add_Button" title="Add Row"><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-default float-right">Submit</button>
                            </div>
                        </form>
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
    <!-- /.modal -->

@endsection
<!-- Date Script -->
@push('js')

    <script>
        $(document).ready(function(){
            var addButton = $('.add_Button');
            var wrapper = $('.field-wrapper');
            var X = "{{ $detail_count +1 }}";
            $(addButton).click(function(){
                X++;
                $(wrapper).append('<div class="form-group row">'+
                    //     '<div class="col-md-12">'+
                    //     '<label for="id_raw_product" class="col-sm-4 col-form-label">Product Name</label>'+
                    // '</div>'+
                    '<div class="col-sm-3">'+
                    '<input type="hidden" readonly="true" class="form-control" name="id_raw_product[]" id="id_raw_product_'+X+'" placeholder="Product Name">'+
                    '<input type="text" readonly="true" class="form-control" name="name_raw_product[]" id="name_raw_product_'+X+'" placeholder="Product Name">'+
                    '</div>'+
                    '<div class="col-sm-2">'+
                    '<a href="/transaction/sales/product/popup_media/'+X+'" class="btn btn-info" title="Product" data-toggle="modal" data-target="#modal-default">Product</a>'+
                    '</div>'+
                    '<div class="col-sm-2">'+
                    '<input type="text" class="form-control" name="price[]" id="price_'+X+'" placeholder="Price">'+
                    '</div>'+
                    '<div class="col-sm-3">'+
                    '<input type="text" class="form-control" name="total[]" id="total_'+X+'" placeholder="Total">'+
                    '</div>'+
                    '<div class="col-sm-2">'+
                    '<a href="javascript:void(0)" class="btn btn-danger remove" title="Delete"><i class="fas fa-minus"></i></a>'+
                    '</div>'+
                    '</div>'

                );
            });
            $(wrapper).on('click','.remove',function(e){
                if (confirm("Do you want to delete this row?")){
                    e.preventDefault();
                    $(this).parent().parent().remove();
                }
            });
        });

    </script>
    <script>
        $(function(){
            $('#date').datepicker({
                autoclose:true,
                dateFormat:'dd-mm-yy',
            });

        })
    </script>
    <script>
        $('#modal-default').bind("show.bs.modal", function(e){
            var link = $(e.relatedTarget);
            $(this).find(".modal-body").load(link.attr("href"));
        });
    </script>
@endpush

