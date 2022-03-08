<?php
    require_once('../../database/Connection.php');

    if(isset($_GET['id'])){
        $sql = "DELETE FROM loaihanghoa WHERE MaLoaiHang=".$_GET['id']."";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Xóa loại hàng thành công");</script>'; 
        } else {
            echo '<script>alert("Không thể xóa do ràng buộc khóa ngoại");</script>';
        }
    }
    
    mysqli_close($conn);
    
    echo '<script>window.location="ShowCategory.php";</script>';
?>