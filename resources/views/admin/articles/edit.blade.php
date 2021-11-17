@extends('layout.admin')

@section('title', 'Редактирование статьи')

@section('content')
    <div class="col-md-8">

        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Редактирование статьи
        </h3>

        @include('layout.success')
        @include('layout.errors')

        <form action="{{ route('articles.update', $article) }}" method="post">
            @csrf
            @method('PATCH')
            @include('articles.includes.slug', ['value' => $article->slug])
            @include('articles.includes.title', ['value' => $article->title])
            @include('articles.includes.mini_description', ['value' => $article->mini_description])
            @include('articles.includes.description', ['value' => $article->description])
            @include('articles.includes.is_published', ['value' => $article->is_published])
            @include('articles.includes.tags', ['value' => $article->tags->pluck('name')->implode(',')])
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>

        <hr>

        @include('articles.delete', $article)

        <hr>

        <a href="{{ route('home') }}">Вернуть к списку статей</a>
    </div>
@endsection
