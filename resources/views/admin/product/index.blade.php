@extends('admin.layouts.main')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product</h1>
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
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                @can('admin')
                                <a href="/admin/product/create" class="btn btn-primary mb-4"><i class="fas fa-plus"></i>
                                    Tambah Data</a>
                                @endcan
                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table-bordered table-striped table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th style="width: 120px">Nama</th>
                                                <th style="width: 120px">Slug</th>
                                                <th>Deskripsi</th>
                                                <th style="width: 120px">Harga</th>
                                                @can('admin')
                                                <th style="width: 120px" class="text-center">Action</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($products as $product)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $product->nama }}</td>
                                                    <td>{{ $product->slug }}</td>
                                                    <td>{!! $product->deskripsi !!}</td>
                                                    <td>@currency($product->harga)</td>
                                                    @can('admin')
                                                    <td class="text-center">
                                                        <a href="/admin/product/{{ $product->slug }}/edit"
                                                            class="btn btn-sm btn-warning"><span><i
                                                                    class="fas fa-pencil-alt"></i></span></a>
                                                        <form action="/admin/product/{{ $product->slug }}" method="post"
                                                            class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Apakah anda yakin untuk menghapus data?')"><span><i
                                                                        class="fas fa-trash"></i></span></button>
                                                        </form>
                                                    </td>
                                                    @endcan
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">Belum ada data produk</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end pt-4">
                                        {{ $orders->links() }}
                                    </div>
                                </div>
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
