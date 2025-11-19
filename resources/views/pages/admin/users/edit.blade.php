<h1>Gerenciar Usuário: {{ $user->name }}</h1>

<form action="{{ route('admin.users.update', $user) }}" method="POST">
    @csrf
    @method('PUT') {{-- Usa o método HTTP PUT, como esperado pelo Route::resource --}}

    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
    </div>

    <div class="mb-3">
        <label for="role_name" class="form-label">Papel de Acesso</label>
        <select class="form-select" id="role_name" name="role_name" required>
            <option disabled>Selecione um Papel</option>
            
            @foreach($roles as $role)
                <option 
                    value="{{ $role->name }}"
                    
                    {{-- Usa o método hasRole() para marcar o papel atual do usuário como selecionado --}}
                    {{ $user->hasRole($role->name) ? 'selected' : '' }}
                >
                    {{ ucfirst($role->name) }}
                </option>
            @endforeach
            
        </select>
        @error('role_name') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Salvar Papel e Nome</button>
</form>