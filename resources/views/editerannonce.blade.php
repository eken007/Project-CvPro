<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <title>Annonce</title>
</head>
<body>
    <div class="min-h-screen bg-gray-100  flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="relative px-4 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                <div class="max-w-md mx-auto">
    
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <p ><strong>Vous editer l'annonce</strong> <strong class="bg-gray-600 rounded-lg text-white px-2 py-2">#{{ $annonce->id }}</strong></p>
                            <form  action="{{ route('modifierAnnonce',$annonce->id) }}"  method="POST">
                            @csrf
                            @method('PUT')
                            <div class="flex flex-col">
                                <label class="leading-loose">Titre</label>
                                <input maxlength="55"  type="text" name="titre" id="titre"
                                    class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                    placeholder="donner un titre" value="{{ old('name', $annonce->titre) }}">
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Ville</label>
                                <input type="text" maxlength="30"  name="ville" id="ville"
                                    class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                    placeholder="Ville" value="{{ old('name', $annonce->ville) }}">
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Type d'annonce</label>
                                <!-- This is an example component -->
                                <div class="relative inline-flex">
                                    <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232">
                                        <path
                                            d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z"
                                            fill="#648299" fill-rule="nonzero" />
                                    </svg>
                                    <select name="type" id="type" 
                                        class="border border-gray-300 rounded-md text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                        <option >Embauche</option>  
                                        <option>stage</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="flex flex-col">
                                    <label class="leading-loose">date limite</label>
                                    <div class="relative focus-within:text-gray-600 text-gray-400">
                                        <input value="{{ old('name', $annonce->datelimit) }}" type="date" name="datelimit" id="datelimit"
                                            class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                        <div class="absolute left-3 top-2">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose">Categorie</label>
                                    <!-- This is an example component -->
                                    <div class="relative inline-flex">
                                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232">
                                            <path
                                                d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z"
                                                fill="#648299" fill-rule="nonzero" />
                                        </svg>
                                        <select name="categorie" id="categorie"
                                            class="border border-gray-300 rounded-md text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                            <option>Choisir la categorie</option>
                                            <option>secretaire</option>
                                            <option>programmeur</option>
                                            <option>comptable</option>
                                            <option>DRH</option>
                                            <option>Reseauticien</option>
                                            <option>Electricien</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Description</label>
                                <textarea maxlength="250"  type="text" name="description" id="description"
                                    class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                    placeholder="Ecrire ici...">{{ old('name', $annonce->description) }}</textarea>
                            </div>
                        </div>
                        <div class="pt-4 flex items-center space-x-4">
                            <a href="{{ route('emploie') }}"
                                class="bg-red-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg> Cancel
                            </a>
                            <button type="submit"
                                class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Create</button>
                        </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>