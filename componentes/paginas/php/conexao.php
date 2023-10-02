<?php
//MODO UM
$servidor = "localhost"; //servidor local
$usuario = "root"; //usuario do BD
$senha = "root"; //senha
$dbname = "bora_trabalhar"; //Nome BD

$conexao = new mysqli($servidor, $usuario, $senha, $dbname); //tenta estabelecer a conexão
if(!$conexao){
    die("Conexão não realizada, erro.".mysqli_connect_error());
//mensagem de erro
}
else{
    echo "Conexão Realizada!";
}
?>