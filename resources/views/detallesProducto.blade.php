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




<main class="my-8">

    <div class="float-root">
        <button class=" border border-red-700 float-right mr-3">
            Reportar
        </button>
    </div>



    <div class="container mx-auto px-6">
        <div class="md:flex md:items-center">
            <div class="w-full h-64 md:w-1/2 lg:h-96">
                <img class="w-full h-60 md:w-1/2 lg:h-80     rounded-md  max-w-lg mx-auto" src="{{ asset(str_replace('storage//', 'storage/', $ventaSel->imagen)) }}" alt="product image">
            </div>




            <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                <h3 class="text-gray-700 uppercase text-lg">{{$ventaSel->nombre}}</h3>
                <span class="text-gray-500 mt-3">Q{{$ventaSel->precio}}</span>
                <hr class="my-3">
                <div>
                    <p>{{$ventaSel->descripcion}}</p>
                </div>
                <div class="mt-2">
                    <label class="text-gray-700 text-sm" for="count">Cantidad Disponible:</label>
                    <div class="flex items-center mt-1">

                        <span class="text-gray-700 text-lg mx-2">{{$ventaSel->cantidad}}</span>

                    </div>
                </div>

                <div  class="flex items-center mt-6">


                    @if($ventaSel->cantidad == 0)

                        <div id="toast-danger" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow " role="alert">

                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg ">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                                </svg>
                                <span class="sr-only">Error icon</span>
                            </div>
                            <div class="ms-3 text-sm font-normal">Este Articulo no esta Disponible</div>

                        </div>
                    @else

                        <a  href="{{ route('venta.comprar', ['id' => $ventaSel->id]) }}" class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500   @if($ventaSel->cantidad == 0) opacity-50 cursor-not-allowed @endif" >Comprar</a>

                    @endif


                </div>
                <div class="flex items-center mt-6">
                    <button class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500"   >Enviar mensaje al vendedor</button>

                </div>
            </div>
        </div>
        <div class="mt-16">
            <h3 class="text-gray-600 text-2xl font-medium">More Products</h3>

            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">

                @foreach($prodSimilares as $prodSimilar)

                <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                    <a  href="{{ route('venta.detalles', ['id' => $prodSimilar->id]) }}" >
                    <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url({{ asset(str_replace('storage//', 'storage/', $prodSimilar->imagen)) }})">
                    </div>
                    </a>
                    <div class="px-5 py-3">
                        <a>
                        <h3 class="text-gray-700 uppercase">{{$prodSimilar->nombre}}</h3>
                        </a>
                        <span class="text-gray-500 mt-2">Q. {{$prodSimilar->precio}}</span>
                    </div>
                </div>
                    @endforeach



            </div>
        </div>
    </div>
</main>

<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>
</html>
