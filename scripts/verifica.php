<?php
	session_start();
	include_once "banco.php";
	include_once "usuario.php";

	$database = new Database();
	$db = $database->getConnection();

	$usuarioDAO = new Usuario($db);

	$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
	$senha = isset($_POST['senha']) ? $_POST['senha'] : null;
	
	if ($usuario == null || $senha == null) {
		header("location: ../index.php?erro=1");
	}else{
		$busca = $usuarioDAO->readAll($usuario, $senha);

		if ($busca->rowCount() > 0) {
			$linha = $busca->fetch(PDO::FETCH_ASSOC);
			if('N' == $linha['tipo']){
					$dir = '../enviados/'.$usuario.'/';
					if(!file_exists($dir)){
						mkdir('../enviados/'.$usuario.'/', 0777, true);
					}
					$_SESSION['login'] = $usuario;
					header("location: ../principal.php");
				}else{
					$_SESSION['adm'] = $usuario;
					header("location: ../principal2.php");
				}
		}else{
			header("location: ../index.php?erro=2");
		}
	}
?>
