
<?php
require_once "../../php/conexao.php";
session_start();

if (isset($_POST['bt-entrar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verificar a tabela cad_cliente
    $query_cliente = "SELECT * FROM cad_cliente WHERE email='$email' AND senha='$senha'";
    $result_cliente = mysqli_query($conexao, $query_cliente);
    $row_cliente = mysqli_fetch_assoc($result_cliente);

    // Verificar a tabela cad_colaborador
    $query_colaborador = "SELECT * FROM cad_colaborador WHERE email='$email' AND senha='$senha'";
    $result_colaborador = mysqli_query($conexao, $query_colaborador);
    $row_colaborador = mysqli_fetch_assoc($result_colaborador);

    if ($row_cliente) {
        $_SESSION['online'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['tipo'] = 'cliente';
        header("Location: ../../../../index.php");// Redirecionar para a página do cliente
    } elseif ($row_colaborador) {
        $_SESSION['online'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['tipo'] = 'colaborador';
        header("Location: ../../../../index.html");// Redirecionar para a página do colaborador
    } else {
        header('Location: ../login_form-email.php');
    }
}
mysqli_close($conexao);
?>