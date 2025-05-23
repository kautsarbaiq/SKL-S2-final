@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @auth
                            <div class="alert alert-success">
                                {{ __('Anda sudah login!') }}
                            </div>
                            <p>Selamat datang di aplikasi MyNotepad. Anda dapat mulai membuat catatan pribadi Anda sekarang.</p>
                            <div class="mt-3">
                                <a href="{{ route('notes.index') }}" class="btn btn-primary">
                                    <i class="bi bi-journals me-1"></i> Lihat Catatan Saya
                                </a>
                                <a href="{{ route('notes.create') }}" class="btn btn-outline-primary ms-2">
                                    <i class="bi bi-plus-lg me-1"></i> Buat Catatan Baru
                                </a>
                            </div>
                        @else
                            <div class="alert alert-warning">
                                {{ __('Anda belum login!') }}
                            </div>
                            <p>Silakan login atau daftar untuk mulai menggunakan aplikasi MyNotepad.</p>
                            <div class="mt-3">
                                <a href="{{ route('login') }}" class="btn btn-primary">
                                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                                </a>
                                <a href="{{ route('register') }}" class="btn btn-outline-primary ms-2">
                                    <i class="bi bi-person-plus me-1"></i> Daftar
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
