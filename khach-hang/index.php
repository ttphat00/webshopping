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
                                <a href="#'.$row['MaLoaiHang'].'">
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
            <div class="m-container">
                <div id="carouselExampleIndicators" class="carousel slide myslide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="d-block w-100" src="../image/slide1.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="../image/slide2.png" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="../image/slide3.png" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="product">
                <!-- <div style="width:max-content;border-radius:10px;background-color:white;margin:auto;padding-left:10px;padding-right:10px;"><h5>SẢN PHẨM</h5></div> -->
                    <?php
                        require('../database/Connection.php');

                        $sql = "SELECT * FROM loaihanghoa";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="category-product">
                                    <div id="'.$row['MaLoaiHang'].'" class="category-title"><b>'.$row['TenLoaiHang'].'</b></div>
                                    <div class="product-list">';
                                        $sql2 = "SELECT * FROM hanghoa,hinhhanghoa WHERE hanghoa.MSHH=hinhhanghoa.MSHH AND MaLoaiHang=".$row['MaLoaiHang']." ORDER BY hanghoa.MSHH DESC";
                                        $result2 = mysqli_query($conn, $sql2);
                    
                                        if (mysqli_num_rows($result2) > 0) {
                                            while($row2 = mysqli_fetch_assoc($result2)) {
                                                echo '<div class="one-product">
                                                    <a href="Product.php?id='.$row2['MSHH'].'">
                                                        <img src="../quan-ly/product/upload/'.$row2['TenHinh'].'" alt="">
                                                        <div class="product-title">'.$row2['TenHH'].'</div>
                                                        <div class="cost">Giá: <b>'.$row2['Gia'].' đ</b></div>
                                                        <div class="quantity">SL: '.$row2['SoLuongHang'].'</div>
                                                    </a>
                                                </div>';
                                            }
                                        }
                                        
                                    echo '</div>
                                </div>';
                            }
                        }

                        mysqli_close($conn);
                    ?>
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