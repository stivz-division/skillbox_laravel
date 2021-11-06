@extends('layout.master')

@section('title', 'Админ. раздел')

@section('content')
    <div class="col-md-8">

        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Админ. раздел
        </h3>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">E-Mail</th>
                <th scope="col">Сообщение</th>
                <th scope="col">Дата получения</th>
            </tr>
            </thead>
            <tbody>
            @foreach($appeals as $appeal)
                <tr>
                    <td>{{ $appeal->email }}</td>
                    <td>{{ $appeal->message }}</td>
                    <td>{{ $appeal->created_at->format('d.m.Y H:i:s') }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <hr>

        <a href="{{ route('home') }}">Вернуть к списку статей</a>
    </div>
@endsection
