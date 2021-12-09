@extends('layout.master')

@section('sidebar')
    <nav class="col-md-4">
        <div class="list-group">
            <a class="list-group-item list-group-item-action" href="{{ route('admin.articles.index') }}">Статьи</a>
            <a class="list-group-item list-group-item-action" href="{{ route('admin.news.index') }}">Новости</a>
            <div class="list-group-item">
                Отчеты
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action" href="{{ route('admin.reports.results.index') }}">Итоги</a>
                </div>
            </div>
            <a class="list-group-item list-group-item-action" href="{{ route('admin.index') }}">Обратная связь</a>
        </div>
    </nav>
@endsection
