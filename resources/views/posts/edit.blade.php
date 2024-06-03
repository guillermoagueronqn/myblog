<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('patch')
            <textarea
                name="title"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message', $post->title) }}</textarea>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
            <textarea
                name="content"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('content', $post->content) }}</textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                @if (count($categories) > 0)
                    @foreach ($categories as $category)
                        <div>
                            <label>
                                <input type="radio" name="category_id" value="{{ $category->id }}" 
                                       {{ $post->category_id == $category->id ? 'checked' : '' }} required>
                                {{ $category->nombre }}
                            </label>
                        </div>
                    @endforeach
                @endif
            <input type="hidden" name="habilitated" value="1">
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>