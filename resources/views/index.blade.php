@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-3">Makaleler</h2>
            <hr>

            @forelse($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h4 class="card-title">{{ $post->title }}</h4>
                        <p class="text-muted small">
                            Eklenme Tarihi: {{ $post->created_at->format('d.m.Y H:i') }}
                        </p>
                        <p class="card-text">
                            {{ \Illuminate\Support\Str::limit($post->content, 200, '...') }}
                        </p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-sm">Devamını Oku</a>
                    </div>
                </div>
            @empty
                <div class="alert alert-secondary">
                    Henüz makale eklenmemiş.
                </div>
            @endforelse
        </div>
    </div>
@endsection
