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
@include('layouts.navbarAdmin')



<h1 class="text-center text-4xl  font-semibold ">Solicitudes Para publicar productos</h1>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
        <tr>
            <th scope="col" class="px-6 py-3">
               Nombre del Producto
            </th>
            <th scope="col" class="px-6 py-3">
                Usuario
            </th>
            <th scope="col" class="px-6 py-3">
                Categoria
            </th>
            <th scope="col" class="px-6 py-3">
                Precio
            </th>
            <th scope="col" class="px-6 py-3">
                Acciones
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($ventas as $venta)
        <tr class="bg-white border-b ">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                {{$venta->nombre}}
            </th>
            <td class="px-6 py-4">
                {{$venta->user_propietario}}
            </td>
            <td class="px-6 py-4">
                {{$venta->categoria}}
            </td>
            <td class="px-6 py-4">
                {{$venta->precio}}
            </td>
            <td class="px-6 py-4">

                <a type="button"  href="{{route('solicitudVentas.aceptar',['id' => $venta->id])}}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Aceptar</a>
                <a type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Rechazar</a>

                <!--        <button id="toggle-modal-btn.{{$venta->id}}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center " type="button">
                   Aceptar
                </button>

                <div id="popup-modal.{{$venta->id}}" class="hidden fixed top-0 right-0 left-0 bottom-0 z-50 bg-gray-800 bg-opacity-75 flex justify-center items-center">
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

<!-- component -->
<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

<!--       <script>
           document.addEventListener('DOMContentLoaded', function() {
               const toggleButton = document.getElementById('toggle-modal-btn');
               const modal = document.getElementById('popup-modal');
               const closeButton = document.getElementById('close-modal-btn');
               const confirmButton = document.getElementById('confirm-delete-btn');
               const cancelButton = document.getElementById('cancel-delete-btn');

               toggleButton.addEventListener('click', () => {
                   modal.classList.remove('hidden');
               });

               closeButton.addEventListener('click', () => {
                   modal.classList.add('hidden');
               });

               confirmButton.addEventListener('click', () => {
                   // Lógica para confirmar la acción (eliminar, etc.)
                   modal.classList.add('hidden');
               });

               cancelButton.addEventListener('click', () => {
                   modal.classList.add('hidden');
               });
           });
       </script>-->


</body>
</html>
