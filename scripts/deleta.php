<?php 
	session_start();
	include 'banco.php';
	include_once "usuario.php";	

	$database = new Database();
	$db = $database->getConnection();

	$usuarioDAO = new Usuario($db);

	#funcao para apagar diretorio do usuario
	function delTree($dir) { 
	      $files = array_diff(scandir($dir), array('.','..')); 
	      foreach ($files as $file) { 
	        (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
	      } 
	      return rmdir($dir); 
	}

	if ($_SESSION['login'] == null) {
			header("location: ../index.php?erro=1");
	}else{
		if($usuarioDAO->deleta($_SESSION['login'])){
			delTree("../enviados/".$_SESSION['login']);
			header("location: ../index.php");
		}
	}
?>