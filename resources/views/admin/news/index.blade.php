@extends('layout.admin')

@section('title', 'Новости')

@section('content')
    <div class="col-md-8">

        @include('layout.success')

        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Список новостей
            <a class="d-block" href="{{ route('admin.news.create') }}">Создать новость</a>
        </h3>

        @each('news.news', $news, 'content', 'news.empty')

        {{ $news->links() }}

    </div>
@endsection
