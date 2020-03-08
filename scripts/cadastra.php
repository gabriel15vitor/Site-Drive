<?php
	session_start();
	include_once "banco.php";
	include_once "usuario.php";

	$database = new Database();
	$db = $database->getConnection();

	$usuarioDAO = new Usuario($db);

	$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
	$senha = isset($_POST['senha']) ? $_POST['senha'] : null;

	$res = $usuarioDAO->readOne($usuario);
	$num = $res->rowCount();

	if ($usuario == null || $senha == null) {
		header("location: ../index.php?erro=1");
	}else{
		if($num > 0){
			header("location: ../index.php?erro=3");
		}else{
			$tipo = 'N';
			
			if ($usuarioDAO->insert($tipo, $usuario, $senha)) {
				echo "Usuario cadastrado com sucesso";
				header("location: ../index.php");
			}else{
				echo "falhou";
			}
		}
	}	
?>