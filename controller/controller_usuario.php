 <?php
 session_start();
 require('../model/model_usuario.php');

 $dados = $_POST;

 if (isset($dados)) {
 	if($dados["botao"] == "cadastrar"){
 		if($dados['senha'] != $dados['senha_confr']){
 			echo "<script> alert('As senhas não coicidem, por favor tente novamente!') </script>";
 			header('location: ../view/cadastro.php');
 		}else{
 			usuario::cadastrar($dados);	
 			header('location: ../view/login.php');
 		}
 	}else if ($dados["botao"] == "logar") {
 		$result = usuario::Verifica_dados($dados);
 		if(count($result) > 0){
 			
 			$_SESSION['id'] = $result[0]['idUsuario'];
 			$_SESSION['nome'] = $result[0]['nome'];
 			//$_SESSION['email'] = $result[0]["email"];

 			header('location: ../view/inicio.php');

 		}else{

 			$_SESSION = array();
 			header('location: ../view/login.php');

 		}
 	}else if($dados["botao"] == "enviar_email"){
 		$dados['data'] = date("Y-m-d");
 		usuario::enviarEmail($dados);
		header('location: ../view/inicio.php'); 		

 	}
 	else if($dados["botao"] == "sair"){
 		
 		$_SESSION = array();
 		header('location: ../view/login.php');
 	}
 }

	// public function verificar_sessao(){
 //        if(session->userdata('logado') == false){
 //            redirect('Acesso/login');
 //        }
 //    }

 ?>