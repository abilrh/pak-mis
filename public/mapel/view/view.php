<?php
include_once("../../../config/koneksi.php"); 
include_once("../controller/viewdata.php"); 
$mapelcontroller = new mapelcontroller($koneksi);
?>

<html>

<head>
    <title>View User Data</title>
</head>

<body>
    <a href="../../dashboard/datamapel.php">Home</a>
    <br /><br />
    <form name="view" method="post" action="view.php">
        <table border="0">
            <tr>
                <td>Id</td>
                <td>:</td>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <td>Nama Guru </td>
                <td>:</td>
                <td><?php echo $namamapel; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $namaguru; ?></td>
            </tr>
            <tr>
            </tr>
        </table>
    </form>
</body>

</html>