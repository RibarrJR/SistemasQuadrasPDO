<?php
session_start();
if($_SESSION['logged_inA']==true){
 require_once("Adm_header.php");
require_once("Adm_menu.php");
require_once("../Class/Horario.php");
require_once("../Class/SQL.php");

?>
<body>
	<div class="container row">
	<div class="col-6">
	<table class="table table-dark table-hover">
		<thead class="thead-dark">
			<tr>
				<th class="bg-success text-white"  colspan="6">Aceitos</th>
			</tr>
			<tr>
				<th scope="col"><span>#</span></th>
				<th  scope="col"><img src="../Img/icons/user.png" data-toggle="tooltip" data-placement="top" title="Cliente"></th>
				<th scope="col"><img src="../Img/icons/location.png" data-toggle="tooltip" data-placement="top" title="Quadra"><img/></th>
				<th scope="col"><img src="../Img/icons/inicios_1x.png" data-toggle="tooltip" data-placement="top" title="Inicio Do horario"><img/></th>
				<th scope="col"><img src="../Img/icons/fins_1x.png" data-toggle="tooltip" data-placement="top" title="Fim do horario"></th>
				<th  scope="col"><img src="../Img/icons/info.png" data-toggle="tooltip" data-placement="top" title="Opções"></th>
				
			</tr>
		</thead>
		<tbody>

				<?php  
			require_once("../config.php");
$i=0;
$status=1;
$id_user=$_SESSION['user_id'];
$hr = Horario::verifica_por_status($status,$id_user);
$obj= json_encode($hr);
$objeto_php = json_decode($obj);
foreach($objeto_php as $key =>$colecao){
	$i++;
	
	?>
	<tr class="table">
		
	<?php
	echo "<td>".$i."</td>";
	echo "<td>".$colecao->login."</td>";
	echo "<td>".$colecao->nome."</td>";
	echo "<td>".$colecao->hr_start."</td>";
	echo "<td>".$colecao->hr_fim."</td>";
	?>

	<td ><a href="../reseta.php?cancela=true&ID_hra=<?php echo $colecao->ID_hr; ?>" data-toggle="tooltip" data-placement="bottom" title="Cancelar"><i style="font-size:36px;" class="material-icons md-36 down" >clear</i></a>
		</td>
			</tr>
<?php } ?>
				

		</tbody>
	</table>
	</div>
<div class="col-6">
	<table class="table table-small table-responsive-md table-dark table-hover">
		<thead class="thead-dark">
			<tr >
				<th  class="bg-danger text-white" colspan="6">Recusados</th>
			</tr>
			<tr>
				<th scope="col"><span>#</span></th>
				<th  scope="col" class=""><img src="../Img/icons/user.png"data-toggle="tooltip" data-placement="top" title="Cliente"></th>
				<th scope="col"><img src="../Img/icons/location.png" data-toggle="tooltip" data-placement="top" title="Quadra"><img/></th>
				<th scope="col"><img src="../Img/icons/inicios_1x.png" data-toggle="tooltip" data-placement="top" title="Inicio Do horario"><img/></th>
				
				
				<th scope="col"><img src="../Img/icons/fins_1x.png" data-toggle="tooltip" data-placement="top" title="Fim do horario"></th>
				<th  scope="col"><img src="../Img/icons/info.png" data-toggle="tooltip" data-placement="top" title="Opções"></th>
				
			</tr>
		</thead>
		<tbody>

				<?php  
			require_once("../config.php");
$i=0;
$status=2;
$id_user=$_SESSION["user_id"];
$hr = Horario::verifica_por_status($status,$id_user);
$obj= json_encode($hr);
$objeto_php = json_decode($obj);
foreach($objeto_php as $key =>$colecao){
	$i++;
	
	?>
	<tr class="table">
		
	<?php
	echo "<td>".$i."</td>";
	echo "<td>".$colecao->login."</td>";
	echo "<td>".$colecao->nome."</td>";
	echo "<td>".$colecao->hr_start."</td>";
	echo "<td>".$colecao->hr_fim."</td>";
	?>

	<td ><a href="../reseta.php?cancela=true&ID_hra=<?php echo $colecao->ID_hr; ?>" data-toggle="tooltip" data-placement="bottom" title="Cancelar"><i style="font-size:36px;" class="material-icons md-36 down" >clear</i></a>
		</td>
			</tr>
	<?php } ?>	</tbody>
	</table>
	</div>
	</div>
	</body>
</html>
<?php
}
else{
	header("location:../index.php");
}
?>

