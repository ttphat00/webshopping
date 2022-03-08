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
                <div class="bg-dark myshop"><h3>My Shop</h3></div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="../index.php">Thông tin của tôi</a></li>
                    <li class="nav-item dropdown">
                        <span class="nav-link dropdown-toggle"id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Loại hàng hóa</span>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../category/ShowCategory.php">Xem tất cả</a>
                            <a class="dropdown-item" href="../category/CreateForm.php">Thêm loại hàng</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <span class="nav-link dropdown-toggle"id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hàng hóa</span>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../product/ShowProduct.php">Xem tất cả</a>
                            <a class="dropdown-item" href="../product/CreateForm.php">Thêm sản phẩm</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link text-white" href="ShowOrder.php">Đơn đặt hàng</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="../bill/ShowBill.php">Xem hóa đơn</a></li>
                </ul>
            </div>
            <div class="container w-100" style="height: max-content;">
                <div class="bg-dark text-white myshop"><h3>Xác nhận đơn đặt hàng</h3></div>
                <div class="w-75" style="margin:auto;">
                <?php
                    require_once('../../database/Connection.php');

                    $sql1 = "SELECT khachhang.MSKH,HoTenKH,TenCongTy,SoDienThoai,SoFax,DiaChi,NgayDH,NgayGH FROM khachhang,diachikh,dathang WHERE khachhang.MSKH=diachikh.MSKH AND khachhang.MSKH=dathang.MSKH AND khachhang.MSKH=".$_GET['id']."";
                    $result1 = mysqli_query($conn, $sql1);

                    if (mysqli_num_rows($result1) > 0) {
                        $row = mysqli_fetch_assoc($result1);
                        echo '<form action="ConfirmOrder.php?id='.$_GET['id'].'" method="post">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Tên khách hàng</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" value="'.$row['HoTenKH'].'" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cty_name" class="col-sm-2 col-form-label">Tên Công Ty</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="cty_name" value="'.$row['TenCongTy'].'" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">Số Điện Thoại</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="phone" value="'.$row['SoDienThoai'].'" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fax" class="col-sm-2 col-form-label">Số Fax</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="fax" value="'.$row['SoFax'].'" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">Địa chỉ</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="address" rows="3" style="resize:none;" readonly>'.$row['DiaChi'].'</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="order_date" class="col-sm-2 col-form-label">Ngày đặt hàng</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" name="order_date" value="'.$row['NgayDH'].'" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="delivery_date" class="col-sm-2 col-form-label">Ngày giao hàng</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" name="delivery_date" required>
                                </div>
                            </div>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên hàng</th>
                                        <th scope="col">Đơn giá</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Tổng giá</th>
                                    </tr>
                                </thead>
                                <tbody>';

                                $sql2 = "SELECT khachhang.MSKH,TenHH,Gia,SoLuong,GiaDatHang FROM khachhang,dathang,hanghoa,chitietdathang WHERE khachhang.MSKH=dathang.MSKH AND dathang.SoDonDH=chitietdathang.SoDonDH AND hanghoa.MSHH=chitietdathang.MSHH AND khachhang.MSKH=".$_GET['id']."";
                                $result2 = mysqli_query($conn, $sql2);

                                if (mysqli_num_rows($result2) > 0) {
                                    $stt = 0;
                                    $total_cost = 0;
                                    while($rows = mysqli_fetch_assoc($result2)) {
                                        $stt++;
                                        $total_cost+=$rows['GiaDatHang'];
                                        echo '<tr>
                                            <th scope="row">'.$stt.'</th>
                                            <td>'.$rows['TenHH'].'</td>
                                            <td>'.$rows['Gia'].'</td>
                                            <td>'.$rows['SoLuong'].'</td>
                                            <td>'.$rows['GiaDatHang'].'</td>
                                        </tr>';
                                    }
                                    echo '<tr>
                                        <th scope="row">Tổng cộng</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>'.$total_cost.' đ</b></td>
                                    </tr>';
                                }
                                
                                echo '</tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">Xuất hóa đơn</button>
                        </form>
                        <a href="ShowOrder.php"><button class="btn btn-dark mt-3">Trở về</button></a>';
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