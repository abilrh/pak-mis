<?php
include_once("../../../config/koneksi.php");
include_once("../../../library/fpdf.php");

$pdf=new FPDF('L','mm','A4');
$pdf->addpage();

$pdf->setfont('Times','B',13);
$pdf->cell(0,15,'',0,1);
$pdf->cell(250,10,'DATA MATA PELAJARAN',0,0,'R');

$pdf->cell(10,17,'',0,1);
$pdf->setfont('Times','B',9);
$pdf->cell(10,7,'NO',1,0,'C');
$pdf->cell(30,7,'id',1,0,'C');
$pdf->cell(90,7,'namamapel',1,0,'C');
$pdf->cell(50,7,'namaguru',1,0,'C');

$pdf->cell(10,7,'',0,1);
$pdf->setfont('Times','',10);

$no=1;
$data = mysqli_query($koneksi,"SELECT * FROM mapel ORDER by id asc");
while($data1 = mysqli_fetch_array($data)){
    $pdf->cell(10,6, $no++,1,0,'C');
    $pdf->cell(30,6, $data1['id'],1,0);
    $pdf->cell(90,6, $data1['namamapel'],1,0);
    $pdf->cell(50,6, $data1['namaguru'],1,1,'C');
}
$pdf->output();
?>