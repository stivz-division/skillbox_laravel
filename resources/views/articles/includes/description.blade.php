<div class="mb-3">
    <label for="description" class="form-label">Детальное описание</label>
    <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $value ?? '') }}</textarea>
</div>
