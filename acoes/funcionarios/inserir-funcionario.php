<?php
require('../../includes/conexao.php');

$nome = mb_strtolower($_POST['nome']);

$sql = "INSERT INTO
                funcionarios 
                    (nome) 
                VALUES 
                    ('$nome')";

if(mysqli_query($conexao, $sql)){
    echo "<script>
            location.href='../../cadastrar-funcionarios.php?msg=salvo';
         </script>";
}else{
    echo "
        <script>
            alert('erro ao salvar');
        </script>
        ";
}