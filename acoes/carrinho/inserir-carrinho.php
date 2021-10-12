<?php
require('../../includes/verificaLogado.php');
require('../../includes/conexao.php');

$produto = $_POST['produto'];
$quantidade = (int)$_POST['quantidade'];
$cliente = $_POST['cliente'];
$funcionario = $_POST['funcionario'];


$listaCarrinho = array($produto, $quantidade, $cliente, $funcionario, $preco);

$sql = "INSERT INTO
                pedido 
                    (produto, quantidade, cliente, funcionario, preco) 
                VALUES 
                    ('$produto', '$quantidade', '$cliente', '$funcionario', '$preco')";

if (mysqli_query($conexao,$query, $sql)) {
    var_dump($listaCarrinho);
    echo "<script>
            location.href='../../carrinho.php?msg=salvo';
         </script>";
         var_dump($listaCarrinho);
} else {
    echo "
        <script>
            alert('erro ao salvar');
        </script>
        ";
}
