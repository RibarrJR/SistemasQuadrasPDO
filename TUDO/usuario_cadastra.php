<?php 

require_once('functions.php');

$mor='1';



if (!($stmt = $mysqli->prepare("INSERT INTO usuario (telefone,login,moral,senha,email) VALUES (?,?,?,?,?)"))){
	echo "Falha no Prepare: (" . $mysqli->errno . ") " . $mysqli->error;
	
}

$log=$_POST['login'];
$ema=$_POST['email'];
$tel=$_POST['telefone'];
$sen=$_POST['senha'];
$con=$_POST['confirma'];

   $stmt->bind_param('dsdss',$tel,$log,$mor,$sen,$ema);
 
    /* execute query */
    if (!$stmt->execute()) {
    	 echo "Falha ao executar a query: (" . $stmt->errno . ") " . $stmt->error;
    }

    /* bind result variables */
    /* fetch value */


?>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>$variavel</title>
	<link rel="stylesheet" href="css/reset.css">
	<!--	link usando sistema de arquivos -->
<!--	<link rel="stylesheet" href="css/bootstrap.min.css">-->
	<!--   link direto da internet    -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">  
	
</head>
<body>
	<div class="container">
	<div class="row"><div class="d-flex justify-content-center alert alert-success align-middle" role="alert">
  Usuario Cadastrado com sucesso!
  <a href="index.php"><span>Voltar</span></a>
  </div>
  </div>
</div>
</body>
</html>