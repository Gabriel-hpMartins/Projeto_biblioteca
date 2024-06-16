<!DOCTYPE html>
<html>
<head>
    <title>CRUD de cadastro de livros</title>
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
    <h1>CRUD de livros</h1>
    <a href="cadastro.php" class="link-button">Adicionar Livro</a>
    <table>
        <tr>
            <th>Código do livro</th>
            <th>Nome do livro</th>
            <th>Ano de lançamento</th>
            <th>Ações</th>
        </tr>
        <?php
        include('conn.php');
        $stmt = $pdo->query('SELECT * FROM tblivro');
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>{$row['codLivro']}</td>";
            echo "<td>{$row['nomeLivro']}</td>";
            echo "<td>{$row['anoLancamento']}</td>";
            echo "<td>
                      <a href='editar.php?id={$row['codLivro']}' class='link-button'>Editar</a>&nbsp;|&nbsp;
                      <a href='excluir.php?id={$row['codLivro']}' class='link-button'>Excluir</a>
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
