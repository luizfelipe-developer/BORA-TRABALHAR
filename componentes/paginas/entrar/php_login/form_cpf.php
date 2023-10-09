
<?php
require_once "../../php/conexao.php";
session_start();

if (isset($_POST['bt-entrar'])) {
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    // Verificar a tabela cad_cliente
    $query_cliente = "SELECT * FROM cad_cliente WHERE cpf='$cpf' AND senha='$senha'";
    $result_cliente = mysqli_query($conexao, $query_cliente);
    $row_cliente = mysqli_fetch_assoc($result_cliente);

//teste nome do perfil do usuario/////
    session_start();
    // print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['senha']))
    {
        // Acessa
        include_once('conexao.php');
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        // print_r('Email: ' . $email);
        // print_r('<br>');
        // print_r('Senha: ' . $senha);

        $sql = "SELECT * FROM cad_cliente WHERE nome = '$nome' and senha = '$senha'";

        $result = $conexao->query($sql);

        // print_r($sql);
        // print_r($result);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['nome']);
            unset($_SESSION['senha']);
            header('Location: login.php');
        }
        else
        {
            $_SESSION['nome'] = $nome;
            $_SESSION['senha'] = $senha;
            header('Location: index_cliente.php');
        }
    }
    else
    {
        // Não acessa
        header('Location: login.php');
    }


    //teste nome do perfil do usuario/////



    // Verificar a tabela cad_colaborador
    $query_colaborador = "SELECT * FROM cad_colaborador WHERE cpf='$cpf' AND senha='$senha'";
    $result_colaborador = mysqli_query($conexao, $query_colaborador);
    $row_colaborador = mysqli_fetch_assoc($result_colaborador);

    if ($row_cliente) {
        $_SESSION['online'] = true;
        $_SESSION['cpf'] = $cpf;
        $_SESSION['tipo'] = 'cliente';
        header("Location: ../../../../index_cliente.php");// Redirecionar para a página do cliente
    } elseif ($row_colaborador) {
        $_SESSION['online'] = true;
        $_SESSION['cpf'] = $cpf;
        $_SESSION['tipo'] = 'colaborador';
        header("Location: ../../trabalhador/trabalhador.php");// Redirecionar para a página do colaborador
    } else {
        header('Location: ../login_form-cpf.html');
    }
}
mysqli_close($conexao);
?>