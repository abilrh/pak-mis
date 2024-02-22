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
    <title>homepage</title>
</head>

<body>
    <h2>Selamat Datang di Dashboard <span style="color: teal; width:100%">
            <?php
            echo "$username";
            ?>
        </span></h2>
    <ul>
        <li><a href="./dashboard.php">data guru</a></li>
        <li><a href="./datanilai.php">data nilai</a></li>
        <li><a href="./datamapel.php">data mapel</a></li>
        <li><a href="../../logout.php">logout</a></li>
    </ul>
</body>

</html>