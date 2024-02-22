<?php
include_once("../../../config/koneksi.php");
class mapelcontroller{
    private $koneksi;
    public function __construct($connection){
    $this->koneksi = $connection;
    }
    public function deletemapel($id) {
        $deletedata = mysqli_query($this->koneksi, "delete from mapel where id=$id");
        if ($deletedata) {
            return "Deleted successfully.";
        } else {
            return "Failed to delete data.";
        }
    }
}
$mapelcontroller = new mapelcontroller ($koneksi);
if (isset($_GET['id'])) {
$id = $_GET['id'];
$message = $mapelcontroller->deletemapel ($id);
echo $message;
header("Location:../../dashboard/datamapel.php");
}
?>