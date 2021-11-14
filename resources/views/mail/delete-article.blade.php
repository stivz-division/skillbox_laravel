@component('mail::message')
# Статья удалена!

<strong>
    {{ $article['title'] }}
</strong>

<p>
    {{ $article['mini_description'] }}
</p>

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
