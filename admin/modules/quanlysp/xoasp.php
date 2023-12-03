<?php

// Xóa dữ liệu dựa trên ID được truyền qua tham số GET
if (isset($_GET["task"]) && $_GET["task"] == "delete") {
    if (isset($_GET["id_sanpham"])) {
        $id_sanpham = $_GET["id_sanpham"];
        $sql_delete = "DELETE FROM tbl_sanpham WHERE id_sanpham = $id_sanpham";
        if (mysqli_query($conn, $sql_delete)) {
            echo "Xóa thành công";
            // Điều hướng hoặc hiển thị thông báo xóa thành công
        } else {
            echo "ERROR: Could not able to execute $sql_delete. " . mysqli_error($conn);
        }
    } else {
        echo "Missing ID for deletion.";
    }
}

// Xóa dữ liệu dựa trên lựa chọn được chọn
if (isset($_POST["delete_check"])) {
    if (isset($_POST["tensanpham"]) && is_array($_POST["tensanpham"])) {
        $ids_to_delete = $_POST["tensanpham"];
        $ids_string = implode(",", $ids_to_delete); // Chuỗi các ID cần xóa

        $sql_delete = "DELETE FROM tbl_sanpham WHERE id_sanpham IN ($ids_string)";
        if (mysqli_query($conn, $sql_delete)) {
            echo "Xóa thành công";
            // Điều hướng hoặc hiển thị thông báo xóa thành công
        } else {
            echo "ERROR: Could not able to execute $sql_delete. " . mysqli_error($conn);
        }
    } else {
        echo "No items selected for deletion.";
    }
} 

// //xóa
// if (isset($_GET["task"]) && $_GET["task"] == "delete") {
//     $id_sanpham = $_GET["id_sanpham"];
//     $sql_delete = "DELETE FROM tbl_sanpham where id_sanpham = " . $id_sanpham;
//     if (mysqli_query($conn, $sql_delete)) {
//         echo "Xóa thành công";
//         // header("Location: category.php");
//         // echo "Records inserted successfully.";
//     } else {
//         echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
//     }
// }

// //delete check
// if (isset($_POST["delete_check"])) {
//     if (isset($_POST["tensanpham"])) {
//         $tensanpham = $_POST["tensanpham"];
//         // while ($row = mysqli_fetch_assoc($cate)) {
//         //     echo $cate;
//         // }
//         foreach ($cate as $c) {
//             $sql_delete = "DELETE FROM tbl_sanpham where id_sanpham = " . $c;
//             if (mysqli_query($conn, $sql_delete)) {

//             } else {
//                 echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
//             }
//         }
//     }
// }
?>