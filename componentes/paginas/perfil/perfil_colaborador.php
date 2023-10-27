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
    $sql = "SELECT * FROM cad_cliente WHERE (id_colaborador LIKE '%$data%' or nome LIKE '%$data%') AND nome = '$logado' ORDER BY nome DESC";
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
                        echo "<span>$logado</span>";
                    ?>
                </div>
                <div class="hamburguer active">&#9776;</div>
                <ul class="menu active">
                    <li class="actives"><a href="#container">INÍCIO</a></li>
                    <li class="">
                        <p>SOBRE</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="./componentes/paginas/sobre/sobre.html">Sobre Nós</a></li>
                                <li><a href="./componentes/paginas/suporte/suporte.html">Suporte</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="">
                        <p>CONTA</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="perfil_colaborador.php">Meu Perfil</a></li>
                                <li><a href="../../../exit.php">Sair</a></li>
                            </ul>
                        </div>
                    </li> 
                    <!-- fim -->
                </ul>
            </div>
        </div>
    </header>
    <main>

        <div class="container">
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

                <?php
                while ($dados_cliente = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>
                        <a class='btn btn-sm btn-primary' href='../editar/editar-colaborador.php?id_colaborador=$dados_cliente[id_colaborador]' title='Editar'>
                            
                           
                           EDITAR </a> 
                           
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

</body>

</html>