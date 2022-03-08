<?php
    require_once('../../database/Connection.php');

    if(isset($_GET['id']) && isset($_GET['name'])){
        $sql = "DELETE FROM hinhhanghoa WHERE MSHH=".$_GET['id']."";

        if (mysqli_query($conn, $sql)) {
            if (mysqli_query($conn, "DELETE FROM hanghoa WHERE MSHH=".$_GET['id']."")) {
                if(unlink('upload/'.$_GET['name'].'')){
                    echo '<script>alert("Xóa hàng hóa thành công");</script>';
                }else{
                    echo '<script>alert("Đã xảy ra lỗi trong quá trình xóa");</script>';
                }
            } else {
                echo '<script>alert("Không thể xóa do ràng buộc khóa ngoại");</script>';
            }
        } else {
            echo '<script>alert("Đã xảy ra lỗi trong quá trình xóa");</script>';
        }
    }
    
    mysqli_close($conn);
    
    echo '<script>window.location="ShowProduct.php";</script>';
?>