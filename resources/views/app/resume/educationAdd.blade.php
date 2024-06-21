@extends('layouts.app')

@section('content')


<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        @include('component.sidebar-app')

        <div class="layout-page">

            @include('component.navbar-app')


            <!-- Content wrapper -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4"><span class="text-primary fw-bold">Riwayat</span> Pendidikan</h4>

                <!-- Basic Layout -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Buat RIwayat Baru</h5>
                                <small class="text-muted float-end">Isi dengan benar</small>
                            </div>
                            <div class="card-body">

                                @session('error')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div class="alert-message">{{ session('error') }}</div>
                                </div>
                                @endsession

                                <form action="{{ route('education.store') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="school">Instansi</label>
                                        @error('school')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="text" class="form-control @error('school') is-invalid @enderror" id="school" name="school" placeholder="Masukkan Nama Instansi Pendidikan" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="start_date">Awal Masuk</label>
                                        @error('start_date')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="number" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" placeholder="Masukkan Tahun Awal Pendidikan" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="end_date">Akhir Masuk</label>
                                        @error('end_date')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="number" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" placeholder="Masukkan Tahun Akhir Pendidikan" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="description">Deskripsi</label>
                                        @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5"> Masukkan Deskripsi </textarea>
                                    </div>

                                    <button type="submit" class="btn btn-sm btn-primary">Tambahkan</button>
                                    <a href="{{ route('education') }}" class="btn btn-sm btn-secondary">Kembali</a>
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
