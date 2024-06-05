@section('title')
    {{__('Edit Post')}}
@endSection

<x-app-layout>
    <div class="max-w-7xl mb-12 mx-auto p-4 sm:p-6 lg:p-8">
        <div class="p-3 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow xl:grid xl:grid-cols-1 xl:justify-items-center dark:border-gray-700 dark:bg-gray-800">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ __('Edit Post') }}</h5>
            </div>
        </div>
        <form class="mt-6" method="POST" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('patch')
            <textarea
                name="title"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message', $post->title) }}</textarea>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
            <textarea
                name="content"
                class=" mt-6 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('content', $post->content) }}</textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                @if (count($categories) > 0)
                    @foreach ($categories as $category)
                        <div class="mt-6">
                            <label>
                                <input type="radio" name="category_id" value="{{ $category->id }}" 
                                        {{ $post->category_id == $category->id ? 'checked' : '' }} required>
                                    <span class="dark:text-white">{{ $category->nombre }}</span>
                            </label>
                        </div>
                    @endforeach
                @endif
            <input type="hidden" name="habilitated" value="1">
            <div class="mt-6 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a class="dark:text-white" href="{{ route('index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>