<?php
    require_once('../../database/Connection.php');

    $sql1 = "SELECT * FROM nhanvien";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) > 0) {
        $row = mysqli_fetch_assoc($result1);

        $sql2 = "UPDATE dathang SET MSNV=".$row['MSNV'].", NgayGH='".$_POST['delivery_date']."', TrangThaiDH='Thành công' WHERE MSKH=".$_GET['id']."";

        if (mysqli_query($conn, $sql2)) {
            echo '<script>alert("Xác nhận đơn hàng thành công");</script>';
        } else {
            echo '<script>alert("Ngày giao hàng phải >= Ngày đặt hàng");</script>';
        }
    }else{
        echo '<script>alert("Bạn chưa có thông tin cá nhân nên không thể thực hiện chức năng này");</script>';
    }

    mysqli_close($conn);

    echo '<script>window.location = "./ShowOrder.php";</script>';
?>