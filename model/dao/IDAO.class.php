<?php

interface IDAO{

    public function inserir($objeto);
    public function listarTodos();
    public function procurarPorId($id);
    public function procurarPorNome($id);
    public function alterar($objeto);
    public function excluir($objeto);

}

?>