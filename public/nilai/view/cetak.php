<?php
include_once("../../../config/koneksi.php");
include_once("../../../library/fpdf.php");

$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(0, 15, '', 0, 1);
$pdf->Cell(250, 10, 'DATA NILAI', 0, 0, 'R');

$pdf->Ln(17);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
$pdf->Cell(30, 7, 'ID Nilai', 1, 0, 'C');
$pdf->Cell(70, 7, 'Nama Siswa', 1, 0, 'C');
$pdf->Cell(30, 7, 'Mapel', 1, 0, 'C');
$pdf->Cell(30, 7, 'Tugas', 1, 0, 'C');
$pdf->Cell(30, 7, 'Kuis', 1, 0, 'C');
$pdf->Cell(30, 7, 'UTS', 1, 0, 'C');
$pdf->Cell(30, 7, 'UAS', 1, 1, 'C');

$pdf->SetFont('Times', '', 10);

$no = 1;
$data = mysqli_query($koneksi, "SELECT * FROM nilai ORDER BY id ASC");
while ($data1 = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(30, 6, $data1['id'], 1, 0, 'C');
    $pdf->Cell(70, 6, $data1['namasiswa'], 1, 0);
    $pdf->Cell(30, 6, $data1['matapelajaran'], 1, 0, 'C');
    $pdf->Cell(30, 6, $data1['tugas'], 1, 0, 'C');
    $pdf->Cell(30, 6, $data1['kuis'], 1, 0, 'C');
    $pdf->Cell(30, 6, $data1['uts'], 1, 0, 'C');
    $pdf->Cell(30, 6, $data1['uas'], 1, 1, 'C');
}

$pdf->Output();
?>
