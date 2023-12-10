<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($con, "SELECT * FROM crud WHERE id='$id'");

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $password = $row['password'];
    } else {
        echo "Record not found!";
        exit();
    }
} else {
    echo "Invalid request!";
    exit();
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body class="container mt-5">
    <h2 class="mb-4">Read Record</h2>
    <div class="card">
        <div class="card-body">
            <p class="card-text">ID: <?php echo $id; ?></p>
            <p class="card-text">Name: <?php echo $name; ?></p>
            <p class="card-text">Email: <?php echo $email; ?></p>
            <p class="card-text">Mobile: <?php echo $mobile; ?></p>
            <p class="card-text">Password: <?php echo $password; ?></p>
            <a href="index.php" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</body>

</html>


