

<?php

include "../php/conexao.php";

   session_start();
 

   // Aqui você se conecta ao banco
       $mysqli = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

   $id = $_GET["user_id"];
   settype($id, "integer");
   
   // Executa uma consulta 
   $sql = "select * from users where user_id = $id";
   $query = $mysqli->query($sql);
   while ($dados = $query->fetch_assoc()) {
   $id        = $dados["user_id"];
   $nome      = $dados["user_name"];
   $email = $dados["user_email"];
   $data = $dados["user_data"];}
   
   
   

?>