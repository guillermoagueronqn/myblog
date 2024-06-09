@section('title')
    {{__('Posts')}}
@endSection

<x-app-layout>
    <div class="max-w-7xl mb-12 mx-auto p-4 sm:p-6 lg:p-8">
        @if ($category != null)
            <div class="p-3 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow xl:grid xl:grid-cols-3 xl:justify-items-center dark:border-gray-700 dark:bg-gray-800">
                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="http://localhost/myblog/resources/img/{{$category->url_imagen}}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$category->nombre}}</h5>
                </div>
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$category->descripcion}}</p>
                </div>
            </div>
        @else
            <div class="p-3 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow xl:grid xl:grid-cols-1 xl:justify-items-center dark:border-gray-700 dark:bg-gray-800">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ __('Posts') }}</h5>
                </div>
            </div>
        @endif
        @if (count($allCategories) > 0)
            <div class="flex items-center justify-end">
                <div class="mt-6 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    <a href="{{ route('create') }}">{{ __('Create new Post') }}</a>
                </div>
            </div>
        @else
            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                <div class="px-4 py-2">
                    <h1>{{__('A category must exist to create a Post!')}}</h1>
                </div>
            </div>
            <div class="flex items-center justify-end">
                <div class="mt-6 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    <a href="{{ route('createCategory') }}">{{ __('Create new Category') }}</a>
                </div>
            </div>
        @endif        
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @if (count($posts) > 0)
                @foreach ($posts as $post) 
                    @if ($category == null)
                        @if ($post->habilitated == 1)
                            <div class="p-6 flex space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                <div class="flex-1">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <span class="text-gray-800">{{ $post->user->name }} </span>
                                            <small class="text-sm ml-1 text-gray-600">{{__('-')}}</small>
                                            <small class="text-sm ml-1 text-gray-600">{{__('Category')}}</small>
                                            <span class="text-sm text-gray-600">: {{ $post->category->nombre }}</span>
                                            <span class="text-sm ml-1 text-gray-600">-</span>
                                            <small class="text-sm ml-1 text-gray-600">{{ $post->created_at->format('j M Y, g:i a') }}</small>
                                            @unless ($post->created_at->eq($post->updated_at))
                                                <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                            @endunless
                                        </div>
                                        @if ($post->user->is(auth()->user()))
                                            <x-dropdown>
                                                <x-slot name="trigger">
                                                    <button>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 hover:text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        </svg>
                                                    </button>
                                                </x-slot>
                                                <x-slot name="content">
                                                    <x-dropdown-link :href="route('edit', $post->id)">
                                                        {{ __('Edit') }}
                                                    </x-dropdown-link>
                                                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <x-dropdown-link :href="route('posts.destroy', $post)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                            {{ __('Disable') }}
                                                        </x-dropdown-link>
                                                    </form>
                                                </x-slot>
                                            </x-dropdown>
                                        @endif
                                    </div>
                                    <h3>{{$post->title}}</h3>
                                    <p class="mt-4 text-lg text-gray-900">{{ $post->content }}</p>
                                </div>
                                <a href="{{route('show', $post->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-4 w-4 text-gray-400 hover:text-gray-700" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    @elseif ($post->category_id == $category->id && $post->habilitated ==1)
                        <div class="p-6 flex space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <div class="flex-1">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-gray-800">{{ $post->user->name }} </span>
                                        <small class="text-sm ml-1 text-gray-600">{{__('-')}}</small>
                                        <small class="text-sm ml-1 text-gray-600">{{__('Category')}}</small>
                                        <span class="text-sm text-gray-600">: {{ $post->category->nombre }}</span>
                                        <span class="text-sm ml-1 text-gray-600">-</span>
                                        <small class="text-sm ml-1 text-gray-600">{{ $post->created_at->format('j M Y, g:i a') }}</small>
                                        @unless ($post->created_at->eq($post->updated_at))
                                            <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                        @endunless
                                    </div>
                                    @if ($post->user->is(auth()->user()))
                                        <x-dropdown>
                                            <x-slot name="trigger">
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 hover:text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-dropdown-link :href="route('edit', $post->id)">
                                                    {{ __('Edit') }}
                                                </x-dropdown-link>
                                                <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <x-dropdown-link :href="route('posts.destroy', $post)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                        {{ __('Disable') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                    @endif
                                </div>
                                <h3>{{$post->title}}</h3>
                                <p class="mt-4 text-lg text-gray-900">{{ $post->content }}</p>
                            </div>
                            <a href="{{route('show', $post->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-4 w-4 text-gray-400 hover:text-gray-700" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                </svg>
                            </a>
                        </div>
                    @endif
                @endforeach
            @else 
                <div class="px-4 py-2 mb-12">
                    <h1>{{__('There are no posts published at the moment!')}}</h1>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>