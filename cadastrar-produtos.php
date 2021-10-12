<?php include('includes/header.php'); ?>
<?php include('includes/menu-lateral.php'); ?>
<?php include('includes/barra-superior.php'); ?>


<!-- Begin Page Content -->
<div class="container-fluid pt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cadastrar Produtos</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
                <div class="alert alert-danger" id="erro-produtos" hidden>
                    Ops! Informe todos os dados para continuar!
                </div>


                <?php
                if (isset($_GET['msg'])) {
                    if ($_GET['msg'] == "salvo") {
                        echo "<div class='alert alert-success'>
                        Salvo com sucesso!
                        </div>";
                    }
                }
                ?>




                <form method="POST" action="acoes/produtos/inserir-produto.php" id="form-produto" onsubmit="return false">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" class="form-control form-control-user" id="nome" name="nome">

                    </div>

                    <div class="form-group">
                        <label>Preço:</label>
                        <input type="text" class="form-control form-control-user" id="preco" name="preco">
                    </div>

                    <div class="form-group">
                        <label>Quantidade:</label>
                        <input type="number" class="form-control form-control-user" id="quantidade" name="quantidade">
                    </div>

                    <input type="submit" value="Salvar Produto" class="btn btn-success col-lg-12" onclick="validarProduto()" />
                </form>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>

<script src="js/produtos.js"></script>
<?php include('includes/footer.php'); ?>