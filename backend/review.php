<?php

require_once __DIR__ . "../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "../");
$dotenv->load();

$host = $_ENV['DB_HOST'];
$db   = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASSWORD'];

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
try{
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Avalição enviada com sucesso!";
} catch (PDOException $e) {
    die("Erro na conexão". $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $feedback = trim($_POST["feedback"]);
    $nota= intval($_POST["nota"]);

    if (!empty($feedback)) {
        $sentimentos = ["terrivel","ruim", "neutro", "bom", "excelente"];


        $stmt = $pdo->prepare("INSERT INTO reviews (texto, sentimento) values (:feedback, :sentimento)");
        $stmt->bindParam(':feedback', $feedback, PDO::PARAM_STR);
        $stmt->bindParam(':sentimento', $sentimentos[$nota], PDO::PARAM_STR);
        $stmt->execute();

        echo "Avalição enviada com sucesso!";
    }else {
        echo "Por favor! escreva sua avaliação.";
    }
} 

$stmt = $pdo->query("SELECT id, texto, sentimento
                    FROM reviews
                    ORDER BY id DESC LIMIT 10");

$avaliacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($avaliacoes) {
    foreach ($avaliacoes as $av) {
        echo "<p><strong>ID:</strong> {$av['id']}<br>";
        echo "<strong>Avaliação:</strong> {$av['texto']}<br>";
        echo "<strong>Sentimento:</strong> " . ($av['sentimento'] ?? 'Não definido') . "<br>";
        echo "</p><hr>";
    }
} else {
    echo "Nenhuma avaliação encontrada";
}


