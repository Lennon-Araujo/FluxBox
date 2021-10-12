<?php 
require('../../includes/conexao.php');
$id = $_GET['id'];
$publicado = $_GET['publicado'];

if($publicado == "S"){
    $publicadoNovo = "N";
}else{
    $publicadoNovo = "S";
}

$sql = "UPDATE noticias SET
                publicado = '$publicadoNovo'
        WHERE id= $id";

if(mysqli_query($conexao, $sql)){
    echo "<script>
            location.href='../../listar-posts.php';
        </script>";
}
?>