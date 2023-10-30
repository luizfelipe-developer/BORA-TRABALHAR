<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["action"]) && isset($_GET["id"])) {
        $action = $_GET["action"];
        $solicitacao_id = $_GET["id"];

        $conexao = new mysqli("localhost", "root", "root", "bora_trabalhar");

        if ($conexao->connect_error) {
            die("Erro na conexão: " . $conexao->connect_error);
        }

        if ($action === "aceitar") {
            $status = "aceito";
            header("refresh:0.1;url=trabalhador.php");
        } elseif ($action === "recusar") {
            $status = "recusado";
            header("refresh:0.1;url=trabalhador.php");
        }

        $sql = "UPDATE tabela_solicitacao SET status = '$status' WHERE id = $solicitacao_id";

        if ($conexao->query($sql) === TRUE) {
            echo "Ação realizada com sucesso.";
        } else {
            echo "Erro: " . $sql . "<br>" . $conexao->error;
        }

        $conexao->close();
    } else {
        echo "Ação inválida.";
    }
?>
