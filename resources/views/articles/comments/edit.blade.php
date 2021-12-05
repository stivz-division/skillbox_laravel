@extends('layout.master')

@section('title', 'Редактирование комментария')

@section('content')
    <div class="col-md-8">
        @include('layout.success')
        @include('layout.errors')

        <h3>Редактирование комментария</h3>

        <form action="{{ $routeUpdate }}" method="POST">
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

        <a href="{{ $routeBack }}">Вернуть назад</a>
    </div>
@endsection
