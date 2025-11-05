<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo đơn hàng mới - ANKHANG STORE </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        .custom-header-bg {
            background-color: #008c28;
        }
        .custom-footer-bg {
            background-color: #008c28;
        }
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
        .quantity-input {
            width: 80px;
        }
        .button-del {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="custom-header-bg">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
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
                            <a class="nav-link text-light me-2" href="<?php echo e(route('order.history')); ?>">Xem Lịch sử đơn hàng</a>
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
        <h2 class="text-center fw-bold mb-4 text-success">TẠO ĐƠN HÀNG MỚI</h2>
        <form action="<?php echo e(route('place.order')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row mb-3">
                <div class="col-sm-9">
                    <label for="MaHD" class="form-label">Mã đơn hàng:</label>
                    <input type="text" id="MaHD" name="MaHD" class="form-control" readonly>
                </div>
                <div class="col-sm-3 align-self-end">
                    <button type="button" class="btn btn-sm btn-secondary w-100" id="generateMaHD">Tạo mã đơn hàng</button>
                </div>
            </div>  
            <!-- Các trường thông tin khách hàng -->
            <div class="row mb-3">
                <div class="col-sm-9">
                    <label for="phoneNumber" class="form-label">Số điện thoại:</label>
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Nhập số điện thoại..." required>
                </div>
                <div class="col-sm-3 align-self-end">
                    <button type="button" class="btn btn-sm btn-secondary w-100" id="checkPhoneNumber">Kiểm tra</button>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-9">
                    <label for="MaKhachHang" class="form-label">Mã khách hàng:</label>
                    <input type="text" id="MaKhachHang" name="MaKhachHang" class="form-control" readonly>
                </div>
                <div class="col-sm-3 align-self-end">
                    <button type="button" class="btn btn-sm btn-secondary w-100" id="generateMaKH">Tạo mã khách hàng</button>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-9">
                    <label for="TenKhachHang" class="form-label">Tên khách hàng:</label>
                    <input type="text" id="TenKhachHang" name="TenKhachHang" class="form-control" placeholder="Nhập tên khách hàng..." required>
                </div>
                <div class="col-sm-3">
                    <label for="ngaysinh" class="form-label">Ngày sinh:</label>
                    <input type="date" id="ngaysinh" name="ngaysinh" class="form-control" required>
                </div>
            </div> 
            <div class="row mb-3">
                <div class="col-sm-9">
                    <label for="diaChi" class="form-label">Địa chỉ:</label>
                    <input type="text" id="diaChi" name="diaChi" class="form-control" placeholder="Nhập địa chỉ..." required>
                </div>
                <div class="col-sm-3">
                    <label for="NgayDatHang" class="form-label">Ngày đặt hàng:</label>
                    <input type="date" id="NgayDatHang" name="NgayDatHang" class="form-control" required>
                </div>
            </div>
            <!-- Thẻ sản phẩm và số lượng -->
            <div id="productList" class="mb-3">
                <div class="product">
                    <div class="mb-3">
                        <div class="row mb-3">
                            <!-- Thêm input text cho việc tìm kiếm -->
                            <div class="col-9">
                                <label for="searchProduct" class="form-label">Tìm kiếm sản phẩm:</label>
                                <input type="text" id="searchProduct" class="form-control" placeholder="Nhập tên sản phẩm...">
                                <!-- Danh sách hiển thị kết quả tìm kiếm -->
                                <ul id="productSuggestions" class="list-group my-2">
                                    <!-- Các kết quả tìm kiếm sẽ được hiển thị ở đây -->
                                </ul>   
                                <p id="noProductFound" class="text-danger mt-2" style="display: none;">Không tìm thấy sản phẩm.</p>
                            </div>
                            <div class="col-3">
                                <label for="GioDatHang" class="form-label">Giờ đặt hàng:</label>
                                <input type="time" id="GioDatHang" name="GioDatHang" class="form-control" required>
                            </div>
                        </div>
                        <div>
                            <label>Danh sách sản phẩm đã chọn</label>
                        </div>
                        <div>
                            <table class="table table-bordered my-2 text-center">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody id="orderList">
                                    <!-- Sản phẩm được chọn sẽ được hiển thị ở đây -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Các trường thông tin thanh toán và nhân viên -->
            <div class="row mb-3">
                <div class="col">
                    <label for="PhuongThucThanhToan" class="form-label">Phương thức thanh toán:</label>
                    <select id="PhuongThucThanhToan" name="PhuongThucThanhToan" class="form-select" required>
                        <option selected value="">Chọn phương thức thanh toán</option>
                        <option value="TienMat">Tiền mặt</option>
                        <option value="ChuyenKhoan">Chuyển khoản</option>
                        <option value="The">Thẻ</option>
                    </select>
                </div>
                <div class="col-auto align-self-end">
                    <label for="soTienKhachDua" class="form-label">Số tiền khách đưa:</label>
                    <input type="number" id="soTienKhachDua" name="soTienKhachDua" class="form-control" placeholder="Nhập số tiền...">
                </div>
            </div>
            <div class="mb-3">
                <label for="TenNhanVien" class="form-label">Tên nhân viên:</label>
                <select name="TenNhanVien" id="TenNhanVien" class="form-select" required>
                    <option selected value="">Chọn nhân viên</option>
                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->hotendaydu); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <button type="reset" class="btn btn-primary">Làm mới</button>
                </div>
                <div class="col">
                    <button type="submit" id="submitOrderForm" class="btn btn-success float-end">Đặt hàng</button>
                </div>
            </div>
        </form>
    </div>
    
    <!-- Footer -->
    <footer class="footer mt-auto py-3 custom-footer-bg">
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
        // Tạo tự động MaHD
        const generateMaHDButton = document.getElementById('generateMaHD');
        generateMaHDButton.addEventListener('click', function () {
            axios.get('<?php echo e(route("generate.mahd")); ?>')
                .then(response => {
                    document.getElementById('MaHD').value = response.data.newMaHD;
                })
                .catch(error => {
                    console.error('Error generating MaHD:', error);
                });
        });

        // Tạo tự động MaKhachHang
        const generateMaKHButton = document.getElementById('generateMaKH');
        generateMaKHButton.addEventListener('click', function () {
            axios.get('<?php echo e(route("generate.makh")); ?>')
                .then(response => {
                    document.getElementById('MaKhachHang').value = response.data.newMaKH;
                })
                .catch(error => {
                    console.error('Error generating MaKH:', error);
                });
        });

        // Kiểm tra số điện thoại đã tồn tại hay chưa
        const checkPhoneNumberButton = document.getElementById('checkPhoneNumber');
        checkPhoneNumberButton.addEventListener('click', function () {
            const phoneNumber = document.getElementById('phoneNumber').value;
            axios.get('<?php echo e(route("check.phone")); ?>', {
                params: {
                    phoneNumber: phoneNumber
                }
            })
            .then(response => {
                if (response.data.exists) {
                    document.getElementById('MaKhachHang').value = response.data.customer.MaKH;
                    document.getElementById('TenKhachHang').value = response.data.customer.TenKH;
                    document.getElementById('diaChi').value = response.data.customer.diaChi;
                    document.getElementById('ngaysinh').value = response.data.customer.ngaysinh;
                } else {
                    alert('Số điện thoại không tồn tại. Thông tin khách hàng mới sẽ được lưu.');
                }
            })
            .catch(error => {
                console.error('Error checking phone number:', error);
            });
        });

        // Tìm kiếm sản phẩm
        const searchInput = document.getElementById('searchProduct');
        const productSuggestions = document.getElementById('productSuggestions');
        const noProductFound = document.getElementById('noProductFound');
        searchInput.addEventListener('input', function () {
            const keyword = this.value.trim();
            axios.get('<?php echo e(route("search.product")); ?>', {
                params: {
                    keyword: keyword
                }
            })
            .then(response => {
                productSuggestions.innerHTML = '';
                noProductFound.style.display = 'none'; // Ẩn thông báo không tìm thấy sản phẩm
                if (response.data.length === 0) {
                    noProductFound.style.display = 'block'; // Hiển thị thông báo không tìm thấy sản phẩm
                } else {
                    noProductFound.style.display = 'none';
                }
                response.data.forEach(product => {
                    if (product.tensanpham.toLowerCase().includes(keyword.toLowerCase())) {
                        const listItem = document.createElement('li');
                        listItem.classList.add('list-group-item');
                        listItem.textContent = product.tensanpham;
                        listItem.addEventListener('click', function () {
                            addProductToOrder(product);
                            searchInput.value = ''; // Clear search input
                            productSuggestions.innerHTML = ''; // Clear suggestions
                        });
                        productSuggestions.appendChild(listItem);
                    }
                });
            })
            .catch(error => {
                console.error('Error searching for products:', error);
            });
        });

        // Thêm sản phẩm vào đơn hàng
        function addProductToOrder(product) {
            const orderList = document.getElementById('orderList');
            const orderItem = document.createElement('tr');
            orderItem.innerHTML = `
                <td class="stt"></td>
                <td>
                    <input type="hidden" name="products[]" value="${product.tensanpham}">
                    <span>${product.tensanpham}</span>
                </td>
                <td class="button-del">
                    <input type="number" name="quantities[]" value="1" min="1" class="form-control quantity-input">
                </td">
                <td>
                    <button type="button" class="removeProduct btn btn-sm btn-danger">Xóa</button>
                </td>
            `;
            orderList.appendChild(orderItem);
            // Thêm sự kiện cho nút xóa
            orderItem.querySelector('.removeProduct').addEventListener('click', function () {
                orderItem.remove();
            });
            // Cập nhật số thứ tự
            updateOrderListSTT();
        }
        // Đánh số thứ tự cho các sản phẩm
        function updateOrderListSTT() {
            const orderList = document.getElementById('orderList');
            const rows = orderList.getElementsByTagName('tr');
            for (let i = 0; i < rows.length; i++) {
                rows[i].querySelector('.stt').textContent = i + 1;
            }
        }

        // Lưu ngày sinh khách hàng vào localStorage
        const submitOrderFormButton = document.getElementById('submitOrderForm');
        submitOrderFormButton.addEventListener('click', function () {
            const ngaySinh = document.getElementById('ngaysinh').value;
            localStorage.setItem('ngaysinh', ngaySinh);
        });

        // Mặc định ngày đặt hàng là ngày hiện tại
        const ngayDatHangInput = document.getElementById('NgayDatHang');
        const today = new Date().toISOString().split('T')[0];
        ngayDatHangInput.value = today;

        // Mặc định giờ đặt hàng là giờ hiện tại
        const gioDatHangInput = document.getElementById('GioDatHang');
        const now = new Date().toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit' });
        gioDatHangInput.value = now;
    });
</script>
</html><?php /**PATH C:\Users\ASUS\Downloads\store.com - Backup - 19.05 - 12h24\store.com - Backup - 19.05 - 12h24\resources\views/order/new_order_form.blade.php ENDPATH**/ ?>