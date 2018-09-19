<?php 
session_start();
require ("../fpdf/fpdf.php");
if ($_SESSION != null) {
	extract($_SESSION);
	require('../model/model_usuario.php');

}else{
	$_SESSION = array();
	header('location: ../view/login.php');
}
if (isset($_POST['id'])) {
	
	$emails = usuario::quantidade_emails_recebidos($_POST['id'], date("Y-m-d"));
	//echo var_dump($emails);
	if (isset($emails)) {
		foreach ($emails as $email) {
			$numero_emails = "Voce recebeu ".$email['emails']." e-mails Hoje!";
		}
		
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 36);
		$pdf->Cell(50, 30, 'Relatorio diario');
		$pdf->ln();
		$pdf->SetFont('Arial', 'B', 18);
		$pdf->Cell(30, 10, 'E-mails Recebidos');
		$pdf->ln();
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->Cell(30, 10, $numero_emails);
		$pdf->Output();
	}
	
}
