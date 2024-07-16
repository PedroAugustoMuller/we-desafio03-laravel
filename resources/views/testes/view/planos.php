<?php
session_start();
use Imply\ListaDesafios03\controller\PlanoController;

$planoController = new PlanoController();
$planos = $planoController->listarPlanos();
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idplano']))
{
    $_SESSION['idplano'] = $_POST['idplano'];
    header('location: /associacao');
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../public/styles/planos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <title>Planos</title>
</head>
<body>
<?php include('includes/nav.html');?>
<section style="background-color: #eee;">
    <div class="container py-5">
        <h4 class="text-center mb-5"><strong>Planos</strong></h4>
        <div class="container-planos">
            <?php include('includes/listagemPlanos.php')?>
        </div>
    </div>
</section>
<?php include('includes/footer.html')?>
</body>
</html>
