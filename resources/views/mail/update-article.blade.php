@component('mail::message')
# Статья изменена!

<strong>
    {{ $article->title }}
</strong>

<p>
    {{ $article->mini_description }}
</p>

@component('mail::button', ['url' => route('articles.show', $article)])
    Посмотреть полностью
@endcomponent

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
