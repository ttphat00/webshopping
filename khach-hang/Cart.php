<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link href='https://fonts.googleapis.com/css?family=Monoton' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
</head>
<body>
    <header>
        <div class="h-container">
            <a href="index.php" class="mylogo logo"><img class="shopping-logo" src="../image/logo.jpg" alt=""><b>Pet Shop</b></a>
            <a href="Cart.php" class="basket"><span>Giỏ hàng</span> <i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
        </div>
        <div class="category">
            <ul>
                <?php
                    require('../database/Connection.php');

                    $sql = "SELECT * FROM loaihanghoa";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<li>
                                <a href="index.php#'.$row['MaLoaiHang'].'">
                                    <div class="title"><b>'.$row['TenLoaiHang'].'</b></div>
                                </a>
                            </li>';
                        }
                    }

                    mysqli_close($conn);
                ?>
            </ul>
        </div>
    </header>
    <div id="particles-js">
        <main>
            <div class="p-container bg-white" style="display:block;border-radius:10px;">
                <table class="table mb-5">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng mua</th>
                            <th scope="col">Tổng giá</th>
                            <th scope="col">Hủy</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require('../database/Connection.php');

                            $sql = "SELECT hanghoa.MSHH,TenHH,Gia,SoLuongHang,SoLuongMua FROM hanghoa,giohang WHERE hanghoa.MSHH=giohang.MSHH";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                $stt = 0;
                                $total = 0;
                                while($row = mysqli_fetch_assoc($result)) {
                                    $stt++;
                                    $quantity = (int)$row['SoLuongMua'];
                                    $cost = (int)$row['Gia'];
                                    $sum_cost = $quantity * $cost;
                                    $total += $sum_cost; 
                                    echo '<tr>
                                        <th scope="row">'.$stt.'</th>
                                        <td>'.$row['TenHH'].'</td>
                                        <td>'.$row['Gia'].'</td>
                                        <td>'.$row['SoLuongMua'].'</td>
                                        <td>'.$sum_cost.'</td>
                                        <td><a href="RemoveFromCart.php?id='.$row['MSHH'].'"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                    </tr>';
                                }
                                echo '<tr>
                                    <th scope="row">Tổng cộng</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><b>'.$total.' đ</b></td>
                                    <td></td>
                                </tr>';

                            } else {
                                echo "Không có sản phẩm nào trong giỏ hàng";
                            }
                            
                            mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
                <div class="w-50 m-auto">
                    <div style="color:#fc1010;border-bottom:1px solid rgb(187, 185, 185);margin-bottom:10px;width:max-content;"><h5>Hãy điền thông tin của bạn để xác nhận mua hàng</h5></div>
                    <form action="OrderForCart.php" method="post">
                        <div class="form-group">
                            <label for="name">Họ tên</label>
                            <input type="text" class="form-control col-sm-10" name="name" placeholder="Họ tên" required>
                        </div>
                        <div class="form-group">
                            <label for="cty_name">Tên Cty</label>
                            <input type="text" class="form-control col-sm-10" name="cty_name" placeholder="Tên Cty" required>
                            <small class="form-text text-muted">Nếu không có, ghi "Không"</small>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" class="form-control col-sm-6" name="phone" placeholder="VD: 012 345 6789" pattern="^[0-9]+$" required>
                        </div>
                        <div class="form-group">
                            <label for="fax">Số Fax</label>
                            <input type="text" class="form-control col-sm-6" name="fax" placeholder="Số Fax" required>
                            <small class="form-text text-muted">Nếu không có, ghi "Không"</small>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <textarea class="form-control col-sm-10" name="address" rows="2" required></textarea>
                        </div>
                        <div style="margin-left:150px"><button type="submit" class="btn btn-primary mb-3">Xác nhận mua</button></div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <footer>
        <div class="f-container">
            <div class="col-left">
                <div class="col-title"><b>CHĂM SÓC KHÁCH HÀNG</b></div>
                <ul>
                    <li><a href="#">Hỗ trợ</a></li>
                    <li><a href="#">MyShop mail</a></li>
                    <li><a href="#">Hướng dẫn mua hàng</a></li>
                    <li><a href="#">Thanh toán</a></li>
                    <li><a href="#">Vận chuyển</a></li>
                    <li><a href="#">Trả hàng và hoàn tiền</a></li>
                    <li><a href="#">Chính sách bảo hành</a></li>
                </ul>
            </div>
            <div class="col-mid">
                <div class="col-title"><b>VỀ MY SHOP</b></div>
                <ul>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Điều khoản</a></li>
                    <li><a href="#">Chính sách bảo mật</a></li>
                </ul>
            </div>
            <div class="col-right">
                <div class="col-title"><b>THEO DÕI CHÚNG TÔI TRÊN</b></div>
                <ul>
                    <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook</a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <button class="scroll-up"><i class="fa fa-arrow-up"></i></button>
    <script src="index.js"></script>
</body>
</html>