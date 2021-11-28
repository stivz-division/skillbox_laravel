@extends('layout.master')

@section('title', $article->title)

@section('content')
    <div class="col-md-8">
        @include('layout.success')
        @include('layout.errors')
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            {{ $article->title }}
            @admin
            <a href="{{ route('admin.articles.edit', $article) }}">Редактировать</a>
            @else
                @can('update', $article)
                    <a href="{{ route('articles.edit', $article) }}">Редактировать</a>
                @endcan
            @endadmin

        </h3>

        <article class="blog-post">
            <h2 class="blog-post-title">{{ $article->title }}</h2>
            <p class="blog-post-meta">{{ $article->created_at->format('d.m.Y H:i:s') }}</p>

            {{ $article->description }}

        </article>

        <div>
            @each('articles.includes.tag', $article->tags, 'tag')
        </div>

        <hr>

        @include('articles.includes.add-comment')

        <div class="row g-3 mt-3">
            @forelse($article->comments as $comment)
                @include('articles.includes.comments')
            @empty
                @include('articles.includes.empty-comments')
            @endforelse
        </div>

        <hr>

        <a href="{{ route('home') }}">Вернуть к списку статей</a>
    </div>
@endsection
