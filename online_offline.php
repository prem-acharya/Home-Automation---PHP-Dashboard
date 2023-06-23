<?php
require("db.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>NodeMCU Status</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://fonts.googleapis.com/css?family=Rubik:400,500" rel="stylesheet"> -->
    <style>
        div.container1 {
            height: 10vh;
            width: 93.5%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        div.online-indicator {
            display: inline-block;
            width: 25px;
            height: 25px;
            margin-right: 10px;
            border-radius: 50%;
            position: relative;
        }

        span.blink {
            display: block;
            width: 25px;
            height: 25px;
            opacity: 0.7;
            border-radius: 50%;
            animation: blink 1s linear infinite;
        }

        p.online-text {
            color: #0fcc45;
            display: inline;
            font-family: "Rubik", sans-serif;
            font-weight: 400;
            text-shadow: 0px 3px 6px rgba(150, 150, 150, 0.2);
            position: relative;
            cursor: pointer;
        }

        /* Change the color of the online status when disconnected */
        p.online-text.disconnected {
            color: #ff4f4f;
        }

        /* Change the color of the blink and online indicator when disconnected */
        p.online-text.disconnected+div.online-indicator span.blink {
            background-color: #ff4f4f;
        }

        p.online-text.disconnected+div.online-indicator {
            background-color: #ff4f4f;
        }

        /*Animations*/
        @keyframes blink {
            100% {
                transform: scale(2, 2);
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container1">
        <div class="online-indicator">
            <span class="blink"></span>
        </div>
        <p class="online-text" id="status">NodeMCU is connected!</p>
    </div>
    <script>
        // Get the status element
        const statusElement = document.getElementById('status');

        // Listen for changes in the online status
        window.addEventListener('online', updateStatus);
        window.addEventListener('offline', updateStatus);

        // Function to update the status based on the online status
        function updateStatus() {
            if (navigator.onLine) {
                statusElement.classList.remove('disconnected');
                statusElement.innerText = 'NodeMCU is connected!';
                document.querySelector('.blink').style.backgroundColor = '#0fcc45';
                document.querySelector('.online-indicator').style.backgroundColor = '#0fcc45';
            } else {
                statusElement.classList.add('disconnected');
                statusElement.innerText = 'NodeMCU is disconnected!';
                document.querySelector('.blink').style.backgroundColor = '#ff4f4f';
                document.querySelector('.online-indicator').style.backgroundColor = '#ff4f4f';
            }
        }

        // Initial status update
        updateStatus();
    </script>
</body>

</html