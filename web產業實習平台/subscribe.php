<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $ID = isset($_POST['ID']) ? mysqli_real_escape_string($link, $_POST['ID']) : '';
            $i_id = isset($_POST['i_id']) ? mysqli_real_escape_string($link, $_POST['i_id']) : '';

            if ($ID && $i_id) {
                // 查詢是否已訂閱
                $check_subscribe = "SELECT * FROM subscribe WHERE ID = '$ID' AND i_id = '$i_id'";
                $result = mysqli_query($link, $check_subscribe);

                if (mysqli_num_rows($result) > 0) {
                    // 已訂閱，取消訂閱
                    $unsubscribe = "DELETE FROM subscribe WHERE ID = '$ID' AND i_id = '$i_id'";
                    mysqli_query($link, $unsubscribe);
                } else {
                    // 未訂閱，新增訂閱
                    $subscribe = "INSERT INTO subscribe (ID, i_id) VALUES ('$ID', '$i_id')";
                    mysqli_query($link, $subscribe);
                }
            }
        }
        header("Location: industry.php");
    ?>
    
</body>
</html>