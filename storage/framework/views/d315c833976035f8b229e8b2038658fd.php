<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin thành viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .title-header {
            color: white;
            font-size: 40px;
            font-weight: bold;
            text-decoration: none;
        }

        .title-header:hover {
            color: white; 
        }
        
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #008c28;
            color: white;
            /* text-align: center; */
        }

        footer {
            background-color: #008c28;
            color: white;
            text-align: center;
            padding: 1rem 0;
            margin-top: auto;
        }

        .member-card {
            margin-bottom: 2rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .member-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .member-card img {
            height: 200px;
            object-fit: cover;
        }

        .member-card .card-body {
            text-align: center;
        }

        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div>
            <nav class="navbar navbar-expand-lg custom-navbar py-3">
                <div class="ps-5 pt-2">
                    <a class="title-header" href="<?php echo e(route('welcome')); ?>">AN KHANG STORE</a>
                    <p class="mb-2">Cửa hàng thiết bị di động</p>
                </div>
                <div class="collapse navbar-collapse d-flex justify-content-end pe-5" id="navbarNav">
                    <a class="nav-link text-white" href="<?php echo e(route('welcome')); ?>">Quay lại trang chủ</a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container my-5 p-2">
        <div class="row">
            <div class="col-md-3">
                <div class="card member-card">
                    <img src="<?php echo e(asset('img/loi.jpg')); ?>" class="card-img-top" alt="Thành Viên 1">
                    <div class="card-body">
                        <h5 class="card-title">Trần Khiết Lôi</h5>
                        <p class="card-text">
                            Email: 52200216@student.tdtu.edu.vn
                            Lớp: 22050301
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card member-card">
                    <img src="<?php echo e(asset('img/vu.jpg')); ?>" class="card-img-top" alt="Thành Viên 2">
                    <div class="card-body">
                        <h5 class="card-title">Trần Hồ Hoàng Vũ</h5>
                        <p class="card-text">
                            Email: 52200214@student.tdtu.edu.vn
                            Lớp: 22050301
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card member-card">
                    <img src="<?php echo e(asset('img/dat.jpg')); ?>" class="card-img-top" alt="Thành Viên 3">
                    <div class="card-body">
                        <h5 class="card-title">Phạm Tuấn Đạt</h5>
                        <p class="card-text">
                            Email: 52200207@student.tdtu.edu.vn
                            Lớp: 22050301
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card member-card">
                    <img src="<?php echo e(asset('img/trung.png')); ?>" class="card-img-top" alt="Thành Viên 4">
                    <div class="card-body">
                        <h5 class="card-title">Nguyễn Đức Trung</h5>
                        <p class="card-text">
                            Email: 52200063@student.tdtu.edu.vn
                            Lớp: 22050201
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4">
                    <h5>ANKHANG STORE</h5>
                    <p>Trụ sở: Tầng 6 - Tòa nhà LandMark81 - Quận 1 - TP.HCM</p>
                    <p>Chi nhánh: Tầng 5 - Tòa nhà DEPZAI - Quận 1 - Hà Nội</p>
                </div>
                <div class="col-md-4">
                    <h5>Tổng đài hỗ trợ</h5>
                    <p>Tư vấn dịch vụ: 0123456789</p>
                    <p>Hỗ trợ sử dụng: 9876543210</p>
                    <p>Email: 52200214@student.tdtu.edu.vn</p>
                    <p>Từ 7h00 - 22h00 các ngày từ thứ 2 đến chủ nhật</p>
                </div>
                <div class="col-md-4">
                    <h5>Liên hệ hợp tác</h5>
                    <p>Email: 52200214@student.tdtu.edu.vn</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html><?php /**PATH C:\Users\lpn31\OneDrive - IT\Desktop\Cuoi_ki\store.com - Backup - 23.05 - 13h37\resources\views/information_member.blade.php ENDPATH**/ ?>