<?php
    session_start();
    include_once('../php/conexao.php');
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
        $sql = "SELECT * FROM cad_colaborador WHERE nome LIKE '%$data%' or nome LIKE '%$data%' or nome LIKE '%$data%' ORDER BY nome DESC";
    }
    else
    {
        $sql = "SELECT * FROM cad_colaborador ORDER BY nome DESC";
    }
    $result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="imagem/x-icon" href="componentes/imgs/icones/ico-sem-fundo.ico.ico" />
    <link rel="stylesheet" href="../../header/header.css">
    <link rel="stylesheet" href="../../css/style_colaborador.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../../js/script.js" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=SUA_CHAVE_DE_API" defer></script>
    
    <title>Bora Trabalhar</title>
</head>

<body>
<header>
        <div class="navbar">
            <div class="logo"><a href="trabalhador.php"><img src="../../imgs/logo/logo-sem-fundo.png"></a></div>
            <!-- Menu -->
            <div class="align-left">
                <div class="aba-perfil">
                    <img src="../../imgs/icones/do-utilizador.png" alt="">
                    <?php
                        echo "<span>$logado</span>";
                    ?>
                </div>
                <div class="hamburguer active">&#9776;</div>
                <ul class="menu active">
                    <li class="actives"><a href="trabalhador">INÍCIO</a></li>
                    <li class="">
                        <p>SOBRE</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="../sobre/sobre_colaborador.php">Sobre Nós</a></li>
                                <li><a href="../suporte/suporte.html">Suporte</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="">
                        <p>CONTA</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="../perfil/perfil_colaborador.php">Meu Perfil</a></li>
                                <li><a href="../../../exit.php">Exit</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <main id="container" style="margin-top: 7%;">       
        <div id="filtro">
        <a href="#"><button class="filtro-botao" data-filtro="todos">Todos Pedidos</button></a>
        <a href="#"><button class="filtro-botao" data-filtro="categoria">Pedidos Recentes</button></a>
        <a href="#"><button class="filtro-botao" data-filtro="categoria">Distância</button></a>
        <!-- Adicione mais botões de filtro conforme necessário -->
    </div>
        <h1>Solicitações de Trabalho</h1>
 
        
        <ul class="lista-solicitacoes">
            <li>
                <h2>Nome do cliente com uma imagem</h2> 
                <p>Descrição de acordo com o banco de dados</p>
                <div class="localiza">  
                    <a href="#" onclick="obterLocalizacao()"><!-- Substitua as coordenadas aqui  caso queira-->
                        <img src="componentes/imgs/icones/icons8-localização-96.png" alt="location">Localização
                    </a>
                </div>
                <a href="#">Aceitar</a>
                <a href="#">Recusar</a>

                   
            </li>
            <li>
                <h2>Nome do cliente com uma imagem</h2>
                <p>Descrição de acordo com o banco de dados</p>
                <div class="localiza">  
                    <a href="#" onclick="obterLocalizacao()"><!-- Substitua as coordenadas aqui -->
                        <img src="componentes/imgs/icones/icons8-localização-96.png" alt="location">Localização
                    </a>
                    </div>
                <a href="#">Aceitar</a>
                <a href="#">Recusar</a>
            </li>

        </ul>
    </main>
      <nav id="nav-botoes">
        <a href="#"><button id="botao">Alterar Localização</button></a>
        <a href="categoria.html"><button id="botao">Alterar Categoria</button></a>
        <a href="chat.html"><button id="botao">Conversas</button></a>
        <a href="#"><button id="botao">Perfil Público</button></a>
    </nav>
    <footer>
        <p>&copy; 2023 Bora Trabalhar. Todos os direitos reservados.</p>
    </footer></div>
    <script>
        function abrirMapa(latitude, longitude) {
            // Crie uma URL para abrir o Google Maps com as coordenadas
            const mapaURL = `https://www.google.com/maps?q=${latitude},${longitude}`;

            // Abra uma nova janela ou guia do navegador com o Google Maps
            window.open(mapaURL, '_blank');
        }

        function obterLocalizacao() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;
                    abrirMapa(latitude, longitude);
                }, function (error) {
                    alert('Erro ao obter a localização: ' + error.message);
                });
            } else {
                alert('Seu navegador não suporta a API de geolocalização.');
            }
        }
    </script>
</body>

</html>