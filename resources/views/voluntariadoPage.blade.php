<!doctype html>
<html lang="en"  class='dark'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voluntariado</title>
    @vite('resources/css/app.css')


</head>
<body>
@include('layouts.navbarGeneral')
<header class="bg-gray-800 dark:bg-gray-900 py-5">

    <!-- place navbar here -->

    @if ($errors->any())
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 " role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                @foreach ($errors->all() as $error)
                    <span class="font-medium">Error</span> {{ $error }}
                @endforeach
            </div>
        </div>


    @endif

    <div class="flex flex-col gap-8  text-left">

        <h3 class="block font-sans text-3xl font-semibold leading-snug tracking-normal text-inherit antialiased text-center text-white">Voluntariados</h3>

    </div><div class="w-full md:w-7/12 pt-5 px-4 mb-8 mx-auto text-center"></div>

</header>




@auth()

@endauth

<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 ">

    <li class="me-2">
        <a href="{{route('voluntariado.mios')}}" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50  ">Mis Voluntariados</a>
    </li>
    <li class="me-2">
        <a href="#" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50  ">Voluntariados Generales</a>
    </li>

</ul>


<!-- component -->
@foreach($voluntariados as $voluntariado)
<div class="h-screen flex items-center justify-center">

    <card class="rounded-lg">

        <a href="#">
            <img src="{{ asset(str_replace('storage//', 'storage/', $voluntariado->imagen)) }}" class="rounded-t-lg" />
        </a>

        <div class="bg-indigo-900 text-center rounded-b-lg">

            <p class="text-white text-xl font-bold pt-6">
                {{$voluntariado->titulo}}
            </p>



            <a  href="{{ route('voluntariado.detalles', ['id' => $voluntariado->id]) }}"  class=" mb-3 border border-white rounded-lg px-3 text-white font-semibold mt-6 mb-6">
                Detalles
            </a>

<p></p>
        </div>

    </card>

</div>

@endforeach

<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

</body>
</html>
