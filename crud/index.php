<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    
</head>

<body class="container mt-5">
    <h2 class="mb-4">WEBSITE CRUD REZQI</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config.php';
            $result = mysqli_query($con, "SELECT * FROM crud");

            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>
                        <a href='read.php?id=" . $row['id'] . "' class='btn btn-info btn-sm'>Read</a>
                        <a href='update.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Update</a>
                        <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a>
                      </td>";
                echo "</tr>";
            }

            mysqli_close($con);
            ?>
        </tbody>
    </table>
    <a href="create.php" class="btn btn-success">Create Record</a>
</body>

</html>
