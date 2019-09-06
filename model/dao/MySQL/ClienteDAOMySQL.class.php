<?php
require_once "C:\\"."xampp\htdocs\projetos\MVC\autoload.php";
require_once "Conexao.class.php";
require_once "C:\\"."xampp\htdocs\projetos\MVC\model\dao\IDAO.class.php";
class ClienteDAOMySQL extends Conexao implements IDAO
{
    
    public function inserir($objeto){
        if ($objeto instanceof Cliente) {
            $stmt = $this->getPdo()->prepare('INSERT INTO Cliente (id, nome, idade, cidade, 
                                              estado, pais, email) VALUES(:id , :nome , :idade ,
                                              :cidade , :estado, :pais , :email)');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);  
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
            $stmt->bindParam(':cidade', $cidade, PDO::PARAM_STR);
            $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
            $stmt->bindParam(':pais', $pais, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $id = $objeto->getId();
            $nome = $objeto->getNome();
            $idade = $objeto->getIdade();
            $cidade = $objeto->getCidade();
            $estado = $objeto->getEstado();
            $pais = $objeto->getPais();
            $email = $objeto->getEmail();
            $stmt->execute();
        }
     }
    public function listarTodos(){
        try{
			$consulta = $this->getPdo()->query("SELECT * FROM Cliente;");
			$array = array();
			while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $cli = new Cliente($linha['nome'], $linha['idade'],$linha['cidade'], 
                $linha['estado'], $linha['pais'], $linha['email']);
                $cli->setId($linha['id']);
			    array_push($array, $cli);
			}
			return $array;
		} catch(PDOException $e) {
		  echo 'Error: ' . $e->getMessage();
		}
     }
    public function procurarPorId($id){
        try{
            $stmt = $this->getPdo()->prepare("SELECT * FROM Cliente
                                                WHERE id
                                                LIKE :id
                                                ORDER BY id;");
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
            $cli = null;
            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cli = new Cliente($linha['nome'], $linha['idade'], $linha['cidade'], 
                $linha['estado'], $linha['pais'], $linha['email']);
                $cli->setId($linha['id']);
            }
            return $cli;
        } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        }
     }
     public function procurarPorNome($nome){
        try{
            $stmt = $this->getPdo()->prepare("SELECT * FROM Cliente
                                                WHERE nome
                                                LIKE :nome
                                                ORDER BY nome;");
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->execute();
            $cli = null;
            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cli = new Cliente($linha['nome'], $linha['idade'], $linha['cidade'], 
                $linha['estado'], $linha['pais'], $linha['email']);
                $cli->setId($linha['id']);
            }
            return $cli;
        } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        }
     }
    public function alterar($objeto){
        try{
            $stmt = $this->getPdo()->prepare('UPDATE Cliente SET nome = :nome , idade = :idade , 
                                         cidade = :cidade , estado = :estado, 
                                         pais = :pais , email = :email WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
            $stmt->bindParam(':cidade', $cidade, PDO::PARAM_STR);
            $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
            $stmt->bindParam(':pais', $pais, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $id = $objeto->getId();
            $nome = $objeto->getNome();
            $idade = $objeto->getIdade();
            $cidade = $objeto->getCidade();
            $estado = $objeto->getEstado();
            $pais = $objeto->getPais();
            $email = $objeto->getEmail();
            $stmt->execute();
           } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
          }
     }
    public function excluir($objeto){
		try{
            if ($objeto instanceof Cliente) {
                $stmt = $this->getPdo()->prepare('DELETE FROM Cliente WHERE id = :id');
                $stmt->bindParam(':id', $id);
                $id = $objeto->getId();
                $stmt->execute();
			}
		} catch(PDOException $e) {
		  echo 'Error: ' . $e->getMessage();
		}
     }

    }


?>