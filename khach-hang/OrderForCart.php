<?php
    require_once('../database/Connection.php');

    $sql = "SELECT hanghoa.MSHH,TenHH,Gia,SoLuongHang,SoLuongMua FROM hanghoa,giohang WHERE hanghoa.MSHH=giohang.MSHH";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

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

        $sum_cost = 0;
        $status = false;
        while($rows = mysqli_fetch_assoc($result)) {
            $slm = (int)$rows['SoLuongMua'];
            $cost = (int)$rows['Gia'];
            $sum_cost = $slm * $cost;
            $quantity = (int)$rows['SoLuongHang'];
            $remaining_amount = $quantity - $slm;

            if (mysqli_query($conn, "INSERT INTO chitietdathang VALUES (".$ddh.", ".$rows['MSHH'].", ".$rows['SoLuongMua'].", ".$sum_cost.", 0)")) {
                
                if (mysqli_query($conn, "UPDATE hanghoa SET SoLuongHang=".$remaining_amount." WHERE MSHH=".$rows['MSHH']."")) {
                    $status = true;
                } else {
                    $status = false;
                    break;
                }

            } else {
                $status = false;
                break;
            }
        }

        if($status){

            if (mysqli_query($conn, "DELETE FROM giohang")) {
                echo '<script>alert("Đặt hàng thành công");</script>';
            } else {
                echo '<script>alert("Đặt hàng thất bại");</script>';
            }

        }else echo '<script>alert("Đặt hàng thất bại");</script>';

    } else {
        echo '<script>alert("Không có hàng hóa trong giỏ hàng");</script>';
    }

    mysqli_close($conn);
    
    echo '<script>window.location = "index.php";</script>';
?>