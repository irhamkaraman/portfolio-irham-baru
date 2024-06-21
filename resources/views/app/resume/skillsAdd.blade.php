@extends('layouts.app')

@section('content')


<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        @include('component.sidebar-app')

        <div class="layout-page">

            @include('component.navbar-app')


            <!-- Content wrapper -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4"><span class="text-primary fw-bold">Skil</span> Dimiliki</h4>

                <!-- Basic Layout -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Tambah Skil Baru</h5>
                                <small class="text-muted float-end">Isi dengan benar</small>
                            </div>
                            <div class="card-body">

                                @session('error')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div class="alert-message">{{ session('error') }}</div>
                                </div>
                                @endsession

                                <form action="{{ route('skills.store') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="title">Skil</label>
                                        @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Masukkan Skil Baru" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="range">Menguasai</label>
                                        @error('range')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <!-- tambakkan range yang dipilih secara langsung -->
                                        <input type="range" class="form-range" id="range" name="range" min="1" max="100" step="1" value="{{ old('range', 50) }}" oninput="this.nextElementSibling.innerText=this.value+'%'">
                                        <span class="d-inline-block align-middle">50%</span>
                                    </div>

                                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                    <a href="{{ route('skills') }}" class="btn btn-sm btn-secondary">Kembali</a>
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
