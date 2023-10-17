<?php
    session_start();
    include_once('../php/conexao.php');
    include "../cliente/php/consulta_cliente.php";

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
        .descricao{
        display: none;
        overflow: hidden;
        }
      

      .desaparece{
        display: none;
        overflow: hidden;
    }
       
    </style>
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
                    <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";

                    
                        echo "<td>
                        <a class='btn btn-sm btn-primary' href='../editar/editar-cliente.php?id_cliente=$user_data[id_cliente]' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            </td>";

                     
                        echo "</tr>";
                    }
                    ?>

                <?php while ($usuario = $queryp->fetch_array()) { ?>        
                  
                  <tr>
            

                      <td><span class='descricao'>CÓDIGO: </span> <?php echo $usuario['cod_professor'];?></td>
                      <td><span class='descricao'>NOME: </span> <?php echo $usuario['nome'];?></td>
                      <td><span class='descricao'>SOBRENOME: </span> <?php echo $usuario['sobrenome'];?></td>
                      <td><span class='descricao'>ENDEREÇO: </span> <?php echo $usuario['endereco'];?></td>
                      <td><span class='descricao'>CPF: </span> <?php echo $usuario['CPF'];?></td>
                      <td><span class='descricao'>TELEFONE: </span> <?php echo $usuario['telefone'];?></td>
                      <td><span class='descricao'>GÊNERO: </span> <?php echo $usuario['genero'];?></td>
                      <td><span class='descricao'>CREF: </span> <?php echo $usuario['cref'];?></td>
                   
                  </tr>
                 <?php } ?>
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