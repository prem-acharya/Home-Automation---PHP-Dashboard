<?php
include("admin_navbar.php");
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "test";

// Create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Add user
if (isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    if (mysqli_query($conn, $sql)) {
        echo "User added successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Delete user
if (isset($_POST['delete_user'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM users WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "User deleted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Update user
if (isset($_POST['update_user'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET username='$username', password='$password', email='$email' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "User updated successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Retrieve user data
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Users</title>
    <link rel="stylesheet" href="./css/user.css">
    <link rel="icon" type="image" href="./img/home.jpg">
</head>

<body><br>
    <h2>Users</h2>
    <form method="POST" action="" class="user-form">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <button type="submit" name="add_user">Add User</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Update User Details</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td>
                        <?= $row['id'] ?>
                    </td>
                    <td>
                        <?= $row['username'] ?>
                    </td>
                    <td>
                        <?= $row['email'] ?>
                    </td>
                    <td>
                        <form method="POST" action="">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <label for="username">Username:</label>
                            <input type="text" name="username" value="<?= $row['username'] ?>" required>
                            <label for="password">Password:</label>
                            <input type="text" name="password" value="<?= $row['password'] ?>" required>
                            <label for="email">Email:</label>
                            <input type="email" name="email" value="<?= $row['email'] ?>" required>
                            <button type="submit" name="update_user">Update</button>
                            <button type="submit" name="delete_user">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php mysqli_close($conn); ?>
</body>

</html>