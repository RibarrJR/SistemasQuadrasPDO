<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>

<body>
	<?php
require_once("config.php");
$i=2;
if(!empty($_POST["login"]) && !empty($_POST["senha"]) && !empty($_POST["telefone"]) && !empty($_POST["email"]) && !empty($_POST["login"]) ){

if(isset($_POST["login"]) && isset($_POST["senha"]) && isset($_POST["telefone"]) && isset($_POST["email"]) && isset($_POST["login"]) ){

$log=$_POST['login'];
$ema=$_POST['email'];
$tel=$_POST['telefone'];
$sen=$_POST['senha'];
$con=$_POST['confirma'];
if($sen==$con){
$user = new User();
$user ->setLogin($log);
$user ->setSenha($sen);
$user->setTelefone($tel);
$user->setEmail($ema);
$user->insert();
echo "Cadastrado com sucesso!";
}else{echo "Falha ao cadastrar:Senhas nao coincidem";
}
}
}else{echo "Falha ao cadastrar: campos vazios";}
?>
		<a href="index.php">Voltar</a>
		<?php 

?>

</body>

</html>
