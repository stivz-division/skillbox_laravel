@extends('layout.master')

@section('title', 'Список статей и новостей')

@section('content')
    <div class="col-md-8">

        @include('layout.success')

        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Список статей и новостей
        </h3>


        <h4>Список статей</h4>
        @each('components.article', $articles, 'article', 'articles.empty')

        <hr>
        <h4>Список новостей</h4>
        @each('news.news', $news, 'content', 'articles.empty')

    </div>
@endsection
