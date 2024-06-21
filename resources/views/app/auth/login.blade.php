@extends('layouts.app')

@section('content')

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="{{ route('home') }}" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('storage/favicon/' . $user->favicon) }}" alt="{{ $user->name }}" width="50" />
                            </span>
                            <span class="app-brand-text demo text-body fw-bold">penjarah kos</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Selamat Datang Irham! 👋</h4>
                    <p class="mb-4">
                        Silahkan Masukkan akun Anda!
                    </p>

                    <form id="formAuthentication" class="mb-3" action="{{ route('login.submit') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="email">Email</label>
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Akun Anda" value="{{ old('email') }}" autofocus />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control @error('password') is-invalid
                                    @enderror" name="password" placeholder="Masukkan Password" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me" />
                                <label class="form-check-label" for="remember-me">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">
                                Sign in
                            </button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>Kembali ke</span>
                        <a href="{{ route('home') }}">
                            <span>Utama</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>

@endsection
