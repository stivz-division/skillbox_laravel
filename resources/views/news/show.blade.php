@extends('layout.master')

@section('title', $news->title)

@section('content')
    <div class="col-md-8">
        @include('layout.success')
        @include('layout.errors')
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            {{ $news->title }}
            @admin
                <a href="{{ route('admin.news.edit', $news) }}">Редактировать</a>
            @endadmin
        </h3>

        <article class="blog-post">
            <h2 class="blog-post-title">{{ $news->title }}</h2>
            <p class="blog-post-meta">{{ $news->created_at->format('d.m.Y H:i:s') }}</p>
            {{ $news->description }}
        </article>

        <hr>

        <a href="{{ route('news.index') }}">Вернуть к списку новостей</a>
    </div>
@endsection
