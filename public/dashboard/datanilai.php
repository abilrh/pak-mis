<?php
include_once("../../config/koneksi.php");
session_start();

//memeriksa apakah pengguna sudah login
if (!isset($_SESSION["user_id"])) {
    header("location: ../login.php");
    exit();
}

//mengambil data pengguna dari session
$user_id = $_SESSION["user_id"];
$username = $_SESSION["username"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN NILAI</title>
</head>

<body>
    <h2>Selamat Datang di data nilai <span style="color: teal; width:100%">
            <?php
            echo "$username";
            ?>
        </span></h2>
    <form action="datanilai.php" method="get">
        <label>Cari</label>
        <input type="text" name="cari">
        <input type="submit" value="Klik">
    </form>

    <?php
            if (isset($_GET["cari"])) {
                $cari = $_GET["cari"];
            }
    ?>
    <table border="1">
        <h1>DATA NILAI KELAS</h1>
        <a href="../nilai/view/tambah.php">TAMBAH</a>
        <a href="../nilai/view/cetak.php" target="=_blank"> cetak</a> 
        <?php
         if (isset($_GET["cari"])){
            $cari = $_GET["cari"];
            $ambildata=mysqli_query($koneksi,"select * from nilai where id like '%". $cari ."%' OR nilai like '%".$cari. "%'");

         } else {
            $ambildata=mysqli_query($koneksi,"select * from nilai order by id asc");
            $num_mysql=mysqli_num_rows($ambildata);
         }
        ?>

        <tr>
            <th>ID</th>
            <th>NAMA SISWA</th>
            <th>MATAPELAJARAN</th>
            <th>TUGAS</th>
            <th>KUIS</th>
            <th>UTS</th>
            <th>UAS</th>
            <th> AKSI </th>
        </tr>
        <?php
        while ($userambildata = mysqli_fetch_array($ambildata)) {
            echo "<tr>";
            echo "<td>".$id = $userambildata['id']. "</td>";
            echo "<td>".$namasiswa = $userambildata['namasiswa']. "</td>";
            echo "<td>".$matapelajaran = $userambildata ['matapelajaran']." </td>";
            echo "<td>".$tugas = $userambildata ['tugas']." </td>";
            echo "<td>".$kuis = $userambildata ['kuis']." </td>";
            echo "<td>".$uts = $userambildata ['uts']." </td>";
            echo "<td>".$uas = $userambildata ['uas']." </td>";
            echo "<td> <a href='../nilai/view/view.php?id=$userambildata[id]'> View </a> |
            <a href='../nilai/view/update.php?id=$userambildata[id]'> Edit </a> |
            <a href = '../nilai/controller/nilaihapus.php?id=$userambildata[id]'>Hapus</a></td>";
        }
        ?>
    </table>
</body>
<br><a href="../dashboard/home.php">MENU</a>
<br><a href="../../logout.php">LOGOUT DISINI!</a>


</html>