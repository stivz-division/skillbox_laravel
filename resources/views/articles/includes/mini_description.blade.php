<div class="mb-3">
    <label for="mini_description" class="form-label">Краткое описание</label>
    <input type="text" class="form-control" name="mini_description" id="mini_description" required
           maxlength="255" value="{{ old('mini_description', $value ?? '') }}">
</div>
