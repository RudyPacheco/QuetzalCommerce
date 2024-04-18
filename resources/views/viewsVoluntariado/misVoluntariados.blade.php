<!doctype html>
<html lang="en"  class='dark'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mis Voluntariado</title>
    @vite('resources/css/app.css')


</head>
<body>
@include('layouts.navbarGeneral')
<header class="bg-gray-800 dark:bg-gray-900 py-5">

    <!-- place navbar here -->


    <div class="flex flex-col gap-8  text-left">

        <h3 class="block font-sans text-3xl font-semibold leading-snug tracking-normal text-inherit antialiased text-center text-white">Mis Voluntariados</h3>

    </div><div class="w-full md:w-7/12 pt-5 px-4 mb-8 mx-auto text-center"></div>

</header>





<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 ">

    <li class="me-2">
        <a href="#" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50  ">Mis Voluntariados</a>
    </li>
    <li class="me-2">
        <a href="#" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50  ">Voluntariados Generales</a>
    </li>

</ul>

<a href="{{route('voluntariadoHome.create')}}" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
    </svg>
    Publicar
</a>

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



                <a  href="{{ route('voluntariado.participantes', ['id' => $voluntariado->id]) }}"  class=" mb-3 border border-white rounded-lg px-3 text-white font-semibold mt-6 mb-6">
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
