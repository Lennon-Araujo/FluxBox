<?php include('includes/header.php'); ?>
<?php include('includes/menu-lateral.php'); ?>
<?php include('includes/barra-superior.php'); ?>


<!-- Begin Page Content -->
<div class="container-fluid pt-4">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Carrinho</h1>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="card col-lg-5 mr-2">
      <div class="p-5">
        <div class="alert alert-danger" id="erro-carrinho" hidden>
          Ops! Informe todos os dados para continuar!
        </div>


        <?php
        if (isset($_GET['msg'])) {
          if ($_GET['msg'] == "salvo") {
            echo "<div class='alert alert-success'>
                        Venda regitrada com sucesso!
                        </div>";
          }
        }
        ?>

        <form method="POST" action="acoes/carrinho/inserir-carrinho.php" id="form-carrinho" onsubmit="return false">
          <div class="form-group row">
            <div class="col-md-8">
              <label>Produto</label>
              <select class="form-control form-control-user" name="produto" id="produto" onchange="incluirPreco()">
                <?php
                require('includes/conexao.php');
                $sql = "SELECT * FROM 
                                        produtos
                                     ORDER BY
                                        id
                                    ASC";
                $resultado = mysqli_query($conexao, $sql);
                echo "<option>Selecione...</option>";
                while ($row = mysqli_fetch_assoc($resultado)) {
                  $id = $row['id'];
                  $nome = $row['nome'];
                  echo "<option value='$nome'>$nome</option>";
                }
                ?>
              </select>
            </div>
            <div class="col-md-4">
              <label>Quantidade:</label>
              <input type="number" value="" class="form-control form-control-user" id="quantidade" name="quantidade" onblur="incluirPreco()">
            </div>
          </div>

          <div class="form-group">
            <label>Endereço do cliente</label>
            <select class="form-control form-control-user" name="cliente" id="cliente">
              <?php
              require('includes/conexao.php');
              $sql = "SELECT * FROM 
                                        clientes
                                     ORDER BY
                                        endereco
                                    ASC";
              $resultado = mysqli_query($conexao, $sql);
              while ($row = mysqli_fetch_assoc($resultado)) {
                $id = $row['id'];
                $endereco = $row['endereco'];
                echo "<option value='$endereco'>$endereco</option>";
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label>Funcionário</label>
            <select class="form-control form-control-user" name="funcionario" id="funcionario">
              <?php
              require('includes/conexao.php');
              $sql = "SELECT * FROM 
                                        funcionarios
                                     ORDER BY
                                        nome
                                    ASC";
              $resultado = mysqli_query($conexao, $sql);
              while ($row = mysqli_fetch_assoc($resultado)) {
                $id = $row['id'];
                $nome = $row['nome'];
                echo "<option value='$nome'>$nome</option>";
              }
              ?>
            </select>
          </div>

          <input type="submit" value="Colocar no carrinho" class="btn btn-success col-lg-12" onclick="validarCarrinho()" />
        </form>
      </div>
    </div>

    <div class="col-lg-6">
      LISTA
    </div>
  </div>




</div>
<!-- /.container-fluid -->

</div>

<script src="js/carrinho.js"></script>
<?php include('includes/footer.php'); ?>