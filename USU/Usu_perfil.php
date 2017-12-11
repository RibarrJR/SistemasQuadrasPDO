<?php
	session_start();
if($_SESSION['logged_in']==true){
require_once("../config.php");
require_once("../Class/User.php");
require_once("../Class/Sql.php");
require_once("Usu_header.php");
require_once("Usu_menu.php");
$id=$_SESSION["user_id"];
	$user = new User();
	$user->loadById($id);
	?>
	<body>
		<div class="main">
			<div class="conteudo-perfil">
				<form method="post" action="Usu_Altera_usuario.php">
					<div class="form-group">
						<label for="login">Login</label>
						<input type="text" class="form-control" id="login" name="login" value="<?php echo $login=$user->getLogin(); ?>" placeholder="Digite o Login">
					</div>
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" class="form-control" id="email" name="email" value="<?php echo $login=$user->getEmail(); ?>" placeholder="Digite o E-Mail">
					</div>
					<div class="form-group">
						<label for="telefone">Telefone</label>
						<input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $login=$user->getTelefone(); ?>" placeholder="Digite o Telefone">
					</div>
					<div class="form-group">
						<label for="senha">Senha</label>
						<input type="password" class="form-control" id="senha" name="senha" value="<?php echo $login=$user->getSenha(); ?>" placeholder="Digite a Senha">
					</div>
					<div class="form-group">
						<label for="confirma">Confirmar Senha</label>
						<input type="password" class="form-control" id="confirma" name="confirma" placeholder="Confirmar senha">
					</div>
					<div class="form-group">
						<button type="submit" class="loga btn btn ">Enviar</button>
					</div>
				</form>
			</div>
		</div>
		<?php }?>
	</body>

	</html>
