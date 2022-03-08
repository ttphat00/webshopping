<?php
    require_once('../database/Connection.php');

    $sql = "DELETE FROM giohang WHERE MSHH=".$_GET['id']."";

    if (mysqli_query($conn, $sql)) {
        echo '';
    } else {
        echo '<script>alert("Đã xảy ra lỗi");</script>';
    }

    mysqli_close($conn);
    
    echo '<script>window.location = "./Cart.php";</script>';
?>