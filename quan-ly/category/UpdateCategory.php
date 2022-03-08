<?php
    require_once('../../database/Connection.php');

    if(isset($_POST['name']) && isset($_GET['id'])){
        $sql = "UPDATE loaihanghoa SET TenLoaiHang='".$_POST['name']."' WHERE MaLoaiHang=".$_GET['id']."";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Cập nhật loại hàng thành công");</script>';
        } else {
            echo '<script>alert("Đã xảy ra lỗi trong quá trình cập nhật");</script>';
        }
    }

    mysqli_close($conn);
    
    echo '<script>window.location="./ShowCategory.php";</script>';
?>