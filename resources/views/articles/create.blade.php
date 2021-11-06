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
            <div class="mb-3">
                <label for="slug" class="form-label">Символьный код</label>
                <input type="text" class="form-control" name="slug" id="slug" pattern="\w+" value="{{ old('slug') }}" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Название статьи</label>
                <input type="text" class="form-control" name="title" id="title" required minlength="5" maxlength="100" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="mini_description" class="form-label">Краткое описание</label>
                <input type="text" class="form-control" name="mini_description" id="mini_description" required
                       maxlength="255" value="{{ old('mini_description') }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Детальное описание</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-3 form-check">
                <input type="hidden" name="is_published" value="0">
                <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1" @if(old('is_published', 0)) checked @endif>
                <label class="form-check-label" for="is_published">Опубликовано</label>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>

        <hr>

        <a href="{{ route('home') }}">Вернуть к списку статей</a>
    </div>
@endsection
