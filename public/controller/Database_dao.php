<?php


require_once "dbConnection.php";
class Database_dao
{
    static $db;

    public function __construct()
    {
        self::$db = dbConnection::getConnect();
    }

    // function insertTrabalhador()
    // {
    // 
    // }


    // public static function buscarPorId($id)
    // {
    //     
    // }
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
//     public static function alterarTrabalhador($id)
//     {
//       
// }
}


// RECEBE A REQUISICAO -> VERIFICA O TIPO -> VERIFICA o  PARAMETRO -> PEGA O ID PELO PARAMETRO

$dao = new DataBase_dao();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['alterar'])) {
        $id = $_POST['alterar'];
        $formDAO->alterarTrabalhador($id);
        error_log("O parâmetro alterar está presente na solicitação GET. Valor: $id");
        header('Location: dados.php');

    } else {

        $formDAO->insertTrabalhador();
    }


}



if ($_SERVER['REQUEST_METHOD'] === "GET") {


    if (isset($_GET['deletar'])) {

        $id = $_GET['deletar'];
        $dao->deletarProduto($id);
    }
    

}




?>