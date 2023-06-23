<?php
include("navbar.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Smart Home Solutions</title>
    <style>
        /* Reset default styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            background-color: #f2f2f2;
        }

        main {
            max-width: 960px;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        section {
            margin-bottom: 30px;
        }

        /* h1 {
            font-size: 36px;
            margin-bottom: 20px;
            text-align: center;
        } */

        h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 20px;
            line-height: 1.5;
        }

        img {
            height: 100px;
            width: 500px;
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        footer p {
            margin: 0;
        }

        .social-media-icons {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .social-media-icons a {
            display: inline-block;
            margin: 0 10px;
        }

        .social-media-icons img {
            height: 30px;
            width: 30px;
        }
    </style>
</head>

<body>
    <main>
        <section>
            <h1 style=" font-size: 36px;
            margin-bottom: 20px;
            text-align: center;">About Us</h1>
            <p>Welcome to Smart Home Solutions, where we are committed to making your home smarter, safer, and more
                energy efficient with our innovative products and services.</p>
            <img src="./img/home2.jpg" alt="Smart Home Solutions - About Us">
            <h2>Our Mission</h2>
            <p>At Smart Home Solutions, our mission is to help our customers create smarter, safer, and more
                energy-efficient homes with our innovative products and services. We believe that technology can make
                our lives better, and we are committed to making it easy for our customers to enjoy the benefits of
                smart home technology.</p>
            <img src="./img/home3.jpg" alt="Smart Home Solutions - Our Mission">
        </section>
        <br><br>
        <section>
            <h2>Contact Us</h2>
            <p>If you have any questions or comments, please don't hesitate to contact us:</p>
            <ul>
                <li>Email: premacharya2193@gmail.com</li>
                <li>Phone: 123-456-7890</li>
                <li>Address: Gujarat,Rajkot-360002</li>
            </ul>
        </section>
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