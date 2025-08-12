<?php

require_once __DIR__ . "../vendor/autoload.php";
require_once __DIR__ . "/DAL/ReviewDAL.php";

$reviewDAL = new ReviewDAL();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $feedback = trim($_POST["feedback"]);
    $nota= intval($_POST["nota"]);

    if (!empty($feedback)) {
        $sentimentos = ["terrivel","ruim", "neutro", "bom", "excelente"];

        $reviewDAL->create($feedback, $sentimentos[$nota]);
        
        echo "Avalição enviada com sucesso!";
    }else {
        echo "Por favor! escreva sua avaliação.";
    }
} 

$avaliacoes = $reviewDAL->getAll();

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


