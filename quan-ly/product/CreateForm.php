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
                            <a class="dropdown-item" href="../category/ShowCategory.php">Xem tất cả</a>
                            <a class="dropdown-item" href="../category/CreateForm.php">Thêm loại hàng</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <span class="nav-link dropdown-toggle"id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hàng hóa</span>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="ShowProduct.php">Xem tất cả</a>
                            <a class="dropdown-item" href="CreateForm.php">Thêm sản phẩm</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link text-white" href="../order/ShowOrder.php">Đơn đặt hàng</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="../bill/ShowBill.php">Xem hóa đơn</a></li>
                </ul>
            </div>
            <div class="container w-100" style="height: max-content;">
                <div class="bg-dark text-white myshop"><h3>Thêm hàng hóa</h3></div>
                <div class="w-75" style="margin:auto;">
                    <form action="CreateProduct.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tên hàng hóa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="Tên hàng hóa" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Hình ảnh</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control-file" name="image" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Mô tả</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" rows="8" style="resize:none;" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cost" class="col-sm-2 col-form-label">Giá</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="cost" placeholder="VD: 100000" pattern="^[0-9]+$" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quantity" class="col-sm-2 col-form-label">Số lượng</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="quantity" placeholder="Tối đa là 99" pattern="^[0-9]{1,2}$" required>
                                <small class="form-text text-muted">Tối đa là 99</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-2 col-form-label">Loại hàng</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="category">
                                <?php
                                    require_once('../../database/Connection.php');

                                    $sql = "SELECT * FROM loaihanghoa";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$row['MaLoaiHang'].'">'.$row['TenLoaiHang'].'</option>';
                                        }
                                    }

                                    mysqli_close($conn);
                                ?>
                                </select>
                            </div>
                        </div>
                        <div style="margin-left:150px;"><button type="submit" name="submit" class="btn btn-primary">Thêm</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../admin.js"></script>
</body>
</html>