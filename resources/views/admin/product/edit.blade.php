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
                                Home
                            </li>
                            <li class="breadcrumb-item">
                                Products
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
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <a href="/admin/product" class="btn btn-primary"><i class="fas fa-arrow-left"></i>
                                    Kembali</a>
                            </div>
                            <div class="card-body">
                                <form action="/admin/product/{{ $product->slug }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror" id="nama"
                                            placeholder="Nama" value="{{ old('name', $product->nama) }}">
                                        @error('nama')
                                            <div class="invalid-feedback mb-1">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <input id="deskripsi" type="hidden" name="deskripsi"
                                            value="{{ old('name', $product->deskripsi) }}">
                                        <trix-editor input="deskripsi"></trix-editor>
                                        @error('deskripsi')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="text" class="form-control @error('harga') is-invalid @enderror"
                                            id="harga" name="harga" placeholder="Harga"
                                            value="{{ old('harga', $product->harga) }}">
                                        @error('harga')
                                            <div class="invalid-feedback mb-1">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
    <script>
        document.addEventListener("trix-initialize", function(e) {
            const fileTools = document.querySelector(".trix-button-group--file-tools");
            // null check hack: trix-initialize gets called twice for some reason, sometimes it is null :shrug:
            fileTools?.remove();
        });
        // Dont allow images/etc to be pasted
        document.addEventListener("trix-attachment-add", function(event) {
            if (!event.attachment.file) {
                event.attachment.remove()
            }
        })
        // No files, ever
        document.addEventListener("trix-file-accept", function(event) {
            event.preventDefault();
        });
    </script>
@endsection
