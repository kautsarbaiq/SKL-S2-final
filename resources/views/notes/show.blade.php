@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-journal-text me-2"></i>
                            <span class="fs-5 fw-semibold">{{ $note->title }}</span>
                        </div>
                        <small>
                            <i class="bi bi-calendar3 me-1"></i>{{ $note->created_at->format('d M Y H:i') }}
                        </small>
                    </div>

                    <div class="card-body p-4">
                        <div class="mb-4 note-content">
                            {!! nl2br(e($note->content)) !!}
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('notes.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i>{{ __('Kembali') }}
                            </a>
                            <div>
                                <a href="{{ route('notes.edit', $note) }}" class="btn btn-warning me-2">
                                    <i class="bi bi-pencil me-1"></i>{{ __('Edit') }}
                                </a>
                                <form action="{{ route('notes.destroy', $note) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus catatan ini?')">
                                        <i class="bi bi-trash me-1"></i>{{ __('Hapus') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .note-content {
            white-space: pre-line;
            line-height: 1.8;
            font-size: 1.05rem;
        }
    </style>
@endsection
