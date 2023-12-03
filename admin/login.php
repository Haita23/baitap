<?php
require("../config.php");
session_start();

if (isset($_POST["login"])) {
    $username = $_POST["txt_username"];
    $password = $_POST["txt_password"];
    $sql = "SELECT * from tbl_admin where username = '" . $username . "' and password = '" . $password . "' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        //echo "xin chào" . $user_name;
        $_SESSION["username"] = $username;

        header("location:modules/quanlysp/lietke.php");
    } else {
        echo "Đăng nhập thất bại";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login</title>
    <link rel="stylesheet" href="./css/signup_login.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <style>
        input {
            width: 33em;
            height: 2em;
            display: block;
        }

        .login { 
            width: 450px;
            margin: 0 auto;
            display: block;
        }
        .btn-primary{
            background-color: rgb(19, 202, 77);
            border: none;
        }
        .btn-primary:hover{
            background-color: rgb(25, 214, 85);
            color: #fff;
        }
        a{
            color: #000;
        }
    </style>
</head>

<body>

    <div class="login">
        <div class="login__container">
            <h1>Đăng Nhập Quản Trị Danh Mục</h1>
            <form action="login.php" method="post">
                Nhập vào tên đăng nhập:
                <input class="form-control" type="text" name="txt_username" id="" style="margin-top: 5px;">
                <br>
                Nhập vào mật khẩu:
                <input class="form-control" type="password" name="txt_password" style="margin-top: 5px;">
                <br>
                <input type="submit" value="Đăng nhập" name="login" class="btn btn-primary" >
            </form>
            <a href="register.php">Bạn chưa có tài khoản?</a>
        </div>
    </div>
</body>
<script src="./script/login.js"></script>

</html>