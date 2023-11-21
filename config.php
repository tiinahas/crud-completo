<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'biblioteca');

// Estabelecer a conexão com o banco de dados
$conn = new MySQLi(HOST, USER, PASS, BASE);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Definir o conjunto de caracteres para UTF-8
$conn->set_charset("utf8");
?>
