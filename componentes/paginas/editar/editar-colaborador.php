<?php
    include_once('../php/conexao.php');

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
                $email = $dados_colaborador['email'];
                $senha = $dados_colaborador['senha'];
                $cad_foto = $dados_colaborador['cad_foto'];

            }
        }
        else
        {
            header('Location: editar-colaborador.php');
        }
    }
    else
    {
        header('Location: editar-colaborador.php');
    }
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" type="imagem/x-icon" href="../../imgs/icones/ico-sem-fundo.ico.ico" />
    <link rel="stylesheet" href="../../css/colaborador.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    <title>Editar - Colaborador</title>
</head>

<body>
    <div class="container">
        <form class="form_container" action="saveEdit_colaborador.php" method="post">
            <div class="title_container">
                <p class="title">EDITAR COLABORADOR</p>
                <span class="subtitle">Comece a usar nosso site, basta criar uma conta e aproveitar a
                    experiência.</span>
            </div>
            <div class="input_nome">
                <div class="nome">
                    <label class="input_label" for="email_field">Nome:</label>
                    <input placeholder="Nome" title="Primeiro nome" name="nome" type="text" class="input_name" value="<?php echo $nome; ?>"/>
                </div>
                <div class="nome">
                    <label class="input_label" for="email_field">Sobrenome:</label>
                    <input placeholder="Sobrenome" title="Sobrenome completo" name="sobrenome" type="text"
                        class="input_sname" value="<?php echo $sobrenome; ?>"/>
                </div>
            </div>
            
            <div class="input_nome">
                <div class="nome">
                    <label class="input_label" for="email_field">CPF:</label>
                    <input oninput="mascara(this)" placeholder="123.456.789-10" name="cpf" type="text"
                        class="input_name" value="<?php echo $cpf; ?>"/>

                </div>

                <div class="nome">
                    <label class="input_label" for="email_field">Nascimento:</label>
                    <input placeholder="Sobrenome" title="Sobrenome completo" name="dt_nascimento" type="date"
                        class="input_sname" value="<?php echo $dt_nascimento; ?>"  />
                </div>
            </div>
            <div class="input_container">
                <div class="input">
                    <p class="input_label">Genero:</p>
                    <input type="radio" id="masculino" name="genero" value="masculino" <?php echo ($genero == 'masculino') ? 'checked' : '';?> />
                    <label class="input_label" for="masculino">Masculino</label>
                    <input type="radio" id="feminino" name="genero" value="feminino" <?php echo ($genero == 'feminino') ? 'checked' : '';?> />
                    <label class="input_label" for="feminino">Feminino</label>

                    <input type="radio" id="outro" name="genero" value="outro" <?php echo ($genero == 'outro') ? 'checked' : '';?> />
                    <label class="input_label" for="outro">Outros</label>
                </div>
            </div>

            <div class="input_container" style="margin-top: 15px;">
        <label class="input_label" for="password_field">Profissão Principal:</label>
        
        <div class="imobSelect">
          <select name="profissao" id="profissao" >
            <option value="Pedreiro">Pedreiro</option>
            <option value="Pintor" >Pintor</option>
            <option value="Diarista">Diarista</option>
            <option value="Eletricista">Eletricista</option>
            <option value="outro">Outros</option>

          </select>
         </div> 
        <h4 style="margin: 15px 0px 0px;" class="input_label">Selecione outras categorias caso tiver experiência:</h4>
        <div style="display: flex; margin: 10px 0px 3px; text-align: center;">
        <label class="input_label"><input type="checkbox" name="categorias[]" value="Pedreiro"> Pedreiro</label>
        <label class="input_label"><input type="checkbox" name="categorias[]" value="Pintor"> Pintor</label>
        <label class="input_label"><input type="checkbox" name="categorias[]" value="Diarista"> Diarista</label>
        <label class="input_label"><input type="checkbox" name="categorias[]" value="Eletricista"> Eletricista</label>
        <label class="input_label"><input type="checkbox" name="categorias[]" value="Outro"> Outros</label>
      </div>
    </div>


            <div class="input_container">
                <div class="input_nome">
                    <div class="nome">
                        <label class="input_label" for="cep">CEP</label>
                        <input class="input_name" type="tel" placeholder="Informe o Cep" id="cep" name="cep"
                            maxlength="8" value="<?php echo $cep; ?>"  />
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
                    name="numero" id="numero" value="<?php echo $numero; ?>"  />
            </div>
            <div class="input_contato">
                <label class="input_label" for="password_field">Contato:</label>
                <input onkeyup="handlePhone(event)" maxlength="15" placeholder="(ddd) 00000-0000"
                    title="Número para Contato" name="telefone" type="text" class="input_field" value="<?php echo $telefone; ?>"  />
                <input placeholder="E-mail" title="E-Mail" name="email" type="email" class="input_field"
                    id="email_field" value="<?php echo $email; ?>"  />
            </div>

            <div class="input_container">
                <div>
                    <label class="input_label" for="password_field">Senha:</label>
                    <input placeholder="Senha" id="senha" title="Senha" name="senha" type="password" class="input_field"
                    value="<?php echo $senha; ?>"  />
                    <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarSenha()"></i>
                </div>
            </div>

            <div class="input_container">
                <div>
                    <label class="input_label" for="password_field">Confirme Senha:</label>
                    <input placeholder="Senha" id="senhaa" title="Insira sua senha novamente" name="confirmacao_senha"
                        type="password" class="input_field"  value="<?php echo $senha; ?>"  />
                    <i class="bi bi-eye-fill" id="btn-confirmar" onclick="confirmarsenha()"></i>
                </div>
            </div>

                <input type="hidden" name="id_colaborador" value=<?php echo $id_colaborador;?>>
                <input type="submit" name="updatee" id="submit" class="sign-in_btn">
               
            <a id="home" href="../../../index.html"> Voltar a página inicial</a>
        </form>
    </div>
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
</body>

</html>