<?php
	session_start();
if($_SESSION['logged_in']==true){
require_once("../Class/Sql.php");
require_once("../config.php");
require_once("../Class/Horario.php");
$id=$_SESSION["user_id"];
include("Usu_header.php");
include("Usu_menu.php");
?>

<body>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4"> Bem-Vindo,
				<?php echo $_SESSION['user_name'];?>!</h1>
		</div>

		<div class="rodape">
			<h5>Todos os direitos reservados</h5>
		</div>

		<?php
	}
	else{
	
	header("location:../index.php");	
	}

	?>
</body>

</html>
