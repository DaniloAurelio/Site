<?php
require_once("../config/database.php");
$modulo = $_GET['modulo'];
$id = $_GET['id'];

if ($modulo=='operadores'){	$tabela= 'tb_operadores';}
if ($modulo=='paginas'){	$tabela= 'tb_paginas';}



	try{
		$sql = "DELETE FROM {$tabela} WHERE id =  :id";
		$stmt = $conexao->prepare($sql);
		$stmt->bindParam('id', $id, PDO::PARAM_INT);   
		$stmt->execute() ;
	}catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
	exit();
    }

	?>
		 <script language= "JavaScript">   location.href="operadores.php";   </script>
