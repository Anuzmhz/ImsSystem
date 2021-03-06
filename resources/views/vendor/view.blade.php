@extends('layouts.backend.app')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Vendor</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">Master</li>
                        <li class="breadcrumb-item active">View Vendor</li>
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
                            <h3 class="card-title">View Vendor</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal"  action="{{route('vendor.update', $data[0]->id)}}">

                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label for="name" class="col-sm-4 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" id="name" value="{{ $data[0]->name }}" placeholder="Name" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="address" class="col-sm-4 col-form-label" >Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="address" name="address" value="{{ $data[0]->address }}" placeholder="Address" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="address" class="col-sm-4 col-form-label">Contact Person</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="contactperson" name="contactperson" value="{{ $data[0]->cp }}" placeholder="ContactPerson" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <label for="phone" class="col-sm-4 col-form-label">Phone Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="phone" id="phone" value="{{ $data[0]->phone }}" placeholder="Phone No" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="status" class="col-sm-4 col-form-label" >Status</label>
                                        <div class="col-sm-10">
                                            <select class= "form-control" name="status" id="status" disabled>
                                                <option value="1" {{ $data[0]->active===1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $data[0]->active===0 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="user-modified" class="col-sm-4 col-form-label">Modified By</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="userModify" id="user-modified" value="{{ $data[0]->user_modify->name }}"  disabled>
                                        </div>
                                    </div>

                                    <div class ="col-md-4">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>

@endsection
