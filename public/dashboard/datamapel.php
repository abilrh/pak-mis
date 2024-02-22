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

// Inisialisasi variabel $cari
$cari = "";

// Jika form pencarian dikirimkan (submitted)
if (isset($_GET["cari"])) {
    $cari = $_GET["cari"];
}

// Query SQL untuk mencari data mapel berdasarkan ID atau Nama Guru
if (!empty($cari)) {
    $query = "SELECT * FROM mapel WHERE id LIKE '%$cari%' OR id LIKE '%$cari%'";
} else {
    $query = "SELECT * FROM mapel ORDER BY id ASC";
}

// Eksekusi query
$ambildata = mysqli_query($koneksi, $query);

// Periksa apakah query berhasil dijalankan
if (!$ambildata) {
    die('Error in the query: ' . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN MAPEL</title>
</head>

<body>
    <h2>Selamat Datang di mapel<span style="color: teal; width:100%">
            <?php echo "$username"; ?>
        </span></h2>
    <form action="datamapel.php" method="get">
        <label>Cari</label>
        <input type="text" name="cari" value="<?php echo $cari; ?>">
        <input type="submit" value="Klik">
    </form>

    <table border="1">
        <h1>DATA MAPEL KELAS</h1>
        <a href="../mapel/view/tambah.php">TAMBAH</a> 
        <a href="../mapel/view/cetak.php" target="=_blank"> cetak</a>

        <tr>
            <th>ID</th>
            <th>NAMA MAPEL</th>
            <th>NAMA GURU</th>
            <th> AKSI </th>
        </tr>

        <?php
        while ($userambildata = mysqli_fetch_array($ambildata)) {
            echo "<tr>";
            echo "<td>" . $id = $userambildata['id'] . "</td>";
            echo "<td>" . $namamapel = $userambildata['namamapel'] . "</td>";
            echo "<td>" . $namaguru = $userambildata['namaguru'] . "</td>";

            echo "<td> <a href='../mapel/view/view.php?id=" . $userambildata['id'] . "'> View </a> |
            <a href='../mapel/view/update.php?id=" . $userambildata['id'] . "'> Edit </a> |
            <a href='../mapel/controller/mapelhapus.php?id=" . $userambildata['id'] . "'>Hapus</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
<br><a href="../dashboard/home.php">MENU</a>
<br><a href="../../logout.php">LOGOUT DISINI!</a>
</html>
