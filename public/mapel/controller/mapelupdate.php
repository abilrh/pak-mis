<?php
include_once("../../../config/koneksi.php");
class gurucontroller{
    private $koneksi;
    public function __construct($connection){
        $this->koneksi= $connection;
    }  
    public function updateguru($id, $namamapel, $namaguru){
        $result = mysqli_query($this->koneksi,"UPDATE mapel SET namamapel = '$namamapel', namaguru = '$namaguru' WHERE id=$id");
        if ($result) {
            return "Data updated sukses succesfully.";
        }else {
            return "Failed to update data";
        }
    }
    public function getdataguru($id){
            $sql = "SELECT * FROM mapel WHERE id = $id";
            $ambildata = $this->koneksi->query($sql);

            if ($result = mysqli_fetch_array($ambildata)) {
                return $result;
        }else {
            return null;
        }
    }
}

?>