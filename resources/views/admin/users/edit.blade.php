@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Modifier <strong>{{ $user->name }}</strong>
            </header>
            <form action="{{ route('admin.users.update',$user) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="h-auto w-full">
                    <div class="overflow-hidden w-full h-auto relative" >
                        <div class="profil-pic-div overflow-hidden mt-1 w-48 h-48 bg-blue-500 rounded-full mx-auto shadow-lg ">
                            <img id="photo" src="{{ asset('images/profil.png') }}" class="  w-48 h-48 object-cover  bg-gray-300  " />
                            <input type="file" name="avatar" id="avatar" class=" w-8 h-8 mx-auto bg-cover bg-no-repeat" style=" display : none" >
                            <label for="avatar" id="uploadBtn" class=" w-48 h-16 mx-auto grid justify-items-center  transform -translate-y-12 translate-x-1 text-white bg-black opacity-0 hover:opacity-70 cursor-pointer">Ajoute une image</label> 
                        </div>
                    </div>
                    
                   <script src="{{asset('js/script.js')}}"></script>
    
                    <!--Nom et Prenom-->
                    <div class="flex">
    
                        <!--Nom-->
    
                        <div
                            class="border-l-4 border-red-500 hover:border-blue-600 flex w-2/6  shadow-lg mx-auto  transform hover:scale-110 motion-reduce:transform-none">
                            <div class="w-full">
                                <div class="relative">
                                    <input id="name" type="text"
                                        class=" border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('name')  border-red-500 @enderror"
                                        name="name" value="{{ old('name') ?? $user->name }} " required autocomplete="name" autofocus placeholder="Name">
                                </div>
                            </div>
                        </div>
    
                        <!--Prenom-->
    
                        <div
                            class="border-l-4 border-red-500 hover:border-blue-600 flex w-2/6  shadow-lg mx-auto  transform hover:scale-110 motion-reduce:transform-none">
                            <div class="w-full">
                                <div class="relative">
                                    <input
                                       value="{{ old('prenom') ?? $user->prenom }}"
                                        class=" border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4"
                                        id="prenom" name="prenom" type="text" placeholder="Prenom">
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!--Email et Numero-->
    
                    <div >
    
                        <!--Email-->
    
                        <div
                            class="border-l-4 border-red-500   hover:border-blue-600 flex w-2/6  mt-6 shadow-lg mx-auto transform hover:scale-110 motion-reduce:transform-none">
    
                            <div class="w-full">
                                <div class="relative">
                                    <input
                                        class=" border-0 bg-transparent appearance-none  focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('email') border-red-500 @enderror"
                                        id="email" type="email" name="email"
                                        value="{{ old('email') ?? $user->email }}" required autocomplete="email" placeholder="iuc@gmail.com">

                                        @error('email')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                </div>
                            </div>
                        </div>
    
                        <!--Numero
    
                        <div
                            class="border-l-4 border-red-500 hover:border-blue-600 flex w-2/6  shadow-lg mx-auto mt-6 transform hover:scale-110 motion-reduce:transform-none">
                            <div class="w-full">
                                <div class="relative">
                                    <input
                                        class=" border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4"
                                        name="Numero" type="number" placeholder="Numero">
                                </div>
                            </div>
                        </div>
                    </div>
                     -->
                    <!--Password et Confirme password-->

    
                    <!--Description
    
                    <div class="h-auto w-5/6 mx-auto">
                        <div class="flex flex-col border-l-4 border-red-500 hover:border-blue-600  w-full  shadow-lg mx-auto mt-6 transform hover:scale-110 motion-reduce:transform-none">
                            <textarea type="text"
                                class=" h-24 border-0 px-4 py-2 focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 focus:outline-none text-gray-600 appearance-none  bg-transparent block  min-w-full "
                                placeholder="Description..."></textarea>
                        </div>
                    </div>
                    -->
                    <!--ajouter Fichier
                    <div class="w-5/6 mx-auto h-auto ">
                        <div >
                            <input class="mt-6 " type="file" id="avatar" name="avatar" accept=".pdf">
                        </div>
                    </div>
                    -->
            </div>
            <div class="h-auto  w-5/6 mt-4 mx-auto">
                @foreach ($roles as $role)
                <label for="{{ $role->id }}" class="items-center mt-3 ">
                    <input type="radio" class="form-checkbox border-2 h-5 w-5 text-gray-600" name="roles[]" value="{{ $role->id }}" id="{{ $role->id }}"
                     @if ($user->roles->pluck('id')->contains($role->id)) checked
                         
                     @endif
                        ><span class="ml-2 text-gray-700">{{ $role->name }}</span>
                </label>
                @endforeach
            </div>
    <!--button valider-->
            <div class="h-auto w-full grid justify-items-center mt-4">
                <button  class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Modifier les informations</button>
            </div>
            </form>

        </section>
    </div>
</main>
@endsection
