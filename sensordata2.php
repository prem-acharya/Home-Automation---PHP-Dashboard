<?php

require 'db.php';

//----------------------------------------------------------------------------

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $temperature = escape_data($_POST["temperature"]);
    $humidity = escape_data($_POST["humidity"]);

    $sql = "INSERT INTO tbl_temperature1(temperature,humidity,created_date) 
			VALUES('" . $temperature . "','" . $humidity . "','" . date("Y-m-d H:i:s") . "')";

    if ($con->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    echo "OK. INSERT ID: ";
    echo $con->insert_id;
    // }

}
//----------------------------------------------------------------------------
else {
    echo "No HTTP POST request found";
}
//----------------------------------------------------------------------------


function escape_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}