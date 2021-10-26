<?php
require('../../includes/verificaLogado.php');
require('../../includes/conexao.php');

$produto = $_POST['produto'];
$quantidade = (int)$_POST['quantidade'];
$cliente = $_POST['cliente'];
$endereco = $_POST['endereco'];

$sqlP = "SELECT preco FROM produtos WHERE nome = '$produto' ";
$resultado = mysqli_query($conexao, $sqlP);

while ($row = mysqli_fetch_assoc(($resultado))) {
  $preco = $row['preco'];
}
$precoFinal = $preco*$quantidade;
$sql = "INSERT INTO
                pedido
                    (produto, preco, quantidade, cliente, endereco) 
                VALUES
                    ('$produto', $precoFinal, $quantidade, '$cliente', '$endereco')";

if (mysqli_query($conexao, $sql)) {
  echo "<script>
            location.href='../../carrinho.php?msg=salvo';
         </script>";
} else {
  echo "<script>
            alert('erro ao salvar');
        </script>";
}
