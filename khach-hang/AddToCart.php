<?php
    require_once('../database/Connection.php');

    if(isset($_GET['id'])){
        $sql1 = "SELECT * FROM hanghoa WHERE MSHH=".$_GET['id']."";
        $result1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result1) > 0) {
            $row1 = mysqli_fetch_assoc($result1);
            if($row1['SoLuongHang'] > 0){
                $sql2 = "SELECT * FROM giohang WHERE MSHH=".$_GET['id']."";
                $result2 = mysqli_query($conn, $sql2);

                if (mysqli_num_rows($result2) > 0) {
                    echo '<script>alert("Không thể thêm. Sản phẩm này đã có trong giỏ hàng.");</script>';
                } else {
                    $sql3 = "INSERT INTO giohang VALUES (".$_GET['id'].", ".$_POST['product-quantity'].")";
    
                    if (mysqli_query($conn, $sql3)) {
                        echo '<script>alert("Thêm vào giỏ hàng thành công");</script>';
                    } else {
                        echo '<script>alert("Đã xảy ra lỗi trong quá trình thêm vào giỏ hàng");</script>';
                    }
                }
            }else{
                echo '<script>alert("Sản phẩm này đã bán hết");</script>';
            }
        } else {
            echo "0 results";
        }
    }
    
    mysqli_close($conn);
    echo '<script>window.location = "./Product.php?id='.$_GET['id'].'";</script>';
?>