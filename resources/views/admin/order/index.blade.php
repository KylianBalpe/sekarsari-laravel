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
                                <a href="/admin/product/create" class="btn btn-primary mb-4"><i class="fas fa-plus"></i>
                                    Tambah Data</a>
                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <table class="table-bordered table-striped table">
                                    <thead>
                                        <tr>
                                            <th style="width: 40px">No</th>
                                            <th style="width: 120px">Nama</th>
                                            <th style="width: 120px">Product</th>
                                            <th>Alamat</th>
                                            <th style="width: 180px">Disajikan</th>
                                            <th style="width: 120px">Waktu</th>
                                            <th style="width: 120px">Jumlah</th>
                                            <th style="width: 120px">Biaya</th>
                                            <th style="width: 120px" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $order->user->name }}</td>
                                                <td>{{ $order->product->nama }}</td>
                                                <td>{{ $order->alamat }}</td>
                                                <td>{{ $order->disajikan }}</td>
                                                <td>{{ $order->waktu }}</td>
                                                <td>{{ $order->total }}</td>
                                                <td>@currency($order->price)</td>
                                                <td class="text-center">
                                                    <a href="/admin/order/{{ $order->id }}/edit"
                                                        class="btn btn-sm btn-warning"><span>
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </span>
                                                    </a>
                                                    <form action="/admin/order/{{ $order->id }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Apakah anda yakin untuk menghapus data?')"><span><i
                                                                    class="fas fa-trash"></i></span></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center">Belum ada data order</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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
