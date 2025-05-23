@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
                        <span class="fs-5 fw-semibold">
                            <i class="bi bi-journals me-2"></i>{{ __('Catatan Saya') }}
                        </span>
                        <a href="{{ route('notes.create') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-plus-lg me-1"></i>{{ __('Buat Catatan Baru') }}
                        </a>
                    </div>

                    <div class="card-body p-4">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (count($notes) > 0)
                            <div class="row g-4">
                                @foreach ($notes as $note)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card h-100 border-0 shadow-sm hover-card">
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold text-truncate mb-2">{{ $note->title }}</h5>
                                                <p class="card-text text-muted small mb-3">
                                                    <i class="bi bi-clock me-1"></i>{{ $note->created_at->diffForHumans() }}
                                                </p>
                                                <p class="card-text mb-3" style="height: 60px; overflow: hidden;">
                                                    {{ Str::limit($note->content, 100) }}</p>
                                                <div class="d-flex justify-content-end">
                                                    <a href="{{ route('notes.show', $note) }}"
                                                        class="btn btn-sm btn-outline-primary me-2">
                                                        <i class="bi bi-eye me-1"></i>{{ __('Lihat') }}
                                                    </a>
                                                    <a href="{{ route('notes.edit', $note) }}"
                                                        class="btn btn-sm btn-outline-warning me-2">
                                                        <i class="bi bi-pencil me-1"></i>{{ __('Edit') }}
                                                    </a>
                                                    <form action="{{ route('notes.destroy', $note) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus catatan ini?')">
                                                            <i class="bi bi-trash me-1"></i>{{ __('Hapus') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="bi bi-journal-x display-1 text-muted"></i>
                                <p class="lead mt-3">{{ __('Anda belum memiliki catatan. Silakan buat catatan baru.') }}
                                </p>
                                <a href="{{ route('notes.create') }}" class="btn btn-primary mt-2">
                                    <i class="bi bi-plus-lg me-1"></i>{{ __('Buat Catatan Baru') }}
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .hover-card {
            transition: all 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }
    </style>
@endsection
