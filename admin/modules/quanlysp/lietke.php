<?php
require('config.php');
require('themsp.php');
require('xoasp.php');
session_start();

//Thêm login:
if (!$_SESSION["user"]) {
    header("../login.php");
}
echo "Xin chào thành viên " . $_SESSION["user"];

?>

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
                    <?php

                    $sql = "select * from tbl_sanpham limit " . $start . "," . $limit;
                    $result = mysqli_query($conn, $sql);
                    // if (isset($_POST["btn_search"])) {
                    //     $sql = "SELECT id_sanpham, tensanpham, giasanpham, hinhanhsanpham FROM tbl_sanpham WHERE tensanpham LIKE '%" . $_POST["txt_search"] . "%'";
                    // } else
                    //     $sql = "SELECT id_sanpham, tensanpham, giasanpham, hinhanhsanpham FROM tbl_sanpham ORDER BY id_sanpham DESC";
                    // $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["id_sanpham"] . "</td>";
                            echo "<td>" . $row["tensanpham"] . "</td>";
                            echo "<td>" . $row["giasanpham"] . "</td>";
                            echo "<td>" . $row["hinhanhsanpham"] . " </td>";
                            echo "<td><a class='btn btn-danger' href='lietke.php?task=delete&id_sanpham=" . $row['id_sanpham'] . "'>Delete</a></td>";
                            echo "<td><a class='btn btn-primary' href='lietke.php?task=update&id_sanpham=" . $row['id_sanpham'] . "'>Edit</a></td>";
                            echo "</td>";
                            echo "<td>";
                            echo "<input type = 'checkbox' class='form-check-input' name='tensanpham[]' value = '" . $row['id_sanpham'] . "' >";
                            echo "</td>";
                            echo "</tr>";

                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                </table>
                <div class="pagination">
                    <?php
                    if ($current_page > 1 && $total_page > 1) {
                        echo '<a href="lietke.php?page=' . ($current_page - 1) . '">Trước</a> | ';
                    }

                    // Lặp khoảng giữa
                    for ($i = 1; $i <= $total_page; $i++) {
                        // Nếu là trang hiện tại thì hiển thị thẻ span
                        // ngược lại hiển thị thẻ a
                        if ($i == $current_page) {
                            echo '<span>' . $i . '</span> | ';
                        } else {
                            echo '<a href="lietke.php?page=' . $i . '">' . $i . '</a> | ';
                        }
                    }

                    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                    if ($current_page < $total_page && $total_page > 1) {
                        echo '<a href="lietke.php?page=' . ($current_page + 1) . '">Sau</a> | ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>