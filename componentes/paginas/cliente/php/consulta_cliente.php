

<?php

include "../../php/conexao.php";

   session_start();
    
    if(mysqli_connect_error())
    trigger_error(mysqli_connect_error());

    $id_user = $_SESSION['idUsu'];
    $user = $_SESSION['nomeUse'];


      $sqll= "SELECT * FROM `cad_cliente` WHERE  `id_cliente`= '$id_user'";      
        $queryp = $conexao->query($sqll);

   
        $msgg = $queryp->num_rows;
        

    

?>