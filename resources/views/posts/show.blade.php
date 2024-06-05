<x-app-layout>
    <div class="max-w-7xl mb-12 mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mb-6 p-3 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow xl:grid xl:grid-cols-1 xl:justify-items-center dark:border-gray-700 dark:bg-gray-800">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{__("Post's Details")}}</h5>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div>
                    <div class="max-w-sm w-full lg:max-w-full lg:flex border rounded-lg border-gray-400 p-6">
                        <img class="mr-6 h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" src="http://localhost/myblog/resources/img/{{$post->category->url_imagen}}" alt="">
                        <div class="dark:bg-white w-full rounded-xl p-4 flex flex-col justify-between leading-normal">
                            <div class="mb-8">
                                <p class="text-sm text-gray-600 flex items-center mb-6">
                                    <svg class="fill-current text-gray-500 w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
                                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
                                    </svg>
                                    {{__('Category')}}: {{$post->category->nombre}}
                                </p>
                                <div class="text-gray-900 font-bold text-xl mb-2">{{$post->title}}</div>
                                    <p class="text-gray-700 text-base">{{$post->content}}</p>
                                </div>
                                <div class="flex items-center">
                                    <svg class="fill-current text-gray-500 w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                    </svg>
                                <div class="text-sm">
                                    <p class="text-gray-900 leading-none">{{$post->user->name}}</p>
                                    <p class="text-gray-600">{{ $post->created_at->format('j M Y, g:i a') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>