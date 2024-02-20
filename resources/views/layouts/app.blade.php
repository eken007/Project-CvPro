<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <style>
        .show {
            display: block;
            transition: 5s;
        }

    </style>
    <script>
        $(document).ready(function() {
            $('#icon').click(function() {
                $('.affiche').toggleClass('show');
            });
        });
    </script>
</head>

<body class="">
    <nav class="h-16 w-full bg-black">
        <div class="w-full fixed bg-black mx-auto sm:px-6" style="z-index: 6;">
            <div class="flex items-center h-16">
                <div class="w-32">
                    <a href="{{ url('/') }}"><img class="" src="{{ asset('images/logo_cv.png') }}" /></a>
                </div>
                <div class="flex space-x-2 absolute right-0 mr-2">
                    <a href="{{ route('accueil') }}"
                        class="text-white hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-md font-semibold">Accueil</a>

                    <a href="{{ route('Cv') }}"
                        class="text-white hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-md font-semibold">CV</a>
                    @can('employee-admin')
                        <a href="{{ route('deposerCv') }}"
                            class="text-white hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-md font-semibold">Deposer
                            CV</a>
                    @endcan

                    <div class="group inline-block ">
                        <button
                            class="rounded-md hover:bg-gray-700 outline-none focus:outline-none text-white w-40  py-2 flex items-center">
                            <span class="pr-1 font-semibold flex-1"><a href="{{ route('emploie') }}">Offres
                                    d'emploi</a></span>
                        </button>
                    </div>
                    @guest
                        <a href="{{ route('choix') }}" class="text-white  py-2 rounded-md text-md font-semibold w-6 h-6">
                            <img class="" src="{{ asset('images/signup.png') }}" />
                        </a>
                    @else
                        @can('manage-users')
                            <a href="{{ route('admin.users.index') }}"
                                class="text-white hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-md font-semibold">DashBoard</a>
                        @endcan
                        <button class="text-white  py-2 outline-none rounded-md text-md font-semibold w-6 h-6 " id="icon">
                            <img class="" src="{{ asset('images/notif.png') }}" />
                        </button>
                        <span class="rounded-full w-4 h-4 bg-red-500 flex items-center transform -translate-x-5">
                            <p class="text-white mx-auto mb-1">
                                <span id="js-count">{{ auth()->user()->unreadNotifications->count() }}</span>
                            </p>
                        </span>
                        @if (Auth::user()->avatar == null)
                            <img src="{{ asset('images/profil.png') }}" class=" object-cover w-12 h-12 rounded-full ">
                        @else
                            <img src="{{ asset('/storage/images/' . Auth::user()->avatar) }}"
                                class=" object-cover w-12 h-12 rounded-full ">
                        @endif
                        <a href="{{ route('logout') }}"
                            class="text-white  py-2 rounded-md text-md font-semibold w-6 h-6 " onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <img class="" title="{{ Auth::user()->name }}" src="{{ asset('images/logout.png') }}" />
                        @endguest
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="bg-gray-200 px-4 py-3 hidden affiche w-96 h-72 fixed right-6 overflow-auto" style="z-index: 4">
        @guest()

        @else
            @foreach (auth()->user()->notifications as $notification)
                <div class="w-full h-28 border-b-1  border-gray-500 px-4 flex space-x-3">
                    <div class="flex items-center w-full h-full">
                        <img class="object-cover object-center w-16 h-16" src="{{ asset('images/logo_cv.png') }}">
                    </div>
                    <div>
                        <p class=" font-serif text-sm">{{ $notification->data['title'] }}</p>
                    </div>
                    {{ $notification->markAsRead() }}
                </div>
            @endforeach
        @endguest
    </div>
    @yield('content')
    <script>
        window.User = {
            id: {{ optional(auth()->user())->id }}
        }
    </script>
</body>

</html>
