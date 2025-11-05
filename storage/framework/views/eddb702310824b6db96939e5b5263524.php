<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>An Khang Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="<?php echo e(asset('css/welcome.css')); ?>" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    .title-header {
        color: white;
        font-size: 40px;
        font-weight: bold;
        text-decoration: none;
    }

    .title-header:hover {
        color: white; 
    }

    .nav-item {
        font-size: 18px !important;
    }

    .dropdown-item:hover {
        background-color: azure;
    }

    footer {
        background-color: #008c28;
        color: #fff;
        text-align: center;
        padding: 50px 0;
        flex-shrink: 0; /* Không co giãn footer khi nội dung quá ít */
    }
    footer h5 {
        margin-bottom: 20px;
    }
    footer p {
        margin-bottom: 10px;
    }
</style>
<body>
    <header>
        <div>
            <nav class="navbar navbar-expand-lg custom-navbar py-3">
                <div class="ps-5">
                    <a class="title-header" href="<?php echo e(route('welcome')); ?>">AN KHANG STORE</a>
                    <p class="mb-3">Cửa hàng thiết bị di động</p>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo e(route('information.member')); ?>">Giới thiệu</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link text-white" href="#">Địa chỉ</a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white pe-5" href="#" id="loginMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Đăng nhập
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="loginMenu">
                                <li><a class="dropdown-item" href="http://127.0.0.1:8000/admin">Admin</a></li>
                                <li><a class="dropdown-item" href="http://127.0.0.1:8000/login-employee">Nhân viên</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <!-- <div class="col-md-12 banner">
                <img  src="<?php echo e(asset('img/banner.webp')); ?>"alt="Banner Image" class="img-fluid banner">
            </div> -->
            <div class="col-md-12 banner">
                <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img  src="<?php echo e(asset('img/banner.webp')); ?>"alt="Banner Image" class="img-fluid banner">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo e(asset('img/banner1.jpeg')); ?>" alt="Cửa hàng">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo e(asset('img/banner2.png')); ?>" alt="Cửa hàng">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo e(asset('img/banner3.png')); ?>" alt="Cửa hàng">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        
        <div class="row my-3">
            <h2>Dòng sản phẩm hot nhất 2024</h>
        </div>

        <div id="products" class="mb-3">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <img class="product-img" src="<?php echo e(asset('img/ip15.jpg')); ?>" alt="Product 1" >
                        <div class="card-body">
                            <h5 class="card-title">Iphone 15</h5>
                            <p class="card-text">Price: $799-1099$</p>
                            <a href="https://www.apple.com/iphone-15/specs/" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="product-img" src="<?php echo e(asset('img/ss.png')); ?>" alt="Product 1">
                        <div class="card-body">
                            <h5 class="card-title">Samsung Galaxy A35 5G</h5>
                            <p class="card-text">Price: $339</p>
                            <a href="https://www.gsmarena.com/samsung_galaxy_a35-12705.php" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="product-img" src="<?php echo e(asset('img/xiaomi.jpg')); ?>" alt="Product 3" >
                        <div class="card-body">
                            <h5 class="card-title">Xiaomi Redmi Note 13</h5>
                            <p class="card-text">Price: $268.69</p>
                            <a href="https://www.mi.com/global/product/redmi-note-13/specs/" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="product-img" src="<?php echo e(asset('img/oppo.jpg')); ?>" alt="Product 4" >
                        <div class="card-body">
                            <h5 class="card-title">Oppo Reno 10 Pro Plus</h5>
                            <p class="card-text">Price: $549</p>
                            <a href="https://us.mobileinto.com/Oppo-Reno-10-Pro-Plus/" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto">
        <div class="container mt-auto">
            <div class="row">
                <div class="col-md-4">
                    <h5>ANKHANG STORE</h5>
                    <p>Trụ sở: Tầng 6 - Tòa nhà LandMark81 - Quận 1 - TP.HCM</p>
                    <p>Chi nhánh: Tầng 5 - Tòa nhà DEPZAI - Quận 1 - Hà Nội</p>
                </div>
                <div class="col-md-4">
                    <h5>Tổng đài hỗ trợ</h5>
                    <p>Tư vấn dịch vụ: 1800 1234</p>
                    <p>Email hỗ trợ: support@ankhangstore.vn</p>
                </div>
                <div class="col-md-4">
                    <h5>Liên hệ với chúng tôi</h5>
                    <p>Facebook: fb.com/ankhangstore</p>
                    <p>Instagram: @ankhangstore</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html><?php /**PATH C:\xampp\htdocs\store.com\resources\views/welcome.blade.php ENDPATH**/ ?>