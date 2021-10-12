<?php
require('../../includes/verificaLogado.php');
require('../../includes/conexao.php');
$cliente = trim(preg_replace('/\s+/', ' ', $_POST['cliente']));
$endereco = trim(preg_replace('/\s+/', ' ', $_POST['endereco']));
$telefone = trim(preg_replace('/\s+/', ' ', $_POST['telefone']));
if (preg_match("/([a-zA-Z0-9])/", $endereco) && preg_match("/([a-zA-Z0-9])/", $cliente)){
    $sql = "INSERT INTO clientes (nome, endereco, telefone) VALUES ('$cliente','$endereco','$telefone' )";
}

if(mysqli_query($conexao, $sql)){
    echo "<script>
        location.href='../../cadastrar-clientes.php?msg=salvo';
        </script>";
}