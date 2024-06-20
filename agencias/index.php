<?php
include('../includes/db.php');
$query = $pdo->query('SELECT * FROM agencias');
$agencias = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<div class="main-content">
    <h1>Agências</h1>
    <a href="create.php">Cadastrar Agência</a>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($agencias as $agencia): ?>
                <tr>
                    <td><?php echo htmlspecialchars($agencia['nome']); ?></td>
                    <td><?php echo htmlspecialchars($agencia['cnpj']); ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $agencia['id']; ?>">Editar</a>
                        <a href="delete.php?id=<?php echo $agencia['id']; ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
