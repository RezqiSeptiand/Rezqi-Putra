<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_sql = "DELETE FROM crud WHERE id='$id'";
    $delete_result = mysqli_query($con, $delete_sql);

    if ($delete_result) {
        echo "Record deleted successfully";
        header("Location: index.php");
        exit();
    } else {
        die('Error: ' . mysqli_error($con));
    }
} else {
    echo "Invalid request!";
    exit();
}

mysqli_close($con);
?>



