<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <textarea 
                name="title"
                placeholder="{{ __('Título del Post') }}"
                class="block w-full mb-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('title') }}</textarea>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
            <textarea
                name="content"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('content') }}</textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                @if (count($categories) > 0)
                    @foreach ($categories as $category)
                        <div>
                            <label>
                                <input type="radio" name="category_id" value="{{ $category->id }}" required>
                                    {{ $category->nombre }}
                            </label>
                        </div>
                    @endforeach
                @endif
            <input type="hidden" name="habilitated" value="1">
            <x-primary-button class="mt-4">{{ __('Posts') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>