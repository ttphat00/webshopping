<?php
    require_once('../../database/Connection.php');

    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo '<script>alert("File upload không phải file ảnh. Bạn hãy kiểm tra lại!");</script>';
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file)) {
        echo '<script>alert("Tên file đã tồn tại. Bạn hãy đổi tên file thành tên khác!");</script>';
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo '<script>alert("Bạn chỉ được upload file JPG, JPEG & PNG");</script>';
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo '<script>window.location="./CreateForm.php";</script>';
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            if(isset($_POST['category'])){
                $sql1 = "INSERT INTO hanghoa (TenHH,QuyCach,Gia,SoLuongHang,MaLoaiHang) VALUES ('".$_POST['name']."','".$_POST['description']."',".$_POST['cost'].",".$_POST['quantity'].",".$_POST['category'].")";
                
                if (mysqli_query($conn, $sql1)) {
                    $result = mysqli_query($conn, "SELECT * FROM hanghoa ORDER BY MSHH DESC");
        
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result); 
                        $id = $row['MSHH'];
                    }
        
                    $sql2 = "INSERT INTO hinhhanghoa (TenHinh,MSHH) VALUES ('".$_FILES["image"]["name"]."',".$id.")";
        
                    if (mysqli_query($conn, $sql2)) {
                        echo '<script>alert("Thêm hàng hóa thành công");</script>';
                    } else {
                        echo '<script>alert("Đã xảy ra lỗi trong quá trình thêm");</script>';
                    }
                } else {
                    echo '<script>alert("Đã xảy ra lỗi trong quá trình thêm");</script>';
                }
            }
        } else {
            echo '<script>alert("Đã xảy ra lỗi trong quá trình upload file");window.location="./CreateForm.php";</script>';
        }
    }
    
    mysqli_close($conn);
    
    echo '<script>window.location="./CreateForm.php";</script>';
?>