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

<!-- component -->
<section class="bg-white ">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 ">Publicar Oferta</h2>
        <form action="{{route('intercambio.registarOferta')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <input type="hidden" name="intercambio_id" value="{{ $intercambioSel->id }}">
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Productos Disponibles</label>
                    <select id="category" name="producto_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">

                        <option selected="">Seleccione el producto a ofertar</option>
                        @foreach($productosDisponibles as $productosD)
                            <option value="{{$productosD->id}}">{{$productosD->nombre}}</option>
                        @endforeach
                    </select>
                </div>


            </div>
            <div class="max-w-xs mx-auto">

                <label for="quantity-input" class="block mb-2 text-sm font-medium text-gray-900">Cantidad Seleccionada</label>
                <div class="relative flex items-center max-w-[8rem]">

                    <input type="text" id="quantity-input" name ="cantidad" data-input-counter aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 " placeholder="1" required  />

                </div>
                <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Seleccione un numero</p>
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 mt-4 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Ofertar</button>

        </form>
    </div>
</section>



<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

</body>
</html>
