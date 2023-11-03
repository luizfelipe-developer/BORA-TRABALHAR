<?php
    include_once('../../../php/conexao.php');

    if(!empty($_GET['id_colaborador']))
    {
        $id_colaborador = $_GET['id_colaborador'];
        $sqlSelect = "SELECT * FROM cad_colaborador WHERE id_colaborador = $id_colaborador";
        $resultado = $conexao->query($sqlSelect);  
        if($resultado->num_rows > 0)
        {
            while($dados_colaborador = mysqli_fetch_assoc($resultado))
            {   
                $nome = $dados_colaborador['nome'];
                $sobrenome = $dados_colaborador['sobrenome'];
                $cpf = $dados_colaborador['cpf'];
                $dt_nascimento = $dados_colaborador['dt_nascimento'];
                $genero = $dados_colaborador['genero'];
                $profissao = $dados_colaborador['profissao'];
                $cep = $dados_colaborador['cep'];
                $uf = $dados_colaborador['uf'];
                $cidade = $dados_colaborador['cidade'];
                $bairro = $dados_colaborador['bairro'];
                $endereco = $dados_colaborador['endereco'];
                $numero = $dados_colaborador['numero'];
                $telefone = $dados_colaborador['telefone'];
                $descricao = $dados_colaborador['descricao'];

                $email = $dados_colaborador['email'];
                $senha = $dados_colaborador['senha'];
            }
        }
        else
        {
            header('Location: saveEdit_colaborador.php');
        }
    }
    else
    {
        header('Location: saveEdit_colaborador.php');
    }
    
?>