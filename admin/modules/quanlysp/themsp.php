<?php 
//kiểm tra xem người dùng đã click vào nút insert

if (isset($_POST["btn_insert"])) {
    // Kiểm tra xem đã có file được tải lên chưa
    if (isset($_FILES['hinhanhsanpham']) && $_FILES['hinhanhsanpham']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["hinhanhsanpham"]["name"]);

        // Kiểm tra định dạng của file
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowedFormats = array("jpg", "jpeg", "png", "gif");

        if (!in_array($fileType, $allowedFormats)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            // Di chuyển file vào thư mục upload
            if (move_uploaded_file($_FILES["hinhanhsanpham"]["tmp_name"], $target_file)) {
                // Nếu upload file thành công, thêm dữ liệu vào cơ sở dữ liệu
                $tensanpham = $_POST['tensanpham'];
                $giasanpham = $_POST['giasanpham'];
                $hinhanhsanpham = $target_file; // Lưu đường dẫn file vào cơ sở dữ liệu

                // Câu lệnh INSERT với đường dẫn file
                $sql = "INSERT INTO tbl_sanpham (tensanpham, giasanpham, hinhanhsanpham) 
                        VALUES ('$tensanpham', '$giasanpham', '$hinhanhsanpham')";

                if (mysqli_query($conn, $sql)) {
                    header("Location: lietke.php");
                    echo "Records inserted successfully.";
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file uploaded.";
    }
}

?>