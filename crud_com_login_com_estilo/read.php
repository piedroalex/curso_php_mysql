<?php 
include 'conexao.php'; 

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$username = $_COOKIE['email'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Usuários</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        a {
            display: inline-block;
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        .create {
            background-color: #4CAF50;
        }        
        .create:hover {
            background-color: #45a049;
        }
        .edit {
            background-color: #008CBA;
        }
        .edit:hover {
            background-color: #006F9A;
        }
        .delete {
            background-color: #f44336;
        }
        .delete:hover {
            background-color: #d32f2f;
        }
        .logout {
            background-color: #787878
;
        }        
        .logout:hover {
            background-color: #616161;
        }
    </style>
</head>
<body>
    <?php echo "<h1>Bem-vindo(a), $username! Você está logado(a).</h1>"; ?>
    <h2>Listagem de Usuários</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php
        $stmt = $conn->query("SELECT id, nome, email FROM usuarios");
        $usuarios = $stmt->fetchAll();
        if (!empty($usuarios)) {
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
        } else {
            echo "<tr>";
                echo "<td colspan='4'>Nenhum registro cadastrado.</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br/>
    <a class="create" href="create.html">Novo Usuário</a>    
    <a class="logout" href="funcoes.php?logout=true">Logout</a>
</body>
</html>
