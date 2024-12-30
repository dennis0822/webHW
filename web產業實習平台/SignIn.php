<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3; url=LogIn.html">
    <title>Document</title>
</head>
<body>
    <p align=center>
        <?php
            $ID = $_POST['ID'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $birthday = $_POST['birthday'];
            $permissions = $_POST['permissions'];
            $school = $_POST['school'];
            $address = $_POST['address'];

            $link = mysqli_connect('localhost', 'root', '', 'IndustrialPlatform');
            //Step 3
            $sql = "insert into login (ID, name, email, password, phone, birthday, permissions, school, address) values ('$ID', '$name', '$email', '$password', '$phone', '$birthday', '$permissions', '$school', '$address')";
            $sql2 ="insert into subscribe (ID) values ('$ID')"
            // Step 4
            if (mysqli_query($link, $sql))
            {
                echo "註冊成功";
            }
            else
            {
                echo "註冊失敗";
            }
        ?>
    </p>
</body>
</html>