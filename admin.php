<?php
include("admin_navbar.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        /* add your CSS styles here */
        main {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        h3 {
            font-size: 2rem;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1.2rem;
            line-height: 1.5;
            margin-bottom: 1rem;
        }

        /* ul {
            margin-bottom: 1rem;
        } */

        /* li {
            font-size: 1.2rem;
            line-height: 1.5;
        } */

        footer {
            background-color: black;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .social-media-icons {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 1rem;
        }

        .social-media-icons img {
            height: 40px;
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <main>
        <section>
            <div>
                <!-- Display a welcome message and list of options for the user -->
                <h2>Welcome To Your Admin Dashboard</h2>
                <p>From here, you can access a variety of tools to manage your account and products:</p>
                <!-- Option 1: View account information -->
                <h3>Account Information</h3>
                <p>View a summary of your account information, including your name, email address, and shipping details.
                </p>

                <!-- Option 2: Edit account settings -->
                <h3>Edit Account Settings</h3>
                <p>Update your account settings, such as your name, email address, password, and billing information.
                </p>
            </div>
        </section>
        <br><br>
    </main>

    <footer>
        <div class="social-media-icons">
            <a href="https://www.facebook.com/your-facebook-page" target="_blank"><img src="./img/fb.jpg"
                    alt="Facebook"></a>
            <a href="https://twitter.com/your-twitter-page" target="_blank"><img src="./img/tw.jpg" alt="Twitter"></a>
            <a href="mailto:premacharya2193@gmail.com"><img src="./img/gmail.jpg" alt="Gmail"></a>
        </div>
        <p>🏠 Home Automation - Prem Acharya</p>
    </footer>

</body>

</html>