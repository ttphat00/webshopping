<?php
    require_once('../../database/Connection.php');

    $sql = "UPDATE dathang SET MSNV=null, NgayGH=null, TrangThaiDH=null WHERE MSKH=".$_GET['idkh']."";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Hủy hóa đơn thành công");</script>';
    } else {
        echo '<script>alert("Đã xảy ra lỗi");</script>';
    }

    mysqli_close($conn);

    echo '<script>window.location = "./ShowBill.php";</script>'; 
?>