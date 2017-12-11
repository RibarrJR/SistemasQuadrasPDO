<?php
session_start();
require_once("../Class/Horario.php");
require_once("../Class/SQL.php");

if(!isset($_GET['nops'])){
if($_SESSION['logged_inA']==true){
include("../config.php");
$id=$_SESSION["user_id"];
include("Adm_header.php");
include("Adm_menu.php");
	$hr = Horario::getHRAS($id);
$obj= json_encode($hr);
$objeto_php = json_decode($obj);	
	$i=0;
foreach($objeto_php as $key =>$colecao){
	$i++;
}
?>

	<body>
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4"> Bem-Vindo,
					<?php echo $_SESSION['user_name'];
			 ?>!</h1>
				<p class="lead">Você tem <a href="Adm_horarios.php"><button type="button" class="btn btn-<?php if($i==0){echo "success";}else{echo "warning";}?> "> <span class="badge badge-light"><?php echo $i; ?></span>
  
</button></a> notificações ! </p>

			</div>

		</div>

		<?php
	}
	else{
	
	header("location:../index.php");	
	}
	}
else{
	echo "CU";
}
	?>
			<div class="rodape">
				<h5>Todos os direitos reservados</h5>
			</div>
	</body>


	</html>
