<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../admin.css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

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
                <div class="bg-dark text-white myshop"><h3>Danh sách hàng hóa</h3></div>
                <div style="margin:auto;width:1080px;">
                    <table id="data_table" class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên hàng</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Loại hàng</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            require_once('../../database/Connection.php');

                            $sql = "SELECT hanghoa.MSHH,TenHH,TenHinh,QuyCach,Gia,SoLuongHang,TenLoaiHang FROM hanghoa,hinhhanghoa,loaihanghoa WHERE hanghoa.MSHH=hinhhanghoa.MSHH AND loaihanghoa.MaLoaiHang=hanghoa.MaLoaiHang ORDER BY hanghoa.MSHH DESC";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                $stt = 0;
                                while($row = mysqli_fetch_assoc($result)) {
                                    $stt++;
                                    echo '<tr>
                                        <th scope="row">'.$stt.'</th>
                                        <td>'.$row['TenHH'].'</td>
                                        <td><img src="upload/'.$row['TenHinh'].'" alt=""></td>
                                        <td>'.substr($row['QuyCach'], 0, 150).'...</td>
                                        <td>'.$row['Gia'].'</td>
                                        <td>'.$row['SoLuongHang'].'</td>
                                        <td>'.$row['TenLoaiHang'].'</td>
                                        <td>
                                            <a href="UpdateForm.php?id='.$row['MSHH'].'"><button class="btn btn-warning mr-2">Sửa</button></a>
                                            <a href="DeleteProduct.php?id='.$row['MSHH'].'&name='.$row['TenHinh'].'"><button class="btn btn-danger">Xóa</button></a>
                                        </td>
                                    </tr>';
                                }
                            }

                            mysqli_close($conn);
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#data_table').DataTable( {
                scrollY:        '600px',
                scrollCollapse: true,
                paging:         false
            });
        });
    </script>
    <script src="../admin.js"></script>
</body>
</html>