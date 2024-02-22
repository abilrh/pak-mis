<?php
include_once("../../../config/koneksi.php");
include_once("../controller/nilaiupdate.php");
$gurucontroller = new gurucontroller($koneksi);

$id = $namamapel = $namaguru = ''; // Initialize the variables

if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $namasiswa = $_POST["namasiswa"];
    $matapelajaran = $_POST["matapelajaran"];
    $tugas = $_POST["tugas"];
    $kuis = $_POST["kuis"];
    $uts = $_POST["uts"];
    $uas = $_POST["uas"];
    $message = $gurucontroller->updateguru($id, $namasiswa, $matapelajaran, $tugas, $kuis, $uts, $uas);
    echo $message;
    header("Location:../../dashboard/datanilai.php");
}

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];
    $result = $gurucontroller->getdataguru($id);
    if ($result) {
        $id = $result['id'];
        $namasiswa = $result['namasiswa']; 
        $matapelajaran = $result['matapelajaran'];
        $tugas = $result['tugas'];
        $kuis = $result['kuis'];
        $uts = $result['uts'];
        $uas = $result['uas'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman update Nilai</title>
</head>

<body>
    <h1>UPDATE DATA NILAI</h1>
    <a href="../../dashboard/datanilai.php">Home</a>
    <form action="update.php" method="post" name="update" enctype="multipart/form-data">
        <table border=1>
            <tr>
                <td>ID Mapel</td>
                <td><input style="background-color: Tomato; width: 100%;" type="text" name="id" value="<?php echo $id; ?>"
                        readonly></td>
            </tr>
            <tr>
                <td>Nama siswa</td>
                <td><input type="text" name="namasiswa" style="width: 100%;" value="<?php echo $namasiswa; ?>"></td>
            </tr>
            </tr>
            <tr>
                <td>Mapel</td>
                <td><input type="text" name="matapelajaran" style="width: 100%;" value="<?php echo $matapelajaran; ?>"></td>
            </tr>
            </tr>
            <tr>
                <td>tugas</td>
                <td><input type="text" name="tugas" style="width: 100%;" value="<?php echo $tugas; ?>"></td>
            </tr>
            </tr>
            <tr>
                <td>kuis</td>
                <td><input type="text" name="kuis" style="width: 100%;" value="<?php echo $kuis; ?>"></td>
            </tr>
            </tr>
            <tr>
                <td>uts</td>
                <td><input type="text" name="uts" style="width: 100%;" value="<?php echo $uts; ?>"></td>
            </tr>
            </tr>
            <tr>
                <td>uas</td>
                <td><input type="text" name="uas" style="width: 100%;" value="<?php echo $uas; ?>"></td>
            </tr>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>
