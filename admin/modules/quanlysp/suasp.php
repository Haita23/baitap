<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Admin</title>
    <style>
        .pagination a {
            border: 1px solid black;
            padding: 5px;

        }
    </style>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;"> Trang quản trị danh mục </h1>
        <form action="lietke.php" method="post" enctype="multipart/form-data">
            Nhập vào tên sản phẩm:
            <input class="form-control" type="text" name="tensanpham">
            <br>
            Nhập vào giá sản phẩm:
            <input class="form-control" type="text" name="giasanpham">
            <br>
            Chọn ảnh:
            <input class="form-control" type="file" name="hinhanhsanpham">
            <br>
            <input type="submit" class="btn btn-primary" name="btn_insert" value="Them moi">
        </form>
        <div class="row">
            <div class="col-6">
                <form action="">
                    <input type="text" name="txt_search" placeholder="Nhập vào tên sản phẩm..."
                        style="height: 36px; margin-top: 10px;">
                    <a href="#" class="btn btn-success">Search</a>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php
                // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                $result = mysqli_query($conn, 'select count(id_sanpham) as total from tbl_sanpham');
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];

                // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 3;

                // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                // tổng số trang
                $total_page = ceil($total_records / $limit);

                // Giới hạn current_page trong khoảng 1 đến total_page
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                } else if ($current_page < 1) {
                    $current_page = 1;
                }

                // Tìm Start
                $start = ($current_page - 1) * $limit;
                ?>
                <table class="table table-stripped">
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Ảnh</th>
                        <th> </th>
                        <th> </th>
                        <th>Lựa chọn</th>
                    </tr>
                    <form action="lietke.php" method="post">
                        <input type="submit" value="xoa theo chon" name="delete_check" class="btn btn-info">
                        <input type="submit" value="xoa toan bo" name="delete_all" class="btn btn-danger">
                    </form>
                    
            </div>
        </div>
    </div>

</body>

</html>