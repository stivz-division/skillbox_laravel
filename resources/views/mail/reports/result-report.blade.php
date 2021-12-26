@component('mail::message')
# Отчет по итогам


<ul>
    @foreach($reportMessages as $title => $message)
        <li>
            {{ $title }} {{ $message }}
        </li>
    @endforeach
</ul>


Спасибо,<br>
{{ config('app.name') }}
@endcomponent
