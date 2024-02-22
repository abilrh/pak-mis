<?php
include_once("../../../config/koneksi.php");
include_once("../controller/gurutambah.php");
$gurucontroller = new gurucontroller($koneksi);
if (isset($_POST["submit"])) {
    $id = $gurucontroller->tambahguru();
    $data = [
        "id"=> $id,
        "namaguru"=> $_POST["namaguru"],
        "alamat"=> $_POST["alamat"],
        "jeniskelamin"=> $_POST["jeniskelamin"],
        "email"=> $_POST["email"],
    ];
    $message = $gurucontroller->tambahdataguru($data);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN TAMBAH GURU</title>
</head>

<body>
    <h1>TAMBAH DATA GURU</h1>
    <a href="../../dashboard/dashboard.php">Home</a>
    <form action="tambah.php" method="post" name="tambah " enctype="multipart/form-data">
        <table border=1>
            <tr>
                <td>Id</td>
                <td><input style="background-color:Tomato;width: 100%;" type="text" name="id"
                        value="<?php echo $gurucontroller->tambahguru(); ?>" readonly> </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="namaguru" style="width: 100%;" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" style="width: 100%;" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><input type="text" name="jeniskelamin" style="width: 100%;" required></td>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" style="width: 100%;" required></td>
            </tr>
            <tr>
                <td>file</td>
                <td><input type="file" name="gambar"style="width100;" : ></td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Tambah Guru">
        <?php if(isset($message)):?>
        <div class="succes-message">
            <?php echo $message;?>
        </div>
        <?php endif;?>
    </form>
</body>

</html>