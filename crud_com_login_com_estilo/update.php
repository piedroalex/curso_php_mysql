<?php
include 'conexao.php';

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    if(!empty($nome) && !empty($email)){
        $stmt = $conn->prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }
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
    <title>Editar Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin: 20px 0;
        }
        input[type="text"] {
            width: 250px;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Editar Usuário</h2>
    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        Nome: <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>"><br>
        Email: <input type="text" name="email" value="<?php echo $usuario['email']; ?>"><br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
