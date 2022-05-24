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
                    <div class="pt-6 pb-4 bg-white border-b border-gray-200">
                        <div class="px-4 sm:px-0">

                            <div class="mt-1 text-sm text-gray-600">

                                <ul class="divide-y divide-gray-100 overflow-y-auto" style="height: 510px;">
                                    @foreach($abouts as $about)
                                        <li class="p-4 flex space-x-4 hover:bg-gray-100 rounded cursor-pointer">
                                            @if(explode('|', $about->images) > 0)
                                                <img src="{{ Storage::url(explode('|', $about->images)[0]) }}" alt="" class="w-16 h-16 rounded-lg object-cover">
                                            @else
                                                <div class="w-16 h-16 flex items-center bg-gray-500 rounded-lg">
                                                    <small class="w-16 text-center mx-auto text-white">no image</small>
                                                </div>
                                            @endif
                                            <div class="text-gray-500">
                                                <a href="{{route('about.edit', $about->id)}}" class="font-bold text-gray-600 overflow-ellipsis capitalize" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; line-clamp: 1; -webkit-box-orient: vertical;">{{ $about->title }}</a>
                                                <div class="overflow-ellipsis w-full" style="font-size: 12px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{!!$about->content!!}</div>
                                                <hr class="my-2">
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
                        <div class="px-4 pt-8 pb-2 bg-white border-b border-gray-200">

                                @if(request()->routeIs('about.edit'))
                                    <form action="{{route('about.update', $edit_about->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')

                                        <div class="mb-4 w-full space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">Titre</label>
                                            <input class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded sm:text-sm border-gray-300" type="text" placeholder="Titre..." name="title" value="{{ $edit_about->title }}" />
                                        </div>

                                        <div class="grid grid-cols-4 space-x-2">

                                            <div class="col-span-2 mb-4 space-y-2">
                                                <label class="block text-sm font-medium text-gray-700">Categorie</label>
                                                <div class="space-x-4">
                                                    <select name="category" id="category" class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded sm:text-sm border-gray-300">
                                                        <option disabled>Categorie...</option>
                                                        @foreach($abouts as $item)
                                                            @if($item->category === $edit_about->category)
                                                                <option selected value="{{ $item->category }}">{{ $item->title }}</option>
                                                            @else
                                                                <option value="{{ $item->category }}">{{ $item->title }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-span-2">
                                                <label for="file-upload" class="block text-sm font-medium text-gray-700">
                                                    Images
                                                </label>
                                                <input class="w-full border mt-2 border-gray-500" id="file-upload" name="images[]" type="file" accept="image/jpeg, image/png, image/gif" style="font-size: 12px; padding: 6px 12px; border-radius: 0.2rem;" multiple>
                                            </div>

                                        </div>

                                        <div class="mb-4 space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">Contenu</label>
                                            <textarea class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded sm:text-sm border-gray-300 resize-none" id="summernote" name="content" cols="30" rows="4" placeholder="Description...">{{ $edit_about->content }}</textarea>
                                        </div>

                                        <div class="flex space-x-3 mb-4 text-sm font-medium">
                                            <div class="flex-auto flex space-x-3">
                                                <button class="w-1/8 py-2 px-4 flex items-center justify-center rounded-md bg-gray-500 text-white" type="submit">Modifier</button>
                                                <a href="{{ route('about.create') }}" class="w-1/8 py-2 px-4 flex items-center justify-center rounded-md border border-gray-300" type="reset">Annuler</a>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <form action="{{route('about.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('post')

                                        <div class="mb-4 w-full space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">Titre</label>
                                            <input class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded sm:text-sm border-gray-300" type="text" placeholder="Titre..." name="title" />
                                        </div>

                                        <div class="grid grid-cols-4 space-x-2">

                                            <div class="col-span-2 mb-4 space-y-2">
                                                <label class="block text-sm font-medium text-gray-700">Categorie</label>
                                                <div class="space-x-4">
                                                    <select name="category" class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded sm:text-sm border-gray-300">
                                                        <option selected disabled>Categorie...</option>
                                                        <option value="who-are-we">Qui Sommes-nous?</option>
                                                        <option value="activity-range">Rayon d'Activité</option>
                                                        <option value="our-motivation">Motivation de Création</option>
                                                        <option value="our-vision">Notre Vision</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-span-2">
                                                <label for="file-upload" class="block text-sm font-medium text-gray-700">
                                                    Images
                                                </label>
                                                <input class="w-full border mt-2 border-gray-500" id="file-upload" name="images[]" type="file" accept="image/jpeg, image/png, image/gif" style="font-size: 12px; padding: 6px 12px; border-radius: 0.2rem;" multiple>
                                            </div>

                                        </div>

                                        <div class="mb-4 space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">Contenu</label>
                                            <textarea class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded sm:text-sm border-gray-300 resize-none" id="summernote" name="content" cols="30" rows="4" placeholder="Description..."></textarea>
                                        </div>

                                        <div class="flex space-x-3 mb-4 text-sm font-medium">
                                            <div class="flex-auto flex space-x-3">
                                                <button class="w-1/8 py-2 px-4 flex items-center justify-center rounded-md bg-gray-500 text-white" type="submit">Publier</button>
                                                <a href="{{ route('about.create') }}" class="w-1/8 py-2 px-4 flex items-center justify-center rounded-md border border-gray-300" type="reset">Annuler</a>
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
