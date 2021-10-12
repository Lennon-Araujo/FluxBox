<?php include('includes/header.php') ?>
<?php include('includes/menu-lateral.php') ?>
<?php include('includes/barra-superior.php') ?>

<?php require('includes/conexao.php') ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">

    
        <div class="row">
            <div class="col-md-9">
                <h3 class="m-0 font-weight-bold text-primary">Lista de Produtos</h3>
            </div>
            <div class="col-md-3">
                <a href="cadastrar-produtos.php">
                    <button class="btn btn-primary col-md-12">+ Novo produto</button>
                </a>
            </div>
        </div>


    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="table-produtos" widht="100%" cellspacing="0">
                <thead class="centro">
                    <th>#ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </thead>

                <tbody>
                    <?php
                    $sql = "SELECT * FROM produtos ORDER BY id DESC";
                    $resultado = mysqli_query($conexao, $sql);

                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $id = $row['id'];
                        $nome = $row['nome'];
                        $preco = $row['preco'];
                        $quantidade = $row['quantidade'];
                    ?>
                        <tr class="centro">
                            <td><strong><?php echo $id ?></strong></td>
                            <td><?php echo $nome ?></td>
                            <td><?php echo $preco ?></td>
                            <td><?php echo $quantidade ?></td>
                            <td>
                                <a href="editar-produto.php?id=<?php echo $id ?>">
                                    <button class="btn btn-info">
                                        <i class="fas fa-edit"></i>
                                        Editar
                                    </button></a>
                                <a href="acoes/produtos/excluir-produto.php?id=<?php echo $id ?>">
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                        Excluir
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>