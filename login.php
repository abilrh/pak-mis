<?php
session_start();
include_once ("config/koneksi.php");
// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    // Mengecek data pengguna dari database
    $sql = "SELECT id, username, password FROM login WHERE username = '$username' AND password = '$password'";
    $result = $koneksi->query($sql);
    if ($result->num_rows == 1) {
        // Login sukses, set session
        $row = $result->fetch_assoc();
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["username"] = $row["username"];
        header("Location: public/dashboard/home.php");
    } else {
        echo "Login gagal. Silakan coba lagi.";
    }
}

$koneksi->close();
?>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>

</html>