<?php
include 'conexao.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM usuarios WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

header("Location: read.php");
?>
