<?php 

require_once "C:\\"."xampp\htdocs\projetos\MVC\autoload.php";

class Conexao
{
	
	private $pdo;


    /**
     * Class Constructor
     * @param    $pdo   
     */
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=mvc', "root","");
    }


    /**
     * @return mixed
     */
    public function getPdo()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=mvc', "root","");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->pdo;
    }

    /**
     * @param mixed $pdo
     *
     * @return self
     */
    public function setPdo($pdo)
    {
        $this->pdo = $pdo;

        return $this;
    }
}


 ?>