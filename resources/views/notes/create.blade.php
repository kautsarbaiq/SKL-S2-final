@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <i class="bi bi-plus-circle me-2"></i>
                        <span class="fs-5 fw-semibold">{{ __('Buat Catatan Baru') }}</span>
                    </div>

                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('notes.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">
                                    <i class="bi bi-type me-1"></i>{{ __('Judul') }}
                                </label>
                                <input id="title" type="text"
                                    class="form-control @error('title') is-invalid @enderror" name="title"
                                    value="{{ old('title') }}" required autocomplete="title" autofocus
                                    placeholder="Masukkan judul catatan">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label fw-semibold">
                                    <i class="bi bi-file-text me-1"></i>{{ __('Isi Catatan') }}
                                </label>
                                <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" rows="12"
                                    required placeholder="Tulis catatan Anda di sini...">{{ old('content') }}</textarea>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('notes.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left me-1"></i>{{ __('Kembali') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-1"></i>{{ __('Simpan Catatan') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
