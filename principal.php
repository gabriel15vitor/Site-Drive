<?php
	session_start();

	if(!isset($_SESSION['login'])){
		header("location: index.php");
		die();
	}

	include_once "cabecalho.php";
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Principal</title>
</head>
<body>
	<center>
	<?php
		$erro = isset($_GET['erro']) ? $_GET['erro'] : null;
		$acerto = isset($_GET['acerto']) ? $_GET['acerto'] : null;

		switch ($erro) {
			case 1:
				echo "<div id='alerta' class='alert alert-danger'><strong>Falha! </strong>Não foi possivel excluir o arquivo</div>";
				break;

			case 2:
				echo "<div id='alerta' class='alert alert-danger'><strong>Falha! </strong>Upload não foi feito com sucesso</div>";
				break;

			default:
			break;
		}
		switch ($acerto) {
			case 1:
				echo "<div id='alerta' class='alert alert-success'><strong>Sucesso! </strong>Arquivo removido</div>";
				break;

			case 2:
				echo "<div id='alerta' class='alert alert-success'><strong>Sucesso! </strong>Upload feito com sucesso</div>";
				break;	
			
			default:
				# code...
				break;
		}

	?>
	<div align="left" class="esquerda">
		<label tabindex="0" for="my-file" class="cursor">
			<?php echo "<img src='scripts/foto.php?usuario=".$_SESSION['login']."'>"; ?>
		</label>
		<div class="input-file-container">
			<form method="post" action="scripts/fotousuario.php" enctype="multipart/form-data">
					<input type="file" class="input-file" id="my-file" name="foto">		
		</div>
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="perfil">Enviar</button>
			</form>
	</div>
	<br>


	<div class="arquivo">
		<form method="post" action="scripts/upload.php" enctype="multipart/form-data" class="form-inline my-50 my-lg-0">
			<div class="custom-file">
				<input type="file" class="btn btn-outline-success" name="arquivo"><br><br>
	      		<input class="form-control mr-sm-2" type="search" placeholder="Nome do arquivo" name="nome">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Enviar</button>
			</div>
		</form>
	</div>

	<br><br><br><br>

	<form action="scripts/deleta.php" method="post">
		<div class="entrar"> <button type="submit" name="enviar" value="Entrar" class="btn btn-outline-danger">Deletar usuário</button></div>
	</form>


	<?php echo "<br>Lista de arquivos do diretório de '<strong>" . $_SESSION['login'] . "</strong>':<br><br>"; ?>
	<div class="user">
		<table id='user' class='table table-dark table-hover'>
			<thead>
				<tr>
					<th>Arquivos</th>
					<th>Extensão</th>
					<th>Excluir</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php
						$usuario = $_SESSION['login'];
						$caminho = "./enviados/".$usuario."/";
						$diretorio = dir($caminho);
						$remover = "Remover";

						while ($arquivo = $diretorio->read()) {
							$arquivoLocal = $caminho."/".$arquivo;

							if(is_file($arquivoLocal)){
								$res = strstr($arquivo, '.', true);
								$ext = pathinfo($arquivoLocal, PATHINFO_EXTENSION);
								echo "<tr>";
									echo "<td><a href='scripts/download.php?arq=" . $arquivo . "'>" . $res . "</a></td>";
									echo "<td>.".$ext."</td>";
									echo "<td><a href='scripts/remover.php?arq=" . $arquivo . "'>" . $remover . "</a></td>";
								echo "</tr>";
							}
						}
						$diretorio -> close();
					?>
				</tr>
			</tbody>
		</table>
	</div>
</center>
<center>
<br>
<form action="scripts/logout.php" method="post">
 <button type="submit" class="btn btn-outline-danger">Sair</button>
    </form>
</center>
	<?php include "scripts/scripts.php" ?>
</body>
</html>