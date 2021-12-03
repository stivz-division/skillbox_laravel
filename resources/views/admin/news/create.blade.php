@extends('layout.admin')

@section('title', 'Создание новости')

@section('content')
    <div class="col-md-8">

        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Создание новости
        </h3>

        @include('layout.success')
        @include('layout.errors')

        <form action="{{ route('admin.news.store') }}" method="post">
            @csrf
            @include('articles.includes.title')
            @include('articles.includes.description')
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>

        <hr>

        <a href="{{ route('admin.news.index') }}">Вернуть к списку новостей</a>
    </div>
@endsection
