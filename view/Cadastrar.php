<?php
require_once "../autoload.php";
require_once "../controller/Controller.class.php";
require_once "../Model/DAO/MySQL/MySQL.class.php";
require_once "../controller/ControllerCliente.class.php";

$idAlt = isset($_GET["idAlt"])?$_GET["idAlt"]:0;

$id = isset($_POST['codigo'])?$_POST['codigo']:0;
$nome = isset($_POST['nome'])?$_POST['nome']:"";
$idade = isset($_POST['idade'])?$_POST['idade']:0;
$pais = isset($_POST['pais'])?$_POST['pais']:"";
$estado = isset($_POST['estado'])?$_POST['estado']:"";
$cidade = isset($_POST['cidade'])?$_POST['cidade']:"";
$email = isset($_POST['email'])?$_POST['email']:"";


$control = new Controller();

$altCli = null;
$altCli = $control->procurarClientePorId($idAlt);

if ($idAlt != 0 && isset($_POST['salvar'])) {
    $altCli->setNome($nome);
    $altCli->setIdade($idade);
    $altCli->setPais($pais);
    $altCli->setEstado($estado);
    $altCli->setCidade($cidade);
    $altCli->setEmail($email);
    $control->alterarCliente($altCli);
}

$control->montarCliente($id, $nome, $idade, $pais, $estado, $cidade, $email);
if (!is_null($control->getCliente())) {
    $control->inserirCliente();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\bootstrap.css">
    <title>Cadastrar</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12  d-flex justify-content-center">
                <h1>Cadastrar</h1>
            </div>
        </div>
        <form method="post">
            <div class="row">
                <div class="col-md-4 d-flex justify-content-end">
                    <h3>Código: </h3>
                </div>
                <div class="col-md-8">
                    <div class="col-md-6">
                        <input type="number" min="0" class="form-control" name="codigo" 
                        value=<?php
                                    if (isset($_POST['codigo'])) {
                                        echo $id;
                                    } 
                                    if (isset($_GET['idAlt'])) {
                                        echo $idAlt;
                                    } 
                                ?>>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex justify-content-end">
                    <h3>Nome: </h3>
                </div>
                <div class="col-md-8">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="nome" 
                        value=<?php
                                    if (isset($_POST['nome'])) {
                                        echo $nome;
                                    } 
                                    if (isset($_GET['idAlt'])) {
                                        echo $altCli->getNome();
                                    } 
                                ?>>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex justify-content-end">
                    <h3>Idade: </h3>
                </div>
                <div class="col-md-8">
                    <div class="col-md-6">
                        <input type="number" min="0" class="form-control" name="idade" value=<?php
                                    if (isset($_POST['idade'])) {
                                        echo $idade;
                                    } 
                                    if (isset($_GET['idAlt'])) {
                                        echo $altCli->getIdade();
                                    } 
                                ?>>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex justify-content-end">
                    <h3>Pais: </h3>
                </div>
                <div class="col-md-8">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="pais" value=<?php
                                    if (isset($_POST['pais'])) {
                                        echo $pais;
                                    } 
                                    if (isset($_GET['idAlt'])) {
                                        echo $altCli->getPais();
                                    } 
                                ?>>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex justify-content-end">
                    <h3>Estado: </h3>
                </div>
                <div class="col-md-8">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="estado" value=<?php
                                    if (isset($_POST['estado'])) {
                                        echo $estado;
                                    } 
                                    if (isset($_GET['idAlt'])) {
                                        echo $altCli->getEstado();
                                    } 
                                ?>>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex justify-content-end">
                    <h3>Cidade: </h3>
                </div>
                <div class="col-md-8">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="cidade" value=<?php
                                    if (isset($_POST['cidade'])) {
                                        echo $cidade;
                                    } 
                                    if (isset($_GET['idAlt'])) {
                                        echo $altCli->getCidade();
                                    } 
                                ?>>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex justify-content-end">
                    <h3>Email: </h3>
                </div>
                <div class="col-md-8">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="email" value=<?php
                                    if (isset($_POST['email'])) {
                                        echo $email;
                                    } 
                                    if (isset($_GET['idAlt'])) {
                                        echo $altCli->getEmail();
                                    } 
                                ?>>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <input type="submit" class="btn btn-success" value="Salvar" name="salvar">
                </div>
            </div>
        </form>
        <br>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <a href="http://localhost/projetos/MVC/view/Consulta.php"><button class="btn btn-success">Consultas</button></a>
            </div>
        </div>
    </div>
</body>
</html>
<?php

?>


