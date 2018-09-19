<?php
session_start();
if ($_SESSION != null) {
	extract($_SESSION);
	require('../model/model_usuario.php');
	include '../includes/cabecalho.php';

}else{
	$_SESSION = array();
	header('location: ../view/login.php');
}
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<!-- Brand -->
	<a class="navbar-brand" href="#">Cactus Mail > <?php echo $nome;?></a>

	<!-- Links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link btn btn-outline-info my-lg-0" href="inicio.php" style="margin-left: 100px;">Inicio</a>
		</li>
		<li class="nav-item">
			<a href="kkk.php" class="nav-link mb-2 btn btn-outline-success my-lg-0" style="margin-left: 100px;" href="#">Escrever e-mail</a>
		</li>
		<li class="nav-item">
			<form action="relatorio.php" method="post">
				<?php echo '<input type="hidden" name="id" value="'.$id.'">'?>
				<button class="nav-link mb-2 btn btn-outline-warning my-lg-0" style="margin-left: 100px;">Relatório diário</a>	
			</form>
		</li>
		<li class="nav-item">
			<form action="../controller/controller_usuario.php" method="post" class="my-lg-0">
				<button class="nav-link btn btn-outline-secondary" style="margin-left: 100px;" name="botao" value="sair">Logout</button>
			</form>

		</li>
	</ul>
</nav>
<div class="container">
	<div class="row mt-5">
		<div class="col-lg-3"></div>
		<div class="col-lg-12 col-sm-12" style="box-shadow: 0px 0px 2px green; margin-left:-10px">
			<form class="form" action="../controller/controller_usuario.php" method="post" style="margin-left: 10%; margin-right: 10%">
				<div class="row">
					<?php echo '<input type="hidden" name="emissor" value="'.$id.'">'; ?>
					
					<div class="col-lg-1"></div>
					<div class="col-lg-6">
						<label for="assunto" class="mr-sm-2">Assunto:</label>
						<input type="text" class="form-control mb-2 mr-sm-2" id="assunto" name="assunto">
					</div>
					<div class="col-lg-5">
						<label for="destinatario" class="mr-sm-2">Para:</label>
						<select class="form-control" id="exampleFormControlSelect2" id="destinatario" name="destinatario">
							<?php
							$usuarios = usuario::selecionarUsuarios();
							if (isset($usuarios)) {
								foreach ($usuarios as &$usuario) {
									echo "<option value = '".$usuario['idUsuario']."'>".$usuario['nome']."</option>	";
								}
							}

							?>
						</select>
					</div>
					<div class="col-lg-1"></div>
					<div class="col-lg-8">
						<textarea rows="5" cols="80" maxlength="50" name="corpo_email"></textarea>
					</div>

					<div class="col-lg-2">
						<button type="submit" class="mb-2 btn btn-outline-dark "" name="botao" value="enviar_email">Enviar</button>
					</div>
				</div>
				

			</form>
		</div>
	</div>
</div>

<?php include '../includes/rodape.php';?>	