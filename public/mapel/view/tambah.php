<?php
include_once("../../../config/koneksi.php");
include_once("../controller/mapeltambah.php");
$mapelcontroller = new mapelcontroller($koneksi);
if (isset($_POST["submit"])) {
    $id = $mapelcontroller->tambahmapel();
    $data = [
        "id"=> $id,
        "namamapel"=> $_POST["namamapel"],
        "namaguru"=> $_POST["namaguru"],
    ];
    $message = $mapelcontroller->tambahdatamapel($data);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN TAMBAH MAPEL</title>
</head>

<body>
    <h1>TAMBAH DATA MAPEL</h1>
    <a href="../../dashboard/datamapel.php">Home</a>
    <form action="tambah.php" method="post" name="tambah " enctype="multipart/form-data">
        <table border=1>
            <tr>
                <td>Id</td>
                <td><input style="background-color:Tomato;width: 100%;" type="text" name="id"
                        value="<?php echo $mapelcontroller->tambahmapel(); ?>" readonly> </td>
            </tr>
            <tr>
                <td>Namamapel</td>
                <td><input type="text" name="namamapel" style="width: 100%;" required></td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td>namaguru</td>
                <td><input type="text" name="namaguru" style="width: 100%;" required></td>
            </tr>
            <tr>

</tr>
        </table>
        <input type="submit" name="submit" value="Tambah mapel">
        <?php if(isset($message)):?>
        <div class="succes-message">
            <?php echo $message;?>
        </div>
        <?php endif;?>
    </form>
</body>

</html>