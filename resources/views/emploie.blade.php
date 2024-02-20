@extends('layouts.app')
@section('content')
    <!-- component -->
    <div class="bg-gray-100 ">

        <div class="px-6 py-8">
            <div class="flex justify-between container mx-auto">
                <div class="w-full lg:w-8/12">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl text-center">Post</h1>

                    </div>
                    @foreach ($annonces as $annonce)
                        <div class="mt-6">
                            <div class="max-w-4xl px-10 py-6 @if ($annonce->type == 'Embauche') bg-red-200 @else bg-blue-200 @endif rounded-lg shadow-md">
                                <div class="text-2xl text-gray-700 font-bold hover:underline">{{ $annonce->type }}</div>
                                <div class="flex relative w-full items-center"><span
                                        class="font-light text-gray-600">jusqu'au {{ $annonce->datelimit }}</span>
                                    <div class="absolute right-0 space-x-3 flex ">
                                        @guest

                                        @else
                                            @if ($annonce->creator_id == Auth::user()->id)
                                                <form action="{{ route('supprimerAnnonce', $annonce->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class=" min-w-min-content px-2 py-1 bg-red-600 text-gray-100 font-bold rounded hover:bg-blue-600">Supprimer</button>
                                                </form>
                                            @endif
                                            @if ($annonce->creator_id == Auth::user()->id)
                                                <button><a href="{{ route('editeAnnonce', $annonce->id) }}"
                                                        class="px-2 py-1 bg-yellow-400 text-gray-100 font-bold rounded hover:bg-red-500">Editer</a></button>
                                            @endif
                                        @endguest

                                        @can('employee-admin')
                                            <button
                                                class="px-2 py-1 bg-blue-600 text-gray-100 font-bold rounded hover:bg-yellow-400"><a
                                                    href="{{ route('sendMail', $annonce->id) }}">Postuler</a></button>
                                        @endcan
                                    </div>
                                </div>
                                <div class="mt-2"><a href="#"
                                        class="text-2xl text-gray-700 font-bold hover:underline">{{ $annonce->titre }} A
                                        {{ $annonce->ville }}</a>
                                    <p class="mt-2 text-gray-600">{{ $annonce->description }}</p>
                                </div>
                                <div class="flex justify-between items-center mt-4">
                                    <div><a href="#" class="flex items-center">
                                            @foreach ($users as $user)
                                                @if ($annonce->creator_id == $user->id)
                                                    @if ($user->avatar == null)
                                                        <img src="{{ asset('images/profil.png') }}" alt="avatar"
                                                            class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block">
                                                    @else
                                                        <img src="{{ asset('storage/images/' . $user->avatar) }}"
                                                            alt="avatar"
                                                            class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block">
                                                    @endif

                                                    <h1 class="text-gray-700 font-bold hover:underline">

                                                        {{ $user->name }} {{ $user->prenom }}
                                                @endif
                                                </h1>
                                            @endforeach
                                        </a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="mt-8">
                        {{ $annonces->links() }}
                    </div>
                </div>
                <div class="-mx-8 w-4/12 hidden lg:block">
                    <div class="px-8">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">Employeur</h1>
                        <div class="flex flex-col bg-white max-w-sm px-6 py-4 mx-auto rounded-lg shadow-md">
                            <ul class="-mx-4">
                                @foreach ($users as $user)
                                    @foreach ($roles as $role)
                                        @if ($user->roles->pluck('id')->contains($role->id) && $role->name == 'entreprise')
                                            <li class="flex items-center mt-6">
                                                @if ($user->avatar == null)
                                                <img
                                                src="{{ asset('images/profil.png') }}" alt="avatar"
                                                class="w-10 h-10 object-cover rounded-full mx-4">  
                                                @else
                                                  <img
                                                    src="{{ asset('storage/images/' . $user->avatar) }}" alt="avatar"
                                                    class="w-10 h-10 object-cover rounded-full mx-4">  
                                                @endif
                                                <p>
                                                    <a href="#"
                                                        class="text-gray-700 font-bold mx-1 hover:underline">{{ $user->name }}</a><span
                                                        class="text-gray-700 text-sm font-light">A publie
                                                        {{ $annonces->count() }}
                                                        annonces</span>
                                                </p>
                                            </li>
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="mt-10 px-8">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">Categories</h1>
                        <div class="flex flex-col bg-white px-4 py-6 max-w-sm mx-auto rounded-lg shadow-md">
                            <ul>
                                <li><a href="{{ route('emploie') }}"
                                        class="text-gray-700 font-bold mx-1 hover:text-gray-600 hover:underline">-
                                        Toutes les annonces</a></li>
                                @can('entreprise-admin')
                                    <li class="mt-2"><a href="{{ route('mesAnnonces') }}"
                                            class="text-gray-700 font-bold mx-1 hover:text-gray-600 hover:underline">-
                                            Mes annonces</a></li>
                                @endcan
                                <li class="mt-2"><a href="{{ route('embauche') }}"
                                        class="text-gray-700 font-bold mx-1 hover:text-gray-600 hover:underline">-
                                        Embauche</a>
                                </li>
                                <li class="mt-2"><a href="{{ route('stage') }}"
                                        class="text-gray-700 font-bold mx-1 hover:text-gray-600 hover:underline">-
                                        Stage</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-10 px-8">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">Dernier publication</h1>
                        @if ($recent == true)
                            <div class="flex flex-col bg-white px-8 py-6 max-w-sm mx-auto rounded-lg shadow-md">
                                <div class="flex justify-center items-center">
                                    @guest

                                    @else
                                        <a href="#"
                                            class="px-2 py-1 bg-blue-600 text-sm text-green-100 rounded hover:bg-red-500">Postuler</a>
                                    @endguest

                                </div>
                                <div class="mt-4"><a href="#"
                                        class=" text-justify text-md w-full  text-gray-700  hover:underline">
                                        {{ $recent->titre }}
                                    </a></div>
                                <div class="flex justify-between items-center mt-4">
                                    <div class="flex items-center">
                                        @foreach ($users as $user)
                                            @if ($recent->creator_id == $user->id)
                                                <img src="{{ asset('storage/images/' . $user->avatar) }}" alt="avatar"
                                                    class="w-8 h-8 object-cover rounded-full"><a href="#"
                                                    class="text-gray-700 text-sm mx-3 hover:underline">{{ $user->name }}</a>
                                    </div>
                                    <span class="font-light text-sm text-gray-600">{{ $recent->datelimit }}</span>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    </div>
    <!--Footer-->

    <div class=" w-full h-28 mt-4 bg-back ">
        <div class="bg-black">
            <div class="max-w-6xl m-auto text-white flex flex-wrap justify-center">
                <div class="p-5 w-48 ">
                    <div class="text-xs uppercase text-white font-medium">Home</div>
                    <a class="my-3 block" href="/#">Services <span class="text-teal-600 text-xs p-1"></span></a><a
                        class="my-3 block" href="/#">Products <span class="text-teal-600 text-xs p-1"></span></a><a
                        class="my-3 block" href="/#">About Us <span class="text-teal-600 text-xs p-1"></span></a><a
                        class="my-3 block" href="/#">Pricing <span class="text-teal-600 text-xs p-1"></span></a><a
                        class="my-3 block" href="/#">Partners <span class="text-teal-600 text-xs p-1">New</span></a>
                </div>
                <div class="p-5 w-48 ">
                    <div class="text-xs uppercase text-white font-medium">User</div>
                    <a class="my-3 block" href="/#">Sign in <span class="text-teal-600 text-xs p-1"></span></a><a
                        class="my-3 block" href="/#">New Account <span class="text-teal-600 text-xs p-1"></span></a><a
                        class="my-3 block" href="/#">Demo <span class="text-teal-600 text-xs p-1">New</span></a><a
                        class="my-3 block" href="/#">Career <span class="text-teal-600 text-xs p-1">We're
                            hiring</span></a><a class="my-3 block" href="/#">Surveys <span
                            class="text-teal-600 text-xs p-1">New</span></a>
                </div>
                <div class="p-5 w-48 ">
                    <div class="text-xs uppercase text-white font-medium">Resources</div>
                    <a class="my-3 block" href="/#">Documentation <span class="text-teal-600 text-xs p-1"></span></a><a
                        class="my-3 block" href="/#">Tutorials <span class="text-teal-600 text-xs p-1"></span></a><a
                        class="my-3 block" href="/#">Support <span class="text-teal-600 text-xs p-1">New</span></a>
                </div>
                <div class="p-5 w-48 ">
                    <div class="text-xs uppercase text-white font-medium">Product</div>
                    <a class="my-3 block" href="/#">Our Products <span class="text-teal-600 text-xs p-1"></span></a><a
                        class="my-3 block" href="/#">Great Deals <span class="text-teal-600 text-xs p-1">New</span></a><a
                        class="my-3 block" href="/#">Analytics
                        <span class="text-teal-600 text-xs p-1"></span></a><a class="my-3 block" href="/#">Mobile <span
                            class="text-teal-600 text-xs p-1"></span></a>
                </div>
                <div class="p-5 w-48 ">
                    <div class="text-xs uppercase text-white font-medium">Support</div>
                    <a class="my-3 block" href="/#">Help Center <span class="text-teal-600 text-xs p-1"></span></a><a
                        class="my-3 block" href="/#">Privacy Policy <span class="text-teal-600 text-xs p-1"></span></a><a
                        class="my-3 block" href="/#">Conditions
                        <span class="text-teal-600 text-xs p-1"></span></a>
                </div>
                <div class="p-5 w-48 ">
                    <div class="text-xs uppercase text-white font-medium">Contact us</div>
                    <a class="my-3 block" href="/#">XXX XXXX, Floor 4 San Francisco, CA <span
                            class="text-teal-600 text-xs p-1"></span></a><a class="my-3 block" href="/#">contact@company.com
                        <span class="text-teal-600 text-xs p-1"></span></a>
                </div>
            </div>
        </div>

        <div class="bg-black pt-2 ">
            <div class="flex pb-5 px-3 m-auto pt-5 border-t text-white text-sm flex-col
                                       md:flex-row max-w-6xl">
                <div class="mt-2">© Copyright 2020. All Rights Reserved.</div>
                <div class="md:flex-auto md:flex-row-reverse mt-2 flex-row flex">
                    <a href="/#" class="w-6 mx-1">
                        <svg class="fill-current cursor-pointer text-white hover:text-gray-400" width="100%" height="100%"
                            viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
                            xmlns:serif="http://www.serif.com/"
                            style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
                            <path id="Twitter" d="M24,12c0,6.627 -5.373,12 -12,12c-6.627,0 -12,-5.373 -12,-12c0,-6.627
                                                   5.373,-12 12,-12c6.627,0 12,5.373 12,12Zm-6.465,-3.192c-0.379,0.168
                                                   -0.786,0.281 -1.213,0.333c0.436,-0.262 0.771,-0.676
                                                   0.929,-1.169c-0.408,0.242 -0.86,0.418 -1.341,0.513c-0.385,-0.411
                                                   -0.934,-0.667 -1.541,-0.667c-1.167,0 -2.112,0.945 -2.112,2.111c0,0.166
                                                   0.018,0.327 0.054,0.482c-1.754,-0.088 -3.31,-0.929
                                                   -4.352,-2.206c-0.181,0.311 -0.286,0.674 -0.286,1.061c0,0.733 0.373,1.379
                                                   0.94,1.757c-0.346,-0.01 -0.672,-0.106 -0.956,-0.264c-0.001,0.009
                                                   -0.001,0.018 -0.001,0.027c0,1.023 0.728,1.877 1.694,2.07c-0.177,0.049
                                                   -0.364,0.075 -0.556,0.075c-0.137,0 -0.269,-0.014 -0.397,-0.038c0.268,0.838
                                                   1.048,1.449 1.972,1.466c-0.723,0.566 -1.633,0.904 -2.622,0.904c-0.171,0
                                                   -0.339,-0.01 -0.504,-0.03c0.934,0.599 2.044,0.949 3.237,0.949c3.883,0
                                                   6.007,-3.217 6.007,-6.008c0,-0.091 -0.002,-0.183 -0.006,-0.273c0.413,-0.298
                                                   0.771,-0.67 1.054,-1.093Z"></path>
                        </svg>
                    </a>
                    <a href="/#" class="w-6 mx-1">
                        <svg class="fill-current cursor-pointer text-white hover:text-gray-400" width="100%" height="100%"
                            viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
                            xmlns:serif="http://www.serif.com/"
                            style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
                            <path id="Facebook" d="M24,12c0,6.627 -5.373,12 -12,12c-6.627,0 -12,-5.373 -12,-12c0,-6.627
                                                   5.373,-12 12,-12c6.627,0 12,5.373
                                                   12,12Zm-11.278,0l1.294,0l0.172,-1.617l-1.466,0l0.002,-0.808c0,-0.422
                                                   0.04,-0.648 0.646,-0.648l0.809,0l0,-1.616l-1.295,0c-1.555,0 -2.103,0.784
                                                   -2.103,2.102l0,0.97l-0.969,0l0,1.617l0.969,0l0,4.689l1.941,0l0,-4.689Z">
                            </path>
                        </svg>
                    </a>
                    <a href="/#" class="w-6 mx-1">
                        <svg class="fill-current cursor-pointer text-white hover:text-gray-400" width="100%" height="100%"
                            viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
                            xmlns:serif="http://www.serif.com/"
                            style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
                            <g id="Layer_1">
                                <circle id="Oval" cx="12" cy="12" r="12"></circle>
                                <path id="Shape" d="M19.05,8.362c0,-0.062 0,-0.125 -0.063,-0.187l0,-0.063c-0.187,-0.562
                                                      -0.687,-0.937 -1.312,-0.937l0.125,0c0,0 -2.438,-0.375 -5.75,-0.375c-3.25,0
                                                      -5.75,0.375 -5.75,0.375l0.125,0c-0.625,0 -1.125,0.375
                                                      -1.313,0.937l0,0.063c0,0.062 0,0.125 -0.062,0.187c-0.063,0.625 -0.25,1.938
                                                      -0.25,3.438c0,1.5 0.187,2.812 0.25,3.437c0,0.063 0,0.125
                                                      0.062,0.188l0,0.062c0.188,0.563 0.688,0.938 1.313,0.938l-0.125,0c0,0
                                                      2.437,0.375 5.75,0.375c3.25,0 5.75,-0.375 5.75,-0.375l-0.125,0c0.625,0
                                                      1.125,-0.375 1.312,-0.938l0,-0.062c0,-0.063 0,-0.125
                                                      0.063,-0.188c0.062,-0.625 0.25,-1.937 0.25,-3.437c0,-1.5 -0.125,-2.813
                                                      -0.25,-3.438Zm-4.634,3.927l-3.201,2.315c-0.068,0.068 -0.137,0.068
                                                      -0.205,0.068c-0.068,0 -0.136,0 -0.204,-0.068c-0.136,-0.068 -0.204,-0.204
                                                      -0.204,-0.34l0,-4.631c0,-0.136 0.068,-0.273 0.204,-0.341c0.136,-0.068
                                                      0.272,-0.068 0.409,0l3.201,2.316c0.068,0.068 0.136,0.204
                                                      0.136,0.34c0.068,0.136 0,0.273 -0.136,0.341Z"
                                    style="fill: rgb(255, 255, 255);"></path>
                            </g>
                        </svg>
                    </a>
                    <a href="/#" class="w-6 mx-1">
                        <svg class="fill-current cursor-pointer text-white hover:text-gray-400" width="100%" height="100%"
                            viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
                            xmlns:serif="http://www.serif.com/"
                            style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
                            <path id="Shape" d="M7.3,0.9c1.5,-0.6 3.1,-0.9 4.7,-0.9c1.6,0 3.2,0.3 4.7,0.9c1.5,0.6 2.8,1.5
                                                   3.8,2.6c1,1.1 1.9,2.3 2.6,3.8c0.7,1.5 0.9,3 0.9,4.7c0,1.7 -0.3,3.2
                                                   -0.9,4.7c-0.6,1.5 -1.5,2.8 -2.6,3.8c-1.1,1 -2.3,1.9 -3.8,2.6c-1.5,0.7
                                                   -3.1,0.9 -4.7,0.9c-1.6,0 -3.2,-0.3 -4.7,-0.9c-1.5,-0.6 -2.8,-1.5
                                                   -3.8,-2.6c-1,-1.1 -1.9,-2.3 -2.6,-3.8c-0.7,-1.5 -0.9,-3.1 -0.9,-4.7c0,-1.6
                                                   0.3,-3.2 0.9,-4.7c0.6,-1.5 1.5,-2.8 2.6,-3.8c1.1,-1 2.3,-1.9
                                                   3.8,-2.6Zm-0.3,7.1c0.6,0 1.1,-0.2 1.5,-0.5c0.4,-0.3 0.5,-0.8 0.5,-1.3c0,-0.5
                                                   -0.2,-0.9 -0.6,-1.2c-0.4,-0.3 -0.8,-0.5 -1.4,-0.5c-0.6,0 -1.1,0.2
                                                   -1.4,0.5c-0.3,0.3 -0.6,0.7 -0.6,1.2c0,0.5 0.2,0.9 0.5,1.3c0.3,0.4 0.9,0.5
                                                   1.5,0.5Zm1.5,10l0,-8.5l-3,0l0,8.5l3,0Zm11,0l0,-4.5c0,-1.4 -0.3,-2.5
                                                   -0.9,-3.3c-0.6,-0.8 -1.5,-1.2 -2.6,-1.2c-0.6,0 -1.1,0.2 -1.5,0.5c-0.4,0.3
                                                   -0.8,0.8 -0.9,1.3l-0.1,-1.3l-3,0l0.1,2l0,6.5l3,0l0,-4.5c0,-0.6 0.1,-1.1
                                                   0.4,-1.5c0.3,-0.4 0.6,-0.5 1.1,-0.5c0.5,0 0.9,0.2 1.1,0.5c0.2,0.3 0.4,0.8
                                                   0.4,1.5l0,4.5l2.9,0Z"></path>
                        </svg>
                    </a>
                    <a href="/#" class="w-6 mx-1">
                        <svg class="fill-current cursor-pointer text-white hover:text-gray-400" width="100%" height="100%"
                            viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
                            xmlns:serif="http://www.serif.com/"
                            style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
                            <path id="Combined-Shape"
                                d="M12,24c6.627,0 12,-5.373 12,-12c0,-6.627 -5.373,-12 -12,-12c-6.627,0
                                                   -12,5.373 -12,12c0,6.627 5.373,12 12,12Zm6.591,-15.556l-0.722,0c-0.189,0
                                                   -0.681,0.208 -0.681,0.385l0,6.422c0,0.178 0.492,0.323
                                                   0.681,0.323l0.722,0l0,1.426l-4.675,0l0,-1.426l0.935,0l0,-6.655l-0.163,0l-2.251,8.081l-1.742,0l-2.222,-8.081l-0.168,0l0,6.655l0.935,0l0,1.426l-3.74,0l0,-1.426l0.519,0c0.203,0
                                                   0.416,-0.145 0.416,-0.323l0,-6.422c0,-0.177 -0.213,-0.385
                                                   -0.416,-0.385l-0.519,0l0,-1.426l4.847,0l1.583,5.704l0.042,0l1.598,-5.704l5.021,0l0,1.426Z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--Fin Footer-->
    </div>
@endsection
