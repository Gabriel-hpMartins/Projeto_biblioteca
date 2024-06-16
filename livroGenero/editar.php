<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $codGenero = $_POST['codGenero'];
    $genero = $_POST['genero'];

    $stmt = $pdo->prepare('UPDATE tbgenero SET genero = ? WHERE codGenero = ?');
    $stmt->execute([$genero, $id]);

    header('Location: index.php');
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM tbgenero WHERE codGenero = ?');
$stmt->execute([$id]);
$genero = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Gênero</title>
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
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            margin-top: 0;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
        }
        input[type="text"], input[type="submit"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Gênero</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $genero['codGenero']; ?>">
            <label for="genero">Nome do gênero:</label>
            <input type="text" name="genero" value="<?php echo $genero['genero']; ?>" required><br>

            <input type="submit" value="Editar">
        </form>
    </div>
</body>
</html>
