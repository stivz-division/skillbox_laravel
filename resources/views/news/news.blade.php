<article class="blog-post">
    <a class="blog-post-title" href="{{ route('news.show', $content) }}">{{ $content->title }}</a>
    <p class="blog-post-meta">{{ $content->created_at->format('d.m.Y H:i:s') }}</p>
    {{ $content->description }}
    <div class="mt-3">
        @each('articles.includes.tag', $content->tags, 'tag')
    </div>
</article>
