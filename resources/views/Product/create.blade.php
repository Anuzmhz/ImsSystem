@extends('layouts.backend.app')

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
                        <li class="breadcrumb-item active">Create Product</li>
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
                            <h3 class="card-title">Create Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="POST" action="{{route('product.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="code" class="col-sm-4 col-form-label">Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="code" name="code" placeholder="Code">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="name" class="col-sm-4 col-form-label">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="stockAvailable" class="col-sm-4 col-form-label">Stock Available</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="stockAvailable" name="stockAvailable" placeholder="Stock Available">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="purchasePrice" class="col-sm-4 col-form-label">Purchase Price</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" name="purchasePrice" id="purchasePrice" placeholder="Purchase Price">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sellingPrice" class="col-sm-4 col-form-label">Selling Price</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" name="sellingPrice" id="sellingPrice" placeholder="Selling Price">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status" class="col-sm-4 col-form-label">Status</label>
                                        <div class="col-sm-8">
                                            <select class= "form-control" name="status" id="status">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label for="information" class="col-sm-4 col-form-label">Information</label>
                                        <div class="col-sm-12">
                                            <textarea name ="information" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-default float-right">Submit</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
