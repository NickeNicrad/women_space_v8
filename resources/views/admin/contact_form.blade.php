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
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-4 bg-white border-b border-gray-200">

                        <div class="flex justify-between items-center bg-gray-50 px-4 py-3 sm:px-6 sm:flex mb-4">
                            <h4 class="text-gray-700">Partenaires</h4>
                            <button id="show-modal" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-2 py-1 bg-gray-400 text-base font-thin text-white hover:bg-gray-500 focus:outline-none focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </button>
                        </div>

                        <div class="overflow-x-scroll flex">
                            @foreach($partners as $partner)
                                <div class="flex-none px-3 first:pl-6 last:pr-6 group">
                                    <div class="flex flex-col items-center justify-center gap-2 relative">
                                        <img class="w-16 h-16 border rounded-full object-cover" src="{{ Storage::url($partner->logo) }}"/>
                                        <strong class="text-slate-900 text-xs font-medium dark:text-slate-400">{{ $partner->name }}</strong>
                                        <form action="{{route('partners.destroy', $partner->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('etes-vous sure de vouloir supprimer cet article?')" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 hidden group-hover:block text-red-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 bg-white border-b border-gray-200">

                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex mb-4">
                            <h4 class="text-gray-700">Liens HyperText</h4>
                        </div>

                        <form action="{{ route('links.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            <div class="mb-4 w-full space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Titre</label>
                                <input class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded sm:text-sm border-gray-300" type="text" placeholder="Titre..." name="title" />
                            </div>

                            <div class="mb-4 w-full space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Lien</label>
                                <input class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded sm:text-sm border-gray-300" type="text" placeholder="Lien..." name="link" />
                            </div>

                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-400 text-base font-medium text-white hover:bg-gray-500 focus:outline-none focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Créer</button>

                                <button type="reset" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Annuler</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

            <div class="md:col-span-1">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 bg-white border-b border-gray-200">

                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex mb-4">
                            <h4 class="text-gray-700">Contacts</h4>
                        </div>

                        <form action="{{route('contact.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            <div class="mb-4 w-full space-y-2">
                                <label class="block text-sm font-medium text-gray-700">E-Mail</label>
                                <input class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded sm:text-sm border-gray-300" type="email" value="{{ $address->email ?: '' }}" placeholder="E-Mail..." name="email" />
                            </div>

                            <div class="mb-4 w-full space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Téléphone</label>
                                <input class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded sm:text-sm border-gray-300" type="tel" value="{{ $address->phone ?: '' }}" placeholder="Téléphone..." name="phone" />
                            </div>

                            <div class="mb-4 w-full space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Localisation</label>
                                <input class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded sm:text-sm border-gray-300" type="text" value="{{ $address->location ?: '' }}" placeholder="Localisation..." name="location" />
                            </div>

                            <div class="mb-4 w-full space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Adresse Physique</label>
                                <textarea class="focus:ring-gray-500 focus:border-gray-500 flex-1 block w-full rounded sm:text-sm border-gray-300" name="address" placeholder="Adresse Physique..." cols="30" rows="5">{{ $address->address ?: '' }}</textarea>
                            </div>

                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-400 text-base font-medium text-white hover:bg-gray-500 focus:outline-none focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Mettre à jour</button>

                                <button type="reset" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Annuler</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

            <div class="md:col-span-1">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 bg-white border-b border-gray-200">

                        <img src="/log/baseLogo.png" style="height: 160px; width: 100%; object-fit: cover;" alt="">

                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex mb-4">
                            <h4 class="text-gray-700">Détailles</h4>
                        </div>

                        <div>
                            <h6>Contacts</h6>

                            <ul class="p-4 pt-1">
                                <li><small>Localisation: <b>{{ucfirst($address->location ?: '')}}</b></small></li>
                                <li><small>Téléphone:
                                    @foreach(explode('|', $address->phone) as $phone)
                                        <b>{{$phone ?: ''}}</b>
                                    @endforeach
                                </small></li>
                                <li><small>Adresse Electronique: <b>{{$address->email ?: ''}}</b></small></li>
                                <li><small>Adresse Physique: <b>{{ucwords($address->address ?: '')}}</b></small></li>
                            </ul>
                        </div>

                        <div>
                            <h6>Liens</h6>

                            <ul class="p-4 pt-1">
                                @foreach($links as $link)
                                    <li class="flex justify-between">
                                        <a href="{{$link->link}}" target="_blank">
                                            <small>{{ucfirst($link->title)}}: <b>{{$link->link}}</b></small>
                                        </a>
                                        <form action="{{route('links.destroy', $link->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('etes-vous sure de vouloir supprimer ce lien?')" class="text-red-500 hover:text-red-400 font-bold rounded-r">
                                                &times;
                                            </button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.partner_form')

</x-app-layout>
