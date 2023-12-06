<?php
    // isset -> serve para saber se uma variável está definida
    include_once('../php/conexao.php');
    if(isset($_POST['foto'])){

        $id_colaborador = $_POST['id_colaborador'];
        $fotoNome = $_FILES['cad_foto']['name'];
        $fotoTemp = $_FILES['cad_foto']['tmp_name'];
        $fotoCaminho = '../../imgs/imagemColaboradores/' . $fotoNome;


// Manipulação do upload de imagem
move_uploaded_file($fotoTemp, $fotoCaminho);
        
        $sqlUpdate = "UPDATE cad_colaborador
        SET cad_foto='$fotoNome' WHERE id_colaborador='$id_colaborador'";
        $resultado = $conexao->query($sqlUpdate);
        print_r($resultado);
    }
    header('Location: ../../paginas/trabalhador/trabalhadorr.php');

?>  