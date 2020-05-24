@extends('layouts.backend.app')
@push('css')


@endpush
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">View Sales Order</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">Transaction</li>
                        <li class="breadcrumb-item ">Sales</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">



                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> AnuzMhz, Inc.
                                    <small class="float-right">Date: {{ date('d F Y',strtotime($data[0]->date)) }}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>Anuzmhz, Inc.</strong><br>
                                    Siddhipur,Lalitpur<br>
                                    Kathmandu, 44600<br>
                                    Phone: (984) 313-2496<br>
                                    Email: anuz.mhz@gmail.com
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong>{{ $data[0]->shop_name}}</strong><br>

                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Invoice # {{ $data[0]->invoice_no }}</b><br>
                                <br>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($detail as $detail):
                                    ?>
                                    <tr>
                                        <td>{{ $detail->product->name }}</td>
                                        <td>{{ number_format($detail->total,0,'.',',') }}</td>
                                        <td>{{ number_format($detail->price,0,'.',',') }}</td>
                                        <td>{{ number_format($detail->price * $detail->total,0,'.',',') }}</td>
                                    </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">

                            </div>
                            <!-- /.col -->
                            <div class="col-6">


                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Subtotal:</th>
                                            <td>{{ number_format($data[0]->total,0,'.',',')  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tax (13%):</th>
                                            <td>{{ number_format($data[0]->total*0.13,0,'.',',')  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>{{ number_format($data[0]->total*1.13,0,'.',',')  }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="{{ route('transaction/sales/print/{id}',$data[0]->id) }}" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@push('js')
@endpush
