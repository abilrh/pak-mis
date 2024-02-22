<?php
include_once("../../../config/koneksi.php");
class gurucontroller{
    private $koneksi;
    public function __construct($connection){
        $this->koneksi = $connection;
}
public function tambahguru(){
    $setAuto = mysqli_query($this->koneksi,"SELECT MAX(id) as max_id FROM nilai");
    $result = mysqli_fetch_assoc($setAuto);
    $max_id = $result['max_id'];
    if(is_numeric($max_id)){
        $nounik = $max_id + 1;
    }else{
        $nounik = 1; // JIKA BELUM ADA DATA, MULAI DARI 1
    }return $nounik;
}
public function tambahdataguru($data){
    $id = $data['id'];
    $namasiswa = $data ['namasiswa'];
    $matapelajaran = $data ['matapelajaran'];
    $tugas = $data ['tugas'];
    $kuis = $data ['kuis'];
    $uts = $data ['uts'];
    $uas = $data ['uas'];
    $insertData = mysqli_query($this->koneksi, "insert into nilai (id,namasiswa,matapelajaran,tugas,kuis,uts,uas) values ('$id',' $namasiswa ','$matapelajaran','$tugas','$kuis',' $uts ',' $uas ')");
    if ($insertData){
        return "Data berhasil di simpan.";
    }else{
        return "Gagal menyimpan data.";
    }
}
}
?>