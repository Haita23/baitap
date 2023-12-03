<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="admin/modules/quanlydonhang/style.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>FREEDOM</title>
    <script>
        $(document).ready(function () {
            $('#toggle').click(function () {
                $('.header_nav ul').slideToggle();
            })
        })
    </script>
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
                            <li><a href="index.php">TRANG CHỦ</a></li>
                            <div class="input-group" style="width: 555px" onkeyup="searchfunc()">
                                <div class="form-outline" style="display: flex; justify-content: center;">
                                    <input type="search" id="inp-search" class="form-control"
                                        placeholder="Bạn muốn tìm gì?" style="border-radius: 1px;">
                                    <button type="button" class="btn btn-primary " id="search" >
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
</body>
<script src="./script/script0/listimg.js"></script>
<script src="./script/script0/buyAmount.js"></script>
<script src="./script/script0/show_hide.js"></script>

<script src="./script/script1/listimg.js"></script>
<script src="./script/script1/buyAmount.js"></script>
<script src="./script/script1/show_hide.js"></script>

<script src="./script/search.js"></script>
</html>