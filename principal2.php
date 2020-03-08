<html>
<head>
	<html lang="pt-br">
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
	session_start();

	if(!isset($_SESSION['adm'])){
		header("location: index.php");
		die();
	}

	include_once "cabecalho.php";
	include_once "scripts/banco.php";
	include_once "scripts/usuario.php";	

	$database = new Database();
	$db = $database->getConnection();

	$usuarioDAO = new Usuario($db);

	$res = $usuarioDAO->read();
	$num = $res->rowCount();

	if($num > 0){

		echo "<div class='user2'><center><table id='admin' class='table table-dark table-hover'>
	      <thead>
	        <tr>
	          <th width='30%'>Foto</th>
	          <th width='30%'>Nome</th>
	          <th width='27%'>Senha</th>
	          <th width='25%'>Deletar</th>
	        </tr>
	      </thead>
	      <tbody>";
			while ($reg = $res->fetch(PDO::FETCH_ASSOC)){

				extract($reg);
				echo "<tr>
					<td><img src='scripts/foto.php?usuario=".$reg['nome']."'></td>
					<td>".$reg['nome']."</td>
					<td>".$reg['senha']."</td>
					<td><a href='deleta_admin.php?user=".$reg['nome']."'>Remover</a></td>
					</tr>";
			}
	             
	    echo "</tbody>
	    
	    </table></center></div>";

	}
?>


<center>
<form action="scripts/logout.php" method="post">
 <button type="submit" class="btn btn-outline-danger">Sair</button>
</form>
<?php include "scripts/scripts.php" ?>
</center>
</body>
</html>