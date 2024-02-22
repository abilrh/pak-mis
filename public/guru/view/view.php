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
    <a href="../../dashboard/dashboard.php">Home</a>
    <br /><br />
    <form name="update_data" method="post" action="view.php">
        <table border="0">
            <tr>
                <td>Id</td>
                <td>:</td>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <td>Nama Guru </td>
                <td>:</td>
                <td><?php echo $namaguru; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $alamat; ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?php echo $jeniskelamin; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo $email; ?></td>
            </tr>
        </table>
    </form>
</body>

</html>