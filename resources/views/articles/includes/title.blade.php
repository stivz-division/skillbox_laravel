<div class="mb-3">
    <label for="title" class="form-label">Название статьи</label>
    <input type="text" class="form-control" name="title" id="title" required minlength="5" maxlength="100" value="{{ old('title', $value ?? '') }}">
</div>
