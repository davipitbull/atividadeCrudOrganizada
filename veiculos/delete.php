<?php
include('../includes/db.php');

$id = $_GET['id'];

$stmt = $pdo->prepare('DELETE FROM veiculos WHERE id = :id');
$stmt->execute(['id' => $id]);

header('Location: index.php');
exit();
?>
