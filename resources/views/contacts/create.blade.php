@extends('layout.master')

@section('title', 'Контакты')

@section('content')
    <div class="col-md-8">

        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Контакты
        </h3>

        @include('layout.errors')

        <form action="{{ route('contacts.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">E-Mail</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Сообщение</label>
                <textarea class="form-control" id="message" name="message" rows="3" required>{{ old('message') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>

        <hr>

        <a href="{{ route('home') }}">Вернуть к списку статей</a>
    </div>
@endsection
