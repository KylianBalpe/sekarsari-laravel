@extends('admin.layouts.main')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 d-flex align-items-center">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }}</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                Dashboard
                            </li>
                            <li class="breadcrumb-item active">
                                {{ $title }}
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
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover align-items-center">
                                        <thead>
                                            <tr class="align-items-center">
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
                                </div>
                                <div class="d-flex justify-content-center pt-3">
                                    {{ $products->links() }}
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
