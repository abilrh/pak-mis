<?php
include_once("../../../config/koneksi.php");
class mapelcontroller {
private $koneksi;
public function __construct($connection) { $this->koneksi = $connection;
}
public function getmapelData($id) {
$result = mysqli_query($this->koneksi, "SELECT * FROM mapel WHERE id=$id"); return mysqli_fetch_array($result);
}
}
$kelascontroller = new mapelcontroller ($koneksi);
$id = $_GET['id'];
$guruData = $kelascontroller->getmapelData($id);
if ($guruData) {
$id = $guruData['id'];
$namamapel = $guruData['namamapel'];
$namaguru = $guruData['namaguru'];
}
?>