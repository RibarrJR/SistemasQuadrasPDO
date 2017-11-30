<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/reset.css">
	<!--	link usando sistema de arquivos -->
	<!--	<link rel="stylesheet" href="css/bootstrap.min.css">-->
	<!--   link direto da internet    -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilo.css">
</head>

<body>
	<div class="main">
		<div class="conteudo-padrao">

<?php
include('functions.php');

?>

			<form action="usuario_valida.php" method="post">
				<div class="form-group">
					<label for="login">Login</label>
					<input type="text" class="form-control" name="login" id="login" placeholder="Enter login">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="senha" class="form-control" id="password" placeholder="Enter Password">
					<a href="senha.php"><small class="form-text  link">Esqueceu sua Senha?</small></a>
					<a href="cadastra.php"><small class="form-text  link">Cadastre-se</small></a>
				</div>
				
<?php
session_start();
if(isset($_GET['er'])){
	if($_GET['er']==1){
		$_SESSION['logged_in']=false;
	
	}
	if($_GET['er']==2){
		?>
		
		
	<div class="form-group"><div class="alert alert-danger vali" role="alert">
  Senha ou login invalidos
		</div>
		</div>
		<?php
	}
	if($_GET['er']==3){
		?>
	<div class="form-group"><div class="alert alert-danger vali" role="alert">
  Informe Login e Senha
		</div></div>
		<?php
	}

}
?><div class="form-group">
					<button type="submit" class="loga btn btn ">Logar</button>
					</div>
				
			</form>
		</div>
	</div>
</body>

</html>
