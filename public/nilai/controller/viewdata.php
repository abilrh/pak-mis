<?php
include_once("../../../config/koneksi.php");
class gurucontroller {
private $koneksi;
public function __construct($connection) { $this->koneksi = $connection;
}
public function getGuruData($id) {
$result = mysqli_query($this->koneksi, "SELECT * FROM nilai WHERE id=$id"); return mysqli_fetch_array($result);
}
}
$kelascontroller = new gurucontroller ($koneksi);
$id = $_GET['id'];
$data = $kelascontroller->getGuruData($id);
if ($data) {
    $id = $data['id'];
    $namasiswa = $data ['namasiswa'];
    $matapelajaran = $data ['matapelajaran'];
    $tugas = $data ['tugas'];
    $kuis = $data ['kuis'];
    $uts = $data ['uts'];
    $uas = $data ['uas'];
}
?>