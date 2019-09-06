<?php
require_once "../autoload.php";
require_once "../Model/DTO/Cliente.class.php";


class ControllerCliente{
    private $p;
    private $cliente;
    public function __construct($persistencia) {
        $this->p = $persistencia;
    }
    public function montarObjeto($id, $nome, $idade, $pais, $estado, $cidade, $email){
        $this->cliente = new Cliente($nome, $idade, $pais, $estado, $cidade, $email);
    }
    public function inserir(){
        if (!is_null($this->getCliente())) {
            $this->p->inserirCliente($this->getCliente());
        }
    }
    public function listarTodos(){
        return $this->p->listarTodosClientes();
    }
    public function procurarPorId($id){
        return $this->p->procurarClientePorId($id);
    }
    public function procurarPorNome($nome){
        return $this->p->procurarClientePorNome($nome);
    }
    public function alterar($cli){
        $this->p->alterarCliente($cli);
    }
    public function excluir(){
        $this->p->excluirCliente($this->cliente);
    }
    public function getCliente() {
        return $this->cliente;
    }
    public function setCliente($cliente){
        $this->cliente = $cliente;
        return $this;
    }
}



?>