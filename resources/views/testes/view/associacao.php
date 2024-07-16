<?php

use Imply\ListaDesafios03\controller\PlanoController;

session_start();
$planoController = new PlanoController();
if(!empty($_SESSION["idplano"])){
    $plano = $planoController->listarPlanoPorId($_SESSION['idplano']);
}
$valorDesconto = $planoController->getDescontoAssociacao();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!isset($_SESSION['token'])){
        $_SESSION['error'] = 'Complete o login para se associar';
        header('location: /login');
    }
    $_SESSION['planoContratado'] = $plano;
    header('location: /parcelas');
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <title>Associação</title>
</head>
<body>
<?php include ('includes/nav.html'); ?>
<section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0">Associação</h1>
                                    </div>
                                    <?php include ('includes/planoSelecionado.php'); ?>
                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="./planos" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Outro plano</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 bg-body-tertiary">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Informações</h3>
                                    <hr class="my-4">
                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Preço Total</h5>
                                        <?php if($plano->getValor() != $valorDesconto){
                                            }else {
                                            echo '<h5>'.$plano->getValor().'</h5>';
                                        }?>

                                    </div>
                                    <form method="post">
                                        <input type="hidden" name="associar">
                                        <input type="submit" data-mdb-button-init data-mdb-ripple-init
                                               class="btn btn-dark btn-block btn-lg"
                                               data-mdb-ripple-color="dark" value="Finalizar Associação">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
