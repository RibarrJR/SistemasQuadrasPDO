<body>
	<?php
	session_start();
if($_SESSION['logged_in']==true){
require_once("config.php");
$id=$_SESSION["user_id"];
include("Usu_header.php");
include("Usu_menu.php");
	$hr = Horario::getHRAS($id);
$obj= json_encode($hr);
$objeto_php = json_decode($obj);	
	$i=0;
foreach($objeto_php as $key =>$colecao){
	$i++;
}
?>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4"> Bem-Vindo, <?php echo $_SESSION['user_name'];?>!</h1>
			</div>

<div class="rodape">
	<h5>Todos os direitos reservados</h5>
</div>

	<?php
	}
	else{
	
	header("location:index.php");	
	}

	?>
</body>
</html>
