<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <title>Inscription</title>
</head>
<body>
    <div class="flex">
        <div class="bg-gray-200 w-1/2 h-screen bg-cover bg-no-repeat bg-center"
            style="background-image: url({{asset('images/bgCouverture2.jpg')}})">
            <div>
                <a href="{{ route('login') }}">
                    
                <img  src="{{asset('images/returnBlack.png')}}"
                class="w-12 h-12 ml-2 mt-2 transform hover:scale-110 motion-reduce:transform-none">
                </a>
            </div>
        </div>    
            <!--Formulaire-->
            <div class=" w-1/2">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
            <!--Image-->
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
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                                </div>
                            </div>
                        </div>
    
                        <!--Prenom-->
    
                        <div
                            class="border-l-4 border-red-500 hover:border-blue-600 flex w-2/6  shadow-lg mx-auto  transform hover:scale-110 motion-reduce:transform-none">
                            <div class="w-full">
                                <div class="relative">
                                    <input
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
                                        value="{{ old('email') }}" required autocomplete="email" placeholder="iuc@gmail.com">

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
    
                    <div class="flex">
    
                        <!--Password-->
    
                        <div
                            class="border-l-4 border-red-500 hover:border-blue-600 flex w-2/6  shadow-lg mx-auto mt-6 transform hover:scale-110 motion-reduce:transform-none">
                            <div class="w-full">
                                <div class="relative">
                                    <input
                                        class=" border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('password') border-red-500 @enderror"
                                        id="password" type="password" name="password"
                                        required autocomplete="new-password" placeholder="mot de passe">

                                        @error('password')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                </div>
                            </div>
                        </div>
    
                        <!--Confirme Password-->
                        <div
                            class="border-l-4 border-red-500 hover:border-blue-600 flex w-2/6  shadow-lg mx-auto mt-6 transform hover:scale-110 motion-reduce:transform-none">
                            <div class="w-full">
                                <div class="relative">
                                    <input
                                        class=" border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4"
                                        id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmer mot de passe">
                                </div>
                            </div>
                        </div>
    
                    </div>
    
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
                    <!--button valider-->
                    <div>
                        <div class="flex mt-6 ">
                            <div class="mx-auto transform hover:scale-110 motion-reduce:transform-none">
                                <input type="submit"
                                    class="h-12  rounded-full text-sm text-white  hover:bg-red-500 shadow-lg w-48 text-center font-bold bg-blue-600"
                                    name="submit" value="Inscription" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>