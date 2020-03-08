<?php
	session_start();
	include_once "banco.php";
	include_once "usuario.php";

	$database = new Database();
	$db = $database->getConnection();

	$usuarioDAO = new Usuario($db);

	if(!isset($_SESSION['login'])){
		header("location: ../index.php");
		die();
	}

	if ($_FILES['foto']['error'] != 0) {
		header("location: ../principal.php?erro=2");
		die();
	}
	
	$arquivo = isset($_FILES['foto']) ? $_FILES['foto'] : null;
	$verifica = null;

	if(strstr($arquivo['type'], '/', true) == "image") {
		$verifica = "entrar";
	}

	if($arquivo != null && $verifica == "entrar") {
		$nome = $arquivo['name'];

		$nome_final = '../enviados/'.$_SESSION['login']."/".time().strstr($nome, '.', false);

		if(move_uploaded_file($arquivo['tmp_name'], $nome_final)){

			$tamanhoImg = filesize($nome_final);
        	$mysqlImg = fread(fopen($nome_final, "r"), $tamanhoImg); 

			if($usuarioDAO->upload($_SESSION['login'], $mysqlImg)){
				unlink($nome_final);
				header("location: ../principal.php?acerto=2");
				die();
			}else{
				header("location: ../principal.php?erro=2");
				die();
			}
		}else{
			header("location: ../principal.php?erro=2");
			die();
		}
	}else{
		header("location: ../principal.php?erro=2");
		die();
	}
	
?>