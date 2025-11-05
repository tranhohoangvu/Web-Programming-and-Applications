<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng - ANKHANG STORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .custom-header-bg {
            background-color: #008c28;
        }
        .custom-footer-bg {
            background-color: #008c28;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        footer {
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
        .chooseBox {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            padding: 20px;
            margin: 20px auto;
            width: 400px;
            height: 300px;
            display: flex; 
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .chooseBox:hover {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #e9ecef;
        }
        .nav-link {
            color: #fff !important;
            text-decoration: none !important; /* No underline */
            transition: color 0.3s ease-in-out !important;
        }   

        .nav-link:hover {
            color: #cccccc !important;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <header class="custom-header-bg">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container my-3">
                <div>
                    <a class="navbar-brand fw-bold fs-2 text-light" href="<?php echo e(route('dashboard.nhanvien')); ?>">ANKHANG STORE</a>
                    <br>
                    <a class="navbar-brand fs-6 text-light">Nhân viên bán hàng</a>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-light me-2" href="<?php echo e(route('account.user_profile', ['id' => auth()->user()->id])); ?>">Tài khoản</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link text-light me-2" href="#">Hộp thư</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link text-light" href="http://127.0.0.1:8000/logout">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
                <button class="btn btn-outline-light d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNav">
                    <span>&#9776;</span>
                </button>
                <div class="collapse d-md-none" id="mobileNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Tài khoản</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link text-light" href="#">Hộp thư</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link text-light" href="http://127.0.0.1:8000/logout">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Content -->
    <div class="container my-4">
        <h2 class="text-center fw-bold my-4 text-success">QUẢN LÝ ĐƠN HÀNG</h2>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 chooseBox" id="productListBox">
                <h4>Danh sách sản phẩm</h4>
            </div>
            <div class="col-lg-4 col-md-6 chooseBox" id="newOrderBox">
                <h4>Tạo đơn hàng mới</h4>
            </div>
            <div class="col-lg-4 col-md-6 chooseBox" id="historyOrderBox">
                <h4>Lịch sử đơn hàng</h4>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 custom-footer-bg">
        <div class="container d-flex justify-content-center">
            <div class="row mt-3">
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

    <script>
        $(document).ready(function(){
            // Hiển thị danh sách sản phẩm khi click
            $("#productListBox").click(function(){
                window.location.href = "http://127.0.0.1:8000/account/sanpham";
            });

            // Hiển thị form tạo đơn hàng mới khi click
            $("#newOrderBox").click(function(){
                window.location.href = "<?php echo e(route('new.order.form')); ?>";
            });

            // Hiển thị lịch sử đơn hàng khi click
            $("#historyOrderBox").click(function(){
                window.location.href = "<?php echo e(route('order.history')); ?>";
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\Users\lpn31\OneDrive - IT\Desktop\Cuoi_ki\store.com - Backup - 23.05 - 13h37\resources\views/order/order.blade.php ENDPATH**/ ?>