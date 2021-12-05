@auth
    <h3>Оставить комментарий</h3>
    <form action="{{ $routeStore }}" method="POST">
        @csrf
        @include('articles.includes.comment')
        <input class="btn btn-primary" type="submit" value="Добавить">
    </form>
@endauth
