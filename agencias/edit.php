<?php
include('../includes/db.php');

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM agencias WHERE id = :id');
$stmt->execute(['id' => $id]);
$agencia = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];

    $stmt = $pdo->prepare('UPDATE agencias SET nome = :nome, cnpj = :cnpj WHERE id = :id');
    $stmt->execute(['nome' => $nome, 'cnpj' => $cnpj, 'id' => $id]);

    header('Location: index.php');
    exit();
}
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<div class="main-content">
    <h1>Editar Agência</h1>
    <form action="edit.php?id=<?php echo $id; ?>" method="post">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($agencia['nome']); ?>" required>
        <label for="cnpj">CNPJ</label>
        <input type="text" id="cnpj" name="cnpj" value="<?php echo htmlspecialchars($agencia['cnpj']); ?>" required>
        <button type="submit">Salvar</button>
    </form>
</div>

</body>
</html>
