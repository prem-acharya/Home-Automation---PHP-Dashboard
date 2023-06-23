<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the current number of rows in the database
$sql = "SELECT COUNT(*) as count FROM tbl_temperature1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$count = $row['count'];

// Check if the row count has increased since the last time the script ran
$previous_count = isset($_SESSION['previous_count']) ? $_SESSION['previous_count'] : 0;
if ($count > $previous_count) {
    // Row count has increased, set class "connected" to the online-text element
    echo "<div class='container1'><p class='online-text connected'>Power ON</p><div class='online-indicator'><span class='blink'></span></div></div>";
} else {
    // Row count has not increased, set class "disconnected" to the online-text element
    echo "<div class='container1'><p class='online-text disconnected'>Power OFF</p><div class='online-indicator'><span class='blink'></span></div></div>";
}

// Save the current row count in a session variable for the next time the script runs
$_SESSION['previous_count'] = $count;

// Close the database connection
$conn->close();

?>

<!-- Add the CSS styles below the PHP code -->

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
        color: #2fd65e;
        display: inline;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 500;
        font-size: 25px;
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

    /* Change the color of the online status when connected */
    p.online-text.connected {
        color: #2fd65e;
    }

    /* Change the color of the blink and online indicator when connected */
    p.online-text.connected+div.online-indicator span.blink {
        background-color: #2fd65e;
    }

    p.online-text.connected+div.online-indicator {
        background-color: #2fd65e;
    }

    /*Animations*/
    @keyframes blink {
        100% {
            transform: scale(2, 2);
            opacity: 0;
        }
    }
</style>