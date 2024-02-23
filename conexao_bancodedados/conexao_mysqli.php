<?php

$servername = "localhost";
$username = "usuario";
$password = "senha";
$database = "meubanco";

// Criando uma conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
} else {
    echo "Conexão bem-sucedida";
}

?>