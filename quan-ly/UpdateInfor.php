<?php
    require_once('../database/Connection.php');

    if(isset($_POST['name'])){
        $sql = "SELECT * FROM nhanvien";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['MSNV'];
            //update
            if (mysqli_query($conn, "UPDATE nhanvien SET HoTenNV='".$_POST['name']."', ChucVu='".$_POST['position']."', DiaChi='".$_POST['address']."', SoDienThoai='".$_POST['phone']."' WHERE MSNV=".$id."")) {
                echo "Updated successfully";
            } else {
                echo "Error updating: " . mysqli_error($conn);
            }
        } else {
            //insert
            if (mysqli_query($conn, "INSERT INTO nhanvien(HoTenNV,ChucVu,DiaChi,SoDienThoai) VALUES ('".$_POST['name']."', '".$_POST['position']."', '".$_POST['address']."', '".$_POST['phone']."')")) {
                echo "Created successfully";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }

    mysqli_close($conn);

    header('location: index.php');
?>