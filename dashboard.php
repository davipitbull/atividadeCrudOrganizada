<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <nav>
        <a href="logout.php">Sair</a>
    </nav>

    <div class="sidebar">
        <ul>
            <li><a href="./agencias/index.php">Agências</a></li>
            <li><a href="./veiculos/index.php">Veículos</a></li>
        </ul>
    </div>

    <div class="main-content">
        <h1>Dashboard</h1>
        <!-- Conteúdo do dashboard -->
    </div>

</body>

</html>