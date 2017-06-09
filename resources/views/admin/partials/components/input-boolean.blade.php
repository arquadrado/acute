<div class="form-check">
    <label for="{{ $column }}" class="form-check-label">
            {{ $label }}
    </label>
    <input class="form-check-input" name="{{ $column }}" type="checkbox" {{ $value === 1 ? 'checked' : '' }} value="1"/>
</div>