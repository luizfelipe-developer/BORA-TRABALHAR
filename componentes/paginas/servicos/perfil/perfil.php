<?php
    session_start();
    include_once('../../php/conexao.php');
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
        $sql = "SELECT * FROM cad_cliente WHERE nome LIKE '%$data%' or nome LIKE '%$data%' or nome LIKE '%$data%' ORDER BY nome DESC";
    }
    else
    {
        $sql = "SELECT * FROM cad_cliente ORDER BY nome DESC";
    }
    $result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="imagem/x-icon" href="../../../imgs/icones/ico-sem-fundo.ico.ico" />
    <link rel="stylesheet" href="../../../header/header.css">
    <link rel="stylesheet" href="../../../css/perfil.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="./../../../js/script.js" defer></script>
    <style>
        .container{
            margin-top: 100px;
        }
    </style>
    <title>CONTATOS</title>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo"><a href="../../../../index.html"><img src="../../../imgs/logo/logo-sem-fundo.png"></a>
            </div>
            <!-- Menu -->
            <div class="align-left">
                <div class="aba-perfil">
                    <img src="./../../../imgs/icones/do-utilizador.png" alt="">
                    <?php echo "<span>$logado</span>"; ?>
                </div>
                <div class="hamburguer active">&#9776;</div>
                <ul class="menu active">
                    <li class=""><a href="../../../../index_cliente.php">INÍCIO</a></li>
                    <li class="actives">
                        <p>SERVIÇOS</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="./../../servicos/pedreiros.php">Pedreiro</a></li>
                                <li><a href="./../../servicos/pequenosreparos.php">Peq. Reparos</a></li>
                                <li><a href="./../../servicos/pintores.php">Pintor</a></li>
                                <li><a href="./../../servicos/diarista.php">Diarista</a></li>
                                <li><a href="./../../servicos/servico.php">Outros</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="">
                        <p>SOBRE</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="../../sobre/sobre_cliente.php">Sobre Nós</a></li>
                                <li><a href="./../../suporte/suporte.html">Suporte</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="">
                        <p>CONTA</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="../../perfil/perfil.php">Meu Perfil</a></li>
                                <li><a href="../../../../exit.php">Sair</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="user-image">

            <img src="../../../imgs/servicos-img/perfil.png" alt="">

            <div class="direita">
                <h3 class="name">Nome</h3>
                <h3 class="name">Profissâo</h3>
                <h3 class="name">e-mail</h3>
                <h3 class="name">(99) 9140-8922</h3>

                <div class="msg">
                    <a class="effect effect-4" href="chat/chat.html">
                        Mensagem
                    </a>

                </div>
            </div>

        </div>
        <hr>
        <div class="content">
            <p class="details">
                <b> Desenvolvedor web<br>
                    Especializado nas mais diversas instituiçôes<br>
                    Experiência no mercado há 6 anos</b>
            </p>


            <div class="container-dois">
                <div class="user-avatar">
                    <img src="../../../imgs/servicos-img/trabalhadores/pedreirol.jpg" alt="">
                    <p>Nome do usuario</p>
                </div>
                <div class="rating">
                    <input type="radio" id="star5" name="rate" value="5">
                    <label for="star5" title="text"></label>
                    <input type="radio" id="star4" name="rate" value="4">
                    <label for="star4" title="text"></label>
                    <input checked="" type="radio" id="star3" name="rate" value="3">
                    <label for="star3" title="text"></label>
                    <input type="radio" id="star2" name="rate" value="2">
                    <label for="star2" title="text"></label>
                    <input type="radio" id="star1" name="rate" value="1">
                    <label for="star1" title="text"></label>
                </div>
                <div class="comentario">
                    <input type="text" name="" id="" placeholder="insira seu comentario" title="comentario">
                </div>
            </div>



           

    <script src="https://kit.fontawesome.com/704ff50790.js" crossorigin="anonymous">
    </script>
</body>

</html>