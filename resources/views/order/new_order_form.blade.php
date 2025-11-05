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
            background-color: #008c28;
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
        .nav-link {
            color: #fff !important;
            text-decoration: none !important; /* No underline */
            transition: color 0.3s ease-in-out !important;
        }   
        .nav-link:hover {
            color: #cccccc !important;
        }
        .table td {
            vertical-align: middle; /* Đảm bảo nội dung trong ô được căn giữa theo chiều dọc */
        }
        .table td .form-control.quantity-input {
            display: block;
            margin: 0 auto; /* Căn giữa ô input theo chiều ngang */
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="custom-header-bg">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <div>
                    <a class="navbar-brand fw-bold fs-2 text-light" href="{{ route('manage_customer') }}">ANKHANG STORE</a>
                    <br>
                    <a class="navbar-brand fs-6 text-light">Nhân viên bán hàng</a>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-light me-2" href="{{ route('manage_customer') }}">Quay lại trang Quản lý đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light me-2" href="http://127.0.0.1:8000/account/sanpham">Danh sách sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light me-2" href="{{ route('order.history') }}">Xem Lịch sử đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('auth.logout') }}">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
                <button class="btn btn-outline-light d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNav">
                    <span>&#9776;</span>
                </button>
                <div class="collapse d-md-none" id="mobileNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('manage_customer') }}">Quay lại trang Quản lý đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light me-2" href="http://127.0.0.1:8000/account/sanpham">Danh sách sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('order.history') }}">Xem Lịch sử đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('auth.logout') }}">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Nội dung trang -->
    <div class="createOrder container my-5 col-sm-6">
        <h2 class="text-center fw-bold mb-4 text-success">TẠO ĐƠN HÀNG MỚI</h2>
        <form action="{{ route('place.order') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-sm-9">
                    <label for="MaHD" class="form-label">Mã đơn hàng:</label>
                    <input type="text" id="MaHD" name="MaHD" class="form-control" placeholder="Mã đơn hàng sẽ được tạo tự động..." readonly>
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
                    <input type="text" id="MaKhachHang" name="MaKhachHang" class="form-control" placeholder="Mã khách hàng sẽ được tạo tự động..." readonly>
                </div>
                <div class="col-sm-3 align-self-end">
                    <button type="button" class="btn btn-sm btn-secondary w-100" id="generateMaKH" disabled>Tạo mã khách hàng</button>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-9">
                    <label for="TenKhachHang" class="form-label">Tên khách hàng:</label>
                    <input type="text" id="TenKhachHang" name="TenKhachHang" class="form-control" placeholder="Nhập tên khách hàng..." readonly>
                </div>
                <div class="col-sm-3">
                    <label for="ngaysinh" class="form-label">Ngày sinh:</label>
                    <input type="date" id="ngaysinh" name="ngaysinh" class="form-control" readonly>
                </div>
            </div> 
            <div class="row mb-3">
                <div class="col-sm-9">
                    <label for="diaChi" class="form-label">Địa chỉ:</label>
                    <input type="text" id="diaChi" name="diaChi" class="form-control" placeholder="Nhập địa chỉ..." required>
                </div>
                <div class="col-sm-3">
                    <label for="NgayDatHang" class="form-label">Ngày đặt hàng:</label>
                    <input type="date" id="NgayDatHang" name="NgayDatHang" class="form-control" readonly>
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
                                <input type="time" id="GioDatHang" name="GioDatHang" class="form-control" readonly>
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
                                        <th>Mã vạch</th>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá Bán</th>
                                        <th>Thành Tiền</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody id="orderList">
                                    <!-- Sản phẩm được chọn sẽ được hiển thị ở đây -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5"><strong>Tổng Tiền</strong></td>
                                        <td><strong id="totalAmount">0</strong></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
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
                    <input type="number" id="soTienKhachDua" name="soTienKhachDua" class="form-control" placeholder="Nhập số tiền..." required>
                </div>
            </div>
            <div class="mb-3">
                <label for="TenNhanVien" class="form-label">Tên nhân viên:</label>
                <input type="text" id="hotendaydu" name="hotendaydu" class="form-control" value="{{ auth()->user()->employee->hotendaydu }}" readonly>
                <input type="hidden" id="TenNhanVien" name="TenNhanVien" value="{{ auth()->user()->employee->id }}">
            </div>
            <div class="text-center mt-4">
                <button type="reset" id="resetFormButton" class="btn btn-primary">Làm mới</button>
                <button type="submit" id="submitOrderForm" class="btn btn-success" >Đặt hàng</button>
            </div>
        </form>
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
    document.addEventListener('DOMContentLoaded', function () {
        // Tạo tự động MaHD
        const generateMaHDButton = document.getElementById('generateMaHD');
        generateMaHDButton.addEventListener('click', function () {
            axios.get('{{ route("generate.mahd") }}')
                .then(response => {
                    document.getElementById('MaHD').value = response.data.newMaHD;
                })
                .catch(error => {
                    console.error('Error generating MaHD:', error);
                });
        });

        // Kiểm tra số điện thoại đã tồn tại hay chưa
        const checkPhoneNumberButton = document.getElementById('checkPhoneNumber');
        checkPhoneNumberButton.addEventListener('click', function () {
            const phoneNumber = document.getElementById('phoneNumber').value; 
            // Kiểm tra nếu trường số điện thoại trống
            if (!phoneNumber.trim()) {
                alert('Vui lòng nhập số điện thoại trước khi kiểm tra.');
                return; // Dừng thực hiện tiếp theo nếu số điện thoại trống
            }
            axios.get('{{ route("check.phone") }}', {
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
                    // Gỡ bỏ thuộc tính disabled khi số điện thoại không tồn tại
                    document.getElementById('generateMaKH').removeAttribute('disabled');
                    document.getElementById('TenKhachHang').removeAttribute('readonly');
                    document.getElementById('ngaysinh').removeAttribute('readonly');
                }
            })
            .catch(error => {
                console.error('Error checking phone number:', error);
            });
        });

        // Tạo tự động MaKhachHang
        const generateMaKHButton = document.getElementById('generateMaKH');
        generateMaKHButton.addEventListener('click', function () {
            axios.get('{{ route("generate.makh") }}')
                .then(response => {
                    document.getElementById('MaKhachHang').value = response.data.newMaKH;
                })
                .catch(error => {
                    console.error('Error generating MaKH:', error);
                });
        });

        // Tìm kiếm sản phẩm
        const searchInput = document.getElementById('searchProduct');
        const productSuggestions = document.getElementById('productSuggestions');
        const noProductFound = document.getElementById('noProductFound');
        const orderList = document.getElementById('orderList');
        const totalAmountCell = document.getElementById('totalAmount');
        searchInput.addEventListener('input', function () {
            const keyword = this.value.trim();
            axios.get('{{ route("search.product") }}', {
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
                    if (product.tensanpham.toLowerCase().includes(keyword.toLowerCase()) || product.MaVach.includes(keyword)) {
                        const listItem = document.createElement('li');
                        listItem.classList.add('list-group-item');
                        listItem.textContent = product.tensanpham + ' - ' + product.MaVach;
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
            // Clear product suggestions
            productSuggestions.innerHTML = '';
            const orderList = document.getElementById('orderList');
            const existingProductRow = Array.from(orderList.rows).find(row => {
                return row.querySelector('input[name="products[]"]').value === product.tensanpham;
            });
            // Sản phẩm đã tồn tại trong bảng, cập nhật số lượng và thành tiền
            if (existingProductRow) {
                const quantityInput = existingProductRow.querySelector('.quantity-input');
                const newQuantity = parseInt(quantityInput.value) + 1;
                quantityInput.value = newQuantity;
                updateThanhTien(existingProductRow, product.giaban);
            } 
            else // Sản phẩm chưa tồn tại trong bảng, thêm mới
            {
                const orderItem = document.createElement('tr');
                orderItem.innerHTML = `
                    <td class="stt"></td>
                    <td>
                        <input type="hidden" name="products[]" value="${product.MaVach}">
                        <span>${product.MaVach}</span>
                    </td>
                    <td>
                        <input type="hidden" name="products[]" value="${product.tensanpham}">
                        <span>${product.tensanpham}</span>
                    </td>
                    <td>
                        <input type="number" name="quantities[]" value="1" min="1" class="form-control quantity-input">
                    </td>
                    <td>
                        <input type="hidden" name="prices[]" value="${product.giaban}">
                        <span>${formatCurrency(product.giaban)}</span>
                    </td>
                    <td class="thanh-tien">
                        ${formatCurrency(product.giaban)}
                    </td>
                    <td>
                        <button type="button" class="removeProduct btn btn-sm btn-danger">Xóa</button>
                    </td>
                `;
                orderList.appendChild(orderItem);
                // Thêm sự kiện cho nút xóa
                orderItem.querySelector('.removeProduct').addEventListener('click', function () {
                    orderItem.remove();
                    updateOrderListSTT();
                    calculateTotalAmount();
                });
                // Thêm sự kiện cho ô nhập số lượng
                orderItem.querySelector('.quantity-input').addEventListener('input', function () {
                    updateThanhTien(orderItem, product.giaban);
                    calculateTotalAmount();
                });
                // Cập nhật số thứ tự
                updateOrderListSTT();
            }
            calculateTotalAmount();
        }
        // Cập nhật số thứ tự
        function updateOrderListSTT() {
            const rows = orderList.getElementsByTagName('tr');
            for (let i = 0; i < rows.length; i++) {
                rows[i].querySelector('.stt').textContent = i + 1;
            }
        }
        // Cập nhật thành tiền khi thay đổi số lượng
        function updateThanhTien(orderItem, price) {
            const quantity = parseFloat(orderItem.querySelector('.quantity-input').value);
            const thanhTien = quantity * price;
            orderItem.querySelector('.thanh-tien').textContent = formatCurrency(thanhTien);
        }
        // Tính tổng tiền
        function calculateTotalAmount() {
            let totalAmount = 0;
            const rows = orderList.getElementsByTagName('tr');
            for (let i = 0; i < rows.length; i++) {
                const thanhTien = parseFloat(rows[i].querySelector('.thanh-tien').textContent.replace(/\./g, ''));
                totalAmount += thanhTien;
            }
            document.getElementById('totalAmount').textContent = formatCurrency(totalAmount);
        }
        // Hàm định dạng số theo kiểu tiền tệ
        function formatCurrency(number) {
            return number.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Kiểm tra đã điền đầy đủ thông tin trong form trước khi gửi hay chưa
        const orderForm = document.querySelector('form');
        orderForm.addEventListener('submit', function (event) {
            let isValid = true;
            const requiredFields = ['MaHD', 'phoneNumber', 'MaKhachHang', 'TenKhachHang', 'ngaysinh', 'diaChi', 'NgayDatHang', 'GioDatHang', 'PhuongThucThanhToan', 'soTienKhachDua'];
            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('is-invalid');
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            if (!isValid) {
                event.preventDefault(); // Ngăn chặn gửi biểu mẫu nếu có lỗi
                alert('Vui lòng điền đầy đủ thông tin!');
            }
            // Kiểm tra nếu có ít nhất một sản phẩm
            const orderList = document.getElementById('orderList');
            if (orderList.getElementsByTagName('tr').length === 0) {
                isValid = false;
                alert('Vui lòng chọn ít nhất một sản phẩm!');
            }            
        });

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

        // Xóa sạch thông tin nhập và cập nhật ngày, giờ hiện tại khi click vào nút "reset"
        const resetButton = document.querySelector('button[type="reset"]');
        resetButton.addEventListener('click', function (event) {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của nút reset
            const form = document.querySelector('form'); // Chọn form cần reset
            form.reset(); // Reset form về trạng thái ban đầu

            const orderList = document.getElementById('orderList');
            orderList.innerHTML = ''; // Xóa toàn bộ nội dung bảng

            // Đặt lại tổng tiền về 0
            const totalAmountCell = document.getElementById('totalAmount');
            totalAmountCell.textContent = '0';

            // Kiểm tra và thiết lập thuộc tính readonly cho TenKhachHang
            const tenKhachHangInput = document.getElementById('TenKhachHang');
            if (!tenKhachHangInput.hasAttribute('readonly')) {
                tenKhachHangInput.setAttribute('readonly', 'readonly');
            }
            const ngaysinhInput =document.getElementById('ngaysinh');
            if (!ngaysinhInput.hasAttribute('readonly')) {
                ngaysinhInput.setAttribute('readonly', 'readonly');
            }
            const generateMaKHButton = document.getElementById('generateMaKH');
            if (!generateMaKHButton.hasAttribute('disabled')) {
                generateMaKHButton.setAttribute('disabled', 'disabled');
            }

            const noProductFound = document.getElementById('noProductFound');
            noProductFound.style.display = 'none'; // Ẩn thông báo không tìm thấy sản phẩm

            // Cập nhật ngày và giờ hiện tại cho ngày đặt hàng và giờ đặt hàng
            const today = new Date().toISOString().split('T')[0];
            const now = new Date().toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit' });
            ngayDatHangInput.value = today;
            gioDatHangInput.value = now;
        });
    });
</script>
</html>