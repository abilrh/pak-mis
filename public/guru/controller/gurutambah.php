<?php
include_once("../../../config/koneksi.php");
class gurucontroller{
    private $koneksi;
    public function __construct($connection){
        $this->koneksi = $connection;
}
public function tambahguru(){
    $setAuto = mysqli_query($this->koneksi,"SELECT MAX(id) as max_id FROM guru");
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
    $namaguru = $data ['namaguru'];
    $alamat = $data ['alamat'];
    $jeniskelamin = $data ['jeniskelamin'];
    $email = $data ['email'];
             //upload file
    $ekstensi_diperbolehkan = array('jpeg','jpg','png');
    $namagambar = $_FILES['gambar']['name'];
    $x = explode('.', $namagambar);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];
    
    if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
    if ($ukuran <= 10000000) {
    move_uploaded_file($file_tmp, '../Aset/' . $namagambar);

    $insertdata = mysqli_query($this->koneksi, "INSERT INTO guru (id, namaguru, alamat, jeniskelamin, email, gambar) 
    VALUES ('$id', '$namaguru', '$alamat', '$jeniskelamin', '$email', '$namagambar')");
    
        if ($insertdata) {
        return "Data berhasil";
    } else {
        return "Gagal";
        }
        } else {
        echo "<div style='color:red;'>Ukuran file terlalu besar! Silahkan pilih file yang lebih kecil.</div>";
        }
    } else {
        echo "<div style='color: red;'>Ekstensi file upload tidak diizinkan!</div>";
        }
    }
}
?>