<?php
require("../config.php");
if(isset($_POST["register"])){
    $username = $_POST["txt_username"];
    $password = $_POST["txt_password"];
    $re_password = $_POST["txt_password_re"];
    if($password!=$re_password){
        echo "Mật khẩu nhập lại không trùng khớp";
    }
    else{
        $sql = "SELECT * from tbl_admin where  username = '" . $username . "' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "Tên đăng nhập đã tồn tại bạn cần nhập tên đăng nhập mới";
        }
        else{
            $sql_insert = "INSERT INTO tbl_admin(username, password) values ('".$username."','".$password."')";
            if(mysqli_query($conn, $sql_insert)) {
                // echo "Đã thêm thành công";
                header("location:login.php");
            }
            else{
                echo "Error:" .$sql_insert."<br>" .mysqli_error($conn);
            }
        }
    }
}
?>

<html>
    <head>
       <link rel="stylesheet" href="bootstrap.min.css">
       <style>
        input {
            width: 35em;
            height: 2em;
            display: block;
        }
        .signup{
            width: 467px;
            margin: 0 auto;
            display: block;
        }
        a{
            color: #000;
        }
        .btn-primary{
            background-color: rgb(19, 202, 77);
            border: none;
        }
        .btn-primary:hover{
            background-color: rgb(25, 214, 85);
            color: #fff;
        }
       </style>
    </head>

    <body>
        <div class="signup">
            <h1 style="text-align: center;">Trang đăng ký tài khoản quản trị</h1>
            <form action="register.php" method="post">
                Nhập tên đăng nhập:
                <input type="text" name="txt_username" class="form-control" style="margin-top: 5px;">
                <br>
                Nhập vào mật khẩu:
                <input type="password" name="txt_password" class="form-control" style="margin-top: 5px;">
                <br>
                Nhập lại mật khẩu:
                <input type="password" name="txt_password_re" class="form-control" style="margin-top: 5px;">
                <br>
                <input type="submit" value="Đăng ký tài khoản" name="register" class="btn btn-primary">
            </form>
            <a href="login.php">Bạn đã có tài khoản?</a>
        </div>
    </body>
</html>