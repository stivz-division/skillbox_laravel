@extends('layout.admin')

@section('title', 'Отчет - Итоги')

@section('content')
    <div class="col-md-8">

        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Создание отчета
        </h3>

        @include('layout.success')
        @include('layout.errors')

        <form action="{{ route('admin.reports.results.report') }}" method="post">
            @csrf
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="articles" id="articles">
                <label class="form-check-label" for="articles">
                    Статьи
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="news" name="news">
                <label class="form-check-label" for="news">
                    Новости
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="tags" name="tags">
                <label class="form-check-label" for="tags">
                    Теги
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Сформировать</button>
        </form>
    </div>
@endsection
