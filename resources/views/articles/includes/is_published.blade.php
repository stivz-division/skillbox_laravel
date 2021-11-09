<div class="mb-3 form-check">
    <input type="hidden" name="is_published" value="0">
    <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1"
           @if(old('is_published', $value ?? false)) checked @endif>
    <label class="form-check-label" for="is_published">Опубликовано</label>
</div>
