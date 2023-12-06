<?php
    session_start();
    include_once('../php/conexao.php');
    // print_r($_SESSION);
     if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true))
     {
          unset($_SESSION['nome']);
          unset($_SESSION['senha']);
          header('Location: ../../../login.php');
     }
    $logado = $_SESSION['nome'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM cad_colaborador WHERE nome LIKE '%$data%' or nome LIKE '%$data%' or nome LIKE '%$data%' ORDER BY nome DESC";
    }
    else
    {
        $sql = "SELECT * FROM cad_colaborador ORDER BY nome DESC";
    }
    $result = $conexao->query($sql);
?>

<?php
session_start();
include_once('../php/conexao.php');
include "../cliente/php/consulta_colaborador.php";

if ((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['nome']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}

$logado = $_SESSION['nome'];

// Verificar se há uma consulta para exibir apenas o usuário logado
if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM cad_colaborador WHERE (id_colaborador LIKE '%$data%' or nome LIKE '%$data%') AND nome = '$logado' ORDER BY nome DESC";
} else {
    $sql = "SELECT * FROM cad_colaborador WHERE nome = '$logado' ORDER BY id_colaborador DESC";
}

//logica do editar
$result = $conexao->query($sql);


///logica da imagem//
$query = "SELECT cad_foto, nome FROM cad_colaborador WHERE id_colaborador = $logado";

$resultado = $conexao->query($sql);

if ($resultado->num_rows == 1) {
    $row = $resultado->fetch_assoc();
    $fotoNome = '../../imgs/imagemColaboradores/' . $row['cad_foto'];
    $nomeAluno = "<br><b>" . $row['nome'] . "</b>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="imagem/x-icon" href="../../imgs/icones/ico-sem-fundo.ico.ico" />
    <link rel="stylesheet" href="../../header/header.css">
    <link rel="stylesheet" href="../../css/sobre.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="./../../js/script.js" defer></script>

    <title>Sobre Nós</title>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo"><a href="../../../index.html"><img src="../../imgs/logo/logo-sem-fundo.png"></a></div>
            <!-- Menu -->
            <div class="align-left">
                <div class="aba-perfil">

                <img class="image" src="<?php echo $fotoNome; ?>" alt="Foto">

<?php
                        echo "<span>$logado</span>";
                    ?>
                </div>
                <div class="hamburguer active">&#9776;</div>
                <ul class="menu active">
                    <li class=""><a href="../../../index.html">INÍCIO</a></li>
                    <li class="actives">
                        <p>SOBRE</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="#">Sobre Nós</a></li>
                                <li><a href="./../suporte/suporte.html">Suporte</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="">
                        <p>CONTA</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="../perfil/perfil_colaborador.php">Meu Perfil</a></li>
                                <li><a href="./../entrar/logins_form.html">Sair</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="div-img-texto" id="img1">
        <div class="paragrafo">
            <h1>Sobre nós</h1><br>
            <h3>Saiba mais sobre o Bora Trabalhar </h3>
        </div>
    </div>
    <div class="quem-somos">
        <h2>Quem Somos</h2>
        <p>Em meio a expansão tecnológica, pessoas perceberam uma grande oportunidade de divulgarem seus trabalhos e
            seus dotes, desbravando a possibilidade de seguir seus sonhos e alcançar o seu potencial de acordo com seu
            próprio mérito e empenho.
            Em pesquisas, através da plataforma Google Forms, o projeto conseguiu identificar o principal profissional
            autônomo mais procurado entre as diversas opções apresentadas e assim, foi realizado a elaboração da
            plataforma web.
            Nosso intuito é facilitar a contratação de prestadores de serviços formais e informais sem vínculos
            imprecativo, fazendo isso de forma online, juntando em um mesmo local possíveis contratantes de serviços
            tanto básicos que exija o manuseio
            de ferramentas específicas quantos profissionais de funções que exige conhecimento técnico apurado,
            disponibilizando em um mesmo sistema contratantes e possíveis contratados, buscando amenizar ou solucionar o
            problema de achar prestadores de
            serviços, facilitando a inserção do indivíduo no mercado informal.
        </p><br>
        <div class="nossa-historia">
            <div class="fundadores">
                <img class="fundadores-img" src="../../imgs/img-meio.jpg" alt="">
                <br><br>
            </div><br>
            <div class="fundadores">
                <hr>
                <h2>Nossa Equipe</h2>
                <img class="fundadores-img" src="../../imgs/img-programando.jpg" alt="">
                <p>Somos compostos por uma vasta equipe de desenvolvimento reconhecidos por seus respectivos
                    departamentos, em meio a elas, encontra-se os desenvolvedores, que constroem todo o parâmetro do
                    site com base em ideias dos demais departamentos; o departamento de design: responsável pela
                    organização do site, é quem desenha e cria cada ícone em vários tamanhos e cores, dando
                    características e pequenos dons de personalidade ao ambiente criado; o departamento de apoiadores: é
                    uma equipe que está por dentro do projeto como um todo, possuindo uma prontidão apta para resolver
                    ou alertarem possíveis problemas ou falhas ainda em sua versão beta; e o departamento de escrita: a
                    equipe que criou e desenvolveu todos os formulários, pesquisas e textos do nosso Website.</p>
            </div>
        </div>
    </div>

    <div id="container">

    </div>


</body>

</html>