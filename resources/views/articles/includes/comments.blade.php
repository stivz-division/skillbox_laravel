<div class="col">
    <div class="card">
        <div class="card-header">
            Автор: {{ $comment->author->name }}
        </div>
        <div class="card-body">
            {{ $comment->comment }}
        </div>
        <div class="card-footer">
            <a class="btn btn-primary" href="{{ $routeEdit }}">Редактировать</a>
        </div>
    </div>
</div>
