<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng của <?php echo e($user->employee->hotendaydu); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #212529;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #008c28;
            color: #fff;
        }
        .cont-table {
            margin-top: 50px;
            margin-bottom: 50px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .summary {
            margin-bottom: 20px;
        }
        .summary p {
            font-size: 1.1rem;
            margin: 5px 0;
        }
        table {
            margin-top: 20px;
        }
        thead {
            background-color: #008c28;
            color: white;
        }
        thead:hover {
            background-color: #007f24;
        }
        th, td {
            text-align: center;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .summary p strong {
            color: #008c28;
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
</head>
<body>
    <!-- Navbar -->
    <header class="custom-header-bg">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container my-3">   
                <div>
                    <a class="navbar-brand fw-bold fs-2 text-light" href="<?php echo e(route('account.user-show')); ?>">ANKHANG STORE</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Content -->
    <div class="container cont-table">
        <h1 class="text-center mb-4">THỐNG KÊ NHÂN VIÊN</h1>
        <h4 class="text-center mb-4">Nhân viên: <?php echo e($user->employee->hotendaydu); ?></h4>
        
        <div class="summary">
            <p><strong>Tổng số đơn hàng:</strong> <?php echo e($totalOrders); ?></p>
            <p><strong>Tổng số tiền:</strong> <?php echo e(number_format($totalAmount, 0, ',', '.')); ?> VND</p>
        </div>

        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Tổng tiền</th>
                    <!-- Thêm các cột khác nếu cần -->
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($order->MaHD); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($order->NgayDatHang)->format('d/m/Y')); ?></td>
                        <td><?php echo e(number_format($order->tongtien, 0, ',', '.')); ?> VND</td>
                        <!-- Thêm các cột khác nếu cần -->
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
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
</html>
<?php /**PATH C:\xampp\htdocs\store.com\resources\views/backend/account/user_order.blade.php ENDPATH**/ ?>