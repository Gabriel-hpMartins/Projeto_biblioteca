<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codGenero = $_POST['codGenero'];
    $genero = $_POST['genero'];

    $stmt = $pdo->prepare('INSERT INTO tbgenero(codGenero, genero) VALUES (?, ?)');
    $stmt->execute([$codGenero, $genero]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Gênero</title>
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
        <h2>Adicionar Gênero</h2>
        <form method="POST">
            <label for="genero">Nome do gênero:</label>
            <input type="text" name="genero" required><br>
            <input type="submit" value="Adicionar">
        </form>
        <div class="footer-links">
            <a href="../index.html" class="link-button">Página Inicial</a>
            <a href="../cadastroLivro/index.php" class="link-button">Voltar</a>
        </div>
    </div>
    <br>
</body>
</html>
