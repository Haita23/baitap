<?php
require("../quanlysp/config.php");
session_start();
if (!isset($_SESSION['giohang']))
    $_SESSION['giohang'] = [];
//làm rỗng giỏ hàng
if (isset($_GET['delcart']) && ($_GET['delcart'] == 1))
    unset($_SESSION['giohang']);
//xóa sp trong giỏ hàng
if (isset($_GET['delid']) && ($_GET['delid'] >= 0)) {
    array_splice($_SESSION['giohang'], $_GET['delid'], 1);
}
//lấy dữ liệu từ form
if (isset($_POST['addcart']) && ($_POST['addcart'])) {
    $hinh = $_POST['hinh'];
    $tensp = $_POST['tensp'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];

    //kiem tra sp co trong gio hang hay khong?

    $fl = 0; //kiem tra sp co trung trong gio hang khong?

    for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {

        if ($_SESSION['giohang'][$i][1] == $tensp) {
            $fl = 1;
            $soluongnew = $soluong + $_SESSION['giohang'][$i][3];
            $_SESSION['giohang'][$i][3] = $soluongnew;
            break;

        }

    }
    //neu khong trung sp trong gio hang thi them moi
    if ($fl == 0) {
        //them moi sp vao gio hang
        $sp = [$hinh, $tensp, $gia, $soluong];
        $_SESSION['giohang'][] = $sp;
    }

    // var_dump($_SESSION['giohang']);
}

function showgiohang()
{
    if (isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))) {
        if (sizeof($_SESSION['giohang']) > 0) {
            $tong = 0;
            for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
                $tt = $_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                $tong += $tt;
                echo '<tr>
                            <td>' . ($i + 1) . '</td>
                            <td><img src="../../../image/' . $_SESSION['giohang'][$i][0] . '" alt=""></td>
                            <td>' . $_SESSION['giohang'][$i][1] . '</td>
                            <td>' . $_SESSION['giohang'][$i][2] . '</td>
                            <td>' . $_SESSION['giohang'][$i][3] . '</td>
                            <td>
                                <div>' . $tt . '</div>
                            </td>
                            <td>
                                <a href="cart.php?delid=' . $i . '">Xóa</a>
                            </td>
                        </tr>';
            }
            echo '<tr>
                        <th colspan="5">Tổng đơn hàng</th>
                        <th>
                            <div>' . $tong . '</div>
                        </th>
    
                    </tr>';
        } else {
            //echo "Giỏ hàng rỗng!";
        }
    }
}


//kiểm tra xem người dùng đã click vào nút insert
if (isset($_POST["dongydathang"])) {
    //lấy ra giá trị được nhập vào text
    $hoten = $_POST['hoten'];
    $diachi = $_POST['diachi'];
    $dienthoai = $_POST['dienthoai'];
    $email = $_POST['email'];
    $sql = "INSERT INTO tbl_thongtinKH(TenKH, DiachiKH, SodtKH,EmailKH) VALUES  ('$hoten', '$diachi', '$dienthoai', '$email')";
    if (mysqli_query($conn, $sql)) {
        header("Location: cart.php");
        // echo "Records inserted successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart | View Cart</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="admin/modules/quanlydonhang/style.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
        .row>*{
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div id="header">
        <div class="fruild-container">
            <div class="row">
                <div class="col-2">
                    <div class="logo">
                        Freedom
                    </div>
                </div>
                <div id="toggle">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="col-10">

                    <div class="header_nav">

                        <ul>
                            <li><a href="../../../index.php">TRANG CHỦ</a></li>
                            <div class="input-group" style="width: 555px" onkeyup="searchfunc()">
                                <div class="form-outline" style="display: flex; justify-content: center;">
                                    <input type="search" id="inp-search" class="form-control"
                                        placeholder="Bạn muốn tìm gì?" style="border-radius: 1px;">
                                    <button type="button" class="btn btn-primary " id="search">
                                        <i class="fas fa-search" style="font-size: 18px; margin: 5px;"></i>
                                    </button>
                                </div>

                            </div>
                            <li>
                                <a href="admin/modules/quanlydonhang/cart.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" style="width: 45px;"
                                        fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                        <path
                                            d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z">
                                        </path>
                                    </svg>
                                </a>
                            </li>
                            <li><a href="../signup.php" style="margin-right: 10px;margin-left: 15px">ĐĂNG KÝ</a></li>
                            <li><a href="../admin/login.php">ĐĂNG NHẬP</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="boxcenter boxcenter1">
        <div class="row mb ">
            <div class="boxtrai mr" id="bill">
                <div class="row">
                    <h1>THÔNG TIN NHẬN HÀNG</h1>
                    <form action="cart.php" method="post" enctype="multipart/form-data" class="thongtinnhanhang">
                       
                        Họ và tên người nhận:
                        <input class="form-control" type="text" name="hoten" required>
                        <br>
                        Địa chỉ người nhận:
                        <input class="form-control" type="text" name="diachi" required>
                        <br>
                        Số điện thoại người nhận:
                        <input class="form-control" type="text" name="dienthoai" required>
                        <br>
                        Email người nhận:
                        <input type="text" class="form-control" name="email" required>
                        <br>
                    </form>
                </div>
                <div class="row mb">
                    <h1>GIỎ HÀNG</h1>
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Hình</th>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                        <?php showgiohang(); ?>
                        
                    </table>
                </div>
                <div class="row mb row11">
                    <input type="button" value="ĐỒNG Ý ĐẶT HÀNG" name="dongydathang">
                    <a href="cart.php?delcart=1"><input type="button" value="XÓA GIỎ HÀNG"></a>
                    <a href="../../../index.php"><input type="button" value="TIẾP TỤC ĐẶT HÀNG"></a>
                </div>
            </div>
        </div>
    </div>

<!-- Thêm mã JavaScript -->
<script>
    document.getElementById("submitBtn").addEventListener("click", function() {
        // Thực hiện các hành động khi nút được nhấn
        alert("Đã nhấn nút ĐỒNG Ý ĐẶT HÀNG");
        // Thêm mã xử lý khác nếu cần
    });
</script>
</body>

</html>