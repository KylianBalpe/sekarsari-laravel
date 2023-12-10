@extends('admin.layouts.main')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 d-flex align-items-center">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product</h1>
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
                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
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
                                                @can('admin')
                                                    <th style="width: 120px" class="text-center">Action</th>
                                                @endcan
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
                                                    @can('admin')
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
                                                    @endcan
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="9" class="text-center">Belum ada data order</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end pt-3">
                                    {{ $orders->links() }}
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
