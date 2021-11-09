<div class="col-md-4">
    <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">Тэги</h4>
            @each('articles.includes.tag', $cloudTags, 'tag')
        </div>
    </div>
</div>
