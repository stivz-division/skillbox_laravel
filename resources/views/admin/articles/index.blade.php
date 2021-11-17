@extends('layout.admin')

@section('title', 'Статьи')

@section('content')
    <div class="col-md-8">

        @include('layout.success')

        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Список статей
        </h3>

        @each('admin.articles.article-item', $articles, 'article', 'articles.empty')

    </div>
@endsection
