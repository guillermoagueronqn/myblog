<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
            @csrf
            <textarea 
                name="nombre"
                placeholder="{{ __('Name of the Category') }}"
                class="block w-full mb-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('nombre') }}</textarea>
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            <textarea
                name="descripcion"
                placeholder="{{ __('Description of Category') }}"
                class="block w-full mb-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('descripcion') }}</textarea>
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                <div>
                    <label for="image">Selecciona una imagen:</label>
                    <input type="file" name="url_imagen" id="url_imagen" required>
                    <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                </div>
            <x-primary-button class="mt-4">{{ __('Create Category') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>