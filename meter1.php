<?php
include("navbar.php");
// include("online_offline.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/meter.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <title>Arc Gauge</title>
</head>

<body>
    <div id="guage1main"></div>
    <div id="guage2main"></div>
</body>
<script>
    setInterval(function () {
        $.ajax({
            type: "GET",
            // url: 'http://localhost/HCD_old/guage3.php', // CHANGE THAT
            url: 'http://192.168.156.244/HCD_old/guage3.php', // CHANGE THAT
            // url: 'http://192.168.0.102/HCD/guage3.php', // CHANGE THAT
            success: function (res) {
                $('#guage1main').html(res);
            },
            dataType: 'html',
        });
    }, 1000);
    setInterval(function () {
        $.ajax({
            type: "GET",
            // url: 'http://localhost/HCD_old/guage4.php', // CHANGE THAT
            url: 'http://192.168.156.244/HCD_old/guage4.php', // CHANGE THAT
            // url: 'http://192.168.0.102/HCD/guage4.php', // CHANGE THAT
            success: function (res) {
                $('#guage2main').html(res);
            },
            dataType: 'html',
        });
    }, 1000);
</script>

</html>