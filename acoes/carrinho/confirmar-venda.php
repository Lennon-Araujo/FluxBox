<?php
require('../../includes/verificaLogado.php');
require('../../includes/conexao.php');
$idPedido = $_GET['id'];
$funcionario = $_GET['funcionario'];
date_default_timezone_set('America/Fortaleza');
$dataVenda  = date('Y-m-d');
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
          vendas (nome_produto, nome_cliente, nome_funcionario, qtd_produto, numero_pedido, endereco, preco, dataVenda)
          VALUES ('$produto', '$cliente', '$funcionario', $quantidade, $idPedido, '$endereco', $preco, '$dataVenda')
          ";

if (mysqli_query($conexao, $sql)) {
  $sql2 = "UPDATE pedido
            SET confirmado = 1
            WHERE id = $idPedido";

  $resultado = mysqli_query($conexao, $sql2);

  $sql3 = "UPDATE produtos
  SET quantidade = quantidade - $quantidade
  WHERE nome = '$produto'";

  $resultado = mysqli_query($conexao, $sql3);

  $sql4 = "UPDATE funcionarios
  SET vendas = vendas +1
  WHERE nome = '$funcionario'";

  $resultado = mysqli_query($conexao, $sql4);

  echo "<script>
           location.href='../../carrinho.php';
        </script>";
}
