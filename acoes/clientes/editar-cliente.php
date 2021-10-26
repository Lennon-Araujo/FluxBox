<?php
require('../../includes/verificaLogado.php');
require('../../includes/conexao.php');
$id = $_POST['id'];
$cliente = $_POST['cliente'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];


$sql = "UPDATE 
            clientes 
        SET 
            nome='$cliente',
            endereco='$endereco',
            telefone='$telefone'
            
        WHERE 
            id = $id";

if(mysqli_query($conexao, $sql)){
    echo "<script>
            location.href='../../listar-clientes.php'    
          </script>";
}