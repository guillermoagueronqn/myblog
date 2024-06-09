<x-app-layout>
    <div class="max-w-7xl mb-12 mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mb-6 p-3 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow xl:grid xl:grid-cols-1 xl:justify-items-center dark:border-gray-700 dark:bg-gray-800">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{__("Home")}}</h5>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div>
                    @if (count($categories) > 0)
                        <div class="grid grid-cols-3 gap-3">
                            @foreach ($categories as $category)
                            <a href="{{route('index', ['category_id' => $category->id])}}" class="p-3 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow xl:flex-row xl:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="http://localhost/myblog/resources/img/{{$category->url_imagen}}" alt="">
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$category->nombre}}</h5>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$category->descripcion}}</p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    @else
                        <h1>No hay categorias disponibles por el momento!</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>