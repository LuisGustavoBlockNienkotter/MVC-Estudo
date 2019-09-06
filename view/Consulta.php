<?php
require_once "../autoload.php";
require_once "../controller/Controller.class.php";
require_once "../Model/DAO/MySQL/MySQL.class.php";
require_once "../controller/ControllerCliente.class.php";

$nomeConsulta = isset($_POST['nomeConsulta'])?$_POST['nomeConsulta']:"";

$control = new Controller();
$clientes = $control->listarTodosClientes();

if (isset($_POST['nomeConsulta'])) {
    $clientes = $control->procurarClientePorNome($nomeConsulta);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\bootstrap.css">
    <title>Consultas</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12  d-flex justify-content-center">
                <h1>Consultas</h1>
            </div>
        </div>
        <form method="post">
            <div class="row">
                <div class="col-md-7 d-flex justify-content-end">
                    <input type="text" class="form-control" name="nomeConsulta" placeholder="Nome" style="width: 400px;">
                </div>
                <div class="col-md-5">
                    <input type="submit" class="btn btn-success" value="Buscar" name="buscar">
                </div>
            </div>
        </form>
        <br>
        <div class="row">
            <div class="col-md-12">
                <?php 
                include_once "tabelaClientes.php";
                ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php

?>


