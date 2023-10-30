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
    <link rel="shortcut icon" type="imagem/x-icon" href="../../../ico-sem-fundo.ico.ico" />
    <link rel="stylesheet" href="../../header/header.css">
    <link rel="stylesheet" href="../../css/servicocopy.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="./../../js/script.js" defer></script>
    <style>
      
      #container {
            margin-top: 50px;
        }

        #title {
            margin-top: 0px;
            color: black;
            text-align: center;
            display: block;
        }

    </style>
    <title>Pintores</title>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo"><a href="../../../index_cliente.php"><img src="../../imgs/logo/logo-sem-fundo.png"></a></div>
            <!-- Menu -->
            <div class="align-left">
                <div class="aba-perfil">
                    <img src="../../imgs/icones/do-utilizador.png" alt="">
                    <?php
                        echo "<h3>$logado</h3>";
                    ?>
                </div>
                <div class="hamburguer active">&#9776;</div>
                <ul class="menu active">
                    <li class=""><a href="../../../index_cliente.php">INÍCIO</a></li>
                    <li class="actives">
                        <p>SERVIÇOS</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="./pedreiros.php">Pedreiro</a></li>
                                <li><a href="./pequenosreparos.php">Peq. Reparos</a></li>
                                <li><a href="#">Pintor</a></li>
                                <li><a href="./diarista.php">Diarista</a></li>
                                <li><a href="./servico.php">Outros</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="">
                        <p>SOBRE</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="./../sobre/sobre_cliente.php">Sobre Nós</a></li>
                                <li><a href="./../suporte/suporte.html">Suporte</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="">
                        <p>CONTA</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="#">Ver Perfil</a></li>
                                <li><a href="./../../../exit.php">Sair</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="barra-pesquisa">
        <h1 style="color: #555;">O que você procura?</h1><br>

        <form class="form">
            <button>
                <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img"
                    aria-labelledby="search">
                    <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9"
                        stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round">
                    </path>
                </svg>
            </button>
            <input class="input" id="searchbar" onkeyup="search_pesquisa()" type="text" name="search"
                placeholder="Ex. pinturas" required="">
            <button class="reset" type="reset">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </form>
    </div>
    <div id="container">
        <h2 id="title">Pintor</h2>

        <main>
            <ol id='list'>
                <li class="pesquisa">
                    <section class="card">
                        <div class="card-foto">
                            <img src="../../imgs/servicos-img/trabalhadores/pintor.png" alt="Foto do Trabalhador">
                            <h2 class="nome">Renan</h2>
            
                            <span class="txt-categoria">renan</span>
                            
                        </div>
                            <div class="descricao">
                                <h3>Pintor</h3>
                                <p>☆☆☆☆☆</p>
                                <br>
                                <nav>

                                    <label for="touch"><span>qualificaçâo</span></label>
                                    <input type="checkbox" id="touch">
    
                                    <ul class="slide">
                                        <li>Trabalho com pintura de casas e apartamentos.</li>
                                        <li>Paredes</li>
                                        <li>Portas</li>
                                        <li>Pinturas</li>
                                        <li>Outros</li>

                                    </ul>
    
                                </nav>
                                <ul>
                                    <span class="txt-categoria">Parede</span>
                                    <span class="txt-categoria">Portas</span>
                                    <span class="txt-categoria">pinturas</span>
                                    <span class="txt-categoria">outros</span>


                                </ul>
                            </div>
                            <a class="orcamento" href="perfil/perfil.php">contatar</a>
            
                        
                </li>
            
            
                <li class="pesquisa">
                    <section class="card">
                        <div class="card-foto">
                            <img src="../../imgs/servicos-img/trabalhadores/pintor1.png" alt="Foto do Trabalhador">
                            <h2 class="nome">Batista</h2>
                            <span class="txt-categoria">Batista</span>
                        </div>
                            <div class="descricao">
                                <h3>Pintor</h3>
                                <p>☆☆☆☆☆</p>
                                <br>
                                <nav>

                                    <label for="touch1"><span>qualificaçâo</span></label>
                                    <input type="checkbox" id="touch1">
    
                                    <ul class="slide">
                                        <li>Trabalho com pintura de casas e apartamentos.</li>
                                        <li>Casas</li>
                                        <li>Apartamentos</li>
                                        <li>Pinturas</li>
                                        <li>Outros</li>

                                    </ul>
    
                                </nav>
                                <ul>
                                    <span class="txt-categoria">casas</span>
                                    <span class="txt-categoria">apartamentos</span>
                                    <span class="txt-categoria">pinturas</span>
                                
                                   
                                    
                                </div>
                                </ul>
                            <a class="orcamento" href="perfil/perfil.php">contatar</a>
            
            
                        
                </li>
            
            
                <li class="pesquisa">
                    <section class="card">
                        <div class="card-foto">
                            <img src="../../imgs/servicos-img/trabalhadores/pintor1.png" alt="Foto do Trabalhador">
                            <h2 class="nome">Carlos</h2>
                            <span class="txt-categoria">Carlos</span>
                        </div>
                            <div class="descricao">
                                <h3>Pintor</h3>
                                <p>☆☆☆☆☆</p>
                                <br>

                                <nav>

                                    <label for="touch2"><span>qualificaçâo</span></label>
                                    <input type="checkbox" id="touch2">
    
                                    <ul class="slide">
                                        <li>Trabalho com pintura de casas e apartamentos.</li>
                                        <li>Edificios</li>
                                        <li>Pinturas</li>
                                        <li>Paredes</li>
                                        <li>Outros</li>

                                    </ul>
    
                                </nav>

                                <ul>
                                    <span class="txt-categoria">edificios</span>
                                    <span class="txt-categoria">pinturas</span>
                                    <span class="txt-categoria">paredes</span>
                                    <span class="txt-categoria">outros</span>

                                
                                </ul>
                            </div>
                            <a class="orcamento" href="perfil/perfil.php">contatar</a>
            
            
                        
                </li>
            
            
            
                <li class="pesquisa">
                    <section class="card">
                        <div class="card-foto">
                            <img src="../../imgs/servicos-img/trabalhadores/pintora.png" alt="Foto do Trabalhador">
                            <h2 class="nome">Daniela</h2>
                            <span class="txt-categoria">Daniela</span>
            
                        </div>
                            <div class="descricao">
                                <h3>Pintora</h3>
                                <p>☆☆☆☆☆</p>
                                <br>

                                <nav>

                                    <label for="touch3"><span>qualificaçâo</span></label>
                                    <input type="checkbox" id="touch3">
    
                                    <ul class="slide">
                                        <li>Trabalho com pintura de casas e apartamentos.</li>
                                        <li>Pintura de metal</li>
                                        <li>moveis</li>
                                        <li>Pintora</li>

                                    </ul>
    
                                </nav>

                                <ul>
                                    <span class="txt-categoria">Pintura de metal</span>
                                    <span class="txt-categoria">Moveis</span>
                                    <span class="txt-categoria">pintora</span>
    
                        
                                </ul>
                            </div>
                            <a class="orcamento" href="perfil/perfil.php">contatar</a>
            
            
                        
                </li>
            
            
            
                <li class="pesquisa">
                    <section class="card">
                        <div class="card-foto">
                            <img src="../../imgs/servicos-img/trabalhadores/pintora.png" alt="Foto do Trabalhador">
                            <h2 class="nome">Lorena</h2>
                            <span class="txt-categoria">Lorena</span>

                        </div>
                            <div class="descricao">
                                <h3>Pintora</h3>
                                <p>☆☆☆☆☆</p>
                                <br>

                                <nav>

                                    <label for="touch4"><span>qualificaçâo</span></label>
                                    <input type="checkbox" id="touch4">
    
                                    <ul class="slide">
                                        <li>Trabalho com pintura de casas e apartamentos.</li>
                                        <li>Pintura modernas</li>
                                        <li>Casas</li>
                                        <li>Apartamentos</li>

                                    </ul>
    
                                </nav>

                                <ul>
                                    <span class="txt-categoria">Pintura modernas</span>
                                    <span class="txt-categoria">casas</span>
                                    <span class="txt-categoria">apartamentos</span>
        
                                
                                </ul>
                            </div>
                            <a class="orcamento" href="perfil/perfil.php">contatar</a>
            
                </li>
            
            
                <li class="pesquisa">
                    <section class="card">
                        <div class="card-foto">
                            <img src="../../imgs/servicos-img/foto-de-perfil-de-usuario-masculino.png" alt="Foto do Trabalhador">
                            <h2 class="nome">Jacinto</h2>
                            <span class="txt-categoria">Jacinto</span>
    
            
                        </div>
                            <div class="descricao">
                                <h3>Pintor</h3>
                                <p>☆☆☆☆☆</p>
                                <br>

                                <nav>

                                    <label for="touch5"><span>qualificaçâo</span></label>
                                    <input type="checkbox" id="touch5">
    
                                    <ul class="slide">
                                        <li>Trabalho com pintura de casas e apartamentos.</li>
                                        <li>Casa</li>
                                        <li>Pintor</li>
                                        <li>Predio</li>
                                        <li>Outros</li>

                                    </ul>
    
                                </nav>

                                <ul>
                                  
                                    <span class="txt-categoria">casa</span>
                                    <span class="txt-categoria">pintor</span>
                                    <span class="txt-categoria">predio</span>
                                    <span class="txt-categoria">outros</span>

                                
                            
                                </ul>
                            </div>
                            <a class="orcamento" href="perfil/perfil.php">contatar</a>
                        
                </li>
            
                
            </section>
            </ol>
            
   
</body>
<script src="../../js/pesquisa.js"></script>

</html>