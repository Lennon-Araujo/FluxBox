<?php require('includes/conexao.php') ?>
<?php include('includes/header.php'); ?>
<?php include('includes/menu-lateral.php'); ?>
<?php include('includes/barra-superior.php'); ?>

<?php
$id = $_GET['id'];

$sql = "SELECT * FROM noticias WHERE id = $id";

$resultado = mysqli_query($conexao, $sql);

while ($row = mysqli_fetch_assoc($resultado)) {
    $titulo = $row['titulo'];
    $idCliente = $row['idCliente'];
    $texto = $row['texto'];
    $imagem = $row['imagem'];
    $publicado = $row['publicado'];
}

?>

<!-- Begin Page Content -->
<div class="container-fluid pt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Post</h1>
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
                    } else if ($_GET['msg'] == "salvo") {
                        echo "<div class='alert alert-success'>
                            Salvo com sucesso!
                              </div>";
                    }
                }
                ?>

                <form method="POST" action="acoes/posts/editar-post.php" id="form-post" onsubmit="return false" enctype="multipart/form-data">
                    <input type="hidden" name="idPost" value="<?php echo $id ?>">
                    <div class="form-group">
                    <label>Título:</label>
                        <input type="text" class="form-control form-control-user" id="cpf" name="cpf">
                    </div>
                    <div class="form-group">
                        <label>Título:</label>
                        <input type="text"
                        onkeyup="minhaFuncao()"
                         value="<?php echo $titulo ?>" class="form-control form-control-user" id="titulo" name="titulo">
                    </div>

                    <div class="form-group">
                        <label>Cliente</label>
                        <select class="form-control form-control-user" 
                        name="cliente" id="cliente">
                            <?php

                            $sql = "SELECT * FROM 
                                        clientes
                                     ORDER BY
                                        descricao
                                    ASC";

                            $resultado = mysqli_query($conexao, $sql);
                            while ($row = mysqli_fetch_assoc($resultado)) {
                                $idCat = $row['id']; //ID DE TODAS AS CATEGORIAS
                                $desc = $row['descricao'];
                                if ($idCliente == $idCat) {
                                    echo "<option value='$idCat' selected>$desc</option>";
                                } else {
                                    echo "<option value='$idCat'>$desc</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Texto</label>
                        <textarea class="form-control form-control-user" name="texto" id="texto" rows="20">
                            <?php echo $texto ?>
                        </textarea>
                    </div>

                    <div class="form-group">

                        <img src="img/posts/<?php echo $imagem ?>" height="200" width="250">

                        <label>Imagem</label>
                        <input type="file" name="imagem" id="imagem">
                    </div>

                    <div class="form-group">
                        <label>Publicado</label>
                        <select id="publicado" name="publicado" class="form-control form-control-user">
                            <?php
                            if ($publicado == "S") {
                                echo "<option value='S'>SIM</option>";
                                echo "<option value='N'>NÃO</option>";
                            }else{
                                echo "<option value='N'>NÃO</option>";
                                echo "<option value='S'>SIM</option>";
                            }
                            ?>

                            
                        </select>
                    </div>

                    <input type="submit" value="Editar Post" class="btn btn-success col-lg-12" onclick="validarPost()" />
                </form>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<script src="js/posts.js"></script>
<?php include('includes/footer.php'); ?>

