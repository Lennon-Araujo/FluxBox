<?php
require('../../includes/verificaLogado.php');
require('../../includes/conexao.php');
$idPedido = $_GET['id'];
$funcionario = $_GET['funcionario'];

$sqlPedido = "SELECT * FROM pedido WHERE id = $idPedido";

$resultado = mysqli_query($conexao, $sqlPedido);

while ($row = mysqli_fetch_assoc($resultado)) {
  $produto = $row['produto'];
  $quantidade = $row['quantidade'];
  $endereco = $row['endereco'];
  $preco = $row['preco'];
  $cliente = $row['cliente'];
}

$sql = "INSERT INTO 
          vendas (nome_produto, nome_cliente, nome_funcionario, qtd_produto, numero_pedido, endereco, preco)
          VALUES ('$produto', '$cliente', '$funcionario', $quantidade, $idPedido, '$endereco', $preco)
          ";

if (mysqli_query($conexao, $sql)) {
  $sql2 = "UPDATE pedido
            SET confirmado = 1
            WHERE id = $idPedido";

  $resultado = mysqli_query($conexao, $sql2);

  echo "<script>
           location.href='../../carrinho.php';
        </script>";
}
