@extends('layout.master')

@section('title', 'Создать статью')

@section('content')
    <div class="col-md-8">

        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Создать статью
        </h3>

        @include('layout.errors')

        <form action="{{ route('articles.store') }}" method="post">
            @csrf
            @include('articles.includes.slug')
            @include('articles.includes.title')
            @include('articles.includes.mini_description')
            @include('articles.includes.description')
            @include('articles.includes.is_published')
            @include('articles.includes.tags')
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>

        <hr>

        <a href="{{ route('home') }}">Вернуть к списку статей</a>
    </div>
@endsection
