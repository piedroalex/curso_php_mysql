<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    if(!empty($nome) && !empty($email)){
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }

    header("Location: read.php");
}
?>
