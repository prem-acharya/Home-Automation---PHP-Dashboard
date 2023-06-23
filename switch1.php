<?php
include("navbar.php");
include("check_status2.php");
// include("online_offline.php");
require("db.php");
$query = "SELECT * FROM `items`";
$result = $con->query($query);
$row = $result->fetch_all();
// print_r($row[0]);
$ac_status = $row[0][2];
$tv_status = $row[1][2];
$led_status = $row[2][2];
$fan_status = $row[3][2];
$room2_led = $row[4][2];
$room2_curtain = $row[5][2];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="./css/switch_old.css"> -->
    <link rel="stylesheet" href="./css/s1.css">
    <!-- <link rel="stylesheet" href="./css/meter.css"> -->

</head>

<body>
    <div>
        <div class='switch_container'>
            <div class="switch-holder">
                <div class="switch-label">
                    <i class="fa fa-bluetooth-b"></i><span>LED</span>
                </div>
                <div class="switch-toggle">
                    <input type="checkbox" id="bluetooth" class="status-toggle" data-item-id="<?php echo $row[4][0]; ?>"
                        <?php if ($room2_led == 1) { ?>checked <?php } ?>>
                    <label for="bluetooth"></label>
                </div>
            </div>


            <div class="switch-holder">
                <div class="switch-label">
                    <i class="fa fa-bluetooth1-b"></i><span>Curtain</span>
                </div>
                <div class="switch-toggle">
                    <input type="checkbox" id="bluetooth1" class="status-toggle"
                        data-item-id="<?php echo $row[5][0]; ?>" <?php if ($room2_curtain == 1) { ?>checked <?php } ?>>
                    <label for="bluetooth1"></label>
                </div>
            </div>


            <div class="switch-holder">
                <div class="switch-label">
                    <i class="fa fa-bluetooth2-b"></i><span>AC</span>
                </div>
                <div class="switch-toggle">
                    <input type="checkbox" id="bluetooth2" class="status-toggle"
                        data-item-id="<?php echo $row[2][0]; ?>" <?php if ($led_status == 1) { ?>checked <?php } ?>>
                    <label for="bluetooth2"></label>
                </div>
            </div>

            <div class="switch-holder">
                <div class="switch-label">
                    <i class="fa fa-bluetooth3-b"></i><span>FAN</span>
                </div>
                <div class="switch-toggle">
                    <input type="checkbox" id="bluetooth3" class="status-toggle"
                        data-item-id="<?php echo $row[3][0]; ?>" <?php if ($fan_status == 1) { ?>checked <?php } ?>>
                    <label for="bluetooth3"></label>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    const toggles = document.querySelectorAll('.status-toggle');
    toggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
            const itemId = toggle.dataset.itemId;
            const status = toggle.checked ? 1 : 0;
            updateStatus(itemId, status);
        });
    });

    function updateStatus(itemId, status) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_switch_status.php');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send(`item_id=${itemId}&status=${status}`);
    }
    setTimeout(function () {
        window.location.reload(1);
    }, 2000);
</script>

</html>