<?php include('includes/header.php'); ?>
<?php include('includes/menu-lateral.php'); ?>
<?php include('includes/barra-superior.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid pt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cadastrar Clientes</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
                <div class="alert alert-danger" id="erro-clientes" hidden>
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

                <form method="POST" action="acoes/clientes/inserir-cliente.php" id="form-cliente" onsubmit="return false">
                    <div class="form-group">
                        <label>Nome do Cliente:</label>
                        <input type="text" 
                                class="form-control form-control-user" 
                                id="cliente" name="cliente">
                    </div>
                    <div class="form-group">
                        <label>Endereço:</label>
                        <input type="text" 
                                class="form-control form-control-user" 
                                id="endereco" name="endereco" required="required">
                    </div>
                    <div class="form-group">
                        <label>Telefone:</label>
                        <input type="number" 
                                class="form-control form-control-user" 
                                id="telefone" name="telefone">
                    </div>
                
                    <input type="submit" value="Salvar Cliente" class="btn btn-success col-lg-12" onclick="validarCliente()" />
                    <span class="alert-danger mt-5">Não é permitido caracteres especiais</span>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>

<script src="js/clientes.js"></script>
<?php include('includes/footer.php'); ?>    