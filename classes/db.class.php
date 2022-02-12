<?php
class DB {
    private static $_instance = null;
    public $pdo;
    public $servername = 'localhost';
    public $username = 'root';
    public $password = '';

    function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=rasporedipi", $this->username, $this->password);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getDbInstance() {
        return $this->pdo;
    }

    public function print($msg) {
        echo '<script>console.log("'.$msg.'"); </script>';
    }
}