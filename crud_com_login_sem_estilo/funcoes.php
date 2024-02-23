<?php
include 'conexao.php';

function verificarCredenciais($email, $senha) {
    global $conn;

    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['id'] ?? false;
}

function logout() {
    // Inicia a sessão
    session_start();

    // Limpa todas as variáveis de sessão
    $_SESSION = array();

    // Destroi a sessão
    session_destroy();

    // Limpa e expira o cookie de nome de usuário
    setcookie('username', '', time() - 3600);

    // Redireciona o usuário para a página de login
    header("Location: login.php");
    exit;
}

if (isset($_GET['logout'])) {
    logout();
}

?>
