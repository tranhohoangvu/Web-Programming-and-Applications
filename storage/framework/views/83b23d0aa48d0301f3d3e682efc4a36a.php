<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tổng lợi nhuận</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            color: #212529;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        h1 {
            margin-bottom: 20px;
            color: #008c28;
            font-weight: bold;
        }
        h2 {
            margin-bottom: 20px;
            color: #008c28;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .table td, .table th {
            vertical-align: middle; /* Căn giữa theo chiều dọc */
            text-align: center; 
        }
        header {
            background-color: #008c28;
            color: #fff;
        }
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        thead {
            background-color: #008c28;
            color: #fff;
        }
        thead:hover {
            background-color: #007f24;
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
        .for-label {
            font-weight: bold;
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
                    <a class="navbar-brand fw-bold fs-2 text-light" href="<?php echo e(route('report.report.profit.generate')); ?>">ANKHANG STORE</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <h1 class="text-center">CHI TIẾT LỢI NHUẬN</h1>
        <div>
            <?php if(isset($month)): ?>
                <h5 class="text-center mb-4">Trong tháng <?php echo e(\Carbon\Carbon::parse($monthYear)->format('m/Y')); ?></h5>
            <?php else: ?>
                <h5 class="text-center mb-4">Trong năm <?php echo e(\Carbon\Carbon::parse($monthYear)->format('Y')); ?></h5>
            <?php endif; ?>
        </div>
        <div class="row text-center">
            <div class="col-6">
                <div>
                    <label class="for-label">Số lượng đơn hàng:</label>
                    <span><?php echo e(number_format($soLuongDonHang, 0, ',', '.')); ?></span>
                </div>
                <div>   
                    <label class="for-label">Số lượng sản phẩm:</label>
                    <span><?php echo e(number_format($soLuongSanPham, 0, ',', '.')); ?></span>
                </div>
                <div>
                    <label class="for-label">Tổng số tiền thu được:</label>
                    <span><?php echo e(number_format($totalSalesRevenue, 0, ',', '.')); ?> VND</span>
                </div>
            </div>
            <div class="col-6">
                <div>
                    <label class="for-label">Tổng chi phí nhập hàng:</label>
                    <span><?php echo e(number_format($totalPurchaseCost, 0, ',', '.')); ?> VND</span>
                </div>
                <div>
                    <label class="for-label">Tổng lợi nhuận:</label>
                    <span><?php echo e(number_format($profit, 0, ',', '.')); ?> VND</span>
                </div>
                <div>
                    <label class="for-label">Kết luận:</label>
                    <span><?php echo e($checkProfit); ?></span>
                </div>
            </div>
        </div>

        <h2 class="mt-3">Danh sách đơn hàng</h2>
        <table class="table table-striped table-hover mb-3">
            <thead class="thead-light">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Ngày đặt hàng</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Tên nhân viên</th>
                    <th scope="col">Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $donHangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donHang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($donHang->MaHD); ?></td>
                        <td><?php echo e($donHang->TenKhachHang); ?></td>
                        <td><?php echo e($donHang->NgayDatHang); ?></td>
                        <td><?php echo e(number_format($donHang->tongtien, 0, ',', '.')); ?></td>
                        <td>
                            <?php
                                $employee = App\Models\Employee::find($donHang->MANV);
                                $hotendaydu = $employee ? $employee->hotendaydu : 'N/A';
                                echo $hotendaydu;
                            ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('order.detail', ['id' => $donHang->id])); ?>" class="btn btn-info">Xem</a>
                        </td>
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
<script>

</script>
</html>
<?php /**PATH C:\xampp\htdocs\store.com\resources\views/report/report_profit.blade.php ENDPATH**/ ?>