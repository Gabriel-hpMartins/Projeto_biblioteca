<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codLivro = $_POST['codLivro'];
    $nomeLivro = $_POST['nomeLivro'];
    $anoLancamento = $_POST['anoLancamento'];

    $stmt = $pdo->prepare('INSERT INTO tblivro(codLivro, nomeLivro, anoLancamento) VALUES (?, ?, ?)');
    $stmt->execute([$codLivro, $nomeLivro, $anoLancamento]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Livro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between; 
            height: 300px; 
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
        }
        input[type="text"], input[type="submit"], .link-button {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"], .link-button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: block;
        }
        input[type="submit"]:hover, .link-button:hover {
            background-color: #0056b3;
        }
        .footer-links {
            display: flex;
            justify-content: center; 
            width: 100%;
            gap: 30px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Adicionar Livro</h2> <!-- Movido para fora do formulário -->
        <form method="POST">
            <label for="nomeLivro">Nome do Livro:</label>
            <input type="text" name="nomeLivro" required><br>
            <label for="anoLancamento">Ano de lançamento:</label>
            <input type="text" name="anoLancamento" required><br>
            <input type="submit" value="Adicionar">
            <br>
            <br>
        </form>
        <div class="footer-links">
            <a href="../index.html" class="link-button">Página Inicial</a>
            <a href="../cadastroLivro/index.php" class="link-button">Voltar</a>
        </div>
    </div>
</body>
</html>
