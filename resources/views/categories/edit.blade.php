<x-app-layout>
    <div class="max-w-7xl mb-12 mx-auto p-4 sm:p-6 lg:p-8">
        <div class="p-3 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow xl:grid xl:grid-cols-1 xl:justify-items-center dark:border-gray-700 dark:bg-gray-800">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ __('Edit Category') }}</h5>
            </div>
        </div>
        <form class="mt-6" method="POST" action="{{ route('categories.update', $category) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <textarea
                name="nombre"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message', $category->nombre) }}</textarea>
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            <textarea 
                name="descripcion" 
                class=" mt-6 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message', $category->descripcion) }}</textarea>
            <x-input-error :messages="$errors->get('descripcion')" class="mt-6" />
            <div class="mt-6 dark:text-white">
                <label for="url_imagen" class="dark:text-white">{{__('Select a new image:')}}</label>
                <input type="file" name="url_imagen" id="url_imagen">
                <x-input-error :messages="$errors->get('url_imagen')" class="mt-2" />
            </div>
            <div class="mt-6 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a class="dark:text-white" href="{{ route('indexCategory') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>