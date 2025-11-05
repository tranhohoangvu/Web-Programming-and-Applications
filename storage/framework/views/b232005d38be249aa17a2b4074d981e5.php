<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử đơn hàng - ANKHANG STORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-header-bg {
            background-color: #008c28;
        }
        .custom-footer-bg {
            background-color: #008c28;
        }
        .table-hover thead tr:hover {
            background-color: #02b526;
        }
        .table-hover tbody tr:hover {
            background-color: #dbdbdb;
        }
        body {
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .table td, .table th {
            vertical-align: middle; /* Căn giữa theo chiều dọc */
        }
        .table thead {
            background-color: #00c828;
        }
        footer {
            background-color: #060606;
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
    <!-- Header -->
    <header class="custom-header-bg">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container my-3">
                <div>
                    <a class="navbar-brand fw-bold fs-2 text-light" href="<?php echo e(route('manage_customer')); ?>">ANKHANG STORE</a>
                    <br>
                    <a class="navbar-brand fs-6 text-light">Nhân viên bán hàng</a>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-light me-2" href="<?php echo e(route('manage_customer')); ?>">Quay lại trang Quản lý đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light me-2" href="<?php echo e(route('new.order.form')); ?>">Tạo đơn hàng mới</a>
                        </li>
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
                            <a class="nav-link text-light" href="<?php echo e(route('manage_customer')); ?>">Quay lại trang Quản lý đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="<?php echo e(route('new.order.form')); ?>">Tạo đơn hàng mới</a>
                        </li>
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
        <h2 class="text-center fw-bold my-4 text-success">LỊCH SỬ ĐƠN HÀNG</h2>

        <div class="">
            <form action="<?php echo e(route('search.order')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-3">
                        <label for="searchOrderId">Mã đơn hàng:</label>
                        <input type="text" name="searchOrderId" id="searchOrderId" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="searchCustomerName">Tên khách hàng:</label>
                        <input type="text" name="searchCustomerName" id="searchCustomerName" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="searchOrderDate">Ngày đặt hàng:</label>
                        <input type="date" name="searchOrderDate" id="searchOrderDate" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="searchEmployeeName">Tên nhân viên:</label>
                        <input type="text" name="searchEmployeeName" id="searchEmployeeName" class="form-control">
                    </div>
                </div>
                <div class="text-center mb-3">
                    <button type="reset" class="btn btn-secondary mt-3" id="resetButton">Làm mới</button>
                    <button type="submit" class="btn btn-primary mt-3">Tìm kiếm</button>
                </div>
            </form>
        </div>

        <table class="table table-bordered text-center border border-dark table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <!-- <th>Số điện thoại</th> -->
                    <th>Ngày đặt hàng</th>
                    <th>Giờ đặt hàng</th>
                    <!-- <th colspan="3">Danh sách sản phẩm</th> -->
                    <!-- <th>Phương Thức Thanh Toán</th> -->
                    <th>Tổng tiền</th>
                    <!-- <th>Số tiền khách đưa</th>
                    <th>Số tiền trả lại khách</th> -->
                    <th>Tên nhân viên</th>
                    <th>Chi tiết</th>
                    <th>Hành động</th>
                </tr>
                <!-- <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                </tr> -->
            </thead>
            <tbody class="bg-light" id="orderTableBody">
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $orderDetails = App\Models\ChiTietDonHang::where('MaHD', $order->MaHD)->get();
                    ?>
                    <tr>
                        <td rowspan="<?php echo e($orderDetails->count()); ?>"><?php echo e($loop->iteration); ?></td>
                        <td rowspan="<?php echo e($orderDetails->count()); ?>"><?php echo e($order->MaHD); ?></td>
                        <td rowspan="<?php echo e($orderDetails->count()); ?>"><?php echo e($order->TenKhachHang); ?></td>
                        <!-- <td rowspan="<?php echo e($orderDetails->count()); ?>"><?php echo e($order->soDienThoai); ?></td> -->
                        <td rowspan="<?php echo e($orderDetails->count()); ?>"><?php echo e(\Carbon\Carbon::parse($order->NgayDatHang)->format('d/m/Y')); ?></td>
                        <td rowspan="<?php echo e($orderDetails->count()); ?>"><?php echo e(\Carbon\Carbon::parse($order->GioDatHang)->format('H:i')); ?></td>
                        <?php $__currentLoopData = $orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $product = App\Models\SanPham::find($detail->MaSP);
                            ?>
                            <?php if($index > 0): ?>
                                <tr>
                            <?php endif; ?>
                            <!-- <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($product ? $product->tensanpham : 'N/A'); ?></td>
                            <td><?php echo e($detail->soLuong); ?></td> -->
                            <?php if($index === 0): ?>
                                <!-- <td rowspan="<?php echo e($orderDetails->count()); ?>"><?php echo e($order->PhuongThucThanhToan); ?></td> -->
                                <td rowspan="<?php echo e($orderDetails->count()); ?>"><?php echo e(number_format($order->tongtien, 0, ',', '.')); ?></td>
                                <!-- <td rowspan="<?php echo e($orderDetails->count()); ?>"><?php echo e(number_format($orderDetails->first()->soTienKhachDua ?? 0, 0, ',', '.')); ?></td>
                                <td rowspan="<?php echo e($orderDetails->count()); ?>"><?php echo e(number_format($orderDetails->first()->soTienTraLaiKhach ?? 0, 0, ',', '.')); ?></td> -->
                                <td rowspan="<?php echo e($orderDetails->count()); ?>">
                                    <?php
                                        // Truy vấn thông tin nhân viên từ MaNV
                                        $employee = App\Models\Employee::find($order->MANV);
                                        // Kiểm tra xem nhân viên có tồn tại không trước khi truy cập thuộc tính
                                        $hotendaydu = $employee ? $employee->hotendaydu : 'N/A';
                                        echo $hotendaydu;
                                    ?>
                                </td>
                                <td rowspan="<?php echo e($orderDetails->count()); ?>">
                                    <a href="<?php echo e(route('order.detail', ['id' => $order->id])); ?>" class="btn btn-info">Xem</a>
                                </td>
                                <td rowspan="<?php echo e($orderDetails->count()); ?>">
                                    <button class="btn btn-danger delete-btn" data-id="<?php echo e($order->id); ?>">Xóa</button>
                                    <a href="<?php echo e(route('export.invoice', $order->id)); ?>" target="_blank" class="btn btn-primary">Xuất PDF</a>
                                </td>
                            <?php endif; ?>
                            <?php if($index > 0): ?>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <!-- Popup cho việc xác nhận xóa -->
    <div class="modal" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa đơn hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn chắc chắn muốn xóa chứ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Có</button>
                </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('resetButton').addEventListener('click', function () {
                // Làm trống các trường nhập liệu
                document.getElementById('searchOrderId').value = '';
                document.getElementById('searchCustomerName').value = '';
                document.getElementById('searchOrderDate').value = '';
                document.getElementById('searchEmployeeName').value = '';
                
                // Tải lại trang
                window.location.href = "<?php echo e(route('order.history')); ?>";
            }); 

            // Lắng nghe sự kiện click vào nút Xóa
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Hiển thị popup xác nhận
                    if (confirm("Bạn chắc chắn muốn xóa chứ?")) {
                        const orderId = button.getAttribute('data-id');
                        // Gửi yêu cầu xóa đến máy chủ thông qua Ajax
                        fetch(`/delete-order/${orderId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                                // Xóa hàng trong bảng khi xóa đơn hàng thành công
                                button.closest('tr').remove();
                                // Hiển thị thông báo xóa thành công
                                alert("Đơn hàng đã được xóa thành công!");
                            }
                        })
                        .catch(error => console.error('Error:', error));
                    }
                });
            });
        });
    </script>
</body>
</html><?php /**PATH C:\Users\lpn31\OneDrive - IT\Desktop\Cuoi_ki\store.com - Backup - 23.05 - 13h37\resources\views/order/history_order.blade.php ENDPATH**/ ?>