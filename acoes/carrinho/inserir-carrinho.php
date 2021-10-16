<?php
require('../../includes/verificaLogado.php');
require('../../includes/conexao.php');

$produto = $_POST['produto'];
$quantidade = (int)$_POST['quantidade'];
$cliente = $_POST['cliente'];
$endereco = $_POST['endereco'];
$preco = $_POST['preco'];

$sql = "INSERT INTO
                pedido
                    (produto, preco, quantidade, cliente, endereco) 
                VALUES
                    ('$produto', '$preco', '$quantidade', '$cliente', '$endereco')";




if (mysqli_query($conexao, $sql)) {
  echo "<script>
            location.href='../../carrinho.php?msg=salvo';
         </script>";
} else {
  echo "<script>
            alert('erro ao salvar');
        </script>";
}
