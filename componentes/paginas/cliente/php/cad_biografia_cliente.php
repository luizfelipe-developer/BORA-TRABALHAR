<?php 
include("../../php/conexao.php");
//receber as iformações repassadas pelo método POST pelo formulário
$save_biografia = $_POST['save_biografia'];

//inserir os valores adicionados das variáveis nos campos da tabela cliente do BD
$inserirSql = "INSERT INTO bio_cliente(save_biografia) VALUES ('$save_biografia')";
//sempre que os valores forem do tipo varchar, devem ficar entre 'aspas simples'
//Verificação
if (mysqli_query($conexao, $inserirSql)) {
    echo "Usuário cadastrado!";
} else {
    echo "Usuário não cadastrado. Erro: ".mysqli_connect_error($conexao);
}
//encerrar a conexão, para evitar travamentos no BD
mysqli_close($conexao); 
header('Location: ../../perfil/perfil.php');

?>