<?php
	session_start();

	include_once "banco.php";
	include_once "usuario.php";	

	$usuario = isset($_GET['usuario']) ? $_GET['usuario'] : null;

	if ($usuario != null) {
		$database = new Database();
		$db = $database->getConnection();

		$usuarioDAO = new Usuario($db);

		$res = $usuarioDAO->pegaFoto($_GET['usuario']);

		while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
			header("Content-type: image/jpg");
			print $row['foto'];
			exit;
		}
	}
?>