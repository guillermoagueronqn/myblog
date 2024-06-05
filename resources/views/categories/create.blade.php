<x-app-layout>
    <div class="max-w-7xl mb-12 mx-auto p-4 sm:p-6 lg:p-8">
        <div class="p-3 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow xl:grid xl:grid-cols-1 xl:justify-items-center dark:border-gray-700 dark:bg-gray-800">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ __('Create Category') }}</h5>
            </div>
        </div>
        <form class="mt-6" method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
            @csrf
            <textarea 
                name="nombre"
                placeholder="{{ __('Name of the Category') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('nombre') }}</textarea>
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            <textarea
                name="descripcion"
                placeholder="{{ __('Description of the Category') }}"
                class=" mt-6 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('descripcion') }}</textarea>
            <x-input-error :messages="$errors->get('descripcion')" class="mt-6" />
                <div class="mt-6 dark:text-white">
                    <label for="image" class="dark:text-white">{{__("Select an image:")}}</label>
                    <input type="file" name="url_imagen" id="url_imagen" required>
                    <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                </div>
            <x-primary-button class="mt-6">{{ __('Create Category') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>