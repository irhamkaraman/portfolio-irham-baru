@extends('layouts.app')

@section('content')


<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        @include('component.sidebar-app')

        <div class="layout-page">

            @include('component.navbar-app')


            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="py-3 mb-4"><span class="text-primary fw-bold">Riwayat</span> Pendidikan</h4>

                    <!-- Basic Bootstrap Table -->
                    <div class="card">
                        <div class="table-responsive text-nowrap">
                            <div class="card-header">
                                <a href="{{ route('education.add') }}" class="btn btn-sm btn-primary mb-3"><i class="bx bx-plus me-1"></i> Tambah</a>
                                @session('success')
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div class="alert-message">{{ session('success') }}</div>
                                </div>
                                @endsession
                                @session('error')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div class="alert-message">{{ session('error') }}</div>
                                </div>
                                @endsession
                                <h5 class="mb-0">List Pendidikan</h5>
                            </div>

                            <table class="table">

                                <thead>
                                    <tr>
                                        <th>Instansi</th>
                                        <th>Tahun</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($educations as $education)
                                    <tr>
                                        <td>
                                            {{ $education->school }}
                                        </td>
                                        <td>{{ $education->start_date }} - {{ $education->end_date }}</td>
                                        <td>{{ $education->description }}...</td>
                                        <td>
                                            <a href="{{ route('education.edit', $education->id) }}" class="btn btn-sm btn-outline-success">Edit</a>

                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $education->id }}">
                                                Hapus
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModal{{ $education->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $education->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered text-wrap text-center modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel{{ $education->id }}">Konfirmasi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body d-flex flex-column">
                                                            <p class="mb-0">Apakah anda yakin ingin menghapus data ini?</p>
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center">
                                                            <button type="button" class="btn btn-sm btn-primary me-2" data-bs-dismiss="modal">Tidak</button>
                                                            <form action="{{ route('education.delete', $education->id) }}" method="POST" style="display: inline;">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Modal -->
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- / Content -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- / Content -->

            @include('component.footer-app')

            <div class="content-backdrop fade"></div>
        </div>
    </div>

</div>

@endsection
