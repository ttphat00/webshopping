<?php
    require_once('../../database/Connection.php');

    if(isset($_POST['name'])){
        $sql = "INSERT INTO loaihanghoa (TenLoaiHang) VALUES ('".$_POST['name']."')";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Thêm loại hàng thành công");</script>';
        } else {
            echo '<script>alert("Đã xảy ra lỗi trong quá trình thêm");</script>';
        }
    }

    mysqli_close($conn);
    
    echo '<script>window.location="./CreateForm.php";</script>';
?>