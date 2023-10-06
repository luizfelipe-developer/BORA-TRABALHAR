
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