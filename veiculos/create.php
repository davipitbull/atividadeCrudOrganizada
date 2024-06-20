<?php
include('../includes/db.php');

$query = $pdo->query('SELECT * FROM agencias');
$agencias = $query->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $agencia_id = $_POST['agencia_id'];
    $valor = $_POST['valor'];

    $stmt = $pdo->prepare('INSERT INTO veiculos (nome, agencia_id, valor) VALUES (:nome, :agencia_id, :valor)');
    $stmt->execute(['nome' => $nome, 'agencia_id' => $agencia_id, 'valor' => $valor]);

    header('Location: index.php');
    exit();
}
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<div class="main-content">
    <h1>Cadastrar Veículo</h1>
    <form action="create.php" method="post">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" required>
        <label for="agencia_id">Agência</label>
        <select id="agencia_id" name="agencia_id" required>
            <?php foreach ($agencias as $agencia): ?>
                <option value="<?php echo $agencia['id']; ?>"><?php echo htmlspecialchars($agencia['nome']); ?></option>
            <?php endforeach; ?>
        </select>
        <label for="valor">Valor</label>
        <input type="number" id="valor" name="valor" step="0.01" required>
        <button type="submit">Cadastrar</button>
    </form>
</div>

</body>
</html>
