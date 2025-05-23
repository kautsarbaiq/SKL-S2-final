@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ $note->title }}</span>
                        <small>{{ $note->created_at->format('d M Y H:i') }}</small>
                    </div>

                    <div class="card-body">
                        <div class="mb-4">
                            {!! nl2br(e($note->content)) !!}
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('notes.index') }}" class="btn btn-secondary">{{ __('Kembali') }}</a>
                            <div>
                                <a href="{{ route('notes.edit', $note) }}"
                                    class="btn btn-warning me-2">{{ __('Edit') }}</a>
                                <form action="{{ route('notes.destroy', $note) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus catatan ini?')">{{ __('Hapus') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
