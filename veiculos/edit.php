<?php
include('../includes/db.php');

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM veiculos WHERE id = :id');
$stmt->execute(['id' => $id]);
$veiculo = $stmt->fetch(PDO::FETCH_ASSOC);

$query = $pdo->query('SELECT * FROM agencias');
$agencias = $query->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $agencia_id = $_POST['agencia_id'];
    $valor = $_POST['valor'];

    $stmt = $pdo->prepare('UPDATE veiculos SET nome = :nome, agencia_id = :agencia_id, valor = :valor WHERE id = :id');
    $stmt->execute(['nome' => $nome, 'agencia_id' => $agencia_id, 'valor' => $valor, 'id' => $id]);

    header('Location: index.php');
    exit();
}
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<div class="main-content">
    <h1>Editar Veículo</h1>
    <form action="edit.php?id=<?php echo $id; ?>" method="post">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($veiculo['nome']); ?>" required>
        <label for="agencia_id">Agência</label>
        <select id="agencia_id" name="agencia_id" required>
            <?php foreach ($agencias as $agencia): ?>
                <option value="<?php echo $agencia['id']; ?>" <?php if ($agencia['id'] == $veiculo['agencia_id']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($agencia['nome']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label for="valor">Valor</label>
        <input type="number" id="valor" name="valor" step="0.01" value="<?php echo htmlspecialchars($veiculo['valor']); ?>" required>
        <button type="submit">Salvar</button>
    </form>
</div>

</body>
</html>
