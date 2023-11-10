<?php
include("../../php/conexao.php");

// Função para inserir categorias selecionadas
function inserirCategorias($id_usuario, $categoriasSelecionadas, $conexao) {
    foreach ($categoriasSelecionadas as $categoria) {
        $categoria = mysqli_real_escape_string($conexao, $categoria);
        $sql = "INSERT INTO categorias_selecionadas (id_usuario, categoria) VALUES ($id_usuario, '$categoria')";
        $conexao->query($sql);
    }
}

// Continuação do seu código existente

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$dt_nascimento = $_POST['dt_nascimento'];
$genero = $_POST['genero'];
$profissao = $_POST['profissao'];
$cep = $_POST['cep'];
$uf = $_POST['uf'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$inserirSql = "INSERT INTO cad_colaborador(nome, sobrenome, cpf, dt_nascimento, genero, profissao, cep, uf, cidade, bairro, endereco, numero, telefone, email, senha) VALUES ('$nome', '$sobrenome', '$cpf', '$dt_nascimento', '$genero', '$profissao', '$cep' , '$uf', '$cidade','$bairro', '$endereco', '$numero', '$telefone', '$email', '$senha')";

if (mysqli_query($conexao, $inserirSql)) {
    echo "Usuário cadastrado!";
    $id_usuario = mysqli_insert_id($conexao); // Obtém o ID do usuário recém-inserido
    $categoriasSelecionadas = $_POST['categorias']; // Supondo que as categorias são enviadas do formulário com o nome 'categorias'
    inserirCategorias($id_usuario, $categoriasSelecionadas, $conexao); // Chama a função para inserir as categorias
} else {
    echo "Usuário não cadastrado. Erro: " . mysqli_connect_error($conexao);
    // em caso de erro ative esse -> echo "Usuário não cadastrado. Erro: " . mysqli_connect_error();
}

mysqli_close($conexao);
header('Location: ../../entrar/logins_form.html');
?>

