<article class="blog-post">
    <a class="blog-post-title" href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
    <p class="blog-post-meta">{{ $article->created_at->format('d.m.Y H:i:s') }}</p>
    {{ $article->mini_description }}
    <div class="mt-3">
        @each('articles.includes.tag', $article->tags, 'tag')
    </div>
</article>
