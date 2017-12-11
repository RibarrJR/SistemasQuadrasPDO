<?php 
session_start();
require("../config.php");
require("../Class/Quadra.php");
require("../Class/Sql.php");
if($_SESSION['logged_in']==true){
if(isset($_POST['id_city'])){
	$id=$_POST['id_city'];
	$_SESSION['id_city']=$id;
	

}
if(isset($_SESSION['id_city'])){
	$id=$_SESSION['id_city'];
	
$quadra = Quadra::getList_local($id);
$obj=json_encode($quadra);
$objeto_php = json_decode($obj);
$id=$_SESSION["user_id"];
include("Usu_header.php");
include("Usu_menu.php");
?>

<body>
	<div class="jumbotron jumbotron-fluid selecione">
	
		<a href="Usu_reserva1.php"><button class="btn btn-secondary left">Voltar</button></a>
	<form action="Usu_reserva3.php" method="POST">
			<h1 class="display-6"> Selecione a Quadra</h1>
		
<?php
foreach($objeto_php as $key=>$colecao){	
	
?>	
<button class="cidades btn btn-success lead" type="submit" name="id_quadra" value="<?php echo $colecao->ID_quadra; ?>"> Reservar em
<?php
	echo $colecao->nome;}
	
	?>

</button>
</form>
</div>
</body>
<?php 
}else{
	header("location:Usu_reserva1.php");
}
}else{
header("location:../index.php?er=1");
}

?>
</html>
