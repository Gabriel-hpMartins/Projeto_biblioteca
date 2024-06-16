<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Autor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            justify-content: center;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .link-button {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            margin: 0 5px; /* Adiciona uma margem dos lados para garantir um espaço entre os botões */
        }
        .link-button:hover, a:hover {
            background-color: #0056b3;
        }
        .footer-links {
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 10px 10px;
            gap: 1000px;
        }
    </style>
</head>
<body>
    <h1>CRUD de Autor</h1>
    <a href="cadastro.php" class="link-button">Adicionar Autor</a>
    <table>
        <tr>
            <th>Código do autor</th>
            <th>Nome do Autor</th>
            <th>Ações</th>
        </tr>
        <?php
        include('conn.php');
        $stmt = $pdo->query('SELECT * FROM tbautor');
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>{$row['codAutor']}</td>";
            echo "<td>{$row['nomeAutor']}</td>";
            echo "<td>
                      <a href='editar.php?id={$row['codAutor']}' class='link-button' >Editar</a>
                      <a href='excluir.php?id={$row['codAutor']}' class='link-button'>Excluir</a>
                  </td>";
            echo "</tr>";   
        }
        ?>
    </table>
    <div class="footer-links">
        <a href="../index.html" class="link-button">Página Inicial</a>
    </div>
</body>
</html>

