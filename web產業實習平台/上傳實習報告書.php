<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3; url=user.php">
    <title>Document</title>
</head>
<body>
    <p align=center>
        <?php
            $sr_id = $_POST['sr_id'];
            $name = $_POST['name'];
            $sr_title = $_POST['sr_title'];
            $sr_company = $_POST['sr_company'];
            $sr_content = $_POST['sr_content'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];


            $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');
            $sql = "insert into studentreport (sr_id, name, sr_title, sr_company, sr_content, start_date, end_date) values ('$sr_id', '$name', '$sr_title', '$sr_company', '$sr_content', '$start_date', '$end_date')";
            if (mysqli_query($link, $sql))
            {
                echo "上傳成功";
            }
            else
            {
                echo "上傳失敗";
            }
        ?>
    </p>
</body>
</html>
