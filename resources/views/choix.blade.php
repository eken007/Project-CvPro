<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <title>Choix</title>
</head>
<body>
    <div>
        <a href="{{ url('/') }}" class="flex absolute top-0 left-0 ml-8 text-sm text-gray-600 font-bold font-serif">
            <img class="" src="{{asset('images/returnBlack.png')}}"/>
        </a> 
    </div>

    <div class=' h-screen w-full  grid justify-items-center items-center'>
        <div class="h-auto w-auto flex space-x-10 mt-16">
            <div class="relative group  w-60 h-96 bg-cover bg-no-repeat bg-center transform hover:scale-110 motion-reduce:transform-none" style="background-image: url({{asset('images/employe.jpg')}})">
                <a href="{{ route('login') }}">
                <div class="absolute w-60 h-96 bg-black opacity-30">
                </div>
                    <div class="w-60 h-96  grid justify-items-center items-center" style="z-index: 1;">
                        <p class="text-4xl text-white opacity-0 group-hover:opacity-100 font-serif" style="z-index: 1;" >Employee</p>
                    </div>
                </a>
            </div>
            <div class="group relative w-60 h-96 bg-cover bg-no-repeat bg-center transform hover:scale-110 motion-reduce:transform-none" style="background-image: url({{asset('images/enterprise.jpg')}})">
                <a href="{{ route('entreprise') }}">
                    <div class="absolute w-60 h-96 bg-black opacity-30">
                    </div>
                    <div class="w-60 h-96  grid justify-items-center items-center" style="z-index: 1;">
                        <p class="text-4xl text-white opacity-0 group-hover:opacity-100 font-serif " style="z-index: 1;" >Entreprise</p>
                    </div>
                </a>
            </div>
        </div>
    <div>
</body>
</html>