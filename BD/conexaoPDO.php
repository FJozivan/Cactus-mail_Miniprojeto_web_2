<?php
/**
 * Conexão com o banco de dados
 */
class conexaoPDO
{
	
	function __construct(){}

	public static function conectar()
	{
		try{
			$conn = new PDO("mysql:host=localhost; dbname=webmail", "root", "");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			//echo "<script> alert('Conexão Realizada com sucesso!!') </script>";

			return $conn;
		}catch(PDOException $e){
			echo "Erro: ".$e.getMessage();
		}
	}
}
?>
