<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../admin.css">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link href='https://fonts.googleapis.com/css?family=Monoton' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
</head>
<body>
    <div id="particles-js">
        <div class="row top w-100">
            <div class="twelve column">
                <div class="logo" style="width: max-content"><a class="nav-link text-white" href="../../khach-hang/index.php"><img class="logo-shop" src="../../image/logo2.jpg" alt=""> Pet Shop</a></div>
            </div>
        </div>
        <div class="dashboard">
            <div class="menu text-white">
                <div class="bg-dark myshop"><h3>Dashboard</h3></div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="../index.php">Thông tin của tôi</a></li>
                    <li class="nav-item dropdown">
                        <span class="nav-link dropdown-toggle"id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Loại hàng hóa</span>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="ShowCategory.php">Xem tất cả</a>
                            <a class="dropdown-item" href="CreateForm.php">Thêm loại hàng</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <span class="nav-link dropdown-toggle"id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hàng hóa</span>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../product/ShowProduct.php">Xem tất cả</a>
                            <a class="dropdown-item" href="../product/CreateForm.php">Thêm sản phẩm</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link text-white" href="../order/ShowOrder.php">Đơn đặt hàng</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="../bill/ShowBill.php">Xem hóa đơn</a></li>
                </ul>
            </div>
            <div class="container w-100" style="height: max-content;">
                <div class="bg-dark text-white myshop"><h3>Cập nhật loại hàng hóa</h3></div>
                <div class="w-50" style="margin:auto;">
                <?php
                    require_once('../../database/Connection.php');

                    $sql = "SELECT * FROM loaihanghoa WHERE MaLoaiHang=".$_GET['id']."";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);

                        echo '<form action="UpdateCategory.php?id='.$row['MaLoaiHang'].'" method="post">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Tên loại hàng</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" placeholder="Tên loại hàng" value="'.$row['TenLoaiHang'].'" required>
                                </div>
                            </div>
                            <div style="margin-left:150px;"><button type="submit" class="btn btn-primary">Cập nhật</button></div>
                        </form>
                        <div style="margin-left:150px;"><a href="ShowCategory.php"><button class="btn btn-dark mt-3">Trở về</button></a></div>';
                    }

                    mysqli_close($conn);
                ?>
                </div>
            </div>
        </div>
    </div>
    <script src="../admin.js"></script>
</body>
</html>