<div class="row">
    <div class="form-group col-6">
        <label for="name">Nombres</label>
        <input id="name" name="name" type="text" class="form-control form-control-sm"
            value="{{ old('name', $user->name) }}" required autocomplete="name" />
        @error('name')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-6">
        <label for="surname">Apellidos</label>
        <input id="surname" name="surname" type="text" class="form-control form-control-sm"
            value="{{ old('surname', $user->surname) }}" required autocomplete="surname" />
        @error('surname')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-6">
        <label for="email">Correo Electronico</label>
        <input id="email" name="email" type="email" placeholder="email@example.com"
            class="form-control form-control-sm" value="{{ old('email', $user->email) }}" required />
        @error('email')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-6">
        <label for="roles">Rol</label>
        <select name="role" class="custom-select">
            @foreach ($roles as $role)
                <option value="{{ $role->name }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
    </div>
    @if (Route::currentRouteName() == 'users.create')
        <div class="form-group col-6">
            <label for="password">Contraseña</label>
            <input id="password" name="password" type="password" class="form-control form-control-sm"
                autocomplete="new-password" />
            <small id="password" class="form-text text-muted">
                tu contraseña debe ser de 8 digitos como minimo.
            </small>
            @error('password')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-6">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input id="password_confirmation" name="password_confirmation" type="password"
                class="form-control form-control-sm" autocomplete="new-password" />
            <small id="password_confirmation" class="form-text text-muted">
                tu contraseña deben coincider.
            </small>
            @error('password_confirmation')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    @endif
    <div class="form-group col-6">
        <label for="profile_picture">Imagen de Perfil</label>
        <div class="custom-file">
            <input type="file" name="profile_picture" class="custom-file-input" id="profile_picture" accept="image/*"
                onchange="previewFile()" style="display: none;">
            <img class="imgbord" id="preview"
                src="{{ $user->profile_picture ? Storage::url($user->profile_picture) : '/storage/imagenes/avatar.gif' }}"
                onerror="this.src='/storage/imagenes/User_default.png'" height="100" alt="Vista previa de la imagen"
                onclick="triggerFileInput()">
        </div>
        @error('profile_picture')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
