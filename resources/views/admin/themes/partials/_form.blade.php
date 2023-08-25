<div class="row">
    <div class="form-group col-6">
        <label for="theme_name">Nombre del Tema</label>
        <input id="theme_name" name="theme_name" type="text" class="form-control form-control-sm"
            value="{{ old('theme_name', $theme->theme_name) }}" autocomplete="theme_name" />
        @error('theme_name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group col-12">
        <label for="description">Descripción</label>
        <textarea name="description" id="description" class="form-control ck-editor__editable_inline">{{ old('description', $theme->description) }}</textarea>
        @error('description')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group col-6">
        <label for="theme_image">Imagen de Perfil</label>
        <div class="custom-file">
            <input type="file" name="theme_image" class="custom-file-input hidden" id="theme_image" accept="image/*"
                onchange="previewFile()">
            <img class="imgbord" id="preview"
                src="{{ $theme->theme_image ? Storage::url($theme->theme_image) : '/storage/imagenes/multimedia_default.png' }}"
                onerror="this.src='/storage/imagenes/error.png'" height="100"
                alt="Vista previa de la imagen de perfil" onclick="triggerFileInput()">
        </div>
        @error('theme_image')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
