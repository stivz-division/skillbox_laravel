<div class="mb-3">
    <label for="slug" class="form-label">Символьный код</label>
    <input type="text" class="form-control" name="slug" id="slug" pattern="\w+" value="{{ old('slug', $value ?? '') }}" {{ isset($value) ? 'readonly' : '' }} required>
</div>
