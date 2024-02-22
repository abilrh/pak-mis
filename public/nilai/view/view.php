<?php
include_once("../../../config/koneksi.php"); 
include_once("../controller/viewdata.php"); 
$gurucontroller = new gurucontroller($koneksi);
?>

<html>

<head>
    <title>View User Data</title>
</head>

<body>
    <a href="../../dashboard/datanilai.php">Home</a>
    <br /><br />
    <form name="update_data" method="post" action="view.php">
        <table border="0">
            <tr>
                <td>Id</td>
                <td>:</td>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <td>Nama siswa </td>
                <td>:</td>
                <td><?php echo $namasiswa; ?></td>
            </tr>
            <tr>
                <td>matapelajaran</td>
                <td>:</td>
                <td><?php echo $matapelajaran; ?></td>
            </tr>
            <tr>
                <td>tugas</td>
                <td>:</td>
                <td><?php echo $tugas; ?></td>
            </tr>
            <tr>
                <td>kuis</td>
                <td>:</td>
                <td><?php echo $kuis; ?></td>
            </tr>
            <tr>
                <td>uts</td>
                <td>:</td>
                <td><?php echo $uts; ?></td>
            </tr>
            <tr>
                <td>uas</td>
                <td>:</td>
                <td><?php echo $uas; ?></td>
            </tr>
        </table>
    </form>
</body>

</html>