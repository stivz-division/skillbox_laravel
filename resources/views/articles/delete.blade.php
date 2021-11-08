<form action="{{ route('articles.destroy', $article) }}" method="post">
    @csrf
    @method('DELETE')
    <input class="btn btn-danger" type="submit" value="Удалить">
</form>
