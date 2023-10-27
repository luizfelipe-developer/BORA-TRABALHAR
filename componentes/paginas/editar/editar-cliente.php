<?php
    include_once('../php/conexao.php');

    if(!empty($_GET['id_cliente']))
    {
        $id_cliente = $_GET['id_cliente'];
        $sqlSelect = "SELECT * FROM cad_cliente WHERE id_cliente = $id_cliente";
        $resultado = $conexao->query($sqlSelect);  
        if($resultado->num_rows > 0)
        {
            while($dados_cliente = mysqli_fetch_assoc($resultado))
            {   
                $nome = $_POST['nome'];
                $sobrenome = $_POST['sobrenome'];
                $cpf = $_POST['cpf'];
                $dt_nascimento = $_POST['dt_nascimento'];
                $genero = $_POST['genero'];
                $cep = $_POST['cep'];
                $uf = $_POST['uf'];
                $cidade = $_POST['cidade'];
                $bairro = $_POST['bairro'];
                $endereco = $_POST['endereco'];
                $numero = $_POST['numero'];
                $telefone = $_POST['telefone'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
            }
        }
        else
        {
            header('Location: ../perfil/perfil.php');
        }
    }
    else
    {
        header('Location: ../perfil/perfil.php');
    }
// ?>