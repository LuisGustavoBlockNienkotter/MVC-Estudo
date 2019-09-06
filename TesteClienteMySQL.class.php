<?php 
declare(strict_types=1);
//require_once "autoload.php";
require_once "Model/DTO/Cliente.class.php";
require_once "Model/DAO/MySQL/MySQL.class.php";
require_once "IPersistencia.class.php";
require_once "Model/BO/Persistencia.class.php";
use PHPUnit\Framework\TestCase;
final class TesteClienteMySQL extends TestCase{
    
    private $mysql;
    private $p;

	public function testeInserir(){
        $mysql = new MySQL();
        $p = new Persistencia($mysql);
        $lista = $p->listarTodosClientes();
        $tamInicial = sizeof($lista);
        $cliTeste = new Cliente("TESTE", 1, "CIDADE", "ESTADO", "PAIS", "EMAIL");
        $cliTeste->setId(9999);
        $p->inserirCliente($cliTeste);
        $this->assertEquals(sizeof($p->listarTodosClientes()), $tamInicial+1);
	}

	public function testeProcurarPorId()
	{
        $mysql = new MySQL();
        $p = new Persistencia($mysql);
		$cliTeste = $p->procurarClientePorId(9999);
		$this->assertEquals("TESTE", $cliTeste->getNome());
    }
    public function testeAlterar()
	{
        $mysql = new MySQL();
        $p = new Persistencia($mysql);
		$cliTeste = $p->procurarClientePorId(9999);
        $cliTeste ->setIdade(5);
        $p->alterarCliente($cliTeste);
        $cliAlt = $p->procurarClientePorId(9999);
		$this->assertEquals($cliAlt->getIdade(), $cliTeste->getIdade());
    }
    public function testeExcluir()
	{
        $mysql = new MySQL();
        $p = new Persistencia($mysql);
        $lista = $p->listarTodosClientes();
        $tamInicial = sizeof($lista);
		$cliTeste = $p->procurarClientePorId(9999);
		$p->excluirCliente($cliTeste);
		$this->assertEquals(sizeof($p->listarTodosClientes()), $tamInicial-1);
	}
}


 ?>