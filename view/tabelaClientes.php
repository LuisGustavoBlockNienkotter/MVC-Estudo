<?php
    $tabela="";
    foreach ($clientes as $cliente) {
        $tabela.="<tr><td class='col-md-1'>".$cliente->getId()."</td>".
        "<td class='col-md-1'>".$cliente->getNome()."</td><td class='col-md-1'>".$cliente->getIdade().
        "</td><td class='col-md-1'>".$cliente->getCidade()."</td><td class='col-md-1'>".$cliente->getEstado().
        "</td><td class='col-md-1'>".$cliente->getPais()."</td><td class='col-md-1'>".$cliente->getEmail()."</td>".
        "<td class='col-md-1'><button class='btn btn-danger' onclick='codigo.value=\"".$cliente->getId()."\"; return remove();'>Excluir</button></td></tr>".
        "<td class='col-md-1'><a href=\"http://localhost/projetos/MVC/view/Cadastrar.php?idAlt=".$cliente->getId()."\"><button class='btn btn-info'>Alterar</button></a></td></tr>";
    }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<table id="tabelaTurma" class="display">
<thead><tr><th class='col-md-1'>ID</th><th class='col-md-1'>Nome</th><th class='col-md-1'>Idade</th><th class='col-md-1'>Cidade</th><th class='col-md-1'>Estado</th><th class='col-md-1'>Pais</th><th class='col-md-1'>Email</th><th class='col-md-1'>Excluir</th><th class='col-md-1'>Alterar</th></tr></thead>
    <form method="post" name="Form">
        <input type="hidden" name="codigo" id="codigo">
        <tbody><?= $tabela?></tbody>
    </form>
</table>
<script>
    function remove(){
        document.Form.submit();
        return true;
    }
    $(document).ready( function () {
        $('#tabelaTurma').DataTable();
    } );
</script>
