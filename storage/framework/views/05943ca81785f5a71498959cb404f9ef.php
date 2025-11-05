<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
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
            max-width: 90%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
        }
        .ellipse-img {
            border-radius: 50%;
        }
        /* #user_name{
            color: black;
        } */
        .user_name a {
            text-decoration: none;
            color: white;
        }

        .user_name a:hover {
            color: white;
        }

        .nav-link {
            color: #fff !important;
            text-decoration: none !important; /* No underline */
            transition: color 0.3s ease-in-out !important;
        }   

        .nav-link:hover {
            color: #cccccc !important;
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
    </style>
</head>
<body>
    <header class="background-col">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="#" class="text-white">
                        <?php
                            $employee = auth()->user()->employee;
                        ?>
                        <?php if($employee && $employee->avatar): ?>
                        <a href="<?php echo e(route('account.user_profile', ['id' => auth()->user()->id])); ?>">  <img src="<?php echo e(asset('uploads/employees/' . $employee->avatar)); ?>" width="70px" height="70px" alt="avatar"  class="ellipse-img"></a>
                          
                        <?php else: ?>
                         <a href="<?php echo e(route('account.user_profile', ['id' => auth()->user()->id])); ?>">No Avatar</a>
                            
                        <?php endif; ?>
                        
                        <?php if(auth()->check()): ?>
                            <h4 class="user_name"> <a href="<?php echo e(route('account.user_profile', ['id' => auth()->user()->id])); ?>"><?php echo e(auth()->user()->employee->hotendaydu); ?></a></h4>
                           
                            
                        <?php endif; ?>
                    </a>
                </div>
                <div class="col-md-8 d-flex justify-content-end align-items-center">
                    <nav>
                        <ul class="nav d-none d-md-flex">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="BaoCao" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Tình hình kinh doanh
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="BaoCao">
                                    <li><a class="dropdown-item" href="#">Báo cáo và phân tích</a></li>
                                    <li><a class="dropdown-item" href="#">Tổng lợi nhuận</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="QuanLy" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Quản lý
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="BaoCao">
                                    <li><a class="nav-link" href="http://127.0.0.1:8000/account/sanpham">Quản lí sản phẩm</a></li>
                                    <li><a class="nav-link" href="<?php echo e(route('manage_customer')); ?>">Quản lí đơn hàng</a></li>
                                    <li><a class="nav-link" href="<?php echo e(route('account.customer')); ?>">Quản lí khách hàng</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://127.0.0.1:8000/logout">Đăng xuất</a>
                            </li>
                        </ul>
                    </nav>
                    <button class="btn btn-outline-light d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNav">
                        <span>&#9776;</span>
                    </button>
                    <div class="collapse d-md-none" id="mobileNav">
                        <nav>
                            <ul class="nav flex-column">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="BaoCao" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Tình hình kinh doanh
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="BaoCao">
                                        <li><a class="dropdown-item" href="#">Báo cáo và phân tích</a></li>
                                        <li><a class="dropdown-item" href="#">Tổng lợi nhuận</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="QuanLy" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Quản lý
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="BaoCao">
                                        <li><a class="nav-link" href="http://127.0.0.1:8000/account/sanpham">Quản lí sản phẩm</a></li>
                                        <li><a class="nav-link" href="<?php echo e(route('manage_customer')); ?>">Quản lí đơn hàng</a></li>
                                        <li><a class="nav-link" href="<?php echo e(route('account.customer')); ?>">Quản lí khách hàng</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://127.0.0.1:8000/logout">Đăng xuất</a>
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
                            <img src="<?php echo e(asset('img/ak1.jpg')); ?>" class="d-block w-100" alt="Cửa hàng">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo e(asset('img/ak2.jpg')); ?>" class="d-block w-100" alt="Cửa hàng">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo e(asset('img/nv1.jpg')); ?>" class="d-block w-100" alt="Cửa hàng">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo e(asset('img/nv2.jpg')); ?>" class="d-block w-100" alt="Cửa hàng">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="store-description">
                    <h4 class="text-dark">AN KHANG STORE</h4>
                    <h6>Uy tín - Chất lượng - Nhanh chóng - Sang trọng</h6>
                    <p class="text-dark">
                        Tiền thân là AK+ (Tên vẫn được gọi đến ngày nay và hiện nay vẫn lưu giữ làm logo của công ty) được thành lập vào ngày 30/4/2024 do ông Nguyễn Trần Văn B sáng lập, đây là một chuỗi cửa hàng chuyên phân phối, bảo hành, sửa chữa các thiết bị di động và phụ kiện từ các hãng sản xuất di động nổi tiếng như Apple, Samsung, LG, ASUS, Xiaomi... với thị trường khách hàng rộng lớn và đã tạo nên thương hiệu từ lâu. AN KHANG Store đến nay là một chuỗi cửa hàng đem đến cho người tiêu dùng sự hài lòng, uy tín, chất lượng.
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
                    <p>Tư vấn dịch vụ: 0123456789</p>
                    <p>Hỗ trợ sử dụng: 9876543210</p>
                    <p>Email: 52200207@student.tdtu.edu.vn</p>
                    <p>Từ 7h00 - 22h00 các ngày từ thứ 2 đến chủ nhật</p>
                </div>
                <div class="col-md-4">
                    <h5>Liên hệ hợp tác</h5>
                    <p>Email: 52200216@student.tdtu.edu.vn</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
<?php /**PATH C:\Users\lpn31\OneDrive - IT\Desktop\Cuoi_ki\store.com - Backup - 23.05 - 13h37\resources\views/backend/dashboard/nhanvien.blade.php ENDPATH**/ ?>