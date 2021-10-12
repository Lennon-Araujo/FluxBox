<?php include('includes/header.php') ?>
<?php include('includes/menu-lateral.php') ?>
<?php include('includes/barra-superior.php') ?>
<?php include('includes/conexao.php') ?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM produtos WHERE id = $id";
$resultado = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_assoc($resultado)) {
    $nome = $row['nome'];
    $preco = $row['preco'];
    $quantidade = $row['quantidade'];
}
?>


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
                <div class="alert alert-danger" id="erro-produto" hidden>
                    Ops! Informe todos os dados para continuar!
                </div>



                <form method="POST" action="acoes/produtos/editar-produto.php" id="form-produto" onsubmit="return false">
                    <input type="hidden" name="idProduto" value="<?php echo $id ?>">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" class="form-control form-control-user" id="nome" name="nome" value="<?php echo mb_strtolower($nome) ?>">

                    </div>

                    <div class="form-group">
                        <label>Preço:</label>
                        <input type="text" class="form-control form-control-user" id="preco" name="preco" value="<?php echo strtolower($preco) ?>">
                    </div>

                    <div class="form-group">
                        <label>Quantidade:</label>
                        <input 
                                type="text" 
                                class="form-control form-control-user"
                                name="quantidade"
                                id="quantidade"/>
                    </div>


                    <input type="submit" value="Editar Produto" class="btn btn-info  col-lg-12" onclick="validarEdicaoProduto()" />
                </form>
            </div>
        </div>
    </div>



</div>
<script src="js/produtos.js"></script>
<?php include('includes/footer.php') ?>