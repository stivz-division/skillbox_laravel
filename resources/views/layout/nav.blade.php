<div class="container">
    @include('layout.header')

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 link-secondary" href="{{ route('home') }}">Главная</a>
            <a class="p-2 link-secondary" href="{{ route('about') }}">О нас</a>
            <a class="p-2 link-secondary" href="{{ route('contacts.create') }}">Контакты</a>
            @auth
                <a class="p-2 link-secondary" href="{{ route('articles.create') }}">Создать статью</a>
                @admin
                    <a class="p-2 link-secondary" href="{{ route('admin.articles.index') }}">Админ. раздел</a>
                @endadmin
            @endauth
        </nav>
    </div>
</div>
