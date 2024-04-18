
<!doctype html>
<html lang="en">
<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
</head>
<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }
    .h-custom {
        height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }


</style>
<body>
<header>
    <!-- place navbar here -->

</header>
<main>

    <section class="vh-100">

        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://static.vecteezy.com/system/resources/previews/009/890/457/non_2x/user-icon-for-web-site-login-head-sign-icon-design-free-vector.jpg"
                         class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <h1>QuetzalCommerce</h1>
                    <form>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" [(ngModel)]="cui"  name="cui" class="form-control form-control-lg"
                                   placeholder="Ingrese su CUI" />
                            <label class="form-label" for="form3Example3">Nombre de usuario</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" [(ngModel)]="password" name="password"  class="form-control form-control-lg"
                                   placeholder="Ingrese su contraseña" />
                            <label class="form-label" for="form3Example4">Contraseña</label>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="button" (click)="login()" class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Iniciar Sesion</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Aun no tienes cuenta?<a href="/register"
                                                                                            class="link-danger">Registrate</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>








</main>
<footer>
    <!-- place footer here -->
    <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
            eCommerceGT.
        </div>
        <!-- Copyright -->


        <!-- Right -->
    </div>
</footer>
<!-- Bootstrap JavaScript Libraries -->
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"
></script>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"
></script>
</body>
</html>
