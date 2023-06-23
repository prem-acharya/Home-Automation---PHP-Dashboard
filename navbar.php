<?php
include("auth_session.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home Automation</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="icon" type="image" href="./img/home.jpg">
</head>

<body>
    <nav class="navbar">
        <h1 class="logo">Home Automation</h1>
        <ul class="menu-items">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li class="dropdown">
                <a href="#">Room 1</a>
                <ul class="dropdown-menu">
                    <li><a href="switch.php">Switch</a></li>
                    <li><a href="meter.php">Meter</a></li>

                </ul>
            </li>
            <li class="dropdown">
                <a href="#">Room 2</a>
                <ul class="dropdown-menu">
                    <li><a href="switch1.php">Switch</a></li>
                    <li><a href="meter1.php">Meter</a></li>

                </ul>
            </li>
            <li><a href="logout.php">Logout</a></li>
            <li><a>Welcome!
                    <?php echo $_SESSION['username']; ?>
                </a></li>
        </ul>
    </nav>
</body>

</html>