<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3; url=index.php">
    <title>Document</title>
</head>
<body>
    <p align=center>
        <?php
          session_start();
          $ID = $_POST['ID'];
          $password = $_POST['password'];
          $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');
          $sql = "select * from login where ID='$ID' and password ='$password'";
          $rs = mysqli_query($link, $sql);
          if ($record = mysqli_fetch_assoc($rs))
          {
            $_SESSION['ID'] = $record['ID'];
            $_SESSION['user'] = $record['name'];
            $_SESSION['permissions'] = $record['permissions'];
            header('location:index.php?method=message&message=登入成功');
          }
          else
          {
            header('location:index.php?method=message&message=登入失敗');
          }
        ?>
    </p>
</body>
</html>