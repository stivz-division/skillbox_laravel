@component('mail::message')
# Новые публикации

<ul>
    @foreach($articles as $article)
        <li>{{ $article->title }}</li>
    @endforeach
</ul>
@component('mail::button', ['url' => route('home')])
Перейти на сайт
@endcomponent

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
