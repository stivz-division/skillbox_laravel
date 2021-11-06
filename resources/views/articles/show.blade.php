@extends('layout.master')

@section('title', $article->title)

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            {{ $article->title }}
        </h3>

        <article class="blog-post">
            <h2 class="blog-post-title">{{ $article->title }}</h2>
            <p class="blog-post-meta">{{ $article->created_at->format('d.m.Y H:i:s') }}</p>

            {{ $article->description }}

        </article>

        <hr>

        <a href="{{ route('home') }}">Вернуть к списку статей</a>
    </div>
@endsection
