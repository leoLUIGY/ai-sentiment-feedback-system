<?php

require_once __DIR__ . "/../config/db.php";

class ReviewDAL {
    private $conn;
    private $table_name = "reviews";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($feedback, $sentimento) {


        $stmt = $this->conn->prepare("INSERT INTO {$this->table_name} (texto, sentimento) values (:feedback, :sentimento)");
        $stmt->bindParam(':feedback', $feedback, PDO::PARAM_STR);
        $stmt->bindParam(':sentimento', $sentimento, PDO::PARAM_STR);
        //        $stmt->bindParam(':sentimento', $sentimentos[$nota], PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT *
                    FROM {$this->table_name}
                    ORDER BY id DESC LIMIT 10");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}
