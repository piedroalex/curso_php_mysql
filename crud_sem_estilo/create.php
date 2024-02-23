<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);

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
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
