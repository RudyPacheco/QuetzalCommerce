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
        <button class="float-right mr-3">
            Editar
        </button>
    </div>



    <div class="container mx-auto px-6">
        <div class="md:flex md:items-center">
            <div class="w-full h-64 md:w-1/2 lg:h-96">
                <img class="w-full h-60 md:w-1/2 lg:h-80     rounded-md  max-w-lg mx-auto" src="{{ asset(str_replace('storage//', 'storage/', $intercambioSel->imagen)) }}" alt="product image">
            </div>




            <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                <h3 class="text-gray-700 uppercase text-lg">{{$intercambioSel->nombre}}</h3>

                <hr class="my-3">
                <div>
                    <p>{{$intercambioSel->detalles}}</p>
                </div>

                <div class="mt-12">
                    <p>Busca Preferentemente : {{$intercambioSel->objeto_busqueda}}</p>
                </div>


            </div>
        </div>
    </div>



    <h1 class="text-center text-4xl  font-semibold ">Solicitudes Para publicar productos</h1>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Usuario
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre del producto
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado
                </th>
                <th scope="col" class="px-6 py-3">
                    cantidad
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($ofertas as $oferta)
                <tr class="bg-white border-b ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        {{$oferta->usuario_ofreciendo}}
                    </th>
                    <td class="px-6 py-4">
                        {{$oferta->nombre_producto}}
                    </td>
                    <td class="px-6 py-4">
                        {{$oferta->estado}}
                    </td>
                    <td class="px-6 py-4">
                        {{$oferta->cantidad}}
                    </td>
                    <td class="px-6 py-4">
                        {{$oferta->fecha}}
                    </td>
                    <td class="px-6 py-4">

                        <a type="button"  href="{{route('intercambio.aceptar',['id' => $oferta->id])}}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Aceptar</a>
                        <a type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Rechazar</a>

                        <!--        <button id="toggle-modal-btn.{{$oferta->id}}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center " type="button">
                   Aceptar
                </button>

                <div id="popup-modal.{{$oferta->id}}" class="hidden fixed top-0 right-0 left-0 bottom-0 z-50 bg-gray-800 bg-opacity-75 flex justify-center items-center">
                    <div class="bg-white rounded-lg shadow p-6 w-96">
                        <button id="close-modal-btn" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 focus:outline-none" type="button">
                            <svg class="w-4 h-4" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.293 4.293a1 1 0 0 1 1.414 0L10 10.586l5.293-5.293a1 1 0 1 1 1.414 1.414L11.414 12l5.293 5.293a1 1 0 0 1-1.414 1.414L10 13.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L8.586 12 3.293 6.707a1 1 0 0 1 0-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <h3 class="text-lg font-medium text-gray-800 mb-4">Confirmation</h3>
                        <p class="text-sm text-gray-600 mb-4">Are you sure you want to delete this product?</p>
                        <div class="flex justify-end">
                            <button id="confirm-delete-btn" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 mr-2" type="button">
                                Yes, I'm sure
                            </button>
                            <button id="cancel-delete-btn" class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2" type="button">
                                No, cancel
                            </button>
                        </div>
                    </div>
                </div>

                <button id="toggle-modal-btn" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center " type="button">
                    Rechazar
                </button>

                <div id="popup-modal" class="hidden fixed top-0 right-0 left-0 bottom-0 z-50 bg-gray-800 bg-opacity-75 flex justify-center items-center">
                    <div class="bg-white rounded-lg shadow p-6 w-96">
                        <button id="close-modal-btn" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600 focus:outline-none" type="button">
                            <svg class="w-4 h-4" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.293 4.293a1 1 0 0 1 1.414 0L10 10.586l5.293-5.293a1 1 0 1 1 1.414 1.414L11.414 12l5.293 5.293a1 1 0 0 1-1.414 1.414L10 13.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L8.586 12 3.293 6.707a1 1 0 0 1 0-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <h3 class="text-lg font-medium text-gray-800 mb-4">Confirmation</h3>
                        <p class="text-sm text-gray-600 mb-4">Are you sure you want to delete this product?</p>
                        <div class="flex justify-end">
                            <button id="confirm-delete-btn" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 mr-2" type="button">
                                Yes, I'm sure
                            </button>
                            <button id="cancel-delete-btn" class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2" type="button">
                                No, cancel
                            </button>
                        </div>
                    </div>
                </div>-->



            @endforeach

            </tbody>
        </table>
    </div>


</main>

<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

</body>
</html>
