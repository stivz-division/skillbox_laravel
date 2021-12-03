@extends('layout.master')

@section('title', 'Список новостей')

@section('content')
    <div class="col-md-8">

        @include('layout.success')

        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Список новостей
        </h3>


        @each('news.news', $news, 'content', 'news.empty')

        {{ $news->links() }}


    </div>
@endsection
