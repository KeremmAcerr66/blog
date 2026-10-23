@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <strong>{{ $post->title }}</strong>
                    <span class="text-muted float-end small">
                    Tarih: {{ $post->created_at->format('d.m.Y H:i') }}
                </span>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {!! nl2br(e($post->content)) !!}
                    </p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-sm">Geri Dön</a>
                </div>
            </div>
        </div>
    </div>
@endsection
