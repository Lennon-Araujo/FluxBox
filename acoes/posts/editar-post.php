<?php
require('../../includes/conexao.php');  
$id = $_POST['idPost'];
$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
$idCliente = $_POST['cliente'];
$publicado = $_POST['publicado'];


if(isset($_FILES['imagem'])){
    if($_FILES['imagem']['name'] != ""){
        $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
        $novoNome = md5(date("Y.m.d-H.i.s")).$extensao;
        $diretorio = "../../img/posts/";
        if($extensao == ".png" || $extensao == ".jpg"){
            if(move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novoNome)){
               $sql = "UPDATE noticias SET
                            idCliente = $idCliente,
                            titulo = '$titulo',
                            texto = '$texto',
                            imagem = '$novoNome',
                            publicado = '$publicado'
                        WHERE id = $id";
                if(mysqli_query($conexao, $sql)){
                    echo "<script>
                        location.href='../../listar-posts.php'
                    </script>";
                }
            }
        }
    }else{
        $sql = "UPDATE noticias SET
                            idCliente = $idCliente,
                            titulo = '$titulo',
                            texto = '$texto',                            
                            publicado = '$publicado'
                        WHERE id = $id";
                if(mysqli_query($conexao, $sql)){
                    echo "<script>
                    location.href='../../listar-posts.php'
                </script>";
                }
    }
}