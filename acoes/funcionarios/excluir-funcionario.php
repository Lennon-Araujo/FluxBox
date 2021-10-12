<?php 
require('../../includes/conexao.php');

$id = $_GET['id'];

$sql = "DELETE FROM funcionarios WHERE id = $id";

if(mysqli_query($conexao, $sql)){
    echo "<script>
            location.href='../../listar-funcionarios.php';
        </script>";
}