<x-app-layout>
    <div class="max-w-7xl mb-12 mx-auto p-4 sm:p-6 lg:p-8">
        <div class="p-3 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow xl:grid xl:grid-cols-1 xl:justify-items-center dark:border-gray-700 dark:bg-gray-800">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ __('Create Post') }}</h5>
            </div>
        </div>
        <form class="mt-6" method="POST" action="{{ route('posts.store') }}">
            @csrf
            <textarea 
                name="title"
                placeholder="{{ __("Post's Title") }}"
                class="block w-full mb-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('title') }}</textarea>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
            <textarea
                name="content"
                placeholder="{{ __("Post's Content") }}"
                class="mt-6 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('content') }}</textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-6" />
                @if (count($categories) > 0)
                    @foreach ($categories as $category)
                        <div class="mt-6">
                            <label>
                                <input type="radio" name="category_id" value="{{ $category->id }}" required>
                                    <span class="dark:text-white">{{ $category->nombre }}</span>
                            </label>
                        </div>
                    @endforeach
                @endif
            <input type="hidden" name="habilitated" value="1">
            <x-primary-button class="mt-6">{{ __('Post') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>