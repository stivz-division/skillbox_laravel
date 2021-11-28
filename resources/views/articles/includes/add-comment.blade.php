@auth
    <h3>Оставить комментарий</h3>
    <form action="{{ route('articles.comments.store', $article) }}" method="POST">
        @csrf
        @include('articles.includes.comment')
        <input class="btn btn-primary" type="submit" value="Добавить">
    </form>
@endauth
