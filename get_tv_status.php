<?php
require("db.php");
$query = "SELECT * FROM `items`";
$result = $con->query($query);
$row = $result->fetch_all();
// print_r($row[0]);
// $ac_status = $row[0][2];
$tv_status = $row[1][2];
// $led_status = $row[2][2];
// $fan_status = $row[3][2];
// $all_status = [$ac_status, $tv_status, $led_status, $fan_status];
echo $tv_status;
?>