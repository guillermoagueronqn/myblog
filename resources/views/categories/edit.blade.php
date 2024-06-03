<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('categories.update', $category) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <textarea
                name="nombre"
                class="block w-full mb-3 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message', $category->nombre) }}</textarea>
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            <textarea 
                name="descripcion" 
                class="block w-full mb-3 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message', $category->descripcion) }}</textarea>
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
            <div>
                <label for="url_imagen">Selecciona una nueva imagen:</label>
                <input type="file" name="url_imagen" id="url_imagen">
                <x-input-error :messages="$errors->get('url_imagen')" class="mt-2" />
            </div>
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('indexCategory') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>