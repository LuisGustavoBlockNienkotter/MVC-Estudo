<?php
//require_once "../../../autoload.php";
require_once "C:\\"."xampp\htdocs\projetos\MVC\IPersistencia.class.php";
require_once "ClienteDAOMySQL.class.php";
class MySQL implements IPersistencia
{
    private $clienteDAO;
    public function __construct() {
        $this->clienteDAO = new ClienteDAOMySQL();
    }
    public function inserirCliente($objeto){
        $this->clienteDAO->inserir($objeto);
    }
    public function listarTodosClientes(){
        return $this->clienteDAO->listarTodos();
    }
    public function procurarClientePorId($id){
        return $this->clienteDAO->procurarPorId($id);
    }
    public function procurarClientePorNome($nome){
        return $this->clienteDAO->procurarPorNome($nome);
    }
    public function alterarCliente($objeto){
        $this->clienteDAO->alterar($objeto);
    }
    public function excluirCliente($objeto){
        $this->clienteDAO->excluir($objeto);
    }
}


?>