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
                    <h4 class="py-3 mb-4"><span class="text-primary fw-bold">Kontak</span></h4>

                    <!-- Basic Bootstrap Table -->
                    <div class="card">
                        <div class="table-responsive text-nowrap">

                            <div class="card-header">
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
                                
                                <h5 class="mb-0">List Kontak</h5>
                            </div>

                            <table class="table">

                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Pesan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->message }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $contact->id }}">
                                                Hapus
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModal{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $contact->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered text-wrap text-center modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel{{ $contact->id }}">Konfirmasi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body d-flex flex-column">
                                                            <p class="mb-0">Apakah anda yakin ingin menghapus data ini? </p>
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center">
                                                            <button type="button" class="btn btn-sm btn-primary me-2" data-bs-dismiss="modal">Tidak</button>
                                                            <form action="{{ route('contact.delete', $contact->id) }}" method="POST" style="display: inline;">
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
