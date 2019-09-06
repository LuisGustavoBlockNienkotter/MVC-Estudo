<?php
    require_once "../autoload.php";
    require_once "../Model/DTO/Cliente.class.php";
    require_once "../Model/DAO/MySQL/MySQL.class.php";
    require_once "../IPersistencia.class.php";
    require_once "../Model/BO/Persistencia.class.php";
    $cli = new Cliente("nome5", 44, "cidade5", "estado5", "pais5", "email5");
    $cli->setId(5);
    $mysql = new MySQL();
    $p = new Persistencia($mysql);
    //$p->inserirCliente($cli);
    $cliAlt = $p->procurarClientePorId(5);
    $cliAlt->setIdade(78);
    $p->alterarCliente($cliAlt);
    //$p->excluirCliente($cli);
    foreach ($p->listarTodosClientes() as $key => $value) {
        echo $value."<br>";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TESTE</title>
</head>
<body>
    
</body>
</html>