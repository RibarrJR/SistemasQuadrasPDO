<body>
	<?php
	session_start();
if($_SESSION['logged_inA']==true){
require_once("config.php");
$id=$_SESSION["user_id"];
include("Adm_header.php");
include("Adm_menu.php");
?>
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4"> Bem-Vindo, <?php echo $_SESSION['user_name'];
			 ?>!</h1>
			<p class="lead">Você tem <a href="Adm_horarios.php"><button type="button" class="btn btn-success"> <span class="badge badge-light"><?php
$hr = Horario::getHRAS($id);
$obj= json_encode($hr);
$objeto_php = json_decode($obj);
		
	$i=0;
foreach($objeto_php as $key =>$colecao){
	$i++;
}
	echo $i;
	
	
				?></span>
  
</button></a> notificações ! </p>
		</div>
	</div>


	<?php
	}
	else{
	
	header("location:index.php");	
	}
include ("rodape.php");	
	?>
</body>


</html>
