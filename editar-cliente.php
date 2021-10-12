<?php include('includes/header.php'); ?>
<?php include('includes/menu-lateral.php'); ?>
<?php include('includes/barra-superior.php'); ?>
<?php include('includes/conexao.php') ?>


<?php
$id = $_GET['id'];
$sql = "SELECT * FROM clientes WHERE id = $id";
$resultado = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_assoc($resultado)) {
    $nome = $row['nome'];
    $endereco = $row['endereco'];
    $telefone = $row['telefone'];
}
?>

<!-- Begin Page Content -->
<div class="container-fluid pt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Cliente</h1>
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

                <form method="POST" action="acoes/clientes/editar-cliente.php" id="form-cliente" onsubmit="return false">
                    <div class="form-group">
                        <label>Nome do Cliente:</label>
                        <input type="text" class="form-control form-control-user" id="cliente" name="cliente" value="<?php echo $nome ?>">
                        <label>Endereço:</label>
                        <input type="text" class="form-control form-control-user" id="endereco" name="endereco" value="<?php echo $endereco ?>">
                        <label>Telefone:</label>
                        <input type="number" class="form-control form-control-user" id="telefone" name="telefone" value="<?php echo $telefone ?>">

                        <input type="hidden" name="id" value="<?php echo $id  ?>">
                    </div>

                    <input type="submit" value="Editar Cliente" class="btn btn-info col-lg-12" onclick="validarCliente()" />
                </form>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>

<script src="js/clientes.js"></script>
<?php include('includes/footer.php'); ?>