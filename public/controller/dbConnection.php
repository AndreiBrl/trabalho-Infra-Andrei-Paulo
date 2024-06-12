<?php
class dbConnection
{
    private static $db = null;
    public static function getConnect()
    {
        if (self::$db === null) {
            try {
                self::$db = new PDO("mysql:host=bancoTrabalho;dbname=lojaEsportiva", "root", "root");
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erro de conexão: " . $e->getMessage();
                exit;
            }
        }
        return self::$db;
    }
    public static function closeConnection()
    {
        self::$db = null;
 
    }
}
