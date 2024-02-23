<?php
include 'conexao.php';

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);

    $stmt->execute();

    header("Location: read.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Novo Usuário</title>
</head>
<body>
    <h2>Novo Usuário</h2>
    <form method="post" action="create.php">
        Nome: <input type="text" name="nome"><br>
        Email: <input type="text" name="email"><br>
        Senha: <input type="password" name="senha"><br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
