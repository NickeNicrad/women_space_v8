@php

    $users = DB::table('users')->where('id', '!=', Auth::user()->id)->get();
    $posts = DB::table('posts')->latest()->get();
    $categories = DB::table('categories')->get();

@endphp

<x-app-layout>
    @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="border-t-4 border-teal-500 rounded-b px-4 py-3 shadow-md bg-red-500 text-white absolute" role="alert">
            <div class="flex items-center">
                <div class="py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold">Error</p>
                    <p class="text-sm">{{$error}}</p>
                </div>
            </div>
        </div>
        @endforeach
    @endif

    @if(Session::has('success'))
        <div class="border-t-4 border-teal-500 rounded-b px-4 py-3 shadow-md bg-green-500 text-white absolute" role="alert">
            <div class="flex items-center">
                <div class="py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold">Success</p>
                    <p class="text-sm">{{session('success')}}</p>
                </div>
            </div>
        </div>
    @endif

    <x-slot name="header">
        <div class="flex justify-between">
            <h6 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h6>
            <div class="flex rounded-md shadow-sm">
                <input type="search" name="search" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-60 rounded-none rounded-l-md sm:text-sm border-gray-300" placeholder="recherche...">
                <button type="submit" class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                    recherche
                </button>
            </div>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="space-x-4">
                        <div class="space-y-12 lg:space-y-0 lg:grid lg:grid-cols-4 lg:gap-x-6">

                            <div class="bg-gray-100 p-3 rounded">
                                <div class="w-full grid grid-cols-5 gap-y-8 gap-x-6">
                                    <div class="col-span-2 bg-gray-200 rounded-full h-20 w-20 border-dashed border-gray-400 border-2 flex justify-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 m-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </div>
                                    <div class="space-y-2">
                                        <h3 class="uppercase text-base font-bold text-gray-400">Utilisateurs</h3>
                                        <h4 class="uppercase text-4xl font-bold text-gray-400">
                                            {{$users->count()}}
                                        </h4>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-100 p-3 rounded">
                                <div class="w-full grid grid-cols-5 gap-y-8 gap-x-6">
                                    <div class="col-span-2 bg-gray-200 rounded-full h-20 w-20 border-dashed border-gray-400 border-2 flex justify-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 m-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                    </div>
                                    <div class="space-y-2 col-span-3">
                                        <h3 class="uppercase text-base font-bold text-gray-400">Articles</h3>
                                        <h4 class="uppercase text-4xl font-bold text-gray-400">{{$posts->count()}}</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-100 p-3 rounded">
                                <div class="w-full grid grid-cols-5 gap-y-8 gap-x-6">
                                    <div class="col-span-2 bg-gray-200 rounded-full h-20 w-20 border-dashed border-gray-400 border-2 flex justify-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 m-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                        </svg>
                                    </div>
                                    <div class="space-y-2 col-span-3">
                                        <h3 class="uppercase text-base font-bold text-gray-400">Commentaires</h3>
                                        <h4 class="uppercase text-4xl font-bold text-gray-400"></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-100 p-3 rounded">
                                <div class="w-full grid grid-cols-5 gap-y-8 gap-x-6">
                                    <div class="col-span-2 bg-gray-200 rounded-full h-20 w-20 border-dashed border-gray-400 border-2 flex justify-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 m-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                        </svg>
                                    </div>
                                    <div class="space-y-2 col-span-3">
                                        <h3 class="uppercase text-base font-bold text-gray-400">Categories</h3>
                                        <h4 class="uppercase text-4xl font-bold text-gray-400">{{ $categories->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-4 gap-6 p-6">
                    <div class="col-span-1">

                        <div class="w-full flex justify-between py-2 shadow rounded border-b bg-gray-50 px-3 mb-3">
                            <small class="text-gray-500 uppercase">Categories</small>

                            <button id="show-modal" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-2 py-1 bg-gray-400 text-base font-thin text-white hover:bg-gray-500 focus:outline-none focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </button>
                        </div>

                        <div class="space-y-2">

                            @foreach($categories as $category)

                                <div class="grid grid-cols-6 w-full py-3 shadow rounded border-b bg-gray-50 px-3">
                                    <div class="col-span-4">
                                        <p class="text-gray-400 text-sm">{{ $category->title }}</p>
                                        <p class="text-gray-300 text-xs">{{ $category->content }}</p>
                                    </div>
                                    <div class="col-span-2 flex justify-around items-center">
                                        <button class="p-2 rounded-full border-2 bg-gray-400 text-white hover:bg-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </button>

                                        <button class="p-2 rounded-full border-2 bg-red-400 text-white hover:bg-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-span-3">
                        <div class="bg-white border-b border-gray-200 overflow-y-auto overflow-x-hidden" style="height: 365px;">
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                            <table class="table-fixed min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Image
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/3">
                                                            Titre
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Modif/Supp
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    @foreach($posts as $post)
                                                        <tr>
                                                            <td class="px-4 py-2 whitespace-nowrap">
                                                                <img class="h-10 w-16 object-cover rounded" src="{{ Storage::url(explode('|', $post->images)[0]) }}" alt="">
                                                            </td>
                                                            <td class="px-4 py-3 whitespace-nowrap">
                                                                <div class="text-sm text-gray-700 capitalize overflow-ellipsis">
                                                                    {{$post->title}}
                                                                </div>
                                                                <div class="text-sm text-gray-500">
                                                                    <small>par <a href="#">Nicke Nicrad</a></small>
                                                                </div>
                                                            </td>
                                                            <td class="px-4 py-3 whitespace-nowrap inline-flex">
                                                                <a href="{{route('posts.edit', $post->id)}}" class="text-gray-500 hover:text-gray-600 font-bold py-2 px-4 rounded-l">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                    </svg>
                                                                </a>
                                                                <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" onclick="return confirm('etes-vous sure de vouloir supprimer cet article?')" class="text-red-500 hover:text-red-400 font-bold py-2 px-4 rounded-r">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M6 18L18 6M6 6l12 12" />
                                                                        </svg>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.category_form')

</x-app-layout>
