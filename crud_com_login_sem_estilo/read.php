<?php
include 'conexao.php';

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$username = $_COOKIE['email'] ?? '';

$stmt = $conn->query("SELECT id, nome, email FROM usuarios");
$usuarios = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Usuários</title>
</head>
<body>
    <?php echo "<h1>Bem-vindo(a), $username! Você está logado.</h1>"; ?>
    <h2>Listagem de Usuários</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php
        foreach ($usuarios as $usuario) {
            echo "<tr>";
            echo "<td>".$usuario["id"]."</td>";
            echo "<td>".$usuario["nome"]."</td>";
            echo "<td>".$usuario["email"]."</td>";
            echo "<td>
                    <a class='edit' href='update.php?id=".$usuario["id"]."'>Editar</a>
                    <a class='delete' href='delete.php?id=".$usuario["id"]."'>Excluir</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <a href="create.php">Novo Usuário</a>
    <a href="funcoes.php?logout=true">Logout</a>
</body>
</html>
