<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="form-container">
        <form method="POST" action="review.php" class="review-form">
            <h2>Sua Avaliação</h2>
            <label for="feedback">Escreva a sua avaliação</label><br>
            <textarea name="feedback" rows="5" cols="50" required>     
            </textarea><br>

            <label for="nota">Nota (1 = ruim, 5 = excelente)</label>
            <select name="nota" required>
                <option value="">Selecione</option>
                <option value="1">1 - Terrivel</option>
                <option value="2">2 - Ruim</option>
                <option value="3">3 - Neutro</option>
                <option value="4">4 - Bom</option>
                <option value="5">5 - Excelente</option>
            </select><br>
            <input type="submit" value="Enviar">
        </form>
    </main>

</body>
</html>

