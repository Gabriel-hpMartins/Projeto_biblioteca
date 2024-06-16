<?php
include 'conn.php'; // Inclui a conexão com o banco

$termoBusca = $_POST['termoBusca'] ?? '';

if ($termoBusca == 'all') {
    // Query que busca todos os livros
    $stmt = $pdo->query("SELECT * FROM tblivro");
} else if (!empty($termoBusca)) {
    // Query que busca livros com base no termo
    $stmt = $pdo->prepare("SELECT * FROM tblivro WHERE nomeLivro LIKE ?");
    $stmt->execute(["%$termoBusca%"]);
} else {
    echo "Digite um termo para buscar ou clique em mostrar todos para ver todos os livros.";
    exit;
}

echo "<table><tr><th>ID</th><th>Nome do Livro</th><th>Ano de Lançamento</th></tr>";
while ($row = $stmt->fetch()) {
    echo "<tr><td>{$row['codLivro']}</td><td>{$row['nomeLivro']}</td><td>{$row['anoLancamento']}</td></tr>";
}
echo "</table>";
?>

