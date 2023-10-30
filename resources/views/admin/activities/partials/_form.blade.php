<div class="row">
    <div class="form-group col-6">
        <label for="activity_name">Nombre de la Actividad</label>
        <input id="activity_name" name="activity_name" type="text" class="form-control form-control-sm"
            value="{{ old('activity_name', $activity->activity_name) }}" autocomplete="activity_name" />
        @error('activity_name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group col-12">
        <label for="description">Descripción</label>
        <textarea name="description" id="description" class="form-control ck-editor__editable_inline">{{ old('description', $activity->description) }}</textarea>
        @error('description')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group col-6">
        <label for="link">Enlace</label>
        <input id="link" name="link" type="text" class="form-control form-control-sm"
            value="{{ old('link', $activity->link) }}" autocomplete="link" />
        @error('link')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
