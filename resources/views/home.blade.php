@extends('layout.master')

@section('title', 'Список статей')

@section('content')
    <div class="col-md-8">

        @include('layout.success')

        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Список статей
        </h3>

        @each('articles.index', $articles, 'article', 'articles.empty')

    </div>
@endsection
