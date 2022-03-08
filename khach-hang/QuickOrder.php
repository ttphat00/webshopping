<?php
    require_once('../database/Connection.php');

    $ddh = '';
    if (mysqli_query($conn, "INSERT INTO khachhang(HoTenKH, TenCongTy, SoDienThoai, SoFax) VALUES ('".$_POST['name']."', '".$_POST['cty_name']."', '".$_POST['phone']."', '".$_POST['fax']."')")) {

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM khachhang ORDER BY MSKH DESC")) > 0) {
            $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM khachhang ORDER BY MSKH DESC"));

            if (mysqli_query($conn, "INSERT INTO diachikh (DiaChi, MSKH) VALUES ('".$_POST['address']."', ".$row['MSKH'].")")) {

                $date = getdate();
                if (mysqli_query($conn, "INSERT INTO dathang (MSKH, NgayDH) VALUES (".$row['MSKH'].", '".$date['year']."-".$date['mon']."-".$date['mday']."')")) {
                    
                    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM dathang ORDER BY SoDonDH DESC")) > 0) {
                        $r = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM dathang ORDER BY SoDonDH DESC"));
                        $ddh = $r['SoDonDH'];
                    } else {
                        echo "0 results";
                    }

                } else {
                    echo '<script>alert("Đã xảy ra lỗi");</script>';
                }

            } else {
                echo '<script>alert("Đã xảy ra lỗi");</script>';
            }

        } else {
            echo "0 results";
        }

    } else {
        echo '<script>alert("Đã xảy ra lỗi");</script>';
    }
        
    $slm = (int)$_POST['quantity'];
    $quantity = 0;

    $sql = "SELECT * FROM hanghoa WHERE MSHH=".$_GET['id']."";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $rows = mysqli_fetch_assoc($result);
        $quantity = (int)$rows['SoLuongHang'];
    } else {
        echo "0 results";
    }

    $remaining_amount = $quantity - $slm;

    if (mysqli_query($conn, "INSERT INTO chitietdathang VALUES (".$ddh.", ".$_GET['id'].", ".$_POST['quantity'].", ".$_POST['sum_cost'].", 0)")) {
        
        if (mysqli_query($conn, "UPDATE hanghoa SET SoLuongHang=".$remaining_amount." WHERE MSHH=".$_GET['id']."")) {
            echo '<script>alert("Đặt hàng thành công");</script>';
        } else {
            echo '<script>alert("Đặt hàng thất bại");</script>';
        }

    } else {
        echo '<script>alert("Đặt hàng thất bại");</script>';
    }

    mysqli_close($conn);
    
    echo '<script>window.location = "./Product.php?id='.$_GET['id'].'";</script>';
?>