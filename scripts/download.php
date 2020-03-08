<?php
	session_start();

	if(!isset($_SESSION['login'])){
		header("location: ../index.php");
		die();
	}

	$dir = '../enviados/'.$_SESSION['login'].'/';
	$arquivoNome = isset($_GET['arq']) ? $_GET['arq'] : null;
	$arquivoLocal = $dir.$arquivoNome;

	if(!file_exists($arquivoLocal)){
		echo "Arquivo não encontrado ou não existente";
		exit;
	}

	header('Content-Disposition: attachment; filename="' . $arquivoNome . '"');
	header('Content-Type: application/octet-stream');
	header('Content-Length:' . filesize($arquivoLocal));

	readfile($arquivoLocal);
?>