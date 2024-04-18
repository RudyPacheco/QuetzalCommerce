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

        <h3 class="block font-sans text-3xl font-semibold leading-snug tracking-normal text-inherit antialiased text-center text-white">Comprar</h3>

    </div>
    <div class="w-full md:w-7/12 pt-5 px-4 mb-8 mx-auto text-center"></div>

</header>


<div class="flex items-  bg-gray-200 text-gray-800">
    <div class="p-4 w-full">
        <div class="grid grid-cols-12 gap-4">


            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                    <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-red-100 text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="flex flex-col flex-grow ml-4">
                        <div class="text-sm text-gray-500">Mis Jades</div>
                        <div class="font-bold text-lg">{{$cuenta-> monto_ventas + $cuenta-> monto_otros   }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<!-- component -->
<div class="flex flex-col md:flex-row w-screen h-full px-14 py-7">

    <!-- My Cart -->
    <div class="w-full flex flex-col h-fit gap-4 p-4 ">
        <p class="text-blue-900 text-xl font-extrabold">Mi Orden</p>

        <!-- Product -->
        <div class="flex flex-col p-4 text-lg font-semibold shadow-md border rounded-sm">
            <div class="flex flex-col md:flex-row gap-3 justify-between">
                <!-- Product Information -->
                <div class="flex flex-row gap-6 items-center">
                    <div class="w-28 h-28">
                        <img class="w-full h-full" src="{{ asset(str_replace('storage//', 'storage/', $ventaSel->imagen)) }}">
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="text-lg text-gray-800 font-semibold">{{$ventaSel->nombre}}</p>
                        <p class="text-xs text-gray-600 font-semibold"> <span class="font-normal">{{$ventaSel->descripcion}}</span></p>
                        <p class="text-lg text-gray-800">Cantidad Disponible: {{$ventaSel->cantidad}}</p>
                    </div>
                </div>
                <!-- Price Information -->
                <div class="self-center text-center">
                    <p class="text-gray-600 font-normal text-sm line-through">$99.99
                        <span class="text-emerald-500 ml-2">(-50% OFF)</span>
                    </p>
                    <p class="text-gray-800 font-normal text-xl">Q. {{$ventaSel->precio}}</p>
                </div>

                <!-- Remove Product Icon -->
                <div class="self-center">
                    <button class="">
                        <svg class="" height="24px" width="24px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512"  xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g>
                            <path d="M400,113.3h-80v-20c0-16.2-13.1-29.3-29.3-29.3h-69.5C205.1,64,192,77.1,192,93.3v20h-80V128h21.1l23.6,290.7   c0,16.2,13.1,29.3,29.3,29.3h141c16.2,0,29.3-13.1,29.3-29.3L379.6,128H400V113.3z M206.6,93.3c0-8.1,6.6-14.7,14.6-14.7h69.5   c8.1,0,14.6,6.6,14.6,14.7v20h-98.7V93.3z M341.6,417.9l0,0.4v0.4c0,8.1-6.6,14.7-14.6,14.7H186c-8.1,0-14.6-6.6-14.6-14.7v-0.4   l0-0.4L147.7,128h217.2L341.6,417.9z"/>
                            <g>
                                <rect height="241" width="14" x="249" y="160"/>
                                <polygon points="320,160 305.4,160 294.7,401 309.3,401"/>
                                <polygon points="206.5,160 192,160 202.7,401 217.3,401"/>
                            </g>
                        </g>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Product Quantity -->

            <div class="max-w-xs mx-auto">

                <label for="quantity-input" class="block mb-2 text-sm font-medium text-gray-900">Cantidad Seleccionada</label>
                <div class="relative flex items-center max-w-[8rem]">
                    <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-gray-100  hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100  focus:ring-2 focus:outline-none"@if($ventaSel->cantidad == 1) disabled @endif  >
                        <svg class="w-3 h-3 text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                        </svg>
                    </button>
                    <input type="text" id="quantity-input" name ="cantidad" data-input-counter aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 " placeholder="1" required @if($ventaSel->cantidad == 1) disabled @endif />
                    <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-gray-100  hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none" @if($ventaSel->cantidad == 1) disabled @endif>
                        <svg class="w-3 h-3 text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                        </svg>
                    </button>
                </div>
                <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Seleccione un numero</p>
            </div>
        </div>
    </div>

    @php
        // Obtener el valor del campo de cantidad para el producto actual
        $inputName = 'cantidad';
        $cantidadSeleccionada = request()->input($inputName,1); // Obtener el valor del campo de cantidad o usar 1 por defecto
        $subtotal = $ventaSel->precio * $cantidadSeleccionada;
    @endphp


    <!-- Purchase Resume -->
    <div class="flex flex-col w-full md:w-2/3 h-fit gap-4 p-4">
        <p class="text-blue-900 text-xl font-extrabold">Resumen de compra</p>
        <div class="flex flex-col p-4 gap-4 text-lg font-semibold shadow-md border rounded-sm">
            <div class="flex flex-row justify-between">
                <p class="text-gray-600">Subtotal ( {{$cantidadSeleccionada}} Items)</p>
                <p class="text-end font-bold">Q.{{ number_format($subtotal, 2) }}</p>
            </div>
            <hr class="bg-gray-200 h-0.5">
            <hr class="bg-gray-200 h-0.5">

            <hr class="bg-gray-200 h-0.5">
            <div class="flex flex-row justify-between">
                <p class="text-gray-600">Total</p>
                <div>
                    <p class="text-end font-bold">Q.{{ number_format($subtotal, 2) }}</p>
                </div>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('venta.pagar', ['id' => $ventaSel->id,'cantidad'=>$cantidadSeleccionada]) }}" class="transition-colors text-sm bg-blue-600 hover:bg-blue-700 p-2 rounded-sm w-full text-white text-hover shadow-md">
                    Pagar
                </a>

            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
