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
    <script src="https://kit.fontawesome.com/cc3645eafc.js" crossorigin="anonymous"></script>
    <script src="JS/script.js"></script>
    <link rel="stylesheet" href="../../header/header_perfil.css">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="shortcut icon" href="../../imgs/icones/ico-sem-fundo.ico.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
    </script>
    <script src="../../../componentes/js/script.js" defer></script>
    <title>Perfil</title>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo"><a href="../../../exit.php"><img src="../../../componentes/imgs/logo/logo-sem-fundo.png"></a></div>
            <!-- Menu -->
            <div class="align-left">
                <!-- <div class="aba-perfil">
                    <img src="../../imgs/icones/do-utilizador.png" alt="">
                    <?php
                        echo "<h3>$logado</h3>";
                    ?>
                </div> -->
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
        <div class="container">
            <div class="subcontainer">
                <div class="ft_perfil">
                    <img src="" alt="">
                </div>
                <div id="subform">
                    <?php echo "<span><u>$logado</u></span>";?>
                </div>
                <button class="edit_button">
                    <a href="editar_perfil.php">Editar Perfil</a>
                </button>
            </div>
            <form action="../cliente/php/cad_biografia_cliente.php" method="post" class="subcontainer2">
                <div class="subform2">
                    <textarea name="" id="descricao" cols="80" rows="10" placeholder="Biografia" required></textarea>
                </div>
                <button id="save_biografia" value="Salvar" name="save_biografia">Salvar</button>
            </form>
        </div>
    </main>
  
</body>
</html>