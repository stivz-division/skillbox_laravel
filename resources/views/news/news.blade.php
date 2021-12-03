<article class="blog-post">
    <a class="blog-post-title" href="{{ route('articles.show', $content) }}">{{ $content->title }}</a>
    <p class="blog-post-meta">{{ $content->created_at->format('d.m.Y H:i:s') }}</p>
    {{ $content->description }}
</article>
