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
$resultado = $conexao->query($sql);
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
    <style>
        .solicitacoes-container {
            max-height: 400px;
            overflow-y: auto;
        }
        #filtro {
            text-align: center;
            margin-bottom: 20px;
        }

        #filtro select {
            padding: 8px 16px;
            border: 1px solid #189EB9;
            border-radius: 5px;
            background-color: white;
            color: #189EB9;
            cursor: pointer;
        }

        #filtro select:hover {
            background-color: #189EB9;
            color: white;
        }

    </style>
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
                            <?php
                while ($dados_colaborador = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>
                        <a class='btn btn-sm btn-primary' href='../perfil/perfil_colaborador.php?id_colaborador=$dados_colaborador[id_colaborador]' title='Editar'>
                            
                           
                           Meu Perfil </a> 
                           
                            </td>";
                    echo "</tr>";
                }
                ?>
                            <li><a href="../../../exit.php">Exit</a></li>
                                
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    </header>
<form method="post" action="colaborador.php">
    <main id="container" style="margin-top: 10%;">       
    <div id="filtro">
        <select id="filtro-select">
            <option value="todos">Todos Pedidos</option>
            <option value="recentes">Pedidos Recentes</option>
        </select>
    </div>


    <div class="solicitacoes-container">
        <h1>Solicitações de Trabalho</h1>
        <ul class="lista-solicitacoes" id="lista-solicitacoes">

        <?php
            session_start();

                if (isset($_SESSION['colaborador_id'])) {
                    $colaborador_id = $_SESSION['colaborador_id'];

                    $conexao = new mysqli("localhost", "root", "root", "bora_trabalhar");

                if ($conexao->connect_error) {
                    die("Erro na conexão: " . $conexao->connect_error);
                }

                $order_by = "id";

                if (isset($_POST['filtro']) && $_POST['filtro'] == "recentes") {
                    $order_by = "STR_TO_DATE(data_solicitacao, '%d/%m/%Y %H:%i:%s') DESC";
                }

                $sql = "SELECT s.id, s.nome_cliente, s.descricao_servico, s.data_solicitacao
                        FROM tabela_solicitacao s
                        WHERE s.colaborador_id = $colaborador_id
                        ORDER BY $order_by";

                $resultado = $conexao->query($sql);

                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<li>";
                        echo "<h2>" . $row["nome_cliente"] . "</h2>";
                        echo "<p>" . $row["descricao_servico"] . "</p>";
                        $dataHora = date("d/m/Y H:i:s", strtotime($row["data_solicitacao"]));
                        echo "<p>Data e Hora: " . $dataHora . "</p>";
                        echo "<div class='localiza'>";
                        echo "<a href='#' onclick='obterLocalizacao()'>Localização</a>";
                        echo "</div>";
                        echo "<a href='processa_solicitacao.php?action=aceitar&id=" . $row["id"] . "'>Aceitar</a>";
                        echo "<a href='processa_solicitacao.php?action=recusar&id=" . $row["id"] . "'>Recusar</a>";
                        echo "</li>";
                    }
                } else {
                    echo "Nenhuma solicitação encontrada para este colaborador.";
                }
                $conexao->close();
            } else {
                echo "Colaborador não autenticado.";
            }
        ?>



                </ul>
            </main>
        </form>
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