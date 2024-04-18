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



            </div>
        </div>
    </div>

</div>



<form action="{{ route('guardar-asistencia') }}" method="POST">
    @csrf
<div class="ml-4 mr-4 relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white ">
        <input type="hidden" name="evento_id" value="{{ $voluntariadoSel->id }}">



    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
        <tr>
            <th scope="col" class="p-4">
                <div class="flex items-center">
                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2 ">
                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                </div>
            </th>
            <th scope="col" class="px-6 py-3">
                Nombre
            </th>
            <th scope="col" class="px-6 py-3">

            </th>
            <th scope="col" class="px-6 py-3">

            </th>
            <th scope="col" class="px-6 py-3">
                Asistencia
            </th>
        </tr>
        </thead>
        <tbody>

        @foreach($inscritos as $inscrito)
        <tr class="bg-white border-b   hover:bg-gray-50 ">

            <td class="w-4 p-4">
                <div class="flex items-center">
                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                </div>
            </td>
            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">

                <div class="ps-3">
                    <div class="text-base font-semibold">{{$inscrito->usuario_id}}</div>
                    <div class="font-normal text-gray-500">neil.sims@flowbite.com</div>
                </div>
            </th>
            <td class="px-6 py-4">

            </td>
            <td class="px-6 py-4">
                <div class="flex items-center">

                </div>
            </td>
            <td class="px-6 py-4">
                <select name="asistencia[{{ $inscrito->usuario_id }}]">
                    <option value="1">Asistió</option>
                    <option value="0">No asistió</option>
                </select>

            </td>
        @endforeach

               </tbody>
    </table>
    <!-- Edit user modal -->

</div>

<button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Finalizar Evento</button>

</form>

<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
