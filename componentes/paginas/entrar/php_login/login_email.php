<?php 
    require_once "../../../php/conexao.php";
    session_start(); //inicializa a sessao
    if (isset($_POST['bt-entrar'])) {
        $login = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT `email` FROM `cad_cliente` WHERE `email` ='$login'";
            $resultado = $conexao -> query($sql);
            //  $qtd = mysqli_num_rows($resultado);
            //  echo "<br>";

            // echo "qtd: ".$qtd;
            if (mysqli_num_rows($resultado)>0) {
                $sql= "SELECT * FROM `cad_cliente` WHERE `email` = '$login' AND `senha`= '$senha'";

                $resultado = $conexao -> query($sql);
                if (mysqli_num_rows($resultado)==1){
                    $dados = mysqli_fetch_array($resultado);
                    $_SESSION['online'] = true;
                    $_SESSION['logar'] = $dados['email'];
                    $_SESSION['idUsu'] = $dados['senha'];
                    
                    header('Location: ../../../../index.html');
                } else {
                    header('Location: ../pglogin_email.html');
                }
            } else {
                header('Location: ../pglogin_email.html');
            }
            mysqli_close($conexao);
    }
?>