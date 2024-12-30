<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3; url=news.php">
    <title>Document</title>
</head>
<body>
    <p align=center>
        <?php
            $n_id = $_POST['n_id'];
            $n_title = $_POST['n_title'];
            $n_company = $_POST['n_company'];
            $n_date = $_POST['n_date'];
            $n_adress = $_POST['n_adress'];
            $n_content = $_POST['n_content'];
            $i_name = $_POST['i_name'];
            $it_name = $_POST['it_name'];


            $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');
            //Step 3
            $sql = "insert into news (n_id, n_title, n_company, n_date, n_adress, n_content, i_name, it_name) values ('$n_id', '$n_title', '$n_company', '$n_date', '$n_adress', '$n_content', '$i_name', '$it_name')";
            // Step 4
            if (mysqli_query($link, $sql))
            {
                echo "新增完成";
            }
            else
            {
                echo "新增失敗";
            }
        ?>
    </p>
</body>
</html>