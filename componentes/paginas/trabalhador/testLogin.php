<?php
    session_start();
    // print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['nome']))
    {
        // Acessa
        include_once('../php/conexao.php');
        $nome = $_POST['nome'];
        // $senha = $_POST['senha'];

        // print_r('Email: ' . $email);
        // print_r('<br>');
        // print_r('Senha: ' . $senha);

        $sql = "SELECT * FROM cad_colaborador WHERE nome = '$nome' and nome = '$nome'";

        $result = $conexao->query($sql);

        // print_r($sql);
        // print_r($result);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['nome']);
            // unset($_SESSION['senha']);
            header('Location: login.php');
        }
        else
        {
            $_SESSION['nome'] = $nome;
            // $_SESSION['senha'] = $senha;
            header('Location: trabalhador.php');
        }
    }
    else
    {
        // Não acessa
        header('Location: login.php');
    }

   
?>
