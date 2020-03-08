<html>
<head>
	<?php
	include_once "cabecalho.php";
	?>
	<title>Página inicial</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" type="text/css" href="css.css">
	<script type="text/javascript">
		$(function() {
			$(".btn").click(function() {
				$(".form-signin").toggleClass("form-signin-left");
			    $(".form-signup").toggleClass("form-signup-left");
			    $(".frame").toggleClass("frame-long");
			    $(".signup-inactive").toggleClass("signup-active");
			    $(".signin-active").toggleClass("signin-inactive");
			    $(".forgot").toggleClass("forgot-left");   
			    $(this).removeClass("idle").addClass("active");
			});
		});

		$(function() {
			$(".btn-signup").click(function() {
			  	$(".nav").toggleClass("nav-up");
			  	$(".form-signup-left").toggleClass("form-signup-down");
			  	$(".success").toggleClass("success-left"); 
			  	$(".frame").toggleClass("frame-short");
			});
		});

		$(function() {
			$(".btn-signin").click(function() {
				$(".btn-animate").toggleClass("btn-animate-grow");
				$(".welcome").toggleClass("welcome-left");
				$(".cover-photo").toggleClass("cover-photo-down");
				$(".frame").toggleClass("frame-short");
				$(".profile-photo").toggleClass("profile-photo-down");
				$(".btn-goback").toggleClass("btn-goback-up");
				$(".forgot").toggleClass("forgot-fade");
			});
		});
	</script>
</head>
<body>
<?php
	$erro = isset($_GET['erro']) ? $_GET['erro'] : null;
	switch ($erro) {
		case 1:
			echo "<center><div id='alerta' class='alert alert-danger'><strong>Falha! </strong>Preencha todos os campos corretamente</div></center>";
			break;
		
		case 2:
			echo "<center><div id='alerta' class='alert alert-danger'><strong>Falha! </strong>Usuário ou senha incorretos</div></center>";
			break;

		case 3:
			echo "<center><div id='alerta' class='alert alert-danger'><strong>Falha! </strong>Esse login já existe</div></center>";
			break;
	}
?>
<div class="container">
  <div class="frame">
    <div class="nav">
      <ul class="links">
        <li class="signin-active"><a class="btn">Entrar</a></li>
        <li class="signup-inactive"><a class="btn">Cadastrar-se </a></li>
      </ul>
    </div>
    <div ng-app ng-init="checked = false">
		<form class="form-signin" action="scripts/verifica.php" method="post" name="form">
			<label for="username">Usuário</label>
			<input class="form-styling" type="text" name="usuario" placeholder=""/>

			<label for="password">Senha</label>
			<input class="form-styling" type="text" name="senha" placeholder=""/>
			<br><br>
			<button class="btn-signin" type="submit">Entrar</button>
		</form>
        
		<form class="form-signup" action="scripts/cadastra.php" method="post" name="form">
          <label for="fullname">Usuário</label>
          <input class="form-styling" type="text" name="usuario" placeholder=""/>

          <label for="password">Senha</label>
          <input class="form-styling" type="text" name="senha" placeholder=""/>
          <br><br>
          <button type="submit" class="btn-signin">Cadastrar-se</button>
		</form>
    </div>
</div>
</body>
</html>