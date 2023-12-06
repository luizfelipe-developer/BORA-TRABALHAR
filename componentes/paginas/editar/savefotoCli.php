<?php
    // isset -> serve para saber se uma variável está definida
    include_once('../php/conexao.php');
    if(isset($_POST['fotocli'])){

        $id_cliente = $_POST['id_cliente'];
        $fotoNome = $_FILES['cad_foto']['name'];
        $fotoTemp = $_FILES['cad_foto']['tmp_name'];
        $fotoCaminho = '../../imgs/imagemClientes/' . $fotoNome;


// Manipulação do upload de imagem
move_uploaded_file($fotoTemp, $fotoCaminho);
        
        $sqlUpdate = "UPDATE cad_cliente
        SET cad_foto='$fotoNome' WHERE id_cliente='$id_cliente'";
        $resultado = $conexao->query($sqlUpdate);
        print_r($resultado);
    }
    header('Location: ../../../index_cliente.php');

?>  