<?php
require "../autoload.php";
require_once "../Model/DAO/MySQL/MySQL.class.php";
require_once "../IPersistencia.class.php";
require_once "../Model/BO/Persistencia.class.php";
require_once "../controller/ControllerCliente.class.php";


class Controller{

    
    private $controllerCliente;

    public function __construct($per = null) {
        if (is_null($per)) {
            $per = new MySQL();
        }
        $persistencia = new Persistencia($per);
        $this->controllerCliente = new ControllerCliente($persistencia);
    }

    public function inserirCliente(){
        $this->controllerCliente->inserir();
    }
    public function listarTodosClientes(){
        return $this->controllerCliente->listarTodos();
    }
    public function procurarClientePorId($id){
        return $this->controllerCliente->procurarPorId($id);
    }
    public function procurarClientePorNome($nome){
        return $this->controllerCliente->procurarPorNome($nome);
    }
    public function alterarCliente($cli){
        $this->controllerCliente->alterar($cli);
    }
    public function excluirCliente(){
        $this->controllerCliente->excluir();
    }
    public function montarCliente($id, $nome, $idade, $pais, $estado, $cidade, $email){
        $this->controllerCliente->montarObjeto($id, $nome, $idade, $pais, $estado, $cidade, $email);
    }
    public function getCliente()
    {
        return  $this->controllerCliente->getCliente();
    }

}


?>