<?php

$titulo = $_POST['titulo'];
$cliente = $_POST['cliente'];
$texto = $_POST['texto'];
$publicado = $_POST['publicado'];

if (isset($_FILES['imagem'])) {

    $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
    $novoNome = md5(date("Y.m.d-H.i.s")) . $extensao;
    $diretorio = '../../img/posts/';
    if ($extensao == ".png" || $extensao == ".jpg") {
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novoNome)) {
            require('../../includes/conexao.php');
            $dtPublicacao = date('Y-m-d');
            $sql = "INSERT INTO noticias
                    (idAutor, idCliente, titulo, texto, imagem, dtPublicacao, publicado)
                    VALUES
                    (1, $cliente, '$titulo', '$texto', '$novoNome', '$dtPublicacao', '$publicado')";
           
            if(mysqli_query($conexao, $sql)){
                echo "<script>
                        location.href='../../cadastrar-posts.php?msg=salvo';
                    </script>";
            }else{
                echo 'erro';
            }
        }
    } else {
        echo "<script>
                 location.href='../../cadastrar-posts.php?msg=erroImagem';
              </script>";
    }
}
