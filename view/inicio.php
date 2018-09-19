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
			<a href="escrever_email.php" class="nav-link mb-2 btn btn-outline-success my-lg-0" style="margin-left: 100px;">Escrever e-mail</a>
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
		<div class="col-lg-6 col-sm-12" style="box-shadow: 0px 0px 2px green; margin-left:-10px">
			<h4 class="text-center mt-2 mb-3">Enviados</h4>
			<table class="table" style="box-shadow: 0px 0px 2px green;">
				<thead>
					<tr>
						<th>Assunto:</th>
						<th>Data:</th>
						<th>Para:</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$Enviados = usuario::emails_Enviados($id);
					if(isset($Enviados)){
						foreach ($Enviados as &$enviado) {
							?>
							<tr>
								<td>
									<form action="ver_email.php" method="post">
										<?php echo '<input type="hidden" name="id" value="'.$enviado['idEmail'].'">'?>
										<button class="btn btn-outline-light text-dark btn-sm"><?php echo $enviado['Assunto'];?></button>
									</form>
								</td>
								<td><?php echo $enviado['data_Envio'];?></td>
								<td><?php echo $enviado['nome'];?></td>
							</tr>	

							<?
						}
					}else{	
						echo "<tr><td>Sem e-mails</td></tr>";
					}
					?>		
				</tbody>
			</table>
		</div>
		<div class="col-lg-6 col-sm-12" style="box-shadow: 0px 0px 2px orange; margin-left:10px">
			<h4 class="text-center mt-2 mb-3">Recebidos</h4>
			<table class="table">
				<thead>
					<tr>
						<th>Assunto:</th>
						<th>Data:</th>
						<th>De:</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$Recebidos = usuario::emails_Recebidos($id);
					if(isset($Recebidos)){
						foreach ($Recebidos as &$recebido) {
							?>
							<tr>
								<td>
									<form action="ver_email.php" method="post">
										<?php echo '<input type="hidden" name="id" value="'.$recebido['idEmail'].'">'?>
										<button class="btn btn-outline-light text-dark btn-sm"><?php echo $recebido['Assunto'];?></button>
									</form>
								</td>
								<td><?php echo $recebido['data_Envio'];?></td>
								<td><?php echo $recebido['nome'];?></td>
							</tr>	

							<?
						}
					}else{	
						echo "<tr><td>Sem e-mails</td></tr>";
					}
					?>		
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include '../includes/rodape.php';?>	