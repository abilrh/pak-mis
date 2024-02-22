<?php
include_once("../../../config/koneksi.php");
include_once("../controller/guruupdate.php");
$gurucontroller = new gurucontroller($koneksi);
    if (isset($_POST["update"])) {
        $id = $_POST["id"];
        $namaguru = $_POST["namaguru"];
        $alamat = $_POST["alamat"];
        $jeniskelamin = $_POST["jeniskelamin"];
        $email = $_POST ["email"];
        $message = $gurucontroller->updateguru($id, $namaguru, $alamat,$jeniskelamin,$email);
        echo $message;
        header("Location:../../dashboard/dashboard.php");
    }
    if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
        $id = $_GET["id"];
        $result = $gurucontroller->getdataguru($id);
        if ($result) {
            $id= $result['id'];
            $namaguru= $result['namaguru']; 
            $alamat= $result['alamat'];
            $jeniskelamin= $result['jeniskelamin'];
            $email = $result['email'];
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman tambah guru</title>
</head>

<body>
    <h1>UPDATE DATA GURU</h1>
    <a href="../../dashboard/dashboard.php">Home</a>
    <form action="update.php" method="post" name="tambah " enctype="multipart/form-data">
        <table border=1>
            <tr>
                <td>Id Guru</td>
                <td><input style="background-color:Tomato;width: 100%;" type="text" name="id" value="<?php echo $id ?>"
                        readonly>
                </td>
            </tr>
            <tr>
                <td>Nama Guru</td>
                <td><input type="text" name="namaguru" style="width: 100%;" value="<?php echo $namaguru ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" style="width: 100%;" value="<?php echo $alamat?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><input type="text" name="jeniskelamin" style="width: 100%;" value="<?php echo$jeniskelamin ?>"></td>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" style="width: 100%; " value="<?php echo$email ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $id; ?>></td>
                <td><input type="submit" name="update" value="update"></td>
            </tr>
        </table>
    </form>
</body>

</html>