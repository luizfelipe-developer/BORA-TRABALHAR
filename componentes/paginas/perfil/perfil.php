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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cc3645eafc.js" crossorigin="anonymous"></script>
    <script src="JS/script.js"></script>
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="../../header/header.css">
    <link rel="shortcut icon" href="../../imgs/icones/ico-sem-fundo.ico.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../../../componentes/js/script.js" defer></script>
    <title>Perfil</title>
</head>
<body>
<header>
        <div class="navbar">
            <div class="logo"><a href="../../../exit.php"><img src="../../../componentes/imgs/logo/logo-sem-fundo.png"></a></div>
            <!-- Menu -->
            <div class="align-left">
                
                
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
                    <li class="">
                        <p>CONTA</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="./componentes/paginas/cadastro/form_cadastros.html">Cadastrar</a></li>
                                <li><a href="./componentes/paginas/entrar/logins_form.html">Entrar</a></li>
                            </ul>
                        </div>
                    </li>      
<!-- fim -->
                </ul>
            </div>
        </div>
    </header>


      
             

    
    <main>
        <div id="ADD-Post" class="modal fade mt-5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h5 class="modal-title fs-5" id="exampleModalLabel">Criar nova publicação</h5>
                    </div>
                    <div class="modal-body">
                       
                        <form enctype="multipart/form-data" action="__URL__" method="POST">
                            <div class="new--post">
                                <label class="picture" for="picture--input" tabindex="0">
                                    <span class="picture--image"></span>
                                </label>
                                <input type="hidden" name="MAX_FILE_SIZE" value="30000"/>
                                <input type="file" accept="image/*" id="picture--input">
                            </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                          <a href="javascript: publicar();"><button type="button" class="btn btn-primary" data-bs-dismiss="modal">Confirmar</button></a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3 col-sm-12 col-xs-12 col-lg-3 user">
                    <div class="ft_perfil">
                        <img src="..." alt="">
                    </div>
                    <form action="" method="get">
                        <div>
                            <?php echo "<input<u> <u>$logado</u>";?><br>
                            <input type="text" placeholder="Bio..." disabled> <br>
                            <button class="edit_button">
                                <a href="editar_perfil.php">Editar Perfil</a>
                            </button>
                        </div>
                    </form>
                </div>
           
            </div>
            <hr>
       
        </div>
    </main>
  
</body>
</html>