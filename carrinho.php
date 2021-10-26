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

          <!-- <div class="form-group">
            <label>Preço:</label>
            <input type="text" class="form-control form-control-user" id="preco" name="preco">
          </div> -->

          <input type="submit" value="Cadastrar pedido" class="btn btn-info col-lg-12" onclick="validarCarrinho()" />
        </form>
      </div>
    </div>
    <div class="col-xl-7 col-lg-4 col-sm-12 mt-1">
      <div class="card">
        <div class="alert alert-danger alert-dismissible" id="erro-confirma-venda" hidden>
          Ops! Necessário selecionar o <strong>funcionário</strong>!
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        </div>

        <h5 class="card-header bg-info text-light">
          Pedidos
        </h5>
        <div class="card-body">
          <form method="POST" action="acoes/carrinho/confirmar-venda.php" id="form-venda" onsubmit="return false">
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
                      <h5 class="card-title" name="<?php echo $id ?>">Pedido #<?php echo $id ?> </h5>
                      <input type="number" name="idPedido" id="idPedido" value="" hidden>
                      <div class="d-flex flex-column">
                        <div class="card-text" name="produto"><strong><?php echo $quantidade ?> - <?php echo ucfirst($produto) ?></strong></div>
                        <div class="card-text" name="<?php echo $endereco ?>">End: <?php echo ucfirst($endereco) ?></div>
                        <div class="card-text" name="<?php echo $preco ?>">Preço: <?php echo $preco ?></div>
                        <div class="card-text" name="<?php echo $cliente ?>">Cliente: <?php echo $cliente ?></div>
                      </div>
                      <div class="form-group">
                        <select class="form-control form-control-user" id="func" name="func">
                          <?php
                          require('includes/conexao.php');
                          $sqlFunc = "SELECT * FROM 
                                        funcionarios
                                     ORDER BY
                                        nome
                                    ASC";
                          $resultadoFunc = mysqli_query($conexao, $sqlFunc);
                          while ($rowFunc = mysqli_fetch_assoc($resultadoFunc)) {
                            $idFunc = $rowFunc['id'];
                            $funcionario = $rowFunc['nome'];
                            echo "<option value='$funcionario'>$funcionario</option>";
                          }
                          ?>
                        </select>
                      </div>

                      <div class="row">
                        <a class="btn btn-info offset-lg-1 col-lg-10 mb-2" href="acoes/carrinho/confirmar-venda.php?id=<?php echo $id ?>&funcionario=<?php echo $funcionario ?>">
                          Confirmar entrega
                        </a>
                        <a class="btn btn-outline-danger offset-lg-1 col-lg-10" href="acoes/carrinho/excluir-pedido.php?id=<?php echo $id ?>">
                          Cancelar pedido
                        </a>
                      </div>

                    </div>
                  </div>
                </div>

              <?php } ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>




</div>
<!-- /.container-fluid -->

</div>

<script src="js/carrinho.js"></script>
<script src="js/venda.js"></script>
<?php include('includes/footer.php'); ?>