<?php
require('../../includes/conexao.php');
$id = $_POST['idFuncionario'];
$nome = $_POST['nome'];

if($nome == ""){
    $sql = "UPDATE 
                funcionarios
            SET nome='$nome'
            WHERE id = $id";
}else{
    $sql = "UPDATE 
                funcionarios
            SET nome='$nome'
            WHERE id=$id";
}

if(mysqli_query($conexao, $sql)){
   echo "<script>
           location.href='../../listar-funcionarios.php';
        </script>";
}