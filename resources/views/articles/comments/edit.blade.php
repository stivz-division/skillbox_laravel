@extends('layout.master')

@section('title', $article->title)

@section('content')
    <div class="col-md-8">
        @include('layout.success')
        @include('layout.errors')

        <h3>Редактирование комментария</h3>

        <form action="{{ route('articles.comments.update', [$article, $comment]) }}" method="POST">
            @method('PUT')
            @csrf
            @include('articles.includes.comment', [
                    'comment' => $comment->comment
                ])
            <input class="btn btn-primary" type="submit" value="Изменить">
        </form>

        <hr>

        @include('articles.comments.histories')

        <hr>

        <a href="{{ route('articles.show', $article) }}">Вернуть к статье</a>
    </div>
@endsection
