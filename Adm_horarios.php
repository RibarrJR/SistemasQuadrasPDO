<?php 
session_start();
if($_SESSION['logged_inA']==true){
	
$id=$_SESSION["user_id"];
include("Adm_header.php");
include("Adm_menu.php");

?>


<div class="container">
	<table class="table table-small table-responsive-md table-dark table-striped">
		<thead class="thead-dark">
			<tr>
				<th scope="col"><span>#</span></th>
				<th  scope="col" class=""><img src="Img/icons/user.png"data-toggle="tooltip" data-placement="top" title="Cliente"></th>
				<th scope="col"><img src="Img/icons/location.png" data-toggle="tooltip" data-placement="top" title="Quadra"><img/></th>
				<th scope="col"><img src="Img/icons/inicios_1x.png" data-toggle="tooltip" data-placement="top" title="Inicio Do horario"><img/></th>
				
				
				<th scope="col"><img src="Img/icons/fins_1x.png" data-toggle="tooltip" data-placement="top" title="Fim do horario"></th>
				<th  scope="col"><img src="Img/icons/info.png" data-toggle="tooltip" data-placement="top" title="Opções"></th>
				
			</tr>
		</thead>
		<tbody>

				<?php  
			require_once("config.php");
$hr = Horario::getHRAS($id);
$obj= json_encode($hr);
$objeto_php = json_decode($obj);
					$i=0;
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

	<td ><a href="verifica.php?confirma=0&ID_hra=<?php echo $colecao->ID_hr; ?>" data-toggle="tooltip" data-placement="left" title="Aceitar!"><i style="font-size:36px;" class="material-icons md-36 up" >thumb_up</i></a>
		<a href="verifica.php?confirma=2&ID_hra=<?php echo $colecao->ID_hr; ?>" data-toggle="tooltip" data-placement="right" title="Recusar!" ><i  style="font-size:36px;" class="material-icons md-36 down">thumb_down</i></a>
				</td>
			</tr>
		
	
	<?php
}
			?>
				

		</tbody>
	</table>
</div>
<?php }
else{
	header("location:index.php");
}

include("rodape.php");
?>


