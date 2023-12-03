<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    include("header_infor.php");
    ?>
    <div id="quick-review">
        <div class="fruild-container">
            <div class="quick-view-product" id="quick-view-product">
                <div class="block-quickview primary_block details-product">

                    <div class="row">
                        <div class="product-left-column product-images col-xs-12 col-sm-4 col-md-4 col-lg-6 col-xl-6">
                            <div class="qvx">
                                <div class="image-block large-image col_large_default avalible">
                                    <div class="view_full_size">
                                        <a href="#">
                                            <img src="../image/kiwi.png" alt="" class="img-product">
                                        </a>
                                    </div>
                                    <div class="list_view_full_size">
                                        <div><img src="../image/kiwi.png" alt=""></div>
                                        <div><img src="./Kiwi/Kiwi.jpg" alt=""></div>
                                        <div><img src="./Kiwi/kiwi1.png" alt=""></div>
                                        <div><img src="./Kiwi/kiwi_1.png" alt=""></div>
                                        <div><img src="./Kiwi/trai-kiwi.jpg" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product-center-column product-info product-item col-xs-12 col-sm-6 col-md-8 col-lg-6 col-xl-6 details-pro style_product style_border"
                            id="product-17617027">
                            <div class="infor">
                                <h2>Thông tin người nhận</h2>
                                <form action="#">
                                    <div class="form-group">
                                        <label for="name">Họ tên
                                            người nhận:</label>
                                        <input type="name" class="form-control" id="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Số
                                            điện thoại:</label>
                                        <input type="phone" class="form-control" id="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Địa
                                            chỉ nhận
                                            hàng:</label>
                                        <input type="address" class="form-control" id="address" required>
                                    </div>
                                    <button type="submit" class="btn btn-default">Mua
                                        ngay</button>
                                </form>
                                <div class="buy-amount">
                                    <button class="minus-btn" onclick="handleMinus()"><i
                                            class="fa-solid fa-minus"></i></button>
                                    <input type="text" name="amount" id="amount" value="1">
                                    <button class="plus-btn" onclick="handlePlus()"><i
                                            class="fa-solid fa-plus"></i></button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
<script src="../script/script0/buyAmount.js"></script>
<script src="../script/script0/listimg.js"></script>
<script src="../script/script0/show_hide.js"></script>

</html>