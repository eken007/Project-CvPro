<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="leading-loose">
        <form action="{{ Route('depotcv') }}" enctype="multipart/form-data" method="POST"
            class="max-w-xl m-4 p-10 bg-white rounded shadow-xl mx-auto ">
            @csrf
            <div class="w-full ">
                <div class="grid justify-items-center">
                    @if (Auth::user()->avatar == null)
                        <img src="{{ asset('images/profil.png') }}"
                            class="w-32 h-32 rounded-full object-center object-cover" />
                    @else
                        <img src="{{ asset('/storage/images/' . Auth::user()->avatar) }}"
                            class="w-32 h-32 rounded-full object-center object-cover" />
                    @endif
                    <p class="text-2xl font-serif mt-3">{{ Auth::user()->name }}</p>
                </div>
            </div>

            <!--Description-->

            <div class="h-auto w-full mx-auto">
                <div class="flex flex-col   w-full mx-auto mt-6">
                    <textarea maxlength="250" minlength="50" type="text" name="description" id="description"
                        class=" h-24 border-0 px-4 py-2 bg-gray-200 focus:ring-gray-500 w-full sm:text-sm border-gray-300 focus:outline-none text-gray-600 appearance-none  bg-transparent block  min-w-full "
                        placeholder="Description..."></textarea>
                </div>
            </div>

            <div class="inline-block mt-2 w-1/2 pr-1">
                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="numero" name="numero" type="text"
                    required="" placeholder="Numero de telephone">
            </div>
            <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                <div class="flex flex-col">
                    <!-- This is an example component -->
                    <div class="relative inline-flex">
                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232">
                            <path
                                d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z"
                                fill="#648299" fill-rule="nonzero" />
                        </svg>
                        <select name="categorie" id="categorie"
                            class="border border-gray-300 rounded-md text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none w-full">
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
            <!--ajouter Fichier-->
            <div class="w-full mx-auto h-auto ">
                <div>
                    <input class="mt-6 " type="file" id="file" name="file" accept=".pdf">
                </div>
            </div>
            <div class="w-full  mt-4 flex">
                <div class="w-auto flex mx-auto">
                    <div>
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-red-500 rounded"
                            type="submit"><a href="{{ route('accueil') }}">Annuler</a></button>
                    </div>
                    <div class="ml-4">
                        <button type="submit" class="px-4 py-1 text-white font-light tracking-wider bg-blue-500 rounded"
                            type="submit">deposer</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</body>

</html>
