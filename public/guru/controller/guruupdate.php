<?php
include_once("../../../config/koneksi.php");
class gurucontroller{
    private $koneksi;
    public function __construct($connection){
        $this->koneksi= $connection;
    }  
    public function updateguru($id, $namaguru, $alamat,$jeniskelamin,$email){
        $result = mysqli_query($this->koneksi,"UPDATE guru SET namaguru = '$namaguru', alamat = '$alamat',jeniskelamin= '$jeniskelamin',email='$email' WHERE id=$id");
        if ($result) {
            return "Data updated sukses succesfully.";
        }else {
            return "Failed to update data";
        }
    }
    public function getdataguru($id){
            $sql = "SELECT * FROM guru WHERE id = $id";
            $ambildata = $this->koneksi->query($sql);

            if ($result = mysqli_fetch_array($ambildata)) {
                return $result;
        }else {
            return null;
        }
    }
}

?>