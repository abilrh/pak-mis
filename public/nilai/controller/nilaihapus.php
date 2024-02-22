<?php
include_once("../../../config/koneksi.php");
class gurucontroller{
    private $koneksi;
    public function __construct($connection){
    $this->koneksi = $connection;
    }
    public function deleteguru($id) {
        $deletedata = mysqli_query($this->koneksi, "delete from nilai where id=$id");
        if ($deletedata) {
            return "Deleted successfully.";
        } else {
            return "Failed to delete data.";
        }
    }
}
$kelascontroller = new gurucontroller ($koneksi);
if (isset($_GET['id'])) {
$id = $_GET['id'];
$message = $kelascontroller->deleteguru ($id);
echo $message;
header("Location:../../dashboard/datanilai.php");
}
?>