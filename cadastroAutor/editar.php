<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $codAutor = $_POST['codAutor'];
    $nomeAutor = $_POST['nomeAutor'];

    $stmt = $pdo->prepare('UPDATE tbautor SET nomeAutor = ? WHERE codAutor = ?');
    $stmt->execute([$nomeAutor, $id]);

    header('Location: index.php');
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM tbautor WHERE codAutor = ?');
$stmt->execute([$id]);
$autor = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Autor</title>
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
        <h2>Editar Autor</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $autor['codAutor']; ?>">
            <label for="nomeAutor">Nome do Autor:</label>
            <input type="text" name="nomeAutor" value="<?php echo $autor['nomeAutor']; ?>" required><br>

            <input type="submit" value="Editar">
        </form>
    </div>
</body>
</html>
