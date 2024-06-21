@extends('layouts.app')

@section('content')


<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        @include('component.sidebar-app')

        <div class="layout-page">

            @include('component.navbar-app')


            <!-- Content wrapper -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4"><span class="text-primary fw-bold">Portfolio</span> dan Project</h4>

                <!-- Basic Layout -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Buat Portfolio Baru</h5>
                                <small class="text-muted float-end">Isi dengan benar</small>
                            </div>
                            <div class="card-body">

                                @session('error')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div class="alert-message">{{ session('error') }}</div>
                                </div>
                                @endsession

                                <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="image">Gambar</label>
                                        <small class="text-muted">Ukuran gambar berupa 4:3</small>
                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="title">Judul</label>
                                        @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Masukkan Judul" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="url">Url</label>
                                        @error('url')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" placeholder="Masukkan Url Project atau Portfolio" />
                                    </div>


                                    <div class="mb-4">
                                        <label class="form-label" for="category">Kategori</label>
                                        @if(count($categories) == 0)
                                        <small class="text-danger">Kategori belum tersedia</small>
                                        <select class="form-control" name="category" id="category" disabled>
                                            <option value="">Pilih Kategori</option>
                                        </select>
                                        @else
                                        <select class="form-control" name="category" id="category">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-sm btn-primary">Tambahkan</button>
                                    <a href="{{ route('portfolio') }}" class="btn btn-sm btn-secondary">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Content -->

            @include('component.footer-app')

            <div class="content-backdrop fade"></div>
        </div>
    </div>

</div>

@endsection
