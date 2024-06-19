<?php


require_once "dbConnection.php";
class Database_dao
{
    static $db;

    public function __construct()
    {
        self::$db = dbConnection::getConnect();
    }

    function insertProduto()
    {
        $con = self::$db;
        $sql = "INSERT INTO lojaEsportiva.produtos
                (nome, preco)
                VALUES (:nome, :preco);";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(':nome', $_POST["nome"]);
        $stmt->bindValue(':preco', $_POST['preco']);
       
        $stmt->execute();
     
    }

    public static function buscarPorId($id)
    {
        
        $con = self::$db;
        $sql = "SELECT * FROM lojaEsportiva.produtos WHERE id = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        header('Location: ../index.php?nome='.$resultado['nome'].'&preco='.$resultado['preco'].'&id='.$resultado['id']);
    }

    public static function buscar()
    {
        $con = self::$db;
        $sql = "SELECT * FROM lojaEsportiva.produtos";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function deletarProduto($id)
    {

        $con = self::$db;
        $sql = "DELETE FROM lojaEsportiva.produtos WHERE id = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        header('Location: ../index.php');
    }

    public static function alterarProduto($id)
    {
  
        $con = self::$db;
        $sql = "UPDATE lojaEsportiva.produtos SET nome = :nome, preco = :preco WHERE id = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(':nome', $_POST["nome"]);
        $stmt->bindValue(':preco', $_POST['preco']);
        $stmt->bindValue(':id', $id);

        $stmt->execute();
    }

}


// RECEBE A REQUISICAO -> VERIFICA O TIPO -> VERIFICA o  PARAMETRO -> PEGA O ID PELO PARAMETRO

$dao = new DataBase_dao();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['alterar'])) {
        $id = $_POST['alterar'];
        $dao->alterarProduto($id);
        error_log("O parâmetro alterar está presente na solicitação POST. Valor: $id");
        header('Location: ../index.php');
        exit;
        
    } else if (isset($_POST['buscarPorId'])) {
        $id = $_POST['buscarPorId'];
        $dao->buscarPorId($id);
        //header('Location: ../index.php');
        
    } else {
        
        $dao->insertProduto();
        header('Location: ../index.php');
    }
}




if ($_SERVER['REQUEST_METHOD'] === "GET") {


    if (isset($_GET['deletar'])) {

        $id = $_GET['deletar'];
        $dao->deletarProduto($id);
    }
    

}



?>