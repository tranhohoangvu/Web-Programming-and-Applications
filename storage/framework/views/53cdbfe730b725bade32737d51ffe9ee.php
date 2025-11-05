<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử đơn hàng - ANKHANG STORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <div class="container my-3">
                <div>
                    <a class="navbar-brand fw-bold fs-2 text-light" href="<?php echo e(route('manage_customer')); ?>">ANKHANG STORE</a>
                    <br>
                    <a class="navbar-brand fs-6 text-light">Nhân viên bán hàng</a>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
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
        <h2 class="text-center fw-bold my-4">Lịch sử đơn hàng</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã Hóa Đơn</th>
                    <th scope="col">Tên Khách Hàng</th>
                    <th scope="col">Ngày Đặt Hàng</th>
                    <th scope="col">Danh sách sản phẩm</th>
                    <th scope="col">Phương Thức Thanh Toán</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Số tiền khách đưa</th>
                    <th scope="col">Số tiền trả lại khách</th>
                    <th scope="col">Tên Nhân Viên</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($order->MaHD); ?></td>
                        <td><?php echo e($order->TenKhachHang); ?></td>
                        <td><?php echo e($order->NgayDatHang); ?></td>
                        <td>
                            <?php
                            // Lấy danh sách sản phẩm từ bảng chiTietDonHang với MaHD tương ứng
                            $orderDetails = App\Models\ChiTietDonHang::where('MaHD', $order->MaHD)->get();
                            // Tạo một mảng để lưu các tên sản phẩm
                            $productNames = [];
                            // Duyệt qua danh sách chi tiết đơn hàng và lấy thông tin tên sản phẩm
                            foreach($orderDetails as $detail) {
                                // Truy vấn thông tin sản phẩm từ MaSP
                                $product = App\Models\SanPham::find($detail->MaSP);
                                // Nếu sản phẩm tồn tại, thêm tên vào mảng
                                if($product) {
                                    $productNames[] = $product->tensanpham;
                                }
                            }
                            // Kiểm tra nếu có nhiều sản phẩm
                            if(count($productNames) > 1) {
                                // Hiển thị dưới dạng danh sách
                                echo '<ul>';
                                foreach($productNames as $productName) {
                                    echo '<li>' . $productName . '</li>';
                                }
                                echo '</ul>';
                            } else {
                                // Hiển thị dưới dạng text bình thường
                                echo implode(', ', $productNames);
                            }
                            ?>
                        </td>
                        <td><?php echo e($order->PhuongThucThanhToan); ?></td>
                        <td>
                            <?php
                                // Lấy giá trị tổng tiền từ cột tongtien của bảng HoaDon
                                $tongtien = $order->tongtien;
                                // Định dạng hiển thị giá tiền
                                echo number_format($tongtien, 0, ',', '.');                               
                            ?>
                        </td>
                        <td>
                            <?php
                                // Lấy giá trị số tiền khách đưa từ cột soTienKhachDua của bảng ChiTietHoaDon
                                $soTienKhachDua = $detail->soTienKhachDua;
                                // Định dạng hiển thị giá tiền
                                echo number_format($soTienKhachDua, 0, ',', '.');                               
                            ?>
                        </td>
                        <td>
                            <?php
                                // Lấy giá trị số tiền trả lại khách đưa từ cột soTienTraLaiKhach của bảng ChiTietHoaDon
                                $soTienTraLaiKhach = $detail->soTienTraLaiKhach;
                                // Định dạng hiển thị giá tiền
                                echo number_format($soTienTraLaiKhach, 0, ',', '.');                               
                            ?>
                        </td>
                        <td>
                            <?php
                                // Truy vấn thông tin nhân viên từ MaNV
                                $employee = App\Models\Employee::find($order->MANV);
                                // Kiểm tra xem nhân viên có tồn tại không trước khi truy cập thuộc tính
                                $hotendaydu = $employee ? $employee->hotendaydu : 'N/A';
                                echo $hotendaydu;
                            ?>
                        </td>
                        <td>
                            <button class="btn btn-danger delete-btn" data-id="<?php echo e($order->id); ?>">Xóa</button>
                        </td>
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
    <footer class="footer mt-auto py-3 bg-success">
        <div class="container d-flex justify-content-center">
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
</html>
<?php /**PATH C:\Users\lpn31\OneDrive - IT\Desktop\store.com\resources\views/order/history_order.blade.php ENDPATH**/ ?>