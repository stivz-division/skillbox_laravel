<div class="container">
    @include('layout.header')

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 link-secondary" href="/">Главная</a>
            <a class="p-2 link-secondary" href="/about">О нас</a>
            <a class="p-2 link-secondary" href="/contacts">Контакты</a>
            @auth
                <a class="p-2 link-secondary" href="/articles/create">Создать статью</a>
                <a class="p-2 link-secondary" href="/admin/feedback">Админ. раздел</a>

            @endauth
        </nav>
    </div>
</div>
