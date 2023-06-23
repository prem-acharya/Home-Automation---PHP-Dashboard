<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="icon" type="image" href="./img/home.jpg">
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
    <?php
    require('db.php');
    session_start();
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $query = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        // print_r($row['status']);
        if ($rows == 1) {
            $row = $result->fetch_assoc();
            // echo $row['status'];
            $_SESSION['username'] = $username;
            if ($row['status'] == 1) {
                header("Location: admin.php");
            } else {
                header("Location: main.php");
            }
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
        ?>
        <form class="form" method="post" name="login">
            <h1 class="login-title">Login</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" />
            <input type="password" class="login-input" name="password" placeholder="Password" />
            <input type="submit" value="Login" name="submit" class="login-button" />
            <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
            <!-- <input type="submit" value="Google" name="submit" class="link-button" />
            <input type="submit" value="Github" name="submit" class="link-button" />
            <input type="submit" value="Linkedln" name="submit" class="link-button" /> -->

            <div class="social-media-icons">
                <a href="#" target="_blank"><img src="./img/google.jpg" alt="Google"></a>
                <a href="https://twitter.com/your-twitter-page" target="_blank"><img src="./img/tw.jpg" alt="Twitter"></a>
                <a href="#"><img src="./img/linkedin.jpg" alt="Linkedln"></a>
            </div>
        </form>
        <?php
    }
    ?>
</body>

</html>