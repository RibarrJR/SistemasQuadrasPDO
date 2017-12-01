<?php
require_once("headerCadastra.php");



?>
<body>
	<div class="main">
		<div class="conteudo-cadastro">
			<form method="post" action="cadastra_usuario.php">
				<div class="form-group">
					<label for="login">Login</label>
					<input type="text" class="form-control" id="login" name="login" placeholder="Digite o Login">
				</div>
				<div class="form-group">
					<label for="email">E-mail</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Digite o E-Mail">
				</div>
				<div class="form-group">
					<label for="telefone">Telefone</label>
					<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o Telefone">
				</div>
				<div class="form-group">
					<label for="senha">Senha</label>
					<input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a Senha">
				</div>
				<div class="form-group">
					<label for="confirma">Confirmar Senha</label>
					<input type="password" class="form-control" id="confirma" name="confirma" placeholder="Confirmar senha">
				</div>
				<div class="form-group">
					<a href="index.php"><small class="form-text  link">Voltar</small></a>
				</div>
				<div class="form-group">
					<button type="submit" class="loga btn btn ">Enviar</button>
				</div>
			</form>
			<?php
			if(isset($_GET['err'])){
	if($_GET["er"]==1){
		
		?>
		
		<div class="container form-group">
	<div class="row"><div class="d-flex justify-content-center alert alert-warning align-middle" role="alert">
  campo vazio, preencha todo os campos!
  <a href="index.php"><span>Voltar</span></a>
  </div>
  </div>
</div>
		
		<?php
	}
	if($_GET["er"]==2){
		
	?>
	
	<div class="container">
	<div class="row"><div class="d-flex justify-content-center alert alert-danger align-middle" role="alert">
  Senha não Coincide !
  <a href="index.php"><span>Voltar</span></a>
  </div>
  </div>
</div>
	<?php	
		
	}
		
	}
	
	
		?>	
		</div>
	</div>
	
</body>

</html>
