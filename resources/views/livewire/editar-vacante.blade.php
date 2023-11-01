<form class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>

    <div>
        <x-input-label for="titulo" :value="__('Título Vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')"
            placeholder="Tíitulo Vacante" />
        {{-- <x-input-error :messages="$errors->get('titulo')" class="mt-2" /> --}}

        @error('titulo')
            <livewire:mostrarAlerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select wire:model="salario" id="salario"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
            <option disabled>-- Seleccione --</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach
        </select>
        {{-- <x-input-error :messages="$errors->get('salario')" class="mt-2" /> --}}
        @error('salario')
            <livewire:mostrarAlerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select wire:model="categoria" id="categoria"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
            <option disabled>-- Seleccione --</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
        {{-- <x-input-error :messages="$errors->get('categoria')" class="mt-2" /> --}}
        @error('categoria')
            <livewire:mostrarAlerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Nombre Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')"
            placeholder="Nombre Empresa" />
        {{-- <x-input-error :messages="$errors->get('empresa')" class="mt-2" /> --}}
        @error('empresa')
            <livewire:mostrarAlerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia"
            :value="old('ultimo_dia')" />
        {{-- <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" /> --}}
        @error('ultimo_dia')
            <livewire:mostrarAlerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="descipcion" :value="__('Descripción Puesto')" />
        <textarea wire:model="descripcion" id="descripcion" placeholder="Descripcion general del puesto"
            class="resize-none border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full h-52"></textarea>
        {{-- <x-input-error :messages="$errors->get('descipcion')" class="mt-2" /> --}}
        @error('descripcion')
            <livewire:mostrarAlerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen Vacante')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen_nueva" accept="image/*" />
        {{-- <x-input-error :messages="$errors->get('imagen')" class="mt-2" /> --}}
        
            <div class="my-5 w-80">
                <x-input-label :value="__('Imagen Actual')" />
                <img src="{{ asset('storage/vacantes/' . $imagen) }}" alt="{{ 'Imagen Vacante ' . $titulo }}">
            </div>


            <div class="my-5 w-80">
                @if ($imagen_nueva)
                    Imagen Nueva:
                    <img src="{{ $imagen_nueva->temporaryUrl() }}" alt="">
                @endif
            </div>
        
            @error('imagen_nueva')
            <livewire:mostrarAlerta :message="$message" />
        @enderror
    </div>

    <x-primary-button>
        {{ __('Guardar Cambios') }}
    </x-primary-button>

</form>
