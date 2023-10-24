<?php
require_once("../../php/conexao.php");

$imagem = $_FILES["imagem"];

if($imagem != NULL) {
	$nomeFinal = time().'.jpg';
	if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
		$tamanhoImg = filesize($nomeFinal);
		$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));
		mysql_connect($servidor,$usuario,$senha) or die("Impossível Conectar");
		@mysql_select_db($dbname) or die("Impossível Conectar");
		mysql_query("INSERT INTO cad_cliente (imagem) VALUES ('$mysqlImg')");
		unlink($nomeFinal);

		header('Location: ../../perfil/perfil.php');
	}
}
else {
	echo"Você não realizou o upload de forma satisfatória.";
}

?>