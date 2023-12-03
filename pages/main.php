<?php
// session_start();
// $logined=0;
// if(!isset($_SESSION['luottruycap'])) $_SESSION['luottruycap']=0;
// else $_SESSION['luottruycap']+=1;

// if(isset($_COOKIE['user'])&&isset($_COOKIE['pass'])){
//     echo "Cookie đã đăng ký là: ".$_COOKIE['user']." - ".$_COOKIE['pass'];
// }

// if(isset($_GET['delc'])&&($_GET['delc']==1)){
//     setcookie("user","",time()-(86400*7));
//     setcookie("pass","",time()-(86400*7));
//     echo "<br><font color='red'>Bạn đã xóa cookie</font>";
// }

if (isset($_POST['login']) && ($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if (($user == "demo") && ($pass == "demo")) {
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        $logined = 1;
        $msg = "<br><font color='blue'>Các bạn đăng nhập thành công</font>";
    } else {
        $logined = 0;
        $msg = "<br><font color='red'>Vui lòng đăng nhập</font>";
    }
    if (isset($_POST['ghinho']) && ($_POST['ghinho'])) {
        setcookie("user", $user, time() + (86400 * 7));
        setcookie("pass", $pass, time() + (86400 * 7));
        $msgcookie = "<br>Đã ghi nhận cookie!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <!-- <div class="giohang">
        <a href="cart.html"><img src="images/cart.png"><span id="countsp">0</span></a>
    </div> -->
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
                            <li><a href="index.php">TRANG CHỦ</a></li>
                            <div class="input-group" style="width: 555px" onkeyup="searchfunc()">
                                <div class="form-outline" style="display: flex; justify-content: center;">
                                    <input type="search" id="inp-search" class="form-control"
                                        placeholder="Bạn muốn tìm gì?" style="border-radius: 1px;">
                                    <button type="button" class="btn btn-primary " id="search">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>

                            </div>
                            <li>
                                <a href="../admin/modules/quanlydonhang/cart.php">
                                    <i class="fa fa-shopping-cart"></i>
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
    <div class="boxcenter">

        <div class="row mb ">
            <div class="information">
                <h2 style="text-align: center;margin-top: 20px;font-size: 28px;">Danh sách sản phẩm</h2>
                <img src="./image/logo/logo_lá.png" alt="" class="" style="text-align: center;margin-left: 330px;"> 
            </div>
            <div class="boxtrai mr">
                <div class="row">
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/1.png" alt=""></div>
                        <p><span>300.000</span>₫/kg</p>
                        <p>Nho Mỹ</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Nho Mỹ">
                            <input type="hidden" name="gia" value="300000">
                            <input type="hidden" name="hinh" value="1.png">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/2.png" alt=""></div>
                        <p><span>85.000</span>₫/kg</p>
                        <p>Sầu riêng</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Sầu riêng">
                            <input type="hidden" name="gia" value="85000">
                            <input type="hidden" name="hinh" value="2.png">
                        </form>
                    </div>
                    <div class="boxsp ">
                        <div class="row img"><img src="image/3.jpg" alt=""></div>
                        <p><span>120.000</span>₫/kg</p>
                        <p>Dâu tây</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Dâu tây">
                            <input type="hidden" name="gia" value="120000">
                            <input type="hidden" name="hinh" value="3.jpg">
                        </form>
                    </div>
                    <div class="boxsp ">
                        <div class="row img"><img src="image/Chery_Mỹ.png" alt=""></div>
                        <p><span>600.000</span>₫/kg</p>
                        <p>Chery Mỹ</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Chery Mỹ ">
                            <input type="hidden" name="gia" value="600000">
                            <input type="hidden" name="hinh" value="Chery_Mỹ.png">
                        </form>
                    </div>
                    <div class="boxsp ">
                        <div class="row img"><img src="image/cam.png" alt=""></div>
                        <p><span>70.000</span>₫/kg</p>
                        <p>Quả cam</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Quả cam">
                            <input type="hidden" name="gia" value="70000">
                            <input type="hidden" name="hinh" value="cam.png">
                        </form>
                    </div>
                    <div class="boxsp ">
                        <div class="row img"><img src="image/Chanh_vàng.png" alt=""></div>
                        <p><span>100.000</span>₫/kg</p>
                        <p>Chanh vàng</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Chanh vàng">
                            <input type="hidden" name="gia" value="100000">
                            <input type="hidden" name="hinh" value="Chanh_vàng.png">
                        </form>
                    </div>
                    <div class="boxsp ">
                        <div class="row img"><img src="image/Dưa_hấu.jpg" alt=""></div>
                        <p><span>15.000</span>₫/kg</p>
                        <p>Dưa hấu</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Dưa hấu">
                            <input type="hidden" name="gia" value="15000">
                            <input type="hidden" name="hinh" value="Dưa_hấu.jpg">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/kiwi.png" alt=""></div>
                        <p><span>170.000</span>₫/kg</p>
                        <p>Kiwi</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Kiwi">
                            <input type="hidden" name="gia" value="170000">
                            <input type="hidden" name="hinh" value="kiwi.png">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/Lựu.jpg" alt=""></div>
                        <p><span>50.000</span>₫/kg</p>
                        <p>Quả lựu</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Quả lựu">
                            <input type="hidden" name="gia" value="50000">
                            <input type="hidden" name="hinh" value="Lựu.jpg">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/đu_đủ.jpg" alt=""></div>
                        <p><span>15.000</span>₫/kg</p>
                        <p>Đu đủ</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Đu đủ">
                            <input type="hidden" name="gia" value="15000">
                            <input type="hidden" name="hinh" value="đu_đủ.jpg">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/Táo.jpg" alt=""></div>
                        <p><span>25.000</span>₫/kg</p>
                        <p>Quả táo</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Quả táo">
                            <input type="hidden" name="gia" value="25000">
                            <input type="hidden" name="hinh" value="Táo.jpg">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/Xoài.jpg" alt=""></div>
                        <p><span>40.000</span>₫/kg</p>
                        <p>Quả xoài</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Quả xoài">
                            <input type="hidden" name="gia" value="40000">
                            <input type="hidden" name="hinh" value="Xoài.jpg">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/Ổi.jpg" alt=""></div>
                        <p><span>15.000</span>₫/kg</p>
                        <p>Quả ổi</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Quả ổi">
                            <input type="hidden" name="gia" value="15000">
                            <input type="hidden" name="hinh" value="Ổi.jpg">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/Thịt_lợn_xay.jpeg" alt=""></div>
                        <p><span>45.000</span>₫/hộp</p>
                        <p>Thịt lợn xay</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Thịt lợn xay">
                            <input type="hidden" name="gia" value="45000">
                            <input type="hidden" name="hinh" value="Thịt_lợn_xay.jpeg">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/Chân_giò.jpg" alt=""></div>
                        <p><span>42.000</span>₫/hộp</p>
                        <p>Chân giò</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Chân giò">
                            <input type="hidden" name="gia" value="42000">
                            <input type="hidden" name="hinh" value="Chân_giò.jpg">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/Chân_gà.jpg" alt=""></div>
                        <p><span>32.000</span>₫/hộp</p>
                        <p>Chân gà</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Chân gà">
                            <input type="hidden" name="gia" value="32000">
                            <input type="hidden" name="hinh" value="Chân_gà.jpg">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/Thịt_bò.jpeg" alt=""></div>
                        <p><span>50.000</span>₫/hộp</p>
                        <p>Thịt bò</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Thịt bò">
                            <input type="hidden" name="gia" value="50000">
                            <input type="hidden" name="hinh" value="Thịt_bò.jpeg">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/Ajinomoto.png" alt=""></div>
                        <p><span>34.000</span>₫/gói</p>
                        <p>Bột ngọt Ainomoto</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Bột ngọt Ajinomoto">
                            <input type="hidden" name="gia" value="34000">
                            <input type="hidden" name="hinh" value="Ajinomoto.png">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/Muối_i_ốt.png" alt=""></div>
                        <p><span>7.000</span>₫/gói</p>
                        <p>Muối I ốt</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Muối I ốt">
                            <input type="hidden" name="gia" value="7000">
                            <input type="hidden" name="hinh" value="Muối_i_ốt.png">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/Muối_tôm.png" alt=""></div>
                        <p><span>50.000</span>₫/gói</p>
                        <p>Muối tôm Như Ý</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Muối tôm Như Ý">
                            <input type="hidden" name="gia" value="50000">
                            <input type="hidden" name="hinh" value="Muối_tôm.png">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/Nam_ngư_nước_mắm.png" alt=""></div>
                        <p><span>38.000</span>₫/kg</p>
                        <p>Nước mắm Nam Ngư</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Nước nắm Nam Ngư">
                            <input type="hidden" name="gia" value="38000">
                            <input type="hidden" name="hinh" value="Nam_ngư_nước_mắm.png">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/Nước_mắm_knorr.png" alt=""></div>
                        <p><span>50.000</span>₫/kg</p>
                        <p>Nước mắm Korr</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Nước mắm Knorr">
                            <input type="hidden" name="gia" value="50000">
                            <input type="hidden" name="hinh" value="Nước_mắm_knorr.png">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/Nước_ép_cam.jpg" alt=""></div>
                        <p><span>30.000</span>₫/kg</p>
                        <p>Nước ép cam</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Nước ép cam">
                            <input type="hidden" name="gia" value="30000">
                            <input type="hidden" name="hinh" value="Nước_ép_cam.jpg">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/nước_ép_chanh_dây.jpg" alt=""></div>
                        <p><span>20.000</span>₫/kg</p>
                        <p>Nước ép chnh dây</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Nước ép chanh dây">
                            <input type="hidden" name="gia" value="20000">
                            <input type="hidden" name="hinh" value="nước_ép_chanh_dây.jpg">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/nước_ép_cà_rốt.jpg" alt=""></div>
                        <p><span>20.000</span>₫/kg</p>
                        <p>Nước ép cà rốt</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Nước ép cà rốt">
                            <input type="hidden" name="gia" value="20000">
                            <input type="hidden" name="hinh" value="nước_ép_cà_rốt.jpg">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/nước_ép_dâu.jpg" alt=""></div>
                        <p><span>25.000</span>₫/kg</p>
                        <p>Nước ép dâu</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Nước ép dâu">
                            <input type="hidden" name="gia" value="25000">
                            <input type="hidden" name="hinh" value="nước_ép_dâu.jpg">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/Nước_ép_dưa_hấu.jpg" alt=""></div>
                        <p><span>20.000</span>₫/kg</p>
                        <p>Nước ép dư hấu</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Nước ép dưa hấu">
                            <input type="hidden" name="gia" value="20000">
                            <input type="hidden" name="hinh" value="Nước_ép_dưa_hấu.jpg">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/nước_ép_dứa.jpg" alt=""></div>
                        <p><span>20.000</span>₫/kg</p>
                        <p>Nước ép dứa</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Nước ép dứa">
                            <input type="hidden" name="gia" value="20000">
                            <input type="hidden" name="hinh" value="nước_ép_dứa.jpg">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="image/Nước_ép_đào.jpg" alt=""></div>
                        <p><span>25.000</span>₫/kg</p>
                        <p>Nước ép đào</p>
                        <form action="admin/modules/quanlydonhang/cart.php" method="post">
                            <input type="number" name="soluong" min="1" max="10" value="1">
                            <input type="submit" name="addcart" value="Đặt hàng">
                            <input type="hidden" name="tensp" value="Nước ép đào">
                            <input type="hidden" name="gia" value="25000">
                            <input type="hidden" name="hinh" value="Nước_ép_đào.jpg">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>