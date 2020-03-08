<?php
	session_start();

	if(!isset($_SESSION['login'])){
		header("location: ../index.php");
		die();
	}

	$arq = isset($_GET['arq']) ? $_GET['arq'] : null;

	$dir = "../enviados/".$_SESSION['login']."/".$arq;

	if(unlink($dir)){
		header("location: ../principal.php?acerto=1");
	}else{
		header("location: ../principal.php?erro=1");
	}
?>