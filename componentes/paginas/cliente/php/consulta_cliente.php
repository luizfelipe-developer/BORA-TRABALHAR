<?php
    include "../../php/conexao.php";
    
    if(mysqli_connect_error())
    trigger_error(mysqli_connect_error());


        
        $sql = "SELECT * FROM `cad_cliente`";
        $query = $conexao->query($sql);

        

        /*
        $msg = 'Registros encontrados: '.$query->num_rows;
        echo $msg;
        */
        $msg = $query->num_rows;

    /*while ($dados = $query->fetch_array()) {
        echo 'Código: '.$dados['cod_cliente']. '<br>'; 
        echo 'Nome: '.$dados['nome']. '<br>';
        echo 'UF: '.$dados['uf']. '<br>';
        echo 'Cidade: '.$dados['cidade']. '<br>'.'<br>';    
    }*/
    

?>