<?php
require('../BD/conexaoPDO.php');

class usuario{

	function cadastrar($dados){

			try{
				$sql = "INSERT INTO 
				Usuario(nome, sobrenome, senha) 
				VALUES(
				:nome,
				:sobrenome,
				md5(:senha)
			)";

			$conexao = conexaoPDO::conectar()->prepare($sql);

			$conexao->bindValue(":nome", $dados["nome"]);
			$conexao->bindValue(":sobrenome", $dados["sobrenome"]);
			$conexao->bindValue(":senha", $dados["senha"]);

			$conexao->execute();

		}catch (Exception $e) {
			echo "Erro: Código = ".$e->getCode()." Mensagem = ".$e->getMessage();
		}

	}

	public function Verifica_dados($dados){
		try{
			$sql = "select * from 
			Usuario where nome = :login and senha = :senha";

			$busca = conexaoPDO::conectar()->prepare($sql);

			$busca->bindValue(":login", $dados["login"]);
			$busca->bindValue(":senha", md5($dados["senha"]));

			$busca->execute();	


			return $busca->fetchAll(PDO::FETCH_ASSOC);
			

		}catch (Exception $e) {
			echo "Erro: Código = ".$e->getCode()." Mensagem = ".$e->getMessage();
		}
	}

	public function selecionarUsuarios(){

		try{
			$sql = "select idUsuario, nome from 
			Usuario";

			$busca = conexaoPDO::conectar()->prepare($sql);	

			$busca->execute();

			return $busca->fetchAll(PDO::FETCH_ASSOC);

		}catch (Exception $e) {
			echo "Erro: Código = ".$e->getCode()." Mensagem = ".$e->getMessage();
		}			

	}

	public function enviarEmail($dados){

		try{
			$sql = "INSERT INTO 
				Email(Assunto, corpo_email, id_Usuario_emissor, id_Usuario_destinatario, data_Envio) 
				VALUES(
				:Assunto,
				:corpo,
				:id_emissor,
				:id_destinatario,
				:data
			)";

			$enviar = conexaoPDO::conectar()->prepare($sql);	
			$enviar->bindValue(":Assunto", $dados["assunto"]);
			$enviar->bindValue(":corpo", $dados["corpo_email"]);
			$enviar->bindValue(":id_emissor", $dados["emissor"]);
			$enviar->bindValue(":id_destinatario", $dados["destinatario"]);
			$enviar->bindValue(":data", $dados["data"]);

			$enviar->execute();
			echo "<script> alert('Conexão Realizada com sucesso!!') </script>";

		}catch (Exception $e) {
			echo "Erro: Código = ".$e->getCode()." Mensagem = ".$e->getMessage();
		}			

	}

	public function emails_Enviados($id_usuario){

		try{
			$sql = "select e.*, u.nome from 
			Email as e, Usuario as u where e.id_Usuario_emissor = :id and e.id_Usuario_destinatario = u.idUsuario";

			$busca = conexaoPDO::conectar()->prepare($sql);	
			$busca->bindValue(":id", $id_usuario);
			$busca->execute();

			return $busca->fetchAll(PDO::FETCH_ASSOC);

		}catch (Exception $e) {
			echo "Erro: Código = ".$e->getCode()." Mensagem = ".$e->getMessage();
		}			

	}

	public function emails_Recebidos($id_usuario){

		try{
			$sql = "select e.*, u.nome from 
			Email as e, Usuario as u where e.id_Usuario_destinatario = :id and e.id_Usuario_emissor = u.idUsuario";

			$busca = conexaoPDO::conectar()->prepare($sql);	
			$busca->bindValue(":id", $id_usuario);
			$busca->execute();

			return $busca->fetchAll(PDO::FETCH_ASSOC);

		}catch (Exception $e) {
			echo "Erro: Código = ".$e->getCode()." Mensagem = ".$e->getMessage();
		}			

	}

	public function ver_email($id_email){
		
		try{
			$sql = "select e.*, u.nome from 
			Email as e, Usuario as u where e.idEmail = :id and e.id_Usuario_emissor = u.idUsuario";

			$busca = conexaoPDO::conectar()->prepare($sql);	
			$busca->bindValue(":id", $id_email);
			$busca->execute();

			return $busca->fetchAll(PDO::FETCH_ASSOC);

		}catch (Exception $e) {
			echo "Erro: Código = ".$e->getCode()." Mensagem = ".$e->getMessage();
		}	
	}


	public function quantidade_emails_recebidos($id_usuario, $data){
		
		try{
			$sql = "select count(idEmail) as emails from
			Email as e where e.id_Usuario_destinatario = :id and e.data_Envio = :data";

			$busca = conexaoPDO::conectar()->prepare($sql);	
			$busca->bindValue(":id", $id_usuario);
			$busca->bindValue(":data", $data);
			$busca->execute();

			return $busca->fetchAll(PDO::FETCH_ASSOC);

		}catch (Exception $e) {
			echo "Erro: Código = ".$e->getCode()." Mensagem = ".$e->getMessage();
		}	
	}
}