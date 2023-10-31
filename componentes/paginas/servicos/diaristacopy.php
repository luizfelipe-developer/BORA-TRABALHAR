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
    <link rel = "shortcut icon" type = "imagem/x-icon" href="../../../ico-sem-fundo.ico.ico"/>
    <link rel="stylesheet" href="../../header/header.css">
    <link rel="stylesheet" href="../../css/servicocopy.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="./../../js/script.js" defer></script>
    <title>Diarista</title>
    <style>
        #container{
            margin-top: 50px;
        }
        #title{
            margin-top: 0px;
            color: black;
            text-align: center;
            display: block;
        }      
    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo"><a href="../../../index_cliente.php"><img src="../../imgs/logo/logo-sem-fundo.png"></a></div>
            <!-- Menu -->
            <div class="align-left">
                <div class="aba-perfil">
                    <img src="../../imgs/icones/do-utilizador.png" alt="">
                    <?php echo "<span>$logado</span>";?>
                </div>
                <div class="hamburguer active">&#9776;</div>
                <ul class="menu active">
                    <li class=""><a href="../../../index_cliente.php">INÍCIO</a></li>
                    <li class="actives">
                        <p>SERVIÇOS</p>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="pedreiros.php">Pedreiro</a></li>
                                <li><a href="pequenosreparos.php">Peq. Reparos</a></li>
                                <li><a href="pintores.php">Pintor</a></li>
                                <li><a href="diarista.php">Diarista</a></li>
                                <li><a href="servico.php">Outros</a></li>
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
                                <li><a href="">Ver Perfil</a></li>
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
                placeholder="Ex. diarista" required="">
            <button class="reset" type="reset">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </form>
    </div>


    <div id="container">
        <main>
            <h2 id="title">Diaristas</h2>
            <ol id='list'>
                <li class="pesquisa">
                    <section class="card">
                        <div class="card-foto">
                            <img src="../../imgs/servicos-img/trabalhadores/diarista.png" alt="Foto do Trabalhador">
                            <h2 class="nome">Joaquina</h2>
                            <span class="txt-categoria">Joaquina</span>
                            <span class="txt-categoria">joaquina</span>
                        </div>
                            <div class="descricao">
                                <h3>Diarista</h3>
                                <p>☆☆☆☆☆</p>
                                <br>
                                <nav>
                                    <label for="touch"><span>qualificação</span></label>
                                    <input type="checkbox" id="touch">
    
                                    <ul class="slide">
                                        <li>Limpeza em geral, cozinhar e passar</li>
                                        <li>Limpeza</li>
                                        <li>Faxina</li>
                                        <li>Passar</li>
                                        <li>Outros</li>
                                    </ul>
                                </nav>

                                <ul>
                                    <span class="txt-categoria">limpeza</span>
                                    <span class="txt-categoria">Limpeza</span>
                                    <span class="txt-categoria">faxina</span>
                                    <span class="txt-categoria">Faxina</span>
                                    <span class="txt-categoria">passar</span>
                                    <span class="txt-categoria">Passar</span>
                                    <span class="txt-categoria">outros</span>

                                </ul>
                            </div>

                            <a class="orcamento" href="perfil/perfil.php">contatar</a>
                    </section>
                </li>
                <li class="pesquisa">
                    <section class="card">
                        <div class="card-foto">
                            <img  src="../../imgs/servicos-img/trabalhadores/diarista1.png" alt="Foto do Trabalhador">
                            <h2 class="nome">Rogerio</h2>
                            <span class="txt-categoria">rogerio</span>
                            <span class="txt-categoria">Rogerio</span>

                        </div>
                            <div class="descricao">
                                <h3>Diarista</h3>
                                <p>☆☆☆☆☆</p>
                                <br>
                                <nav>
                                    <label for="touch1"><span>qualificação</span></label>
                                    <input type="checkbox" id="touch1">
                                    <ul class="slide">
                                        <li>Limpeza em geral, cozinhar e passar</li>
                                        <li>Limpeza</li>
                                        <li>Passar</li>
                                        <li>Recolher o lixo</li>
                                        <li>Outros</li>
                                    </ul>
                                </nav>
                                <ul>
                                    <span class="txt-categoria">Limpeza</span>
                                    <span class="txt-categoria">limpeza</span>
                                    <span class="txt-categoria">passar</span>
                                    <span class="txt-categoria">recolher o lixo</span>
                                    <span class="txt-categoria">outros</span>
                                </div>
                                </ul>
                            <a class="orcamento" href="perfil/perfil.php">contatar</a>
                    </section>
                </li>
                <li class="pesquisa">
                <tbody>
                <?php while ($dados_cliente = $query->fetch_array()) { ?>          
                <tr>
                    <td> <?php echo $dados_cliente['cod_cliente'];?></td>
                    <td id = "td-nome" > <?php echo $dados_cliente['nome'];?></td>
                    <td> <?php echo $dados_cliente['uf'];?></td>
                    <td> <?php echo $dados_cliente['cidade'];?></td>
                    <td> <?php echo $dados_cliente['regiao'];?></td>
                </tr>
               <?php } ?>
            </tbody>
                    <section class="card">
                        <div class="card-foto">
                            <img src="../../imgs/servicos-img/trabalhadores/diarista2.png" alt="Foto do Trabalhador">
                            <h2 class="nome">Ruti</h2>
                            <span class="txt-categoria">ruti</span>
                            <span class="txt-categoria">Ruti</span>
                        </div>
                            <div class="descricao">
                                <h3>Diarista</h3>
                                <p>☆☆☆☆☆</p>
                                <br>
                                <nav>
                                    <label for="touch2"><span>qualificação</span></label>
                                    <input type="checkbox" id="touch2">
                                    <ul class="slide">
                                        <li>Limpeza em geral, cozinhar e passar</li>
                                        <li>Limpeza de vidro</li>
                                        <li>Limpeza de banheiro</li>
                                        <li>Aspiraçâo</li>
                                        <li>Outros</li>
                                    </ul>
                                </nav>
                                <ul>
                                    <span class="txt-categoria">Limpeza de vidro</span>
                                    <span class="txt-categoria">limpeza de vidro</span>
                                    <span class="txt-categoria">Limpeza de banheiro</span>
                                    <span class="txt-categoria">limpeza de banheiro</span>
                                    <span class="txt-categoria">Aspiraçâo</span>
                                    <span class="txt-categoria">aspiraçâo</span>
                                    <span class="txt-categoria">outros</span>

                                </ul>
                            </div>
                            <a class="orcamento" href="perfil/perfil.php">contatar</a>
                    </section>
                </li>


                <li class="pesquisa">
                    <section class="card">
                        <div class="card-foto">
                            <img src="../../imgs/servicos-img/trabalhadores/diarista.png" alt="Foto do Trabalhador">
                            <h2 class="nome">Flavia</h2>
                            <span class="txt-categoria">flavia</span>
                            <span class="txt-categoria">Flavia</span>
                        </div>
                            <div class="descricao">
                                <h3>Diarista</h3>
                                <p>☆☆☆☆☆</p>
                                <br>
                                <nav>
                                    <label for="touch3"><span>qualificação</span></label>
                                    <input type="checkbox" id="touch3">
                                    <ul class="slide">
                                        <li>Limpeza em geral, cozinhar e passar</li>
                                        <li>Limpeza de casa</li>
                                        <li>Passar roupas</li>
                                        <li>Retirada de pó</li>
                                        <li>Outros</li>
                                    </ul>
                                </nav>
                                <ul>
                                    <span class="txt-categoria">Limpeza de casa</span>
                                    <span class="txt-categoria">limpeza de casa</span>
                                    <span class="txt-categoria">Passar roupas</span>
                                    <span class="txt-categoria">passar roupas</span>
                                    <span class="txt-categoria">Retirada de pó</span>
                                    <span class="txt-categoria">retirada de po</span>
                                    <span class="txt-categoria">outros</span>
                                </ul>
                            </div>
                            <a class="orcamento" href="perfil/perfil.php">contatar</a>
                    </section>
                </li>
                <li class="pesquisa">
                    <section class="card">
                        <div class="card-foto">
                            <img src="../../imgs/servicos-img/trabalhadores/pedreiro1.png" alt="Foto do Trabalhador">
                            <h2 class="nome">Roberto</h2>
                            <span class="txt-categoria">roberto</span>
                            <span class="txt-categoria">Roberto</span>
                        </div>
                            <div class="descricao">
                                <h3>Diarista</h3>
                                <p>☆☆☆☆☆</p>
                                <br>
                                <nav>
                                    <label for="touch4"><span>qualificação</span></label>
                                    <input type="checkbox" id="touch4">
                                    <ul class="slide">
                                        <li>Limpeza em geral, cozinhar e passar</li>
                                        <li>Passar roupas</li>
                                        <li>Tirar o lixo</li>
                                        <li>Varrer e juntar o lixo</li>
                                        <li>Guardar roupas</li>
                                        <li>Outros</li>
                                    </ul>
                                </nav>
                                <ul>
                                    <span class="txt-categoria">Passar roupas</span>
                                    <span class="txt-categoria">passar roupas</span>
                                    <span class="txt-categoria">Tirar o lixo</span>
                                    <span class="txt-categoria">tirar o lixo</span>
                                    <span class="txt-categoria">Varrer e juntar o lixo</span>
                                    <span class="txt-categoria">varrer e juntar o lixo</span>
                                    <span class="txt-categoria">Guardar roupas</span>
                                    <span class="txt-categoria">guardar roupas</span>
                                    <span class="txt-categoria">outros</span>
                                </ul>
                            </div>
                            <a class="orcamento" href="perfil/perfil.php">contatar</a>
                    </section>
                </li>
                <li class="pesquisa">
                    <section class="card">
                        <div class="card-foto">
                            <img src="../../imgs/servicos-img/foto-de-perfil-de-usuario-masculino.png" alt="Foto do Trabalhador">
                            <h2 class="nome">Ricardo</h2>
                            <span class="txt-categoria">Ricardo</span>
                            <span class="txt-categoria">ricardo</span>

                        </div>
                            <div class="descricao">
                                <h3>Diarista</h3>
                                <p>☆☆☆☆☆</p>
                                <br>
                                <nav>

                                    <label for="touch5"><span>qualificação</span></label>
                                    <input type="checkbox" id="touch5">
    
                                    <ul class="slide">
                                        <li>Limpeza em geral, cozinhar e passar</li>
                                        <li>Especialidade</li>
                                        <li>Especialidade</li>
                                        <li>Especialidade</li>
                                        <li>Outros</li>

                                    </ul>
    
                                </nav>
                                <ul>            
                                    <span class="txt-categoria">outros</span>
                                </ul>
                            </div>
                            <a class="orcamento" href="perfil/perfil.php">contatar</a>
                    </section>
                </li>
                <li class="pesquisa">
                    <section class="card">
                        <div class="card-foto">
                            <img src="../../imgs/servicos-img/foto-de-perfil-de-usuario-masculino.png" alt="Foto do Trabalhador">
                            <h2 class="nome">Claudia</h2>
                            <span class="txt-categoria">claudia</span>
                            <span class="txt-categoria"></span>
                        </div>
                            <div class="descricao">
                                <h3>Diarista</h3>
                                <p>☆☆☆☆☆</p>
                                <br>
                                <!-- <div style='position:relative; top:0px; left:0px;'> -->
                                <nav>
                                    <label for="touch6"><span>qualificação</span></label>
                                    <input type="checkbox" id="touch6">
                                    <ul class="slide">
                                        <li>Limpeza em geral, cozinhar e passar</li>
                                        <li>Especialidade</li>
                                        <li>Especialidade</li>
                                        <li>Especialidade</li>
                                        <li>Outros</li>
                                    </ul>
                                </nav>
                                <ul>
                                    <span class="txt-categoria">outros</span>
                                </ul>
                            </div>
                            <a class="orcamento" href="perfil/perfil.php">contatar</a>
                    </section>
                </li>
            </ol>
    </main>
</div>
</body>
<script src="../../js/pesquisa.js"></script>
</html>