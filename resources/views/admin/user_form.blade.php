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

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-40 py-4">
        <div class="md:grid md:grid-cols-2 space-x-4">
            <div class="md:col-span-1">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-4 bg-white border-b border-gray-200">

                        <div class="flex justify-between items-center bg-gray-50 px-4 py-3 sm:px-6 sm:flex mb-4">
                            <h4 class="text-gray-700">Utilisateurs</h4>
                        </div>

                        <div class="relative">
                            @foreach($users as $user)
                                <div class="flex cursor-pointer gap-2 my-1 hover:bg-blue-lightest rounded">
                                    <div class="text-center py-1">
                                        @if($user->avatar === 'N/A' || $user->avatar === '')
                                            <div class="w-16 h-16 flex items-center bg-indigo-500 rounded-full">
                                                <small class="w-16 text-center mx-auto text-white">no image</small>
                                            </div>
                                        @else
                                            <img class="w-18 h-16 rounded-full object-cover border" src="{{ Storage::url($user->avatar) }}" alt="{{ ucwords($user->name) }}">
                                        @endif
                                    </div>
                                    <div class="w-4/5 h-10 py-3 px-1">
                                        <a href="#" class="hover:text-blue-dark">{{ ucwords($user->name) }}</a>
                                        <br>
                                        <small>{{ ucwords($user->email) }}</small>
                                    </div>
                                    <div class="w-1/5 h-10 text-right p-3">
                                        <p class="text-sm text-grey-dark">{{ ucwords($user->role) }}</p>
                                        <form action="{{route('users.destroy', $user->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" id="user-id" onclick="return confirm('etes-vous sure de vouloir supprimer cet article?')" class="text-red-300 hover:text-red-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:col-span-1">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-4 bg-white border-b border-gray-200">

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('new-user') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">

                                </label>
                                <div class="mt-2 flex items-center">
                                    <span class="inline-block h-16 w-16 rounded-full overflow-hidden bg-gray-100">
                                        <img class="h-16 w-16 text-gray-300 object-cover" id="preview-image-before-upload" src="" alt="">
                                    </span>
                                    <label for="file-upload" class="relative cursor-pointer bg-white font-medium focus-within:outline-none">
                                        <span class="ml-5 bg-white py-2 px-2 border border-gray-300 rounded-md shadow-sm text-xs leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Changer Image</span>
                                        <input id="file-upload" name="avatar" type="file" class="sr-only" hidden>
                                    </label>
                                </div>
                            </div>

                            <!-- Name -->
                            <div>
                                <x-label for="name" :value="__('Nom Complet')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')" />

                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-label for="password" :value="__('Mot de Passe')" />

                                <x-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                required autocomplete="new-password" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-label for="password_confirmation" :value="__('Confirmer Mot de Passe')" />

                                <x-input id="password_confirmation" class="block mt-1 w-full"
                                                type="password"
                                                name="password_confirmation" required />
                            </div>

                            <input type="text" name="role" value="user" hidden>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4">
                                    {{ __('Enregistrer') }}
                                </x-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">

    $(document).ready(function (e) {
        $('#file-upload').change(function(){
            let reader = new FileReader();

            reader.onload = (e) => {
                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });

</script>
