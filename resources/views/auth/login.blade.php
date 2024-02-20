<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <title>Connexion</title>
</head>
<body>
    <div class="flex">
        <div class="bg-gray-200 w-2/5 h-screen bg-cover bg-no-repeat bg-center" style="background-image: url({{asset('images/entreprise.jpg')}})">
          
        </div>
        <div class=" w-3/5">
            <div class="w-full mt-8">
                <p class="text-right mr-8 text-sm text-gray-500">Connexion projet cs2i 3</p>
            </div>
            <div class="w-full mt-12">
                <p class="text-center text-gray-600 font-bold text-4xl tracking-widest">Bienvenue sur CvPro</p>
            </div>
            <div class="w-full mt-6">
                <p class="text-center  text-sm text-gray-500">Rejoindre la communaute de plusieurs <br> chefs d'entreprise. Faite jouer votre Cv</p>
            </div>
    
                     <!--Email-->
    
             <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class=" mt-16 ">
                    <div class="border-l-4 border-gray-900   hover:border-blue-600 flex w-3/6  shadow-lg mx-auto transform hover:scale-110 motion-reduce:transform-none">
                        
                        <div  class="w-full">
                                    <div class="relative">
                                        <input class="border-0 bg-transparent appearance-none  focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('email') border-red-500 @enderror" value="{{ old('email') }}" name="email" id="email" type="email" placeholder="iuc@gmail.com" required autocomplete="email">
                                        @error('email')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                        </div>
                    </div> 
                                      
                    <!--Password-->
    
                    <div class="border-l-4 border-gray-900 hover:border-blue-600 flex w-3/6  shadow-lg mx-auto mt-6 transform hover:scale-110 motion-reduce:transform-none">
                        <div class="w-full">
                                    <div class="relative">
                                        <input class="border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('password') border-red-500 @enderror" name="password" id="password" type="password" placeholder="password" required>
                                        @error('password')
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                        @if (Route::has('password.request'))
                                            <a class="absolute hover:text-blue-500 text-sm top-0 right-0 mt-4 mr-2" href="{{ route('password.request') }}">Oublier</a>
                                        @endif
                                    </div>
                        </div>
                    </div>

                    <!--remenber check-->
                    <div class="w-full h-auto mt-4">
                        <div class="w-3/6 h-auto mx-auto">
                            <input type="checkbox" name="remember" id="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                            {{ old('remember') ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-600">
                                se rappeler de moi
                            </span>
                      </div>
                    </div>
    
                                    <!--btn connexion-->
                                <div class="flex mt-6 " >
                                        <div class="mx-auto transform hover:scale-110 motion-reduce:transform-none">
                                            <input type="submit" class="h-12 bg-blue-600  rounded-full text-sm text-white  hover:bg-blue-300 shadow-lg w-48 text-center font-bold" name="submit" value="Connexion" />  
                                        </div>
                                </div>
                            <div class="flex w-full mt-12 ">
                                <a href="{{ route('choix') }}" class="flex absolute top-0 left-0 ml-8 text-sm text-gray-600 font-bold font-serif">
                                    <img class="" src="{{asset('images/returnBlack.png')}}"/>
                                </a>
                                @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="flex absolute right-0 mr-8 text-sm text-gray-600 font-bold font-serif">Creer compte
                                    <img class="h-5 ml-2" src="{{asset('images/enter.png')}}">
                                </a>
                        @endif
                    </div>
                </div>
            </form>    
        </div>
    </div>
</body>
</html>