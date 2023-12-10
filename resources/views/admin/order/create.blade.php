@extends('admin.layouts.main')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Product</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Dashboard v1
                            </li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <a href="/admin/product" class="btn btn-primary"><i class="fas fa-arrow-left"></i>
                                    Kembali</a>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Deskripsi</label>
                                        <textarea class="form-control" id="exampleInputPassword1" placeholder="Deskripsi"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Harga</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="Harga">
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
