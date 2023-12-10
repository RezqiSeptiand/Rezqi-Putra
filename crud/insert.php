<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO `crud` (name, email, mobile, password) VALUES ('$name', '$email', '$mobile', '$password')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Jika berhasil, arahkan ke halaman index.php
        header("Location: index.php");
        exit(); // Pastikan tidak ada output HTML sebelum header
    } else {
        die('Error: ' . mysqli_error($con));
    }
}

mysqli_close($con);
?>
