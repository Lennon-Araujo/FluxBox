<?php include('includes/header.php'); ?>
<?php include('includes/menu-lateral.php'); ?>
<?php include('includes/barra-superior.php'); ?>


<!-- Begin Page Content -->
<div class="container-fluid pt-4">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pedido</h1>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="card col-xl-5 col-lg-8 col-sm-12 mt-1">
      <div class="p-5">
        <div class="alert alert-danger alert-dismissible" id="erro-carrinho" hidden>
          Ops! Informe todos os dados para continuar!
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>

        </div>


        <?php
        if (isset($_GET['msg'])) {
          if ($_GET['msg'] == "salvo") {
            echo "<div class='alert alert-success alert-dismissible'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    Pedido regitrado com sucesso!
                  </div>";
          }
        }
        ?>

        <form method="POST" action="acoes/carrinho/inserir-carrinho.php" id="form-carrinho" onsubmit="return false">
          <div class="form-group row">
            <div class="col-xl-8 col-sm-12">
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
                echo "<option value=''>Selecione...</option>";
                while ($row = mysqli_fetch_assoc($resultado)) {
                  $id = $row['id'];
                  $nome = $row['nome'];
                  echo "<option value='$nome'>$nome</option>";
                }
                ?>
              </select>
            </div>
            <div class="col-xl-4 col-sm-12">
              <label>Quantidade:</label>
              <input type="number" value="" class="form-control form-control-user" id="quantidade" name="quantidade" onblur="incluirPreco()">
            </div>
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
              echo "<option value='Default'>Selecione...</option>";
              while ($row = mysqli_fetch_assoc($resultado)) {
                $id = $row['id'];
                $cliente = $row['nome'];
                echo "<option value='$cliente'>$cliente</option>";
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label>Endereço:</label>
            <input type="text" class="form-control form-control-user" id="endereco" name="endereco" required="required">
          </div>

          <div class="form-group">
            <label>Preço:</label>
            <input type="text" class="form-control form-control-user" id="preco" name="preco">
          </div>

          <input type="submit" value="Cadastrar pedido" class="btn btn-info col-lg-12" onclick="validarCarrinho()" />
        </form>
      </div>
    </div>
    <div class="col-xl-7 col-lg-4 col-sm-12 mt-1">
      <div class="card">
        <h5 class="card-header bg-info text-light">
          Pedidos
        </h5>
        <div class="card-body">
          <div class="row d-flex justify-content-around">
            <?php
            $sql = "SELECT * FROM pedido WHERE confirmado = 0 ORDER BY id ASC";
            $resultado = mysqli_query($conexao, $sql);

            while ($row = mysqli_fetch_assoc($resultado)) {
              $id = $row['id'];
              $produto = $row['produto'];
              $preco = $row['preco'];
              $quantidade = $row['quantidade'];
              $cliente = $row['cliente'];
              $endereco = $row['endereco'];
            ?>
              <div class="col-xl-6 col-md-12 col-sm-12 mb-1">
                <div class="card border-info text-center">
                  <div class="card-body">
                    <h5 class="card-title">Pedido #<?php echo $id ?> </h5>
                    <div class="d-flex flex-column">
                      <div class="card-text"><strong><?php echo $quantidade ?> - <?php echo ucfirst($produto) ?></strong></div>
                      <div class="card-text">End: <?php echo ucfirst($endereco) ?></div>
                      <div class="card-text">Preço: <?php echo $preco ?></div>
                      <div class="card-text">Cliente: <?php echo $cliente ?></div>
                    </div>
                    <div class="input-group mb-3">
                      <select class="custom-select" id="funcionario" name="funcionario">
                        <?php
                        $sqlFunc = "SELECT * FROM 
                                        funcionarios
                                     ORDER BY
                                        nome
                                    ASC";
                        $resultadoFunc = mysqli_query($conexao, $sqlFunc);
                        echo "<option value=''>Funcionário...</option>";
                        while ($rowFunc = mysqli_fetch_assoc($resultadoFunc)) {
                          $idFunc = $rowFunc['id'];
                          $nome = $rowFunc['nome'];
                          echo "<option value='$nome'>$nome</option>";
                        }
                        ?>
                      </select>
                    </div>

                    <div class="dropdown">
                      <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Finalizar pedido
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Pedido entregue</a>
                        <a class="dropdown-item" href="#">Cancelar pedido</a>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>




</div>
<!-- /.container-fluid -->

</div>

<script src="js/carrinho.js"></script>
<?php include('includes/footer.php'); ?>