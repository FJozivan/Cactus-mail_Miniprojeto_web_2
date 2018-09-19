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

		<div class="col-lg-12 col-sm-12" style="box-shadow: 0px 0px 2px green; margin-left:-10px">
			<?php
			if (isset($_POST['id'])) {
				$email = usuario::ver_email($_POST['id']);
				//echo var_dump($email);
				if (isset($email)) {
					foreach ($email as &$mail) {
						echo 
                            '<h5 class="mb-2">De: '.$mail['nome'].'</h5>
						     <h5 class="mb-4">Sobre: '.$mail['Assunto'].'</h5>
						     <p>'.$mail['corpo_email'].'</p>';				
					}
				}
			}


			?>
		</div>
	</div>
</div>

<?php include '../includes/rodape.php';?>