<?php include('includes/header.php'); ?>
<?php include('includes/menu-lateral.php'); ?>
<?php include('includes/barra-superior.php'); ?>


<!-- Begin Page Content -->
<div class="container-fluid pt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cadastrar Usuários</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
                <div class="alert alert-danger" id="erro-usuario" hidden>
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




                <form method="POST" action="acoes/usuarios/inserir-usuario.php" id="form-usuario" onsubmit="return false" autocomplete="off">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" class="form-control form-control-user" id="nome" name="nome" autocomplete="off">

                    </div>

                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control form-control-user" id="email" name="email" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Senha:</label>
                        <input type="password" class="form-control form-control-user" id="senha" name="senha" autocomplete="off">
                    </div>

                    <input type="submit" value="Salvar Usuário" class="btn btn-success col-lg-12" onclick="validarUsuario()" />
                </form>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>

<script src="js/usuarios.js"></script>
<?php include('includes/footer.php'); ?>