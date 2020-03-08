<?php
	session_start();

	if(!isset($_SESSION['login'])){
		header("location: ../index.php");
		die();
	}
	
	$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
	
	if ($_FILES['arquivo']['error'] != 0) {
		header("location: ../principal.php?erro=4");
		die();
	}

	$dir = '../enviados/'.$_SESSION['login'];
	$extensao = $_FILES['arquivo']['name'];
	$nome_final = $nome . strstr($extensao, '.', false);

	if($nome == null){
		$nome_final = $extensao;
	}

	if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.'/'.$nome_final)){
		header("location: ../principal.php?acerto=2");
	}else{
		header("location: ../principal.php?erro=2");
	}
?>