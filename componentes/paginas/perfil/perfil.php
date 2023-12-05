<?php
    include_once('../php/conexao.php');

    if(!empty($_GET['id_cliente']))
    {
        $id_cliente = $_GET['id_cliente'];
        $sqlSelect = "SELECT * FROM cad_cliente WHERE id_cliente = $id_cliente";
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
                $cad_foto = $dados_colaborador['cad_foto'];


                $email = $dados_colaborador['email'];
                $senha = $dados_colaborador['senha'];
            }
        }
        else
        {
            header('Location: perfil.php');
        }
    }
    else
    {
        header('Location: perfil.php');
    }
    

?>

<?php
session_start();
include_once('componentes/paginas/php/conexao.php');
    include "componentes/paginas/cliente/php/consulta_cliente.php";

if ((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['nome']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}

$logado = $_SESSION['nome'];

// Verificar se há uma consulta para exibir apenas o usuário logado
if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM cad_cliente WHERE (id_cliente LIKE '%$data%' or nome LIKE '%$data%') AND nome = '$logado' ORDER BY nome DESC";
} else {
    $sql = "SELECT * FROM cad_cliente WHERE nome = '$logado' ORDER BY id_cliente DESC";
}

//logica do editar
$result = $conexao->query($sql);


///logica da imagem//
$query = "SELECT cad_foto, nome FROM cad_cliente WHERE id_cliente = $logado";

$resultado = $conexao->query($sql);

if ($resultado->num_rows == 1) {
    $row = $resultado->fetch_assoc();
    $fotoNome = '../../imgs/imagemClientes/' . $row['cad_foto'];
    $nomeAluno = "<br><b>" . $row['nome'] ."</b>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Minha Página</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />

  <link rel="stylesheet" href="../../css/bootstrap.css">
</head>
<style>
  .text{
  background-color: black;
  }
</style>
<body class="text-black">
  <header class="bg-gradient navbar-nav mb-2">
    
  </header>
  
  <main class="text-light">
    <div class="container bg-gradient rounded-3">
      <div class="rounded-3 row bg-black bg-opacity-25">
        <div class="col-12 col-md-3 text-center text-light
            rounded-3 bg-opacity-50 bg-black shadow-lg">
        
            <div class="col-10 mb-5 img-fluid mt-4 w-75 m-auto">
            <form action="../editar/saveEdit_cliente.php" method="post" enctype="multipart/form-data" class="alert">
            <label class="picture rounded-circle mt-4 w-75 d-flex m-auto" for="picture_input" tabindex="0">
              
              <input type="file" id="picture_input" name="cad_foto" class="picture_input d-none" accept="image/imagemClientes*">

              <img id="kayo" class="image" src="<?php echo $fotoNome; ?>" alt="Foto">

            </label>
          </div>

          <h2 class="h4 mb-3" id="profileName"><?php echo $nome; ?></h2>
          <label for="profession" class="d-block mb-2">Email: <span id="userProfession"
              class="text-white-50 m-2"><?php echo $email; ?></span></label>
          <label for="numberDocument" class="d-block mb-2">Gênero: <span id="userNumberDocument"
              class="text-white-50 m-2"><?php echo $genero; ?></span></label>
          <h2 class="h5 mt-4">Minhas Redes</h2>
          <div class="mb-3 mt-4">
            <a href="https://www.linkedin.com/" target="_blank" class="link-light m-1"><i class="fa-brands
                  fa-linkedin fa-xl"></i></a>
            <a href="https://github.com/" target="_blank" class="link-light m-1"><i class="fa-brands fa-github
                  fa-xl"></i></a>
            <a href="https://twitter.com/" target="_blank" class="link-light m-1"><i class="fa-brands fa-twitter
                  fa-xl"></i></a>
            <a href="https://stackoverflow.com/" target="_blank" class="link-light m-1"><i class="fa-brands
                  fa-stack-overflow fa-xl"></i></a>
          </div>
        </div>

        <div class="col-12 col-md-9 shadow-lg p-3 bg-body bg-opacity-10 rounded-3">
          <h2 class="h4 mb-4 mt-5 text-center">Minhas Informações</h2>
          <div class="centro">
            <div class="col-12 col-md-5 m-2">
              <label for="name" class="form-label"><strong>Nome:</strong> </label>
              <span class="text-white-50 m-2" id="userName"><?php echo $nome; ?></span>
            </div>
            <div class="col-12 col-md-5 m-2">
              <label for="age" class="form-label">CPF:</label>
              <span class="text-white-50 m-2" id="userAge"><?php echo $cpf; ?></span>
            </div>
            <div class="col-12 col-md-5 m-2">
              <label for="location" class="form-label">Email:</label>
              <span class="text-white-50 m-2" id="userLocation"><?php echo $email; ?></span>
            </div>
            <div class="col-12 col-md-5 m-2">
              <label for="phone" class="form-label">Telefone:</label>
              <span class="text-white-50 m-2" id="userPhone"><?php echo $telefone; ?></span>
            </div>
          </div>
          <div class="mb-3 text-center text-capitalize">
            <label for="bio" class="form-label">Breve Biografia:</label>
            <p id="userBio">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
              ultrices ligula id mauris facilisis, ac tristique enim
              hendrerit. Praesent vel felis quis nulla rhoncus vestibulum ac a
              massa. Sed vehicula libero id ipsum pellentesque, vel cursus mi
              blandit.
            </p>
          </div>
          <h2 class="h4 mb-2 mt-5 text-center">Atualizar Informações</h2>
            <div class="mb-1 alert">
              <label for="name" class="form-label">Nome:</label>
              <input placeholder="Nome" type="text" id="name" name="nome"
                class="form-control form-control text-light bg-transparent placeholder" value="<?php echo $nome; ?>" />

              <label for="sobrenome" class="form-label">Sobrenome:</label>
              <input placeholder="Sobrenome" type="text" id="sobrenome" name="sobrenome"
                class="form-control form-control text-light bg-transparent placeholder" value="<?php echo $sobrenome; ?>" />

              <label for="cpf" class="form-label">CPF</label>
              <input oninput="mascara(this)" placeholder="123.456.789-10" name="cpf" type="text"
                class="form-control form-control text-light bg-transparent placeholder" value="<?php echo $cpf; ?>" />

              <label for="location" class="form-label">Nascimento</label>
              <input placeholder="Guitarrista" type="date" id="dt_nascimento" name="dt_nascimento"
                class="form-control form-control text-light bg-transparent placeholder" value="<?php echo $dt_nascimento; ?>"  />

                <br>

              <div class="input">
                <p class="form-label">Genero:</p>
                <input type="radio" id="masculino" name="genero" value="masculino" <?php echo ($genero == 'masculino') ? 'checked' : ''; ?> />
                <label class="input_label" for="masculino">Masculino</label>
                <input type="radio" id="feminino" name="genero" value="feminino" <?php echo ($genero == 'feminino') ? 'checked' : ''; ?> />
                <label class="input_label" for="feminino">Feminino</label>

                <input type="radio" id="outro" name="genero" value="outro" <?php echo ($genero == 'outro') ? 'checked' : ''; ?> />
                <label class="input_label" for="outro">Outros</label>
              </div>

              
          
              <div class="input_nome">
                <div class="nome">
                  <label class="form-label" for="cep">CEP</label>
                  <input class="form-control form-control text-light bg-transparent placeholder" type="tel"
                    placeholder="Informe o Cep" id="cep" name="cep" maxlength="8" value="<?php echo $cep; ?>" />
                  <!-- Repare no maxlength="8", assim apenas 8 digitos do cep são aceitos -->
                </div>
                <div class="nome">
                  <label class="form-label" for="uf">UF</label>
                  <input class="form-control form-control text-light bg-transparent placeholder" type="text"
                    placeholder="UF" name="uf" id="uf" />
                </div>
              </div>

              <div class="input_nome">
                <div class="nome">
                  <label class="form-label" for="cidade">Cidade</label>
                  <input class="form-control form-control text-light bg-transparent placeholder" type="text"
                    placeholder="Cidade" id="cidade" name="cidade" />
                  <!-- Repare no maxlength="8", assim apenas 8 digitos do cep são aceitos -->
                </div>
                <div class="nome">
                  <label class="form-label" for="bairro">Bairro</label>
                  <input class="form-control form-control text-light bg-transparent placeholder" type="text"
                    placeholder="Bairro" name="bairro" id="bairro" />
                </div>
              </div>

              <label class="form-label" for="endereco">Endereço</label>
              <input class="form-control form-control text-light bg-transparent placeholder" type="text"
                class="big-field" placeholder="Rua da Consolação" name="endereco" id="endereco" />

              <label class="form-label" for="nr_end">Número</label>
              <input class="form-control form-control text-light bg-transparent placeholder" type="text"
                class="big-field" name="numero" placeholder="Número da casa" name="numero" id="numero"
                value="<?php echo $numero; ?>" />
           
              <label class="form-label" for="password_field">Contato:</label>
              <input onkeyup="handlePhone(event)" maxlength="15" placeholder="(ddd) 00000-0000"
                title="Número para Contato" name="telefone" type="text"
                class="form-control form-control text-light bg-transparent placeholder"
                value="<?php echo $telefone; ?>" />
              <label class="form-label" for="password_field">Email:</label>

              <input placeholder="E-mail" title="E-Mail" name="email" type="email"
                class="form-control form-control text-light bg-transparent placeholder" id="email_field"
                value="<?php echo $email; ?>" />



              <label class="form-label" for="password_field">Senha:</label>
              <input placeholder="Senha" id="senha" title="Senha" name="senha" type="password"
                class="form-control form-control text-light bg-transparent placeholder" value="<?php echo $senha; ?>" />
              <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarSenha()"></i>




              <label class="form-label" for="password_field">Confirme Senha:</label>
              <input placeholder="Senha" id="senhaa" title="Insira sua senha novamente" name="confirmacao_senha"
                type="password" class="form-control form-control text-light bg-transparent placeholder"
                value="<?php echo $senha; ?>" />
              <i class="bi bi-eye-fill" id="btn-confirmar" onclick="confirmarsenha()"></i>
            </div>

            
            <div class="container mt-3">

              <input type="hidden" name="id_cliente" value=<?php echo $id_cliente; ?>>
              <input type="submit" name="update" id="submit" value="Atualizar"
                class="btn shadow-sm bg-transparent text-light border-opacity-100 border-light border-1" id="btnSubmit">

              <a id="home" href="../../../index_cliente.php"
                class="btn shadow-sm bg-transparent text-light border-opacity-100 border-light border-1" id="btnSubmit">
                Voltar a página inicial</a>
            </div>
          </form>
        </div>
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

    document.getElementById("cep").addEventListener("keyup", function () {
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

      ajax.onreadystatechange = function () {
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
  <script src="../../js/senha.js"></script>
  <script src="../../js/cep.js"></script>
</body>

</html>