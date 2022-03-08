<?php
    require_once('../../database/Connection.php');

    $sql1 = "SELECT hanghoa.MSHH,SoLuong,SoLuongHang FROM khachhang,dathang,chitietdathang,hanghoa WHERE khachhang.MSKH=dathang.MSKH AND dathang.SoDonDH=chitietdathang.SoDonDH AND chitietdathang.MSHH=hanghoa.MSHH AND khachhang.MSKH=".$_GET['idkh']."";
    $result = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $slc = (int)$row['SoLuongHang'];
            $slm = (int)$row['SoLuong'];
            $sl = $slc + $slm;

            $sql2 = "UPDATE hanghoa SET SoLuongHang=".$sl." WHERE MSHH=".$row['MSHH']."";

            if (mysqli_query($conn, $sql2)) {
                echo '';
            } else {
                echo '<script>alert("Đã xảy ra lỗi");</script>';
            }
        }

        $sql3 = "DELETE FROM diachikh WHERE MSKH=".$_GET['idkh']."";

        if (mysqli_query($conn, $sql3)) {

            $sql4 = "DELETE FROM chitietdathang WHERE SoDonDH=".$_GET['idddh']."";

            if (mysqli_query($conn, $sql4)) {
                
                $sql5 = "DELETE FROM dathang WHERE MSKH=".$_GET['idkh']."";

                if (mysqli_query($conn, $sql5)) {
                    
                    $sql6 = "DELETE FROM khachhang WHERE MSKH=".$_GET['idkh']."";

                    if (mysqli_query($conn, $sql6)) {
                        echo '<script>alert("Xóa đơn hàng thành công");</script>';
                    } else {
                        echo '<script>alert("Đã xảy ra lỗi");</script>';
                    }

                } else {
                    echo '<script>alert("Đã xảy ra lỗi");</script>';
                }

            } else {
                echo '<script>alert("Đã xảy ra lỗi");</script>';
            }
            
        } else {
            echo '<script>alert("Đã xảy ra lỗi");</script>';
        }
    }

    mysqli_close($conn);

    echo '<script>window.location = "./ShowOrder.php";</script>';
?>