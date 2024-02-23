<?php

$servername = "localhost";
$username = "usuario";
$password = "senha";
$database = "meubanco";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem-sucedida";
} catch(PDOException $e) {
    echo "Conexão falhou: " . $e->getMessage();
}

?>