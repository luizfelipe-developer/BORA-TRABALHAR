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

$uploaddir = '../../../imgs/imagemColaborador/'; //directório onde será gravado a imagem

if (move_uploaded_file($_FILES['cad_foto']['tmp_name'], $uploaddir . $_FILES['cad_foto']['name'])) {
    $uploadfile = $uploaddir . $_FILES['cad_foto']['name'];
    //grava na base de dados, no campo imagem, somente o nome da imagem que ficou gravado na variável $uploadfile que criamos acima.
} else {
    //não foi possível concluir o upload da imagem.
}

$inserirSql = "INSERT INTO cad_colaborador(nome, sobrenome, cpf, dt_nascimento, genero, profissao, cep, uf, cidade, bairro, endereco, numero, telefone, email, senha, cad_foto) VALUES ('$nome', '$sobrenome', '$cpf', '$dt_nascimento', '$genero', '$profissao', '$cep' , '$uf', '$cidade','$bairro', '$endereco', '$numero', '$telefone', '$email', '$senha', '$uploadfile')";

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

