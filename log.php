<?php
session_start();
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = ? AND password = ?");
    $stmt->execute([$email, $password]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['loggedin'] = $user['id'];
        $_SESSION['user_name'] = $user['nome'];
        header("Location: dashboard.php");
    } else {
        header("Location: index.php");
    }
}
?>
