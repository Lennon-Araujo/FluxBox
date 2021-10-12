<?php
require('../../includes/conexao.php');
$id = $_POST['idProduto'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];

if($preco == ""){
    $sql = "UPDATE 
                produtos
            SET nome='$nome',
            quantidade= '$quantidade' 
            WHERE id = $id";
}else{
    $sql = "UPDATE 
                produtos
            SET nome='$nome',
            preco= '$preco',
            quantidade= '$quantidade' 
            WHERE id = $id";
}

if(mysqli_query($conexao, $sql)){
   echo "<script>
           location.href='../../listar-produtos.php';
        </script>";
}