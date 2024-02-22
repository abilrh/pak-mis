<?php
include_once("../../../config/koneksi.php");
include_once("../controller/nilaitambah.php");
$gurucontroller = new gurucontroller($koneksi);
if (isset($_POST["submit"])) {
    $id = $gurucontroller->tambahguru();
    $data = [
        "id"=> $id,
        "namasiswa"=> $_POST["namasiswa"],
        "matapelajaran"=> $_POST["matapelajaran"],
        "tugas"=> $_POST["tugas"],
        "kuis"=> $_POST["kuis"],
        "uts"=> $_POST["uts"],
        "uas"=> $_POST["uas"],
    ];
    $message = $gurucontroller->tambahdataguru($data);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN TAMBAH DATA NILAI</title>
</head>

<body>
    <h1>TAMBAH DATA NILAI</h1>
    <a href="../../dashboard/datanilai.php">Home</a>
    <form action="tambah.php" method="post" name="tambah " enctype="multipart/form-data">
        <table border=1>
            <tr>
                <td>Id</td>
                <td><input style="background-color:Tomato;width: 100%;" type="text" name="id"
                        value="<?php echo $gurucontroller->tambahguru(); ?>" readonly> </td>
            </tr>
            <tr>
                <td>Namasiswa</td>
                <td><input type="text" name="namasiswa" style="width: 100%;" required></td>
            </tr>
            <tr>
                <td>matapelajaran</td>
                <td><input type="text" name="matapelajaran" style="width: 100%;" required></td>
            </tr>
            <tr>
                <td>tugas</td>
                <td><input type="text" name="tugas" style="width: 100%;" required></td>
            <tr>
                <td>kuis</td>
                <td><input type="text" name="kuis" style="width: 100%;" required></td>
            </tr>
            <tr>
                <td>uts</td>
                <td><input type="text" name="uts" style="width: 100%;" required></td>
            </tr>
            <tr>
                <td>uas</td>
                <td><input type="text" name="uas" style="width: 100%;" required></td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Tambah nilai">
        <?php if(isset($message)):?>
        <div class="succes-message">
            <?php echo $message;?>
        </div>
        <?php endif;?>
    </form>
</body>

</html>