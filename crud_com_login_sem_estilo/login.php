<?php
include 'funcoes.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $id = verificarCredenciais($email, $senha);

    if ($id) {
        $_SESSION['id'] = $id;

        // Definindo um cookie com o nome de usuário por 1 hora
        setcookie('email', $email, time() + 3600);

        header("Location: read.php");
    } else {
        $mensagemErro = "Credenciais inválidas. Por favor, tente novamente.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="login.php">
        Email: <input type="text" name="email"><br>
        Senha: <input type="password" name="senha"><br>
        <input type="submit" value="Entrar">
    </form>
    <br/>
    <?php if(isset($mensagemErro)) { echo $mensagemErro; } ?>
</body>
</html>
