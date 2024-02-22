<?php
include_once("../../../config/koneksi.php");
include_once("../../../library/fpdf.php");

$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(0, 15, '', 0, 1);
$pdf->Cell(250, 10, 'DATA GURU', 0, 0, 'R');

$pdf->Ln(17);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
$pdf->Cell(30, 7, 'ID', 1, 0, 'C');
$pdf->Cell(90, 7, 'Nama Guru', 1, 0, 'C');
$pdf->Cell(50, 7, 'Alamat', 1, 0, 'C');
$pdf->Cell(50, 7, 'Jenis Kelamin', 1, 0, 'C');
$pdf->Cell(50, 7, 'Email', 1, 1, 'C');

$pdf->SetFont('Times', '', 10);

$no = 1;
$data = mysqli_query($koneksi, "SELECT * FROM guru ORDER BY id ASC");
while ($data1 = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(30, 6, $data1['id'], 1, 0);
    $pdf->Cell(90, 6, $data1['namaguru'], 1, 0);
    $pdf->Cell(50, 6, $data1['alamat'], 1, 0);
    $pdf->Cell(50, 6, $data1['jeniskelamin'], 1, 0, 'C');
    $pdf->Cell(50, 6, $data1['email'], 1, 1);
}

$pdf->Output();
?>
