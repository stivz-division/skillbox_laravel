@forelse($comment->histories as $editor)
    @if($loop->first)
        <h3>История изменений:</h3>
    @endif
    <p>
        {{ $editor->email }} - {{ $editor->pivot->created_at->diffForHumans() }} - {{ $editor->pivot->before }}
        - {{ $editor->pivot->after }}
    </p>
@empty
<h4>История изменений пуста!</h4>
@endforelse
