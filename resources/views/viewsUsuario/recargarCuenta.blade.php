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


    </div>
</section>
<!-- component -->
<div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50" role="alert">
    <span class="font-medium">Informacion</span> Al recargar manejamos un valor de 1 a 1 en Q
    <p>Es decir Q1 equivale a 1 jade</p>
</div>

<style>
    .crediCard.seeBack {
        transform: rotateY(-180deg);
    }
</style>
<main
    class="flex min-h-screen flex-col items-center justify-between p-6 lg:p-24"
>
    <form
        class="bg-white w-full max-w-3xl mx-auto px-4 lg:px-6 py-8 shadow-md rounded-md flex flex-col lg:flex-row"
        action="{{route('cuenta.ejecutarRecarga')}}" method="POST" enctype="multipart/form-data"
    >
        @csrf

        <input type="hidden" name="usuario_id" value="{{ $cuenta->usuario_id }}">
        <div class="w-full lg:w-1/2 lg:pr-8 lg:border-r-2 lg:border-slate-300">
            <div class="mb-4">
                <label class="text-neutral-800 font-bold text-sm mb-2 block"
                >Numero de Tarjeta</label
                >
                <input
                    id="cardNumber"
                    type="text"
                    onclick="hideBackCard()"
                    class="flex h-10 w-full rounded-md border-2 bg-background px-4 py-1.5 text-lg ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:border-purple-600 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 undefined"
                    maxlength="19"
                    placeholder="XXXX XXXX XXXX XXXX"

                />
            </div>
            <div class="flex gap-x-2 mb-4">
                <div class="block">
                    <label class="text-neutral-800 font-bold text-sm mb-2 block"
                    >Fecha de expiracion</label
                    >
                    <input
                        id="expDate"
                        type="text"
                        onclick="hideBackCard()"
                        class="flex h-10 w-full rounded-md border-2 bg-background px-4 py-1.5 text-lg ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:border-purple-600 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 undefined"
                        maxlength="5"
                        placeholder="MM/YY"

                    />
                </div>
                <div class="block">
                    <label class="text-neutral-800 font-bold text-sm mb-2 block"
                    >CCV:</label
                    >
                    <input
                        id="ccvNumber"
                        type="text"
                        onclick="showBackCard()"
                        class="flex h-10 w-full rounded-md border-2 bg-background px-4 py-1.5 text-lg ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:border-purple-600 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 undefined"
                        maxlength="3"
                        placeholder="123"

                    />
                </div>
            </div>
            <div class="mb-4">
                <label class="text-neutral-800 font-bold text-sm mb-2 block"
                >Nombre de la tarjeta</label
                >
                <input
                    id="cardName"
                    type="text"
                    onclick="hideBackCard()"
                    class="flex h-10 w-full rounded-md border-2 bg-background px-4 py-1.5 text-lg ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:border-purple-600 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 undefined"


                />
            </div>
            <div class="mb-4">
                <label class="text-neutral-800 font-bold text-sm mb-2 block"
                >Cantidad en Q</label
                >
                <input
                    id="cardName"
                    type="number"
                    onclick="hideBackCard()"
                    class="flex h-10 w-full rounded-md border-2 bg-background px-4 py-1.5 text-lg ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:border-purple-600 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 undefined"
                    name="cantidad"

                />
            </div>
        </div>
        <div class="w-full lg:w-1/2 lg:pl-8">
            <div class="w-full max-w-sm h-56" style="perspective: 1000px">
                <div
                    id="creditCard"
                    class="relative crediCard cursor-pointer transition-transform duration-500"
                    style="transform-style: preserve-3d"
                    onclick="toggleBackCard()"
                >
                    <div
                        class="w-full h-56 m-auto rounded-xl text-white shadow-2xl absolute"
                        style="backface-visibility: hidden"
                    >
                        <img
                            src="https://i.ibb.co/LPLv5MD/Payment-Card-01.jpg"
                            class="relative object-cover w-full h-full rounded-xl"
                        />
                        <div class="w-full px-8 absolute top-8">
                            <div class="text-right">
                                <svg
                                    class="w-14 h-14 ml-auto"
                                    width="45"
                                    height="36"
                                    viewBox="0 0 45 36"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >

                                </svg>
                            </div>
                            <div class="pt-1">
                                <p class="font-light">Card Number</p>
                                <p
                                    id="imageCardNumber"
                                    class="font-medium tracking-more-wider h-6"
                                >
                                    4256 4256 4256 4256
                                </p>
                            </div>
                            <div class="pt-6 flex justify-between">
                                <div>
                                    <p class="font-light">Name</p>
                                    <p
                                        id="imageCardName"
                                        class="font-medium tracking-widest h-6"
                                    >
                                        John Doe
                                    </p>
                                </div>
                                <div>
                                    <p class="font-light">Expiry</p>
                                    <p
                                        id="imageExpDate"
                                        class="font-medium tracking-wider h-6 w-14"
                                    >
                                        12/24
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="w-full h-56 m-auto rounded-xl text-white shadow-2xl absolute"
                        style="backface-visibility: hidden; transform: rotateY(180deg)"
                    >
                        <img
                            src="https://i.ibb.co/LPLv5MD/Payment-Card-01.jpg"
                            class="relative object-cover w-full h-full rounded-xl"
                        />
                        <div class="w-full absolute top-8">
                            <div class="bg-black h-10"></div>
                            <div class="px-8 mt-5">
                                <div class="flex space-between">
                                    <div class="flex-1 h-8 bg-red-100"></div>
                                    <p
                                        id="imageCCVNumber"
                                        class="bg-white text-black flex items-center pl-4 pr-2 w-14"
                                    >
                                        342
                                    </p>
                                </div>
                                <p class="font-light flex justify-end text-xs mt-2">
                                    security code
                                </p>
                                <div class="flex justify-end mt-2">
                                    <svg
                                        class="w-14 h-14"
                                        width="45"
                                        height="36"
                                        viewBox="0 0 45 36"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >

                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button  type="submit"  class="mt-12 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Recargar</button>
        </div>

    </form>
    <script>
        const toggleBackCard = () => {
            cardEl = document.getElementById("creditCard");
            if (cardEl.classList.contains("seeBack")) {
                cardEl.classList.remove("seeBack");
            } else {
                cardEl.classList.add("seeBack");
            }
        };
        const showBackCard = () => {
            cardEl = document.getElementById("creditCard");
            if (!cardEl.classList.contains("seeBack")) {
                cardEl.classList.add("seeBack");
            }
        };
        const hideBackCard = () => {
            cardEl = document.getElementById("creditCard");
            if (cardEl.classList.contains("seeBack")) {
                cardEl.classList.remove("seeBack");
            }
        };

        // Handle Card Number update
        const inputCardNumber = document.getElementById("cardNumber");
        const imageCardNumber = document.getElementById("imageCardNumber");

        inputCardNumber.addEventListener("input", (event) => {
            //   Remove all non-numeric characters from the input
            const input = event.target.value.replace(/\D/g, "");

            // Add a space after every 4 digits
            let formattedInput = "";
            for (let i = 0; i < input.length; i++) {
                if (i % 4 === 0 && i > 0) {
                    formattedInput += " ";
                }
                formattedInput += input[i];
            }

            inputCardNumber.value = formattedInput;
            imageCardNumber.innerHTML = formattedInput;
        });

        // Handle CCV update
        const inputCCVNumber = document.getElementById("ccvNumber");
        const imageCCVNumber = document.getElementById("imageCCVNumber");

        inputCCVNumber.addEventListener("input", (event) => {
            // Remove all non-numeric characters from the input
            const input = event.target.value.replace(/\D/g, "");
            inputCCVNumber.value = input;
            imageCCVNumber.innerHTML = input;
        });

        // Handle Exp Date update
        const expirationDate = document.getElementById("expDate");
        const imageExpDate = document.getElementById("imageExpDate");

        expirationDate.addEventListener("input", (event) => {
            // Remove all non-numeric characters from the input
            const input = event.target.value.replace(/\D/g, "");

            // Add a '/' after the first 2 digits
            let formattedInput = "";
            for (let i = 0; i < input.length; i++) {
                if (i % 2 === 0 && i > 0) {
                    formattedInput += "/";
                }
                formattedInput += input[i];
            }

            expirationDate.value = formattedInput;
            imageExpDate.innerHTML = formattedInput;
        });

        // Handle Card Name update
        const inputCardName = document.getElementById("cardName");
        const imageCardName = document.getElementById("imageCardName");

        inputCardName.addEventListener("input", (event) => {
            imageCardName.innerHTML = event.target.value;
        });
    </script>
</main>


<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

</body>
</html>
