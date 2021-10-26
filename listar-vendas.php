<?php include('includes/header.php') ?>
<?php include('includes/menu-lateral.php') ?>
<?php include('includes/barra-superior.php') ?>

<?php require('includes/conexao.php') ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">

    
        <div class="row">
            <div class="col-md-9">
                <h3 class="m-0 font-weight-bold text-primary">Registro de vendas</h3>
            </div>
            <div class="col-md-3">
                <a href="carrinho.php">
                    <button class="btn btn-primary col-md-12">Carrinho</button>
                </a>
            </div>
        </div>


    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped text-small" id="table-produtos" widht="100%" cellspacing="0">
                <thead class="centro">
                    <th>#ID</th>
                    <th>Produto</th>
                    <th>Cliente</th>
                    <th>Funcionário</th>
                    <th>Qtd.</th>
                    <th>Pedido</th>
                    <th>Preço</th>
                    <th>Data</th>
                </thead>

                <tbody>
                    <?php
                    $sql = "SELECT * FROM vendas ORDER BY id DESC";
                    $resultado = mysqli_query($conexao, $sql);

                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $id = $row['id'];
                        $produto = $row['nome_produto'];
                        $cliente = $row['nome_cliente'];
                        $funcionario = $row['nome_funcionario'];
                        $quantidade = $row['qtd_produto'];
                        $numPedido = $row['numero_pedido'];
                        $preco = $row['preco'];
                        $data = $row['data'];
                    ?>
                        <tr class="centro">
                            <td><strong><?php echo $id ?></strong></td>
                            <td><?php echo $produto ?></td>
                            <td><?php echo $cliente ?></td>
                            <td><?php echo $funcionario ?></td>
                            <td><?php echo $quantidade ?></td>
                            <td>#<?php echo $numPedido ?></td>
                            <td><?php echo $preco ?></td>
                            <td><?php echo date('d/m/Y H:i') ?></td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>