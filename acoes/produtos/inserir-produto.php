<?php
require('../../includes/conexao.php');

$nome = mb_strtolower($_POST['nome']);
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];

$sql = "INSERT INTO
                produtos 
                    (nome, preco, quantidade) 
                VALUES 
                    ('$nome', '$preco', '$quantidade')";

if(mysqli_query($conexao, $sql)){
    echo "<script>
            location.href='../../cadastrar-produtos.php?msg=salvo';
         </script>";
}else{
    echo "
        <script>
            alert('erro ao salvar');
        </script>
        ";
}