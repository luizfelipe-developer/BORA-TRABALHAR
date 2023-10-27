

<?php
    session_start();
    include_once('../php/conexao.php');
    include "../cliente/php/consulta_cliente.php";
<<<<<<< HEAD:componentes/paginas/perfil/perfil.php
    include "../editar/editar-cliente.php";

=======
    include "../cliente/php/consulta_biografia.php";
    session_start();
    if (!isset($_SESSION['online'])) {
>>>>>>> 78964c1d04017f902cf16f39f46303e60b472fd9:componentes/paginas/perfil/perfil copy.php

    } else {
        $user = $_SESSION['nomeUse'];
    }
    
    // print_r($_SESSION);
    if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['nome'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM cad_cliente WHERE id_cliente LIKE '%$data%' or nome LIKE '%$data%' or nome LIKE '%$data%' ORDER BY nome DESC";
    }
    else
    {
        $sql = "SELECT * FROM cad_cliente ORDER BY id_cliente DESC";
    }
    $resultado = $conexao->query($sql);

<<<<<<< HEAD:componentes/paginas/perfil/perfil.php

    
=======
    session_start();
    if (!isset($_SESSION['online'])) {

    } else {
        $user = $_SESSION['nomeUsu'];
    }
>>>>>>> 78964c1d04017f902cf16f39f46303e60b472fd9:componentes/paginas/perfil/perfil copy.php
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cc3645eafc.js" crossorigin="anonymous"></script>
    <script src="JS/script.js"></script>
    <link rel="stylesheet" href="../../header/header_perfil.css">
    <link rel="stylesheet" href="../../css/colaborador.css">

    <link rel="stylesheet" href="css/perfil.css">
    <link rel="shortcut icon" href="../../imgs/icones/ico-sem-fundo.ico.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
    </script>
    <script src="../../../componentes/js/script.js" defer></script>
    <title>Perfil</title>
    <style>
    .descricao {
        display: none;
        overflow: hidden;
    }


    .desaparece {
        display: none;
        overflow: hidden;
    }
    </style>
</head>

<body>
    <header>
   
        <div class="navbar">
            <div class="logo"><a href="../../../exit.php"><img
                        src="../../../componentes/imgs/logo/logo-sem-fundo.png"></a></div>
            <!-- Menu -->
            <div class="align-left">
                <div class="aba-perfil">
                    <img src="../../imgs/icones/do-utilizador.png" alt="">
                    <?php
<<<<<<< HEAD:componentes/paginas/perfil/perfil.php
                        echo "<h3>$logado</h3>";
                        
                    ?>
                    
                </div> -->
=======
                        echo "<span>$logado</span>";
                    ?>
                </div>
>>>>>>> 78964c1d04017f902cf16f39f46303e60b472fd9:componentes/paginas/perfil/perfil copy.php
                <div class="hamburguer active">&#9776;</div>
                <ul class="menu active">
                    <li class="actives"><a href="#container">INÍCIO</a></li>
                    <li class="">
                        <p>SERVIÇOS</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="./componentes/paginas/servicos/pedreiros.html">Pedreiro</a></li>
                                <li><a href="./componentes/paginas/servicos/pequenosreparos.html">Peq. Reparos</a></li>
                                <li><a href="./componentes/paginas/servicos/pintores.html">Pintor</a></li>
                                <li><a href="./componentes/paginas/servicos/diarista.html">Diarista</a></li>
                                <li><a href="./componentes/paginas/servicos/servico.html">Outros</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="">
                        <p>SOBRE</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="./componentes/paginas/sobre/sobre.html">Sobre Nós</a></li>
                                <li><a href="./componentes/paginas/suporte/suporte.html">Suporte</a></li>
                            </ul>
                        </div>
                    </li>
                    <!-- <li class="">
                        <p>CONTA</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="./componentes/paginas/cadastro/form_cadastros.html">Cadastrar</a></li>
                                <li><a href="./componentes/paginas/entrar/logins_form.html">Entrar</a></li>
                            </ul>
                        </div>
                    </li>  -->
                    <!-- fim -->
                </ul>
            </div>
        </div>
    </header>
    <main>
<<<<<<< HEAD:componentes/paginas/perfil/perfil.php
   
        <div class="containerr">
=======

        <div class="container">
>>>>>>> 78964c1d04017f902cf16f39f46303e60b472fd9:componentes/paginas/perfil/perfil copy.php
            <div class="subcontainer">
                <form action="../cliente/php/upload_foto.php" method="POST" enctype="multipart/form-data" style="margin: 0;">
                    <div class="ft_perfil">
                        <label for="imagem">Imagem:</label>
                        <input type="file" name="imagem" />
                        <input type="submit" value="Enviar" />
                    </div>
                </form>
                <!-- <form action="../cliente/php/upload_foto.php" method="post" style="margin: 0;">
                    <div class="ft_perfil">
                        <img src="" alt="">
                        <input type="file" name="foto_cliente" accept="imagem/cliente">
                    </div>
                </form> -->
                <div id="subform">
                    <?php echo "<span><u>$logado</u></span>";?>
                </div>
                <button class="edit_button">
<<<<<<< HEAD:componentes/paginas/perfil/perfil.php
                    
                <?php while ($usuario = $queryp->fetch_array()) { ?>        
                  
                  <tr>
             
                     
                      <a id="ed" class='btn btn-sm btn-primary' href='../editar/editar-cliente.php?id_cliente= <?php echo $usuario['id_cliente'];?>' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                   
                  </tr>
                 <?php } ?>
                </button>
            </div>
            
            <div class="container">
        <form class="form_container" action="../editar/saveEdit_cliente.php" method="post">
            <div class="title_container">
                <p class="title">CADASTRE-SE COMO CLIENTE</p>
                <span class="subtitle">Comece a usar nosso site, basta criar uma conta e aproveitar a
                    experiência.</span>
            </div>
            <div class="input_nome">
                <div class="nome">
                    <label class="input_label" for="email_field">Nome:</label>
                    <input placeholder="Nome" title="Primeiro nome" name="nome" type="text" class="input_name" value="<?php echo $nome; ?>" required>
                </div>
                <div class="nome">
                    <label class="input_label" for="email_field">Sobrenome:</label>
                    <input placeholder="Sobrenome" title="Sobrenome completo" name="sobrenome" type="text"
                        class="input_sname" value="<?php echo $sobrenome; ?>" required>
                </div>
            </div>
            <div class="input_nome">
                <div class="nome">
                    <label class="input_label" for="email_field">CPF:</label>
                    <input oninput="mascara(this)" placeholder="123.456.789-10" name="cpf" type="text"
                        class="input_name" value="<?php echo $cpf; ?>" required>

                </div>

                <div class="nome">
                    <label class="input_label" for="email_field">Nascimento:</label>
                    <input placeholder="Sobrenome" title="Sobrenome completo" name="dt_nascimento" type="date"
                        class="input_sname" value="<?php echo $dt_nascimento; ?>" required />
                </div>
            </div>
            <div class="input_container">
                <div class="input">
                    <p class="input_label">Genero:</p>
                    <input type="radio" id="masculino" name="genero" value="masculino" />
                    <label class="input_label" for="masculino">Masculino</label>
                    <input type="radio" id="feminino" name="genero" value="feminino" placeholder="Feminino" />
                    <label class="input_label" for="feminino">Feminino</label>

                    <input type="radio" id="outro" name="genero" value="outros" />
                    <label class="input_label" for="outro">Outros</label>
                </div>
            </div>
            <div class="input_container">
                <div class="input_nome">
                    <div class="nome">
                        <label class="input_label" for="cep">CEP</label>
                        <input class="input_name" type="tel" placeholder="Informe o Cep" id="cep" name="cep"
                            maxlength="8" />
                        <!-- Repare no maxlength="8", assim apenas 8 digitos do cep são aceitos -->
                    </div>
                    <div class="nome">
                        <label class="input_label" for="uf">UF</label>
                        <input class="input_snamee" type="text" placeholder="UF" name="uf" id="uf" />
                    </div>
                </div>

                <div class="input_nome">
                    <div class="nome">
                        <label class="input_label" for="cidade">Cidade</label>
                        <input class="input_name" type="text" placeholder="Cidade" id="cidade" name="cidade" />
                        <!-- Repare no maxlength="8", assim apenas 8 digitos do cep são aceitos -->
                    </div>
                    <div class="nome">
                        <label class="input_label" for="bairro">Bairro</label>
                        <input class="input_snamee" type="text" placeholder="Bairro" name="bairro" id="bairro" />
                    </div>
                </div>

                <label class="input_label" for="endereco">Endereço</label>
                <input class="input_field" type="text" class="big-field" placeholder="Rua da Consolação" name="endereco"
                    id="endereco" />

                <label class="input_label" for="nr_end">Número</label>
                <input class="input_field" type="text" class="big-field" name="numero" placeholder="Número da casa"
                    name="numero" id="numero" />
            </div>
            <div class="input_contato">
                <label class="input_label" for="password_field">Contato:</label>
                <input onkeyup="handlePhone(event)" maxlength="15" placeholder="(ddd) 00000-0000"
                    title="Número para Contato" name="telefone" type="text" class="input_field" />
                <input placeholder="E-mail" title="E-Mail" name="email" type="email" class="input_field"
                    id="email_field" required />
            </div>

            <div class="input_container">
                <div>
                    <label class="input_label" for="password_field">Senha:</label>
                    <input placeholder="Senha" id="senha" title="Senha" name="senha" type="password" class="input_field"
                        required />
                    <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarSenha()"></i>
                </div>
            </div>

            <div class="input_container">
                <div>
                    <label class="input_label" for="password_field">Confirme Senha:</label>
                    <input placeholder="Senha" id="senhaa" title="Insira sua senha novamente" name="confirmacao_senha"
                        type="password" class="input_field" required />
                    <i class="bi bi-eye-fill" id="btn-confirmar" onclick="confirmarsenha()"></i>
                </div>
            </div>

                <input type="hidden" name="id_cliente" value=<?php echo $id_cliente;?>>
                <input type="submit" name="update" id="submit" class="sign-in_btn">
               
            <a id="home" href="../../../index.html"> Voltar a página inicial</a>
        </form>
    </div>
        </div>
    </main>
    <script>
    function mascara(i) {
        var v = i.value;

        if (isNaN(v[v.length - 1])) {
            // impede entrar outro caractere que não seja número
            i.value = v.substring(0, v.length - 1);
            return;
        }

        i.setAttribute("maxlength", "14");
        if (v.length == 3 || v.length == 7) i.value += ".";
        if (v.length == 11) i.value += "-";
    }

    function mascara_cep(i) {
        var v = i.value;

        if (isNaN(v[v.length - 1])) {
            // impede entrar outro caractere que não seja número
            i.value = v.substring(0, v.length - 1);
            return;
        }

        i.setAttribute("maxlength", "9");
        if (v.length == 5) i.value += "-";
    }
    const handlePhone = (event) => {
        let input = event.target;
        input.value = phoneMask(input.value);
    };

    const phoneMask = (value) => {
        if (!value) return "";
        value = value.replace(/\D/g, "");
        value = value.replace(/(\d{2})(\d)/, "($1) $2");
        value = value.replace(/(\d)(\d{4})$/, "$1-$2");
        return value;
    };
    //cep////

    //Foca no Cep
    document.getElementById("cep").focus();

    var lastCepCheck = "";

    document.getElementById("cep").addEventListener("keyup", function() {
        //Impede inserir algo alem de Números
        this.value = this.value.replace(/[^0-9]/, "");

        //Pega apenas os números
        var cep = this.value.replace(/[^0-9]/, "");

        //Só pesquisa se tiver 8 caracteres e o ultimo cep pesquisado seja diferente do atual.
        if (cep.length != 8 || lastCepCheck == cep) {
            return false;
        }
        lastCepCheck = cep;

        ajax = new XMLHttpRequest();

        var url = "https://viacep.com.br/ws/" + cep + "/json/";
        ajax.open("GET", url, true);
        ajax.send();

        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4 && ajax.status == 200) {
                var json = JSON.parse(ajax.responseText);
                document.getElementById("endereco").value = json.logradouro;
                document.getElementById("bairro").value = json.bairro;
                document.getElementById("cidade").value = json.localidade;
                document.getElementById("uf").value = json.uf;
                document.getElementById("nr_end").focus();
            }
        };
    });
    </script>
    <script src="../../js/olho.js"></script>
    <script src="../../js/cep.js"></script>
    <script src="../../js/senha.js"></script>
=======

                    <?php
                        while ($dados_cliente = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            // echo "<td><span class='descricao'>CÓDIGO: </span>" . $dados_cliente['id_cliente'] . "</td>";
                            // echo "<td><span class='descricao'>GÊNERO: </span>" . $dados_cliente['nome'] . "</td>";

                            echo "<td>
                                <a class='btn btn-sm btn-primary' href='../editar/editar-cliente.php?id_cliente=$dados_cliente[id_cliente]' title='Editar'>
                                    <span>Editar Perfil</span>
                                    </a> 
                                    </svg>
                                    </a>
                                    </td>";
                            echo "</tr>";
                        }
                    ?>
                </button>
            </div>
            <div>
                
            </div>
        </div>
    </main>

>>>>>>> 78964c1d04017f902cf16f39f46303e60b472fd9:componentes/paginas/perfil/perfil copy.php
</body>

</html>