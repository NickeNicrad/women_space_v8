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

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
        <div class="md:grid md:grid-cols-3 space-x-4">
            <div class="md:col-span-1">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white border-b border-gray-200">
                        <div class="sm:px-0">

                            <div class="mt-1 text-sm text-gray-600">

                                <ul class="divide-y divide-gray-100 overflow-y-auto" style="height: 560px;">
                                    @foreach($posts as $post)
                                        <li class="p-4 flex space-x-4 hover:bg-gray-100 rounded cursor-pointer">
                                            @if(explode('|', $post->images) > 0)
                                                <img src="{{ Storage::url(explode('|', $post->images)[0]) }}" alt="{{ $post->title }}" class="w-16 h-16 rounded-lg object-cover">
                                            @else
                                                <div class="w-16 h-16 flex items-center bg-gray-500 rounded-lg">
                                                    <small class="w-16 text-center mx-auto text-white">no image</small>
                                                </div>
                                            @endif
                                            <div class="text-gray-500">
                                                <a href="{{route('posts.edit', $post->id)}}" class="font-bold text-gray-600 overflow-ellipsis capitalize" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; line-clamp: 1; -webkit-box-orient: vertical;">{{ $post->title }}</a>
                                                <div class="overflow-ellipsis w-full" style="font-size: 12px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{!!$post->content!!}</div>
                                                <hr class="my-2">
                                                <small>Par:</small>
                                                <small class="font-semibold text-gray-600 overflow-ellipsis">
                                                    <a href="">
                                                        {{$post->author->name}}
                                                    </a>
                                                </small>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="md:col-span-2">
                <div class="max-w-7xl mx-auto">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="px-4 pt-4 bg-white border-b border-gray-200">
                            @if(request()->routeIs('posts.create'))
                                <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')

                                    <div class="grid grid-cols-5 space-x-2">
                                        <div class="col-span-3 mb-4 w-full space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">Titre</label>
                                            <input class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded sm:text-sm border-gray-300" type="text" placeholder="Titre..." name="title" />
                                        </div>

                                        <div class="col-span-2 mb-4 space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">Categorie</label>
                                            <div class="space-x-4">
                                                <select name="category_id" class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded sm:text-sm border-gray-300">
                                                    <option selected disabled>Categorie...</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Ajouter Image</label>
                                        <div class="mt-1 flex justify-center px-6 pt-3 pb-4 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-gray-600 hover:text-gray-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-gray-500">
                                                    <span>ajouter</span>
                                                    <input id="file-upload" name="images[]" type="file" class="sr-only" accept="image/jpeg, image/png, image/gif" multiple>
                                                    </label>
                                                    <p class="pl-1">ou glisser et déposer plusieurs images</p>
                                                </div>
                                                <p class="text-xs text-gray-500">
                                                    PNG, JPG, GIF jusqu'a 10MB
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4 space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Contenu</label>
                                        <textarea class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded sm:text-sm border-gray-300 resize-none" id="summernote" name="content" cols="30" rows="4" placeholder="Description..."></textarea>
                                    </div>

                                    <div class="flex space-x-3 mb-4 text-sm font-medium">
                                        <div class="flex-auto flex space-x-3">
                                            <button class="w-1/8 py-2 px-4 flex items-center justify-center rounded-md bg-gray-500 text-white" type="submit">Publier</button>
                                            <a href="{{route('posts.create')}}" class="w-1/8 py-2 px-4 flex items-center justify-center rounded-md border border-gray-300" type="reset">Annuler</a>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form action="{{route('posts.update', $edit_post->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div class="grid grid-cols-5 space-x-2">
                                        <div class="col-span-3 mb-4 w-full space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">Titre</label>
                                            <input class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded sm:text-sm border-gray-300" type="text" placeholder="Titre..." name="title" value="{{$edit_post->title}}" />
                                        </div>

                                        <div class="col-span-2 mb-4 space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">Categorie</label>
                                            <div class="space-x-4">
                                                <select name="category_id" class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded sm:text-sm border-gray-300">
                                                    <option selected disabled>categorie...</option>
                                                    @foreach($categories as $category)
                                                        @if($category->id == $edit_post->category_id)
                                                            <option selected value="{{$category->id}}">{{$category->title}}</option>
                                                        @else
                                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Ajouter Image</label>
                                        <div class="mt-1 flex justify-center px-6 pt-3 pb-4 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                @if($edit_post->images != 'N/A')
                                                    <div class="flex space-x-2">
                                                        @foreach(explode('|', $edit_post->images) as $image)
                                                            <span>
                                                                <img class="rounded mx-auto" src="{{Storage::url($image)}}" alt="" style="width: 20px; height: 20px; object-fit: cover;">
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                @endif
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-gray-600 hover:text-gray-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-gray-500">
                                                    <span>Changer</span>
                                                    <input id="file-upload" name="images[]" multiple type="file" class="sr-only" accept="image/jpeg, image/png, image/gif" value="{{Storage::url($edit_post->images)}}">
                                                    </label>
                                                    <p class="pl-1"> Images PNG, JPG, GIF jusqu'a 10MB</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4 space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">Contenu</label>
                                        <textarea class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded sm:text-sm border-gray-300 resize-none" id="summernote" name="content" cols="30" rows="4" placeholder="Description...">{{$edit_post->content}}</textarea>
                                    </div>

                                    <div class="flex space-x-3 mb-4 text-sm font-medium">
                                        <div class="flex-auto flex space-x-3">
                                            <button class="w-1/8 py-2 px-4 flex items-center justify-center rounded-md bg-gray-500 text-white" type="submit">mettre à jour</button>
                                            <a href="{{route('posts.create')}}" class="w-1/8 py-2 px-4 flex items-center justify-center rounded-md border border-gray-300" type="reset">Annuler</a>
                                        </div>
                                    </div>
                                </form>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
