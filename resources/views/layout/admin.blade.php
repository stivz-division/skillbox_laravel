@extends('layout.master')

@section('sidebar')
    <nav class="col-md-4">
        <div class="list-group">
            <a class="list-group-item list-group-item-action" href="{{ route('admin.articles.index') }}">Статьи</a>
            <a class="list-group-item list-group-item-action" href="{{ route('admin.index') }}">Обратная связь</a>
        </div>
    </nav>
@endsection
