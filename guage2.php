<?php
include("db.php");

$sql = "SELECT * from tbl_temperature order by id desc limit 1";

$result = $con->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $value1 = $row['temperature'] * 3.53475;
    $value11 = 282.78 - $value1;
    $value2 = $row['humidity'] * 3.53475;
    $value22 = 282.78 - $value2;
    echo "<div id='gauge'>
    <div id='major-ticks'>
        <span>0%</span>
        <span>40%</span>
        <span>80%</span>
    </div>
    <div id='minor-ticks'>
        <span title='--i:1'></span>
        <span title='--i:2'></span>
        <span title='--i:3'></span>
        <span title='--i:4'></span>
        <span title='--i:5'></span>
        <span title='--i:6'></span>
        <span title='--i:7'></span>
        <span title='--i:8'></span>
        <span title='--i:9'></span>
        <span title='--i:10'></span>
        <span title='--i:11'></span>
        <span title='--i:12'></span>
        <span title='--i:13'></span>
        <span title='--i:14'></span>
        <span title='--i:15'></span>
        <span title='--i:16'></span>
        <span title='--i:17'></span>
        <span title='--i:18'></span>
        <span title='--i:19'></span>
        <span title='--i:20'></span>
    </div>
    <div id='minor-ticks-bottom-mask'></div>
    <div id='bottom-circle'></div>
    <svg version='1.1' baseProfile='full' width='190' height='190' xmlns=''>
        <linearGradient id='gradient' x1='0' x2='1' y1='0' y2='0'>
            <stop offset='0%' stop-color='#b96e85' />
            <stop offset='100%' stop-color='#ae69bb' />
        </linearGradient>
        <path d='M5 95 A80 80 0 0 1 185 95' stroke=url(#gradient) fill='none' stroke-width='10'
            stroke-linecap='round' stroke-dasharray='$value2 $value22' />
    </svg>
    <div id='center-circle'>
        <span id='name'>Humidity</span>
        <span id='temperature2'>" . $row['humidity'] . "</span>
        <img src='./img/sun.jpg' alt=''>
    </div>
    </div>";
}