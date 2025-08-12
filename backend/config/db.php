<?php

require_once __DIR__ . "../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "../");
$dotenv->load();

class DATABASE {

    private $host = $_ENV['DB_HOST'];
    private $db   = $_ENV['DB_NAME'];
    private $user = $_ENV['DB_USER'];
    private $pass = $_ENV['DB_PASSWORD'];

    private $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try{
            $this->conn = new PDO($this->dsn, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Avalição enviada com sucesso!";
        } catch (PDOException $e) {
            die("Erro na conexão". $e->getMessage());
        }

        return $this->conn; 
    }

}