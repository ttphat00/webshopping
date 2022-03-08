<?php
    require_once('../database/Connection.php');

    $sql = "SELECT * FROM nhanvien";
    $result = mysqli_query($conn, $sql);
    $name = '';
    $position = '';
    $address = '';
    $phone = '';

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['HoTenNV'];
        $position = $row['ChucVu'];
        $address = $row['DiaChi'];
        $phone = $row['SoDienThoai'];
    }

    mysqli_close($conn);
?>