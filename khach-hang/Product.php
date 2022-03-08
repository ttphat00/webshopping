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
            <div class="p-container">
                <?php
                    require('../database/Connection.php');

                    $sql = "SELECT * FROM hanghoa,hinhhanghoa WHERE hanghoa.MSHH=hinhhanghoa.MSHH AND hanghoa.MSHH=".$_GET['id']."";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $quantitySelected = $row['SoLuongHang'];
                        if($row['SoLuongHang'] == 0){
                            $quantitySelected = 1;
                        }
                        echo '<div class="product-img"><img src="../quan-ly/product/upload/'.$row['TenHinh'].'" alt=""></div>
                        <div class="product-content">
                            <div class="product-name"><b>'.$row['TenHH'].'</b></div>
                            <div class="one-row">
                                <div class="product-description product-value w-100"><textarea class="form-control-plaintext" rows="8" style="resize:none;" readonly>'.$row['QuyCach'].'</textarea></div>
                            </div>
                            <div class="one-row">
                                <div class="product-key cost-key">Giá</div>
                                <div class="product-cost product-value"><b>'.$row['Gia'].' đ</b></div>
                            </div>
                            <form action="AddToCart.php?id='.$row['MSHH'].'" method="post">
                                <div class="one-row">
                                    <div class="product-key">Số lượng</div>
                                    <div class="product-quantity product-value"><input type="number" name="product-quantity" min="1" max="'.$quantitySelected.'" value="1"/> <i style="margin-left:20px;">Còn</i> <i class="remaining-amount">'.$row['SoLuongHang'].'</i></div>
                                </div>
                                <button class="btn btn-warning mybtn"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Thêm vào giỏ hàng</button>
                            </form>
                            <button class="btn btn-primary btn-order" style="margin-top:10px;margin-bottom:10px">Mua ngay</button>
                        </div>
                        <div class="form-order">
                            <div class="bg-danger" style="text-align: right;border-radius:5px;"><button class="btn btn-danger btn-sm btn-order-cancel"><i class="fa fa-times" style="font-size:18px" aria-hidden="true"></i></button></div>
                            <div class="form-order-container">
                                <h5 style="text-align:center;color:red;">Hãy điền thông tin của bạn để xác nhận mua hàng</h5>
                                <form action="QuickOrder.php?id='.$row['MSHH'].'" method="post">
                                    <div class="form-group row">
                                        <label for="product_name" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control form-control-sm" name="product_name" value="'.$row['TenHH'].'" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="form-group row" style="margin-left:0;">
                                            <label for="cost" class="col-sm-2 col-form-label">Giá</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control form-control-sm" name="cost" value="'.$row['Gia'].'" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="quantity" class="col-sm-5 col-form-label">Số lượng mua</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm" name="quantity" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sum_cost" class="col-sm-4 col-form-label">Tổng giá</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control form-control-sm" name="sum_cost" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Họ tên</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control form-control-sm" name="name" placeholder="Họ tên" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cty_name" class="col-sm-3 col-form-label">Tên Cty</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control form-control-sm" name="cty_name" placeholder="Tên Cty" required>
                                            <small class="form-text text-muted">Nếu không có, ghi "Không"</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-3 col-form-label">Số điện thoại</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control form-control-sm" name="phone" placeholder="VD: 012 345 6789" pattern="^[0-9]+$" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fax" class="col-sm-3 col-form-label">Số Fax</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control form-control-sm" name="fax" placeholder="Số Fax" required>
                                            <small class="form-text text-muted">Nếu không có, ghi "Không"</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-3 col-form-label">Địa chỉ</label>
                                        <div class="col-sm-5">
                                            <textarea class="form-control form-control-sm" name="address" rows="2" style="resize:none;" required></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" style="margin-left:350px;">Xác nhận mua</button>
                                </form>
                            </div>
                        </div>';
                    }

                    mysqli_close($conn);
                ?>
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
    <script>
        var quantity = document.querySelector('input[name="product-quantity"]');
        function focusOutQuantity(e){
            if(parseInt(e.target.value) > parseInt(document.querySelector('.remaining-amount').textContent)){
                e.target.value = document.querySelector('.remaining-amount').textContent;
            }
            if(e.target.value === ''){
                e.target.value = '1';
            }
            if(parseInt(e.target.value) <= 0){
                e.target.value = '1';
            }
        }
        quantity.onfocusout = focusOutQuantity;

        function order(){
            var sum_cost = 0;;
            var quantity_selected = 0;
            var cost = document.querySelector('input[name="cost"]').value;
            if(!document.querySelector('.form-order').classList.contains('form-order-visible')){
                document.querySelector('.form-order').classList.add('form-order-visible');
                document.querySelector('input[name="quantity"]').value = quantity.value;
                quantity_selected = document.querySelector('input[name="quantity"]').value;
                sum_cost = parseInt(cost) * parseInt(quantity_selected);
                document.querySelector('input[name="sum_cost"]').value = sum_cost;
            }
        }
        document.querySelector('.btn-order').onclick = order;

        function orderCancel(){
            document.querySelector('.form-order').classList.remove('form-order-visible');
        }
        document.querySelector('.btn-order-cancel').onclick = orderCancel;
    </script>
</body>
</html>