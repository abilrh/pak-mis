<?php
include_once("../../../config/koneksi.php");
include_once("../controller/mapelupdate.php");
$gurucontroller = new gurucontroller($koneksi);

$id = $namamapel = $namaguru = ''; // Initialize the variables

if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $namamapel = $_POST["namamapel"];
    $namaguru = $_POST["namaguru"];
    $message = $gurucontroller->updateguru($id, $namamapel, $namaguru);
    echo $message;
    header("Location:../../dashboard/datamapel.php");
}

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];
    $result = $gurucontroller->getdataguru($id);
    if ($result) {
        $id = $result['id'];
        $namamapel = $result['namamapel']; 
        $namaguru = $result['namaguru'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman update guru</title>
</head>

<body>
    <h1>UPDATE DATA MAPEL</h1>
    <a href="../../dashboard/datamapel.php">Home</a>
    <form action="update.php" method="post" name="update" enctype="multipart/form-data">
        <table border=1>
            <tr>
                <td>ID Mapel</td>
                <td><input style="background-color: Tomato; width: 100%;" type="text" name="id" value="<?php echo $id; ?>"
                        readonly></td>
            </tr>
            <tr>
                <td>Nama Mapel</td>
                <td><input type="text" name="namamapel" style="width: 100%;" value="<?php echo $namamapel; ?>"></td>
            </tr>
            </tr>
            <td>Nama guru</td>
    <td>
        <select name="namaguru" style="width: 100%;">
            <option value="" disabled selected>silahkan pilih</option>
            <?php
            $result = mysqli_query($koneksi, "SELECT id, namaguru FROM guru");
            while ($row = mysqli_fetch_assoc($result)) {
                $selected = ($row["namaguru"] == $selectedguru) ? "selected" : "";
                echo "<option value='" . $row['namaguru'] . "' $selected>" . $row["namaguru"] . "</option>";
            }
            ?>
        </select>
    </td>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>
