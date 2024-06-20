<?php
include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];

    $stmt = $pdo->prepare('INSERT INTO agencias (nome, cnpj) VALUES (:nome, :cnpj)');
    $stmt->execute(['nome' => $nome, 'cnpj' => $cnpj]);

    header('Location: index.php');
    exit();
}
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<div class="main-content">
    <h1>Cadastrar Agência</h1>
    <form action="create.php" method="post">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" required>
        <label for="cnpj">CNPJ</label>
        <input type="text" id="cnpj" name="cnpj" required>
        <button type="submit">Cadastrar</button>
    </form>
</div>

</body>
</html>
