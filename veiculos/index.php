<?php
include('../includes/db.php');
$query = $pdo->query('SELECT veiculos.*, agencias.nome as agencia_nome FROM veiculos JOIN agencias ON veiculos.agencia_id = agencias.id');
$veiculos = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>

<div class="main-content">
    <h1>Veículos</h1>
    <a href="create.php">Cadastrar Veículo</a>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Agência</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($veiculos as $veiculo): ?>
                <tr>
                    <td><?php echo htmlspecialchars($veiculo['nome']); ?></td>
                    <td><?php echo htmlspecialchars($veiculo['agencia_nome']); ?></td>
                    <td><?php echo htmlspecialchars($veiculo['valor']); ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $veiculo['id']; ?>">Editar</a>
                        <a href="delete.php?id=<?php echo $veiculo['id']; ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
