@extends('layouts.app')
@section('content')
    <div class="w-full h-auto px-60 py-2 mx-auto ">
        <!--Detail de la personne-->
             <!--photo-->
        <div class="w-full h-auto ">
            <form action="{{Route('savcreatecv')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <label class=" text-gray-400 text-3xl">Details Personnels</label>
            <div class="flex p-2 mt-6">
                <div class="overflow-hidden w-full h-auto relative" >
                    <div class="profil-pic-div overflow-hidden mt-1 w-32 h-32 bg-blue-500 rounded-full mx-auto shadow-lg ">
                        <img id="photo" src="{{ asset('images/profil.png') }}" class="  w-32 h-32 object-cover  bg-gray-300  " />
                        <input type="file" name="avatar" id="avatar" class=" w-8 h-8 mx-auto bg-cover bg-no-repeat" style=" display : none" >
                        <label for="avatar" id="uploadBtn" class=" w-32 text-xs h-16 mx-auto grid justify-items-center  transform -translate-y-12 translate-x-1 text-white bg-black opacity-0 hover:opacity-70 cursor-pointer">Ajoute une image</label> 
                    </div>
                    <script src="{{asset('js/script.js')}}"></script>
                </div>
                     <!--Nom, Prenom, Email-->
                <div class="w-4/5 h-32 ml-3 ">
                    <div class="flex w-full space-x-3">
                        <div class="w-1/2">
                            <input class="bg-gray-300 border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('name') border-red-500 @enderror" name="name" id="name" type="text" placeholder="Nom" required>
                        </div>
                        <div class="w-1/2">
                            <input class="bg-gray-300 border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('prenom') border-red-500 @enderror" name="prenom" id="prenom" type="text" placeholder="Prenom" required>
                        </div>
                    </div>
                    <div class="mt-3">
                        <input class="bg-gray-300 border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('email') border-red-500 @enderror" name="email" id="email" type="text" placeholder="Email" required>
                    </div>
                </div>
            </div>
                    <!--Numero telephone, ville, quartier, objectif-->
            <div class="mt-3">
                <input class="bg-gray-300 border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('email') border-red-500 @enderror" name="numero" id="numero" type="text" placeholder="Numero" required>
            </div>
            <div class="mt-3">
                <input class="bg-gray-300 border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('email') border-red-500 @enderror" name="villepersonne" id="villepersonne" type="text" placeholder="Ville" required>
            </div>
            <div class="mt-3">
                <input class="bg-gray-300 border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('email') border-red-500 @enderror" name="quartierpersonne" id="quartierpersonne" type="text" placeholder="Quartier" required>
            </div>
            <div class="mt-3">
                <label class="text-gray-500">Vos objectifs</label>
                <textarea type="text" class="bg-gray-300 border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 h-24 focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300" name="objectif" id="objectif">
                </textarea>
            </div>
        </div>

        <!--Experience professionel-->
        <div>
            <div class="w-full h-auto mt-6">
                <label class=" text-gray-400 text-3xl ">Experience professionel</label>
            </div>
                <div class="mt-3">
                    <input class="bg-gray-300 border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('email') border-red-500 @enderror" name="poste" id="poste" type="text" placeholder="Poste" required>
                </div>
                <div class="flex w-full space-x-3 mt-3">
                    <div class="w-1/2">
                        <input class="bg-gray-300 border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('name') border-red-500 @enderror" name="employeur" id="employeur" type="text" placeholder="Employeur" required>
                    </div>
                    <div class="w-1/2">
                        <input class="bg-gray-300 border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('prenom') border-red-500 @enderror" name="villetravail" id="villetravail" type="text" placeholder="Ville" required>
                    </div>
                </div>
                <div class="flex w-full space-x-3 mt-3">
                    <div class="w-1/2">
                        <label class="text-gray-400" >Date de debut</label>
                        <input class="bg-gray-300 border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('name') border-red-500 @enderror" name="datedebuttravail" id="datedebuttravail" type="date"  required>
                    </div>
                    <div class="w-1/2">
                        <label class="text-gray-400" >Date de fin</label>
                        <input class="bg-gray-300 border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('prenom') border-red-500 @enderror" name="datefintravail" id="datefintravail" type="date"  required>
                    </div>
                </div>
                <div class="mt-3">
                    <label class="text-gray-500">Description du travail</label>
                    <textarea type="text"
                    class="bg-gray-300 h-24 border-0 px-4 py-2 focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 focus:outline-none text-gray-600 appearance-none  bg-transparent block  min-w-full " name="descriptiontravail" id="descriptiontravail">
                </textarea>
                </div>
        </div>
                <!--Formation Academique-->
         <div>
                    <div class="w-full h-auto mt-6">
                        <label class=" text-gray-400 text-3xl ">Formation academique</label>
                    </div>
                        <div class="mt-3">
                            <input class="bg-gray-300 border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('email') border-red-500 @enderror" name="formation" id="formation" type="text" placeholder="Formation" required>
                        </div>
                        <div class="flex w-full space-x-3 mt-3">
                            <div class="w-1/2">
                                <input class="bg-gray-300 border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('name') border-red-500 @enderror" name="etablissement" id="etablissement" type="text" placeholder="Etablissement" required>
                            </div>
                            <div class="w-1/2">
                                <input class="bg-gray-300 border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('prenom') border-red-500 @enderror" name="villeformation" id="villeformation" type="text" placeholder="Ville" required>
                            </div>
                        </div>
                        <div class="flex w-full space-x-3 mt-3">
                            <div class="w-1/2">
                                <label class="text-gray-400" >Date de debut</label>
                                <input class="bg-gray-300 border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('name') border-red-500 @enderror" name="datedebutformation" id="datedebutformation" type="date"  required>
                            </div>
                            <div class="w-1/2">
                                <label class="text-gray-400" >Date de fin</label>
                                <input class="bg-gray-300 border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 @error('prenom') border-red-500 @enderror" name="datefinformation" id="datefinformation" type="date"  required>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="text-gray-500">Description de la formation</label>
                            <textarea type="text" class="bg-gray-300 border-0  bg-transparent appearance-none block focus:outline-none text-gray-600 px-2 min-w-full py-4 h-24 focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300" name="descriptionformation" id="descriptionformation">
                            </textarea>
                        </div>
        </div>
        <div class="mt-3 w-full grid justify-items-center ">
            <button type="submit" class=" px-2 py-2 w-32 rounded-xl bg-blue-500 text-white">Creer</button>
        </div>
    </form>
    </div>
@endsection