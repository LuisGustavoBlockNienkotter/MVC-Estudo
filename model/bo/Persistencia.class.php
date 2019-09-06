<?php
require_once "C:\\"."xampp\htdocs\projetos\MVC\autoload.php";

class Persistencia implements IPersistencia
{
    private $p;
    public function __construct($persistencia) {
        if($persistencia instanceof IPersistencia){
            $this->p = $persistencia;
        }
    }
    public function inserirCliente($objeto){
        $this->p->inserirCliente($objeto);
    }
    public function listarTodosClientes(){
        return $this->p->listarTodosClientes();
    }
    public function procurarClientePorId($id){
        return $this->p->procurarClientePorId($id);
    }
    public function procurarClientePorNome($nome){
        return $this->p->procurarClientePorNome($nome);
    }
    public function alterarCliente($objeto){
        $this->p->alterarCliente($objeto);
    }
    public function excluirCliente($objeto){
        $this->p->excluirCliente($objeto);
    }
}


?>