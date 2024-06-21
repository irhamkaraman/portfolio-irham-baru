@extends('layouts.app')

@section('content')


<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        @include('component.sidebar-app')

        <div class="layout-page">

            @include('component.navbar-app')


            <!-- Content wrapper -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4"><span class="text-primary fw-bold">Tentang</span> Saya</h4>

                <!-- Basic Layout -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Sidebar</h5>
                                <small class="text-muted float-end">Profil Utama</small>
                            </div>
                            <div class="card-body">
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

                                <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    @if($user->avatar)
                                    <div class="text-center mb-3">
                                        <img src="{{ asset('storage/avatar/' . $user->avatar) }}" alt="{{ $user->name }}" class="" width="100" style="object-fit: cover;" />
                                        <img src="{{ asset('storage/favicon/' . $user->favicon) }}" alt="{{ $user->name }}" class="" width="100" />
                                    </div>
                                    @endif

                                    <div class="mb-3">
                                        <label class="form-label" for="avatar">Avatar</label>
                                        <small class="text-muted">Ukuran gambar berupa 1:1</small>
                                        @error('avatar')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar" accept="image/*" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="favicon">Favicon</label>
                                        <small class="text-muted">Ukuran gambar berupa 1:1</small>
                                        @error('favicon')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="file" class="form-control @error('favicon') is-invalid @enderror" id="favicon" name="favicon" accept="image/*" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="about">Tentang Saya</label>
                                        @error('about')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <textarea name="about" id="about" class="form-control @error('name') is-invalid @enderror" rows="5"> {{ $user->about }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="nama">Nama Lengkap</label>
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama" name="name" value="{{ $user->name }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="birthdate">Tanggal Lahir</label>
                                        @error('birthdate')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="text" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate" value="{{ $user->birthdate }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" />
                                    </div>

                                    <div class="mb-3 form-password-toggle">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="old_password">old Password</label>
                                            @error('old_password')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="old_password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" placeholder="Masukkan Konfirmasi Password" aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 form-password-toggle">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="new_password">New Password</label>
                                            @error('new_password')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="new_password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" placeholder="Masukkan Password Baru" aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label" for="whatsapp">WhatsApp</label>
                                        @error('whatsapp')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="number" class="form-control @error('whatsapp') is-invalid @enderror" id="whatsapp" name="whatsapp" value="{{ $user->whatsapp }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="facebook">Id Facebook</label>
                                        @error('facebook')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="number" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{ $user->facebook }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="instagram">Instagram</label>
                                        @error('instagram')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" value="{{ $user->instagram }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="github">Github</label>
                                        @error('github')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="text" class="form-control @error('github') is-invalid @enderror" id="github" name="github" value="{{ $user->github }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="address">Alamat</label>
                                        @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $user->address }}" />
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label" for="linkedin">LinkedIN</label>
                                        @error('linkedin')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <input type="text" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin" name="linkedin" value="{{ $user->linkedin }}" />
                                    </div>


                                    <button type="submit" class="btn btn-primary">Perbarui</button>
                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="my-3">
                                    <p class="text-danger">Tombol untuk mengaktifkan Storage Link</p>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#storage-link-modal">Aktifkan Storage Link</button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="storage-link-modal" tabindex="-1" role="dialog" aria-labelledby="storage-link-modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="storage-link-modalLabel">Konfirmasi Aktifkan Storage Link</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin untuk mengaktifkan Storage Link?
                                    </div>
                                    <div class="modal-footer">
                                        
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <a href="{{ route('storage-link') }}" type="button" class="btn btn-danger">Ya, Aktifkan</a>
                                    </div>
                                </div>
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
