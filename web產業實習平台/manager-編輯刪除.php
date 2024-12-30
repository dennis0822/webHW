<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3; url=manager-最新公告.php">
    <title>Document</title>
</head>
<body>
    <p align=center>
        <?php
            $method = isset($_GET['method']) ? $_GET['method'] : '';
            if(empty($method))
            {   
                $n_id = $_POST['n_id'];
                $n_title = $_POST['n_title'];
                $n_company = $_POST['n_company'];
                $n_adress = $_POST['n_adress'];
                $n_date = $_POST['n_date'];
                $n_content = $_POST['n_content'];
                $i_name = $_POST['i_name'];
                $it_name = $_POST['it_name'];

                //Step 1
                $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');
                //Step 3
                $sql = "update news set n_title='$n_title', n_company='$n_company', n_date='$n_date', n_adress='$n_adress', n_content='$n_content', i_name='$i_name', it_name='$it_name'  where n_id='$n_id'";
                // Step 4
                if (mysqli_query($link, $sql))
                {
                    echo "修改完成";
                }
                else
                {
                    echo "修改失敗";
                }
            }       
            elseif($method=="delete")
            {
                $n_id = $_GET['n_id'];
                $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');
                $sql = "delete from news where n_id = '$n_id'";
                if(mysqli_query($link, $sql))
                {
                    echo "刪除完成";
                }
                else
                {
                    echo "刪除失敗";
                }
            }
        ?>
    </p>
</body>
</html>