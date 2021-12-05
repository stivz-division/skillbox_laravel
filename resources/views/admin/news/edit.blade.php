@extends('layout.admin')

@section('title', 'Редактирование новости')

@section('content')
    <div class="col-md-8">

        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Редактирование новости
        </h3>

        @include('layout.success')
        @include('layout.errors')

        <form action="{{ route('admin.news.update', $news) }}" method="post">
            @csrf
            @method('PATCH')
            @include('articles.includes.title', ['value' => $news->title])
            @include('articles.includes.description', ['value' => $news->description])
            @include('articles.includes.tags', ['value' => $news->tags->pluck('name')->implode(',')])
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>

        <hr>

        <a href="{{ route('admin.news.index') }}">Вернуть к списку новостей</a>
    </div>
@endsection
