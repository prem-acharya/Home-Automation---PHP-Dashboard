<?php
require('db.php');

$itemId = $_POST['item_id'];
$status = $_POST['status'];

$query = "UPDATE `items` SET `status` = $status WHERE `id` = $itemId";
$result = $con->query($query);

echo 'Status updated successfully.';
?>