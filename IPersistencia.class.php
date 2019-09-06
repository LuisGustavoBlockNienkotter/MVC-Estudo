<?php

interface IPersistencia{

    public function inserirCliente($objeto);
    public function listarTodosClientes();
    public function procurarClientePorId($id);
    public function procurarClientePorNome($nome);
    public function alterarCliente($objeto);
    public function excluirCliente($objeto);

}

?>