<!DOCTYPE html>
<html>
<head>
    <title>CRUD de gênero dos livros</title>
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
            margin-bottom: 20px; /* Espaço abaixo do título */
        }
        .container {
            width: 80%; /* Largura do container ajustada para alinhamento com a tabela */
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        table {
            width: 100%; /* Ajuste para a tabela ocupar a largura do container */
            margin: 20px 0;
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
            margin: 0 10px; /* Espaçamento entre botões ajustado */
        }
        .link-button:hover {
            background-color: #0056b3;
        }
        .footer-links {
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 10px 0;
        }
    </style>    
</head>
<body>
    <div class="container">
        <h1>CRUD de gênero dos livros</h1>
        <a href="cadastro.php" class="link-button">Adicionar Gênero</a>
        <table>
            <tr>
                <th>Código do gênero</th>
                <th>Nome do gênero</th>
                <th>Ações</th>
            </tr>
            <?php
            include('conn.php');
            $stmt = $pdo->query('SELECT * FROM tbgenero');
            while ($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>{$row['codGenero']}</td>";
                echo "<td>{$row['genero']}</td>";
                echo "<td>
                          <a href='editar.php?id={$row['codGenero']}' class='link-button'>Editar</a> |
                          <a href='excluir.php?id={$row['codGenero']}' class='link-button'>Excluir</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <div class="footer-links">
        <a href="../index.html" class="link-button">Página Inicial</a>
    </div>
</body>
</html>

