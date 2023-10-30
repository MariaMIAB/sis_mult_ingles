<div class="row">
    <div class="form-group col-6">
        <label for="content_name">Nombre del Contenido</label>
        <input id="content_name" name="content_name" type="text" class="form-control form-control-sm"
            value="{{ old('content_name', $content->content_name) }}" autocomplete="content_name" />
        @error('content_name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group col-12">
        <label for="content_text">Descripción</label>
        <textarea name="content_text" id="content_text" class="form-control ck-editor__editable_inline">{{ old('content_text', $content->content_text) }}</textarea>
        @error('content_text')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group col-6">
        <label for="content_image">Imagen de Contenido</label>
        <div class="custom-file">
            <input type="file" name="content_image" class="custom-file-input hidden" id="content_image"
                accept="image/*" onchange="previewFile()">
            <img class="imgbord" id="preview"
                src="{{ $content->content_image ? Storage::url($theme->content_image) : '/storage/imagenes/multimedia_default.png' }}"
                onerror="this.src='/storage/imagenes/error.png'" height="100"
                alt="Vista previa de la imagen de perfil" onclick="triggerFileInput()">
        </div>
        @error('content_image')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <input type="hidden" name="theme_id" value="{{ $themeId }}">
</div>
