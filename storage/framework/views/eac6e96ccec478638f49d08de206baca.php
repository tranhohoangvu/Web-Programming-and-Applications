<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo đơn hàng mới - ANKHANG STORE </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        body {
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .createOrder {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container {
            padding: 20px;
        }
        label {
            font-weight: bold;
        }
        footer {
            background-color: #060606;
            color: #fff;
            text-align: center;
            padding: 50px 0;
            flex-shrink: 0;
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
            <div class="container">
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
                            <a class="nav-link text-light" href="<?php echo e(route('order.history')); ?>">Xem Lịch sử đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="<?php echo e(route('auth.logout')); ?>">Đăng xuất</a>
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
                            <a class="nav-link text-light" href="<?php echo e(route('order.history')); ?>">Xem Lịch sử đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="<?php echo e(route('auth.logout')); ?>">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Nội dung trang -->
    <div class="createOrder container my-5 col-sm-6">
        <h2 class="text-center fw-bold">Tạo đơn hàng mới</h2>
        <form action="<?php echo e(route('place.order')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row mb-3">
                <div class="col-sm-9">
                    <label for="MaHD" class="form-label">Mã Hóa Đơn:</label>
                    <input type="text" id="MaHD" name="MaHD" class="form-control" required>
                </div>
                <div class="col-sm-3 align-self-end">
                    <button type="button" class="btn btn-sm btn-secondary w-100" id="generateMaHD">Tạo Mã Hóa Đơn</button>
                </div>
            </div>
            <!-- Các trường thông tin khách hàng -->
            <div class="row mb-3">
                <div class="col-sm-9">
                    <label for="phoneNumber" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required>
                </div>
                <div class="col-sm-3 align-self-end">
                    <button type="button" class="btn btn-sm btn-primary w-100" id="checkPhoneNumber">Kiểm tra</button>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-9">
                    <label for="MaKhachHang" class="form-label">Mã Khách Hàng:</label>
                    <input type="text" id="MaKhachHang" name="MaKhachHang" class="form-control" required>
                </div>
                <div class="col-sm-3 align-self-end">
                    <button type="button" class="btn btn-sm btn-secondary w-100" required>Tạo Mã Khách Hàng</button>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-9">
                    <label for="TenKhachHang" class="form-label">Tên Khách Hàng:</label>
                    <input type="text" id="TenKhachHang" name="TenKhachHang" class="form-control" required>
                </div>
                <div class="col-sm-3">
                    <label for="NgayDatHang" class="form-label">Ngày Đặt Hàng:</label>
                    <input type="date" id="NgayDatHang" name="NgayDatHang" class="form-control" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="diaChi" class="form-label">Địa Chỉ:</label>
                <input type="text" id="diaChi" name="diaChi" class="form-control" required>
            </div>
            <!-- Nút thêm sản phẩm -->
            <div class="mb-3 d-flex justify-content-end">
                <button type="button" id="addProduct" class="btn btn-sm btn-success">Thêm Sản Phẩm</button>
            </div>
            <!-- Thẻ sản phẩm và số lượng -->
            <div id="productList" class="mb-3">
                <div class="product">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="products" class="form-label">Sản Phẩm:</label>
                            <select name="products[]" class="productSelect form-select" required>
                                <option selected value="">Chọn sản phẩm</option>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($product->id); ?>"><?php echo e($product->tensanpham); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-auto align-self-end">
                            <label for="quantity" class="form-label">Số Lượng:</label>
                            <input type="number" name="quantities[]" class="quantityInput form-control" value="1" min="1" data-quantity="1">
                        </div>  
                    </div>
                    <button type="button" class="removeProduct btn btn-sm btn-danger my-2">Xóa</button>
                </div>
            </div>
            <!-- Các trường thông tin thanh toán và nhân viên -->
            <div class="row mb-3">
                <div class="col">
                    <label for="PhuongThucThanhToan" class="form-label">Phương Thức Thanh Toán:</label>
                    <select id="PhuongThucThanhToan" name="PhuongThucThanhToan" class="form-select" required>
                        <option selected value="">Chọn phương thức thanh toán</option>
                        <option value="TienMat">Tiền mặt</option>
                        <option value="ChuyenKhoan">Chuyển khoản</option>
                        <option value="The">Thẻ</option>
                    </select>
                </div>
                <div class="col-auto align-self-end">
                    <label for="soTienKhachDua" class="form-label">Số Tiền Khách Đưa:</label>
                    <input type="number" id="soTienKhachDua" name="soTienKhachDua" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <label for="TenNhanVien" class="form-label">Tên Nhân Viên:</label>
                <select name="TenNhanVien" id="TenNhanVien" class="form-select" required>
                    <option selected value="">Chọn nhân viên</option>
                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->hotendaydu); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <button type="reset" class="btn btn-secondary">Làm mới</button>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary float-end">Đặt Hàng</button>
                </div>
            </div>
        </form>
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
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Lấy ra nút "Thêm sản phẩm"
        const addProductButton = document.getElementById('addProduct');
        // Thêm sự kiện click cho nút "Thêm sản phẩm"
        addProductButton.addEventListener('click', function () {
            // Tạo một phần tử sản phẩm mới
            const newProduct = document.createElement('div');
            newProduct.classList.add('product', 'mb-3');
            newProduct.innerHTML = `
                <div class="row mb-3">
                    <div class="col">
                        <label for="products" class="form-label">Sản Phẩm:</label>
                        <select name="products[]" class="productSelect form-select" required>
                            <option selected value="">Chọn sản phẩm</option>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($product->id); ?>"><?php echo e($product->tensanpham); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-auto align-self-end">
                        <label for="quantity" class="form-label">Số Lượng:</label>
                        <input type="number" name="quantities[]" class="quantityInput form-control" value="1" min="1" data-quantity="1">
                    </div>  
                </div>
                <button type="button" class="removeProduct btn btn-sm btn-danger mt-2">Xóa</button>
            `;
            // Thêm sản phẩm mới vào danh sách
            document.getElementById('productList').appendChild(newProduct);
        });
        // Sự kiện xóa sản phẩm
        document.getElementById('productList').addEventListener('click', function (event) {
            if (event.target.classList.contains('removeProduct')) {
                event.target.closest('.product').remove();
            }
        });

        // // Lắng nghe sự kiện click vào nút Tạo Mã Hóa Đơn
        // document.getElementById('generateMaHD').addEventListener('click', function() {
        //     // Sinh mã hóa đơn dựa trên thời gian hiện tại
        //     const timestamp = Date.now();
        //     const maHD = 'AK' + timestamp;
        //     // Gán giá trị mã hóa đơn vào ô input
        //     document.getElementById('MaHD').value = maHD;
        // });
        // // Lắng nghe sự kiện click vào nút Tạo Mã Khách Hàng
        // document.getElementById('generateMaKH').addEventListener('click', function() {
        //     // Sinh mã khách hàng dựa trên thời gian hiện tại
        //     const timestamp = Date.now();
        //     const maKH = 'KH' + timestamp;
        //     // Gán giá trị mã khách hàng vào ô input
        //     document.getElementById('MaKhachHang').value = maKH;
        // });
    });
</script>
</html><?php /**PATH C:\Users\lpn31\OneDrive - IT\Desktop\store.com\resources\views/order/new_order_form.blade.php ENDPATH**/ ?>