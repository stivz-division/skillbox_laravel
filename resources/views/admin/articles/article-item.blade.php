<x-article :article="$article">
    <form
        class="mt-3"
        action="{{ !$article->is_published ? route('admin.article.published', $article) : route('admin.article.unpublished', $article) }}"
        method="POST"
    >
        @csrf
        @method('PATCH')
        <input
            @class(['btn', 'btn-danger' => $article->is_published, 'btn-primary' => !$article->is_published]) type="submit"
            value="{{ $article->is_published ? 'Снять с публикации' : 'Опубликовать' }}">
    </form>
</x-article>
