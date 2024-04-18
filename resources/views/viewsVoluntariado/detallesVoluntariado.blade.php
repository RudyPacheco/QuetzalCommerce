<!doctype html>
<html lang="en"  class='dark'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ventas</title>
    @vite('resources/css/app.css')


</head>
<body>
@include('layouts.navbarGeneral')
<header class="bg-gray-800 dark:bg-gray-900 py-5">

    <!-- place navbar here -->


    <div class="flex flex-col gap-8  text-left">

        <h3 class="block font-sans text-3xl font-semibold leading-snug tracking-normal text-inherit antialiased text-center text-white">Detalles</h3>

    </div><div class="w-full md:w-7/12 pt-5 px-4 mb-8 mx-auto text-center"></div>

</header>



<!-- component -->
<div class="py-16 bg-white">
    <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
        <div class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12">
            <div class="md:5/12 lg:w-5/12">
                <img src="{{ asset(str_replace('storage//', 'storage/', $voluntariadoSel->imagen)) }}" alt="image" loading="lazy" width="" height="">
            </div>
            <div class="md:7/12 lg:w-6/12">
                <h2 class="text-2xl text-gray-900 font-bold md:text-4xl">{{$voluntariadoSel->titulo}}</h2>
                <p class="mt-6 text-gray-600">{{$voluntariadoSel->detalles}}</p>
                <p class="mt-4 text-gray-600"> Fecha : {{$voluntariadoSel->fecha}}</p>
                <p class="mt-4 text-gray-600"> Usuario Promotor : {{$voluntariadoSel->usuario_promotor}}</p>

                @if($estaInscrito)
                    <a  href="{{ route('voluntariado.anular', ['id' => $voluntariadoSel->id]) }}" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Anular Inscripcion</a>
                @else
                    <a  href="{{ route('voluntariado.inscribir', ['id' => $voluntariadoSel->id]) }}" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-4 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Participar</a>

                @endif

            </div>
        </div>
    </div>
</div>








<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

</body>
</html>
