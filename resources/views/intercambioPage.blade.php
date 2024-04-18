<!doctype html>
<html lang="en"  class='dark'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina Principal</title>
    @vite('resources/css/app.css')


</head>
<body>
@include('layouts.navbarGeneral')
<header class="bg-gray-800 dark:bg-gray-900 py-5">

    <!-- place navbar here -->


    <div class="flex flex-col gap-8  text-left">

        <h3 class="block font-sans text-3xl font-semibold leading-snug tracking-normal text-inherit antialiased text-center text-white">Intercambios</h3>

    </div><div class="w-full md:w-7/12 pt-5 px-4 mb-8 mx-auto text-center"></div>

</header>
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
@if(Session::get('succes'))
    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 " role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">{{Session::get('succes')}}</span>
        <div>
            <span class="font-medium">Success alert!</span> Change a few things up and try submitting again.
        </div>
    </div>

@endif


<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 ">

    <li class="me-2">
        <a href="{{route('intercambio.mios')}}" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50  ">Mis Intercambios</a>
    </li>
    <li class="me-2">
        <a href="#" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50  ">Intercambios Generales</a>
    </li>

</ul>

<!-- component -->
<div class="bg-white">
    <div class="py-16 sm:py-24 lg:mx-auto lg:max-w-7xl lg:px-8">


        <div class="relative mt-8">
            <div class="relative -mb-6 w-full overflow-x-auto pb-6">
                <ul role="list" class="mx-4 inline-flex space-x-8 sm:mx-6 lg:mx-0 lg:grid lg:grid-cols-4 lg:gap-x-8 lg:space-x-0">



                    @foreach($intercambios as $intercambio)
                        <div class="w-full max-w-sm bg-white rounded-lg shadow border-2 border-black mb-4 ">

                            <img class="p-8 rounded-t-lg" src="{{ asset(str_replace('storage//', 'storage/', $intercambio->imagen)) }}" alt="product image" />

                            <div class="px-5 pb-5 text-center">
                                <a href="#">
                                    <h5 class="text-xl font-semibold  tracking-tight text-gray-900 ">{{$intercambio->nombre}}</h5>
                                </a>


                                <div class="mt-6">





                                    <a type="button"  href="{{ route('intercambio.detalles', ['id' => $intercambio->id]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ver Detalles</a>

                                </div>
                            </div>
                        </div>
                    @endforeach





        <div class="mt-12 flex px-4 sm:hidden">
            <a href="#" class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">
                See everything
                <span aria-hidden="true"> &rarr;</span>
            </a>
        </div>
    </div>
</div>
<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

</body>
</html>
