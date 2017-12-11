<?php 
session_start();
require("../config.php");
require("../Class/Cidade.php");
require("../Class/Sql.php");
if($_SESSION['logged_in']==true){
unset($_SESSION["id_city"]);
$city = Cidade::getList();
$obj=json_encode($city);
$objeto_php = json_decode($obj);
$id=$_SESSION["user_id"];
include("Usu_header.php");
include("Usu_menu.php");
?>

<body>
	<div class="jumbotron jumbotron-fluid selecione">
	<form action="Usu_reserva2.php" method="POST">
			<h1 class="display-6"> Selecione a cidade</h1>
		
<?php
foreach($objeto_php as $key=>$colecao){	
	
?>	<button class="cidades btn btn-success lead" type="submit" name="id_city" value="<?php echo $colecao->ID_city; ?>"> Reservar em
<?php
	echo $colecao->Nome;}
	
	?>

</button>
</form>
</div>
</body>
<?php
}else{
header("location:../index.php?er=1");
}

?>
</html>
