<?php
include_once("../../config/koneksi.php");
session_start();

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION["user_id"])) {
    header("location: ../login.php");
    exit();
}

// Mengambil data pengguna dari session
$user_id = $_SESSION["user_id"];
$username = $_SESSION["username"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN UTAMA</title>
</head>

<body>
    <h2>Selamat Datang di Dashboard <span style="color: teal; width:100%">
            <?php
            echo "$username";
            ?>
        </span></h2>
    <form action="dashboard.php" method="get">
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
        <caption>DATA KELAS</caption>
        <a href="../guru/view/tambah.php">TAMBAH</a>
        <a href="../guru/view/cetak.php" target="_blank"> CETAK</a>

        <?php
        if (isset($_GET["cari"])) {
            $cari = $_GET["cari"];
            $ambildata = mysqli_query($koneksi, "select * from guru where id like '%" . $cari . "%' OR namaguru like '%" . $cari . "%'");
        } else {
            $ambildata = mysqli_query($koneksi, "select * from guru order by id asc");
            $num_mysql = mysqli_num_rows($ambildata);
        }
        ?>

        <tr>
            <th>ID</th>
            <th>NAMA GURU</th>
            <th>ALAMAT</th>
            <th>JENIS KELAMIN</th>
            <th>EMAIL</th>
            <th>GAMBAR</th>
            <th>AKSI</th>
        </tr>
        <?php
        while ($userambildata = mysqli_fetch_array($ambildata)) {
            echo "<tr>";
            echo "<td>" . $id = $userambildata['id'] . "</td>";
            echo "<td>" . $namaguru = $userambildata['namaguru'] . "</td>";
            echo "<td>" . $alamat = $userambildata['alamat'] . " </td>";
            echo "<td>" . $jeniskelamin = $userambildata['jeniskelamin'] . " </td>";
            echo "<td>" . $email = $userambildata['email'] . " </td>";
            echo"<td>";
            $data = mysqli_query($koneksi, "SELECT * FROM guru WHERE id = '{$userambildata['id']}'");

            while ($row = mysqli_fetch_array($data)) {
                echo "<a href='javascript:void(0);' onclick=\"window.open('../guru/Aset/{$row['gambar']}', '_blank');\">
                        <img src='../guru/Aset/{$row['gambar']}' alt='gambar' height='50' width='100'></a>";
            }
            
            echo "<td><a href='../guru/view/view.php?id={$userambildata['id']}'>View</a> |
                <a href='../guru/view/update.php?id={$userambildata['id']}'>Edit</a> | 
                <a href='../guru/controller/guruhapus.php?id=" . $userambildata['id'] . "'>Hapus</a></td>";
            
            echo "</tr>";
        }      
    
        ?>
    </table>
    <br><a href="../dashboard/home.php">MENU</a>
    <br><a href="../../logout.php">Logout</a>
</body>
</html>