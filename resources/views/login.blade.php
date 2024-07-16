<?php
//session_start();
//use Imply\ListaDesafios03\controller\UserController;
//
//$userController = new UserController();
//if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['cpf']))
//{
//    $userController->login($_POST['email'], $_POST['cpf']);
//}
//?><!---->
    <!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../public/styles/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
<section>
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://guiadaalma-wp.s3.amazonaws.com/prd/b2c/wp-content/uploads/2022/08/leitura-de-tarot-1210x423.jpg"
                     class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="post" action="/login">
                    @csrf
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" name="email" id="email" class="form-control form-control-lg"
                               placeholder="Enter a valid email address"/>
                        <label class="form-label" for="email">Email</label>
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-3">
                        <input type="password" name="cpf" id="cpf" class="form-control form-control-lg"
                               placeholder="Enter password"/>
                        <label class="form-label" for="cpf">CPF</label>
                    </div>
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <input type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                               style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Login">
                    </div>
                    <?php //include '../src/view/includes/error.php' ?>
                </form>
            </div>
        </div>
    </div>
    <div
</section>
</body>
</html>
