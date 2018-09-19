
<?php include '../includes/cabecalho.php'; 
?>

	<div class="container" style="margin-top: 4%;">

		<div class="row">
			<div class="col-xl-3 col-sm-3"></div>
			<div class="col-xl-6 col-sm-6" style="box-shadow: 0px 0px 1px; border-radius: 10px;">
				<h2 align="center" class="mb-4 mt-3"> Cactus Mail </h2>
				<form class="form" action="../controller/controller_usuario.php" method="post" style="margin-left: 10%; margin-right: 10%">
					<label for="nome" class="mr-sm-2">Nome:</label>
					<input type="text" class="form-control mb-2 mr-sm-2" id="nome" name="nome">

					<label for="sobrenome" class="mr-sm-2">Sobrenome:</label>
					<input type="text" class="form-control mb-2 mr-sm-2" id="sobrenome" name="sobrenome">

					<label for="email" class="mr-sm-2">Email:</label>
					<input type="email" class="form-control mb-2 mr-sm-2" id="email" name="email">

					<label for="pwd" class="mr-sm-2">Senha:</label>
					<input type="password" class="form-control mb-2 mr-sm-2" id="pwd" name="senha">

					<label for="pwd2" class="mr-sm-2">Confirmar senha:</label>
					<input type="password" class="form-control mb-3 mr-sm-2" id="pwd2" name="senha_confr">
					<div class="text-center">
						<button type="submit" class="btn btn-outline-primary btn-lg mb-1" value="cadastrar" name="botao">Cadastrar</button>
						<br>
						ou
						<br>
						<a href="login.php" class="btn btn-outline-secondary mb-2" value="1" name="login">Entrar</a>	
					</div>
				</form>
				<!-- <div class="text-center">
						ou
					<br>
				</div>
				<form action="inicio.php" method="post" class="text-center">
					<button type="submit" class="btn btn-outline-secondary mb-2" value="1" name="login">Entrar</button>	
				</form> -->
			</div>
		</div>
	</div>
	
<?php include '../includes/rodape.php'; ?>
