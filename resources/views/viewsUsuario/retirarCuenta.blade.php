
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
<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
    <span class="font-medium">Estas seguro que quieres retirar?</span> Manejamos una taza del retiro de 0,9
    <p>Es decir que por cada jade retirado se te depoistara Q0.90</p>
</div>


<section class="bg-white ">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 ">Formulario de retiro</h2>
        <form action="{{route('cuenta.ejecutarRetiro')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <input type="hidden" name="usuario_id" value="{{ $cuenta->usuario_id }}">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nombre de la cuenta </label>
                    <input type="text" name="nombre" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="" required="">
                </div>
                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 ">Cuenta a nombre de </label>
                    <input type="text" name="cuenta_nombre" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="" required="">
                </div>

                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Banco</label>
                    <select id="category" name="banco" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">

                        <option selected="">Seleccione la categoria</option>
                        <option value="PC">BANCO AGROMERCANTIL</option>
                        <option value="PC">BANCO AZTECA</option>
                        <option value="PC">BANCO DESARROLO RURAL</option>
                        <option value="PC">BANCO DE LOS TRABAJADORES </option>
                        <option value="PC">BANCO G&T</option>
                        <option value="PC">BANCO INDUSTRIAL</option>
                        <option value="PC">BANCO PROMERICA</option>

                    </select>
                </div>
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Tipo de cuenta</label>
                    <select id="category" name="tipoCuenta" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">

                        <option selected="">Seleccione la categoria</option>
                        <option value="PC">Monetaria</option>
                        <option value="PC">Ahorro</option>


                    </select>
                </div>
                <div>
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 ">Cantidad a retirar</label>
                    <input type="number" name="cantidad" id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="" required="">
                </div>

            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 mt-4 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Publicar</button>

        </form>
    </div>
</section>



<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

</body>
</html>
