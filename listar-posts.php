<?php include('includes/header.php') ?>
<?php include('includes/menu-lateral.php') ?>
<?php include('includes/barra-superior.php') ?>
<?php require('includes/conexao.php') ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">

        <div class="row">
            <div class="col-md-9">
                <h3 class="m-0 font-weight-bold text-primary">
                    Relatório
                </h3>
            </div>
            <div class="col-md-3">
                <a href="cadastrar-posts.php">
                    <button class="btn btn-primary col-md-12">+ Novo Post</button>
                </a>
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="table-postos" widht="100%" cellspacing="0">
                <thead>
                    <th>#ID</th>
                    <th>Título</th>
                    <th>Publicado</th>
                    <th>Ações</th>
                </thead>

                <tbody>
                    <?php
                    $sql = "SELECT * FROM noticias ORDER BY id DESC";
                    $resultado = mysqli_query($conexao, $sql);

                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $id = $row['id'];
                        $titulo = $row['titulo'];
                        $publicado = $row['publicado'];

                        if ($publicado == "S") {
                            $btnPublicado = "
                            <a href='acoes/posts/alterarPublicado.php?id=$id&publicado=$publicado'>
                                <button class='btn btn-success btn-sm'>SIM</button>
                            </a>";
                        } else {
                            $btnPublicado = "
                            <a href='acoes/posts/alterarPublicado.php?id=$id&publicado=$publicado'>
                                <button class='btn btn-danger btn-sm'>NÃO</button>
                            </a>";
                        }

                    ?>
                        <tr class="centro">
                            <td><strong><?php echo $id ?></strong></td>
                            <td><?php echo $titulo ?></td>
                            <td><?php echo $btnPublicado ?></td>
                            <td>
                                <a href="editar-post.php?id=<?php echo $id ?>">
                                    <button class="btn btn-info">
                                        <i class="fas fa-edit"></i>
                                        Editar
                                    </button></a>
                                <a href="acoes/posts/excluir-post.php?id=<?php echo $id ?>">
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