<?php
$host = 'db';
$db   = 'teste';
$user = 'root';
$pass = 'root';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Conexão com o banco de dados bem-sucedida no servidor: " . gethostname() . "<br>";
    
    // Consulta a tabela de exemplo
    $stmt = $pdo->query('SELECT * FROM usuarios');
    echo "<h3>Usuários:</h3>";
    while ($row = $stmt->fetch()) {
        echo "ID: " . $row['id'] . " - Nome: " . $row['nome'] . "<br>";
    }
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}
?>
