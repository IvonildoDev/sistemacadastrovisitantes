<?php
session_start();

require('./vendor/setasign/fpdf/fpdf.php');
include_once("conexao.php");

// Consulta os dados
$sql = "SELECT * FROM usuarios ORDER BY id";
$result = $conn->query($sql);

// Cria uma nova instância do FPDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Cabeçalho do relatório
$pdf->Cell(0, 10, mb_convert_encoding('Lista de Visitantes', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C');
$pdf->Ln(10);

// Cabeçalhos da tabela
$pdf->Cell(10, 10, 'ID', 1);
$pdf->Cell(50, 10, mb_convert_encoding('Nome:', 'ISO-8859-1', 'UTF-8'), 1);
$pdf->Cell(30, 10, mb_convert_encoding('Cidade:', 'ISO-8859-1', 'UTF-8'), 1);
$pdf->Cell(40, 10, mb_convert_encoding('Evangélico:', 'ISO-8859-1', 'UTF-8'), 1);
$pdf->Cell(50, 10, mb_convert_encoding('Igreja:', 'ISO-8859-1', 'UTF-8'), 1);
$pdf->Ln();

// Preenchendo a tabela com os dados
while ($user_lista = $result->fetch_assoc()) {
    $pdf->Cell(10, 10, $user_lista['id'], 1);
    $pdf->Cell(50, 10, mb_convert_encoding($user_lista['nome'], 'ISO-8859-1', 'UTF-8'), 1);
    $pdf->Cell(30, 10, mb_convert_encoding($user_lista['cidade'], 'ISO-8859-1', 'UTF-8'), 1);
    $pdf->Cell(40, 10, mb_convert_encoding($user_lista['evangelico'], 'ISO-8859-1', 'UTF-8'), 1);
    $pdf->Cell(50, 10, mb_convert_encoding($user_lista['igreja'], 'ISO-8859-1', 'UTF-8'), 1);
    $pdf->Ln();
}

// Saída do PDF
$pdf->Output();
