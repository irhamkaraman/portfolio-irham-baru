@extends('layouts.app')

@section('content')


<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        @include('component.sidebar-app')

        <div class="layout-page">

            @include('component.navbar-app')


            <!-- Content wrapper -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4"><span class="text-primary fw-bold">Keahlian</span> Saya</h4>

                <!-- Basic Layout -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Keahlian Edit</h5>
                                <small class="text-muted float-end">Profil Utama</small>
                            </div>
                            <div class="card-body">

                                @session('error')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div class="alert-message">{{ session('error') }}</div>
                                </div>
                                @endsession

                                <form action="{{ route('services.update' , $service->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    @if($service->icon)
                                    <div class="text-center mb-3">
                                        <img src="{{ asset('storage/services/' . $service->icon) }}" alt="{{ $service->name }}" class="" width="100" style="object-fit: cover;" />
                                    </div>
                                    @endif

                                    <div class="mb-3">
                                        <label class="form-label" for="icon">icon</label>
                                        <small class="text-muted">Ukuran gambar berupa .svg</small>
                                        @error('icon')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="file" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon" accept="image/*" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="title">Judul</label>
                                        @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $service->title }}" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="description">Deskripsi</label>
                                        @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5"> {{ $service->description }}</textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Perbarui</button>
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
