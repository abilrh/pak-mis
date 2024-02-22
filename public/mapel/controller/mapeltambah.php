<?php
include_once("../../../config/koneksi.php");
class mapelcontroller{
    private $koneksi;
    public function __construct($connection){
        $this->koneksi = $connection;
}
public function tambahmapel(){
    $setAuto = mysqli_query($this->koneksi,"SELECT MAX(id) as max_id FROM mapel");
    $result = mysqli_fetch_assoc($setAuto);
    $max_id = $result['max_id'];
    if(is_numeric($max_id)){
        $nounik = $max_id + 1;
    }else{
        $nounik = 1; // JIKA BELUM ADA DATA, MULAI DARI 1
    }return $nounik;
}
public function tambahdatamapel($data){
    $id = $data['id'];
    $namamapel = $data ['namamapel'];
    $namaguru = $data ['namaguru'];

    $insertData = mysqli_query($this->koneksi, "insert into mapel (id,namamapel,namaguru) values ('$id',' $namamapel ','$namaguru')");
    if ($insertData){
        return "Data berhasil di simpan.";
    }else{
        return "Gagal menyimpan data.";
    }
}
}
?>