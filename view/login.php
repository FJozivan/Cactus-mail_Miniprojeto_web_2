
<?php include '../includes/cabecalho.php'; 
// session_start();
// if (isset($_SESSION['login'])) {
// 	# code...
// }
// echo $_SESSION['login'];
?>

	<div class="container" style="margin-top: 4%;">

		<div class="row">
			<div class="col-xl-3 col-sm-3"></div>
			<div class="col-xl-6 col-sm-6" style="box-shadow: 0px 0px 1px; border-radius: 10px;">
				<h2 align="center" class="mb-5 mt-3"> Cactus Mail </h2>
				<form class="form" action="../controller/controller_usuario.php" method="post" style="margin-left: 10%; margin-right: 10%">
					<label for="email" class="mr-sm-2">Email:</label>
					<input type="text" class="form-control mb-2 mr-sm-2" id="email" name="login">
					<label for="pwd" class="mr-sm-2">Senha:</label>
					<input type="password" class="form-control mb-2 mr-sm-2" id="pwd" name="senha">
					<br>
					<div class="text-center">
						<button type="submit" class="mb-2 btn btn-outline-primary btn-lg"" name="botao" value="logar">Entrar</button>
						<br>ou<br>
						<a href="cadastro.php" class="mb-2 btn btn-outline-secondary">Cadastrar-se</a>
						
					</div>
					
				</form>
			</div>
		</div>
	</div>
	
<?php include '../includes/rodape.php'; ?>
