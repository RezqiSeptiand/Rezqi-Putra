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

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $update_sql = "UPDATE crud SET name='$name', email='$email', mobile='$mobile', password='$password' WHERE id='$id'";
    $update_result = mysqli_query($con, $update_sql);

    if ($update_result) {
        echo "Record updated successfully";
        header("Location: index.php");
        exit();
    } else {
        die('Error: ' . mysqli_error($con));
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body class="container mt-5">
    <h2 class="mb-4">Update Record</h2>
    <div class="card">
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile:</label>
                    <input type="text" name="mobile" class="form-control" value="<?php echo $mobile; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" required>
                </div>
                <button type="submit" name="update" class="btn btn-success">Update</button>
            </form>
            <a href="index.php" class="btn btn-primary mt-3">Back to List</a>
        </div>
    </div>
</body>

</html>


