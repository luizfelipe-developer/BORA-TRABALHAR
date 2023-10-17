<?php
    include_once('../php/conexao.php');

    // Função para obter os dados do registro a ser editado
    function obterDadosCadastro($conexao, $id_colaborador) {
        $sql = "SELECT * FROM sua_tabela WHERE id_colaborador = $id_colaborador";
        $result = $conexao->query($sql);

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Verifica se o ID do registro a ser editado foi passado por parâmetro
    if (isset($_GET["id_colaborador"])) {
        $id_colaborador = $_GET["id_colaborador"];
        $dadosCadastro = obterDadosCadastro($conexao, $id_colaborador);

        if ($dadosCadastro === null) {
            echo "Registro não encontrado.";
            exit;
        }
    } else {
        echo "ID do registro não fornecido.";
        exit;
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
?>