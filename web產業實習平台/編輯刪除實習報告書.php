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
            if (isset($_SESSION['permissions']) && $_SESSION['permissions'] == '系所秘書') {
                $method = isset($_GET['method']) ? $_GET['method'] : '';
                if(empty($method))
                {   
                    $sr_id = $_POST['sr_id'];
                    $name = $_POST['name'];
                    $sr_title = $_POST['sr_title'];
                    $sr_company = $_POST['sr_company'];
                    $sr_content = $_POST['sr_content'];
                    $start_date = $_POST['start_date'];
                    $end_date = $_POST['end_date'];

                    $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');
                    $sql = "update studentreport sr_title='$sr_title', sr_company='$sr_company', sr_content='$sr_content', start_date='$start_date', end_date='$end_date'";
                    if (mysqli_query($link, $sql))
                    {
                        echo "修改完成";
                        header("Location: search.php");
                    }
                    else
                    {
                        echo "修改失敗";
                        header("Location: search.php");
                    }
                }       
                elseif($method=="delete")
                {
                    $sr_id = $_GET['sr_id'];
                    $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');
                    $sql = "delete from studentreport where sr_id = '$sr_id'";
                    if(mysqli_query($link, $sql))
                    {
                        echo "刪除完成";
                        header("Location: search.php");
                    }
                    else
                    {
                        echo "刪除失敗";
                        header("Location: search.php");
                    }
                }
            }
            if (isset($_SESSION['permissions']) && $_SESSION['permissions'] == '學生') {
                $method = isset($_GET['method']) ? $_GET['method'] : '';
                if(empty($method))
                {   
                    $sr_id = $_POST['sr_id'];
                    $name = $_POST['name'];
                    $sr_title = $_POST['sr_title'];
                    $sr_company = $_POST['sr_company'];
                    $sr_content = $_POST['sr_content'];
                    $start_date = $_POST['start_date'];
                    $end_date = $_POST['end_date'];

                    $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');
                    $sql = "update studentreport sr_title='$sr_title', sr_company='$sr_company', sr_content='$sr_content', start_date='$start_date', end_date='$end_date'";
                    if (mysqli_query($link, $sql))
                    {
                        echo "修改完成";
                        header("Location: user.php");
                    }
                    else
                    {
                        echo "修改失敗";
                        header("Location: user.php");
                    }
                }       
                elseif($method=="delete")
                {
                    $sr_id = $_GET['sr_id'];
                    $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');
                    $sql = "delete from studentreport where sr_id = '$sr_id'";
                    if(mysqli_query($link, $sql))
                    {
                        echo "刪除完成";
                        header("Location: user.php");
                    }
                    else
                    {
                        echo "刪除失敗";
                        header("Location: user.php");
                    }
                }
            }
        ?>
    </p>
</body>
</html>