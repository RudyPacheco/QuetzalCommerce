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
        <h2 class="mb-4 text-xl font-bold text-gray-900 ">Publicar Voluntariado</h2>
        <form action="{{route('voluntariadoHome.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Titulo</label>
                    <input type="text" name="titulo" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="" required="">
                </div>

                <div>
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha</label>
                    <input type="date" name="fecha" id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="" required="">
                </div>
                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Detalles</label>
                    <textarea id="description" name="detalles" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 " placeholder=""></textarea>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Subir Foto</label>
                    <input name="imagen" class="block w-full text-sm text-gray-900 border border-gray-300  cursor-pointer bg-gray-50  focus:outline-none " aria-describedby="user_avatar_help" id="user_avatar" type="file">
                </div>
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 mt-4 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Publicar</button>

        </form>
    </div>
</section>



<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

</body>
</html>
