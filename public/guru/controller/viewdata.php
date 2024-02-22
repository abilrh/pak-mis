<?php
include_once("../../../config/koneksi.php");
class gurucontroller {
private $koneksi;
public function __construct($connection) { $this->koneksi = $connection;
}
public function getGuruData($id) {
$result = mysqli_query($this->koneksi, "SELECT * FROM guru WHERE id=$id"); return mysqli_fetch_array($result);
}
}
$kelascontroller = new gurucontroller ($koneksi);
$id = $_GET['id'];
$guruData = $kelascontroller->getGuruData($id);
if ($guruData) {
$id = $guruData['id'];
$namaguru = $guruData['namaguru'];
$alamat = $guruData['alamat'];
$jeniskelamin = $guruData['jeniskelamin'];
$email = $guruData['email'];
}
?>