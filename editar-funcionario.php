<?php include('includes/header.php') ?>
<?php include('includes/menu-lateral.php') ?>
<?php include('includes/barra-superior.php') ?>
<?php include('includes/conexao.php') ?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM funcionarios WHERE id = $id";
$resultado = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_assoc($resultado)) {
    $nome = $row['nome'];
}
?>


<!-- Begin Page Content -->
<div class="container-fluid pt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Alterar Funcionário</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
                <div class="alert alert-danger" id="erro-funcionario" hidden>
                    Ops! Informe todos os dados para continuar!
                </div>



                <form method="POST" action="acoes/funcionarios/editar-funcionario.php" id="form-funcionario" onsubmit="return false">
                    <input type="hidden" name="idFuncionario" value="<?php echo $id ?>">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" class="form-control form-control-user" id="nome" name="nome" value="<?php echo mb_strtolower($nome) ?>">

                    </div>

                    <input type="submit" value="Editar Usuário" class="btn btn-info  col-lg-12" onclick="validarEdicaoFuncionario()" />
                </form>
            </div>
        </div>
    </div>



</div>
<script src="js/funcionarios.js"></script>
<?php include('includes/footer.php') ?>