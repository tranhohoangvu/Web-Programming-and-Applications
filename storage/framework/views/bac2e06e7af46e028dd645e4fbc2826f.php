<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ Quản trị viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: rgb(247, 252, 252);
            color: #333;
        }
        .background-col {
            background-color: #008c28;
            padding: 20px;
        }
        .store-info {
            padding: 50px;
            text-align: center;
        }
        .store-info img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(74, 253, 101, 0.1);
            transition: transform 0.3s ease-in-out;
        }
        .store-info img:hover {
            transform: scale(1.05);
        }
        .store-info h4 {
            color: #fff;
        }
        .store-info p {
            color: #ccc;
        }
        footer {
            background-color: #008c28;
            color: #fff;
            text-align: center;
            padding: 50px 0;
        }
        footer h5 {
            margin-bottom: 20px;
        }
        footer p {
            margin-bottom: 10px;
        }
        .carousel-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            transition: transform 0.3s ease-in-out;
        }
        .carousel-item img:hover {
            transform: scale(1.05);
        }
        .ellipse-img {
            border-radius: 50%;
        }
        .user_name {
            margin: 0;
        }
        .dropdown-menu {
            background-color: #008c28;
        }
        .dropdown-item {
            color: #fff;
            transition: background-color 0.3s ease-in-out;
        }
        .dropdown-item:hover {
            background-color: #006d20;
        }
        .nav-link {
            color: #fff;
            transition: color 0.3s ease-in-out;
        }
        .nav-link:hover {
            color: #cccccc;
        }
    </style>
</head>
<body>
    <header class="background-col">
        <div class="container">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center">
                    <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('account.user_profile', ['id' => auth()->user()->id])); ?>" class="text-white">
                        <?php
                        $employee = auth()->user()->employee;
                        ?>
                        <?php if($employee && $employee->avatar): ?>
                            <img src="<?php echo e(asset('uploads/employees/' . $employee->avatar)); ?>" width="70px" height="70px" alt="avatar" class="ellipse-img">
                        <?php else: ?>
                            No Avatar
                        <?php endif; ?>
                        <p class="user_name text-white" style="text-decoration: none;"><?php echo e(auth()->user()->employee->hotendaydu); ?></p>
                    </a>
                    <?php endif; ?>
                </div>
                <div class="col-md-8 d-flex justify-content-end align-items-center">
                    <nav>
                        <ul class="nav d-none d-md-flex">
                            <li class="nav-item">
                                <a class="nav-link" href="http://127.0.0.1:8000/logout">Đăng xuất</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://127.0.0.1:8000/account/user-show">Quản lí người dùng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://127.0.0.1:8000/account/sanpham">Quản lí sản phẩm</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="BaoCao" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Tình hình kinh doanh
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="BaoCao">
                                    <li><a class="dropdown-item" href="#">Báo cáo và phân tích</a></li>
                                    <li><a class="dropdown-item" href="#">Tổng lợi nhuận</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <button class="btn btn-outline-light d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNav">
                        <span>&#9776;</span>
                    </button>
                    <div class="collapse d-md-none" id="mobileNav">
                        <nav>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="http://127.0.0.1:8000/logout">Đăng xuất</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://127.0.0.1:8000/account/user-show">Quản lí người dùng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://127.0.0.1:8000/account/sanpham">Quản lí sản phẩm</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="mobileLoginMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Tình hình kinh doanh
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="mobileLoginMenu">
                                        <li><a class="dropdown-item" href="#">Báo cáo và thống kê</a></li>
                                        <li><a class="dropdown-item" href="#">Tổng lợi nhuận</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container store-info">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6">
                <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo e(asset('img/ak1.jpg')); ?>" alt="Cửa hàng">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo e(asset('img/ak2.jpg')); ?>" alt="Cửa hàng">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo e(asset('img/nv1.jpg')); ?>" alt="Cửa hàng">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo e(asset('img/nv2.jpg')); ?>" alt="Cửa hàng">
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
            <div class="col-md-6">
                <div class="store-description">
                    <h4 class="text-dark">AN KHANG STORE</h4>
                    <h6>Uy tín - Chất lượng - Nhanh chóng - Sang trọng</h6>
                    <p class="text-dark">
                        AN KHANG Store, uy tín - chất lượng - nhanh chóng - sang trọng, là địa chỉ tin cậy cho mọi người trong việc mua sắm, bảo hành, và sửa chữa các thiết bị di động và phụ kiện. Với hơn một thập kỷ hoạt động, chúng tôi tự hào là đối tác đáng tin cậy của các hãng sản xuất di động hàng đầu như Apple, Samsung, LG, ASUS, Xiaomi... Đội ngũ nhân viên giàu kinh nghiệm và chuyên nghiệp của chúng tôi luôn sẵn lòng hỗ trợ bạn trong mọi tình huống. Hãy đến với AN KHANG Store để trải nghiệm dịch vụ tốt nhất và sự hài lòng tuyệt đối.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
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
</html><?php /**PATH D:\LTWVUD\store.com\resources\views/backend/dashboard/index.blade.php ENDPATH**/ ?>