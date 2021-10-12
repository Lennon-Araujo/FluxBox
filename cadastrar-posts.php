<?php include('includes/header.php'); ?>
<?php include('includes/menu-lateral.php'); ?>
<?php include('includes/barra-superior.php'); ?>


<!-- Begin Page Content -->
<div class="container-fluid pt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Relatório</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
                <div class="alert alert-danger" id="erro-posts" hidden>
                    Ops! Informe todos os dados para continuar!
                </div>


                <?php
                if (isset($_GET['msg'])) {
                    if ($_GET['msg'] == "erroImagem") {
                        echo "<div class='alert alert-danger'>
                            Insira uma imagem no formato PNG ou JPG
                        </div>";
                    }else if($_GET['msg'] == "salvo"){
                        echo "<div class='alert alert-success'>
                            Salvo com sucesso!
                              </div>";
                    }
                }
                ?>

                <form method="POST" action="acoes/posts/inserir-post.php" id="form-post" onsubmit="return false" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Título:</label>
                        <input type="text" class="form-control form-control-user" id="titulo" name="titulo">
                    </div>

                    <div class="form-group">
                        <label>Cliente</label>
                        <select class="form-control form-control-user" name="cliente" id="cliente">
                            <?php
                            require('includes/conexao.php');
                            $sql = "SELECT * FROM 
                                        clientes
                                     ORDER BY
                                        nome
                                    ASC";
                            $resultado = mysqli_query($conexao, $sql);
                            while ($row = mysqli_fetch_assoc($resultado)) {
                                $id = $row['id'];
                                $nome = $row['nome'];
                                echo "<option value='$id'>$nome</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Texto</label>
                        <textarea class="form-control form-control-user" name="texto" id="texto" rows="20">

                        </textarea>
                    </div>

                    <div class="form-group">
                        <label>Imagem</label>
                        <input type="file" name="imagem" id="imagem">
                    </div>

                    <div class="form-group">
                        <label>Publicado</label>
                        <select id="publicado" name="publicado" class="form-control form-control-user">
                            <option value="S">SIM</option>
                            <option value="N">NÃO</option>
                        </select>
                    </div>

                    <input type="submit" value="Salvar Post" class="btn btn-success col-lg-12" onclick="validarPost()" />
                </form>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>

<script src="js/posts.js"></script>
<?php include('includes/footer.php'); ?>