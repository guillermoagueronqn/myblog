<x-app-layout>
    <div class="max-w-7xl mb-12 mx-auto p-4 sm:p-6 lg:p-8">
        <div class="p-3 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow xl:grid xl:grid-cols-1 xl:justify-items-center dark:border-gray-700 dark:bg-gray-800">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ __('Categories') }}</h5>
            </div>
        </div>
        <div class="flex items-center justify-end">
            <div class="mt-6 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                <a href="{{ route('createCategory') }}">{{ __('Create new Category') }}</a>
            </div>
        </div>
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @if (count($categories) > 0)
                @foreach ($categories as $category)
                    <div class="p-6 flex space-x-2">
                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-gray-800">{{ $category->nombre }}</span>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="{{ route('editCategory', $category->id) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
                                </div>
                            </div>
                            <p class="mt-4 text-lg text-gray-900">{{ $category->description }}</p>
                        </div>
                    </div>
                @endforeach
            @else  
                <div>
                    <h1>No hay posts publicados por el momento!</h1>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>