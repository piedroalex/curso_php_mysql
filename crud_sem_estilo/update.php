<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);

    $stmt->execute();

    header("Location: read.php");
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT id, nome, email FROM usuarios WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$usuario = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Usuário</title>
</head>
<body>
    <h2>Atualizar Usuário</h2>
    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        Nome: <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>"><br>
        Email: <input type="text" name="email" value="<?php echo $usuario['email']; ?>"><br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
