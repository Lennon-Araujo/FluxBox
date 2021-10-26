<?php
require('../../includes/verificaLogado.php');
require('../../includes/conexao.php');

$id = $_GET['id'];

$sql = "DELETE FROM pedido WHERE id = $id";

if (mysqli_query($conexao, $sql)) {
  echo "<script>
            location.href='../../carrinho.php';
        </script>";
}
