# 📱 AN KHANG STORE – POINT OF SALE (POS) SYSTEM

> **Môn học:** 503073 – Web Programming and Applications  
> **Trường Đại học Tôn Đức Thắng – Khoa CNTT**

---

## 🧾 Giới thiệu dự án

**AN KHANG STORE** là một hệ thống **Point of Sale (POS)** được xây dựng nhằm phục vụ việc bán hàng tại các cửa hàng điện thoại và phụ kiện điện tử.  
Khác với website thương mại điện tử (E-commerce), **người mua hàng không thể truy cập hệ thống này** — ứng dụng chỉ dành cho **nhân viên bán hàng và quản trị viên**.

---

## 👥 Thành viên nhóm

| Họ và Tên | MSSV | Vai trò |
|------------|-------|----------|
| Trần Khiết Lôi | 52200216 | Backend Developer |
| Trần Hồ Hoàng Vũ | 52200214 | Fullstack Developer |
| Phạm Tuấn Đạt | 52200207 | Frontend Developer |
| Nguyễn Đức Trung | 52200063 | Database & Testing |

---

## 🎯 Mục tiêu hệ thống

- Xây dựng hệ thống POS đơn giản, trực quan, hiệu quả cho cửa hàng điện thoại.
- Quản lý nhân viên, sản phẩm, khách hàng, giao dịch, báo cáo doanh thu.
- Hỗ trợ gửi email tự động, đăng nhập 1 phút cho nhân viên mới, phân quyền rõ ràng.

---

## ⚙️ Công nghệ sử dụng

- **Backend:** PHP Laravel Framework  
- **Frontend:** HTML, CSS, Bootstrap, JavaScript, jQuery  
- **Database:** MySQL (thông qua XAMPP)  
- **Tools:** Composer, Artisan CLI, Blade Template Engine  
- **Hosting/Server (demo):** Localhost / PHP Artisan Serve  
- **Email Service:** Laravel Mail với Gmail SMTP  

---

## 🧩 Các chức năng chính

### 1️⃣ Quản lý tài khoản (Account Management)
- Admin mặc định: `username: admin`, `password: admin`
- Admin có thể:
  - Tạo tài khoản nhân viên mới (yêu cầu nhập Gmail)
  - Gửi **email tự động** chứa link đăng nhập có hiệu lực **1 phút**
  - Khoá / mở khoá tài khoản nhân viên
  - Xem hồ sơ, avatar, doanh thu cá nhân của nhân viên
- Nhân viên:
  - Phải đăng nhập qua email lần đầu, sau đó đổi mật khẩu mới
  - Có thể cập nhật avatar, đổi mật khẩu
  - Không thể truy cập hệ thống nếu chưa đổi mật khẩu lần đầu

---

### 2️⃣ Quản lý sản phẩm (Product Management)
- Admin có thể:
  - Thêm, sửa, xoá, xem danh sách sản phẩm
  - Xem các thuộc tính: mã vạch, tên, loại, thương hiệu, giá nhập, giá bán, ngày tạo, mô tả
  - Chặn xoá sản phẩm đã từng xuất hiện trong đơn hàng
- Nhân viên chỉ có quyền xem danh sách sản phẩm (không thấy giá nhập, không có nút xoá/sửa)

---

### 3️⃣ Quản lý khách hàng (Customer Management)
- Khi thanh toán, nhân viên nhập **số điện thoại khách hàng**
  - Nếu khách đã tồn tại → tự động hiển thị tên, địa chỉ
  - Nếu khách mới → hệ thống tự tạo tài khoản khách hàng
- Nhân viên có thể xem:
  - Thông tin khách hàng
  - Lịch sử giao dịch
  - Chi tiết từng đơn hàng (sản phẩm, số lượng, tiền thừa, ngày, tổng tiền)
- Tìm kiếm khách hàng bằng số điện thoại với xác minh từ DB

---

### 4️⃣ Xử lý giao dịch (Transaction Processing)
- Nhân viên có thể:
  - Thêm sản phẩm vào đơn hàng bằng **tìm kiếm hoặc nhập mã vạch**
  - Xem danh sách sản phẩm trong đơn hàng kèm số lượng, giá bán, tổng tiền
  - Cập nhật tự động tổng tiền khi thêm / sửa / xoá sản phẩm
  - Nhập tiền khách đưa → hệ thống tính tiền thừa tự động
  - In hóa đơn dưới dạng **PDF** (`order_invoice_pdf.blade.php`)
- Các chức năng xử lý:
  - `new_order_form.blade.php` – Tạo đơn hàng
  - `confirm_order.blade.php` – Xác nhận đơn hàng
  - `history_order.blade.php` – Lịch sử đơn hàng
  - `order_detail.blade.php` – Chi tiết đơn hàng

---

### 5️⃣ Báo cáo & Thống kê (Reporting & Analytics)
- Hiển thị:
  - Doanh thu theo mốc thời gian: **hôm nay, hôm qua, 7 ngày qua, tháng này**, hoặc **tùy chọn khoảng thời gian**
  - Tổng doanh thu, số đơn hàng, số lượng sản phẩm
  - Lợi nhuận (chỉ admin xem được)
- Có thể xem chi tiết từng hóa đơn, thống kê theo nhân viên

---

## 🧱 Cấu trúc thư mục (dự kiến)

```
an-khang-store/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── UserController.php
│   │   │   ├── SanPhamController.php
│   │   │   ├── CustomerController.php
│   │   │   ├── OrderController.php
│   │   │   └── DashboardController.php
│   │   └── Middleware/
│   └── Models/
│       ├── User.php
│       ├── SanPham.php
│       ├── KhachHang.php
│       ├── DonHang.php
│       └── ChiTietDonHang.php
│
├── resources/
│   └── views/
│       ├── backend/
│       │   ├── auth/
│       │   ├── admin/
│       │   ├── employee/
│       │   ├── orders/
│       │   ├── customers/
│       │   └── products/
│       └── modal/
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── public/
│   └── uploads/
│
├── routes/
│   └── web.php
│
└── .env
```

---

## 🔑 Tài khoản mẫu (Demo)

| Loại tài khoản | Username | Password |
|----------------|-----------|-----------|
| Admin | `admin` | `admin` |
| Nhân viên | `nhanvien01` | `nhanvien01` *(tự động tạo và nhận email link kích hoạt)* |

📺 **Demo Video:** [YouTube Link](https://youtu.be/XLwuIJpsN-M)

---

## 🚀 Cài đặt & Chạy dự án

### 1️⃣ Cài đặt môi trường
```bash
git clone https://github.com/<your_username>/an-khang-store.git
cd an-khang-store
composer install
cp .env.example .env
php artisan key:generate
```

### 2️⃣ Cấu hình `.env`
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ankhang_store
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=<your_gmail>
MAIL_PASSWORD=<your_app_password>
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=<your_gmail>
MAIL_FROM_NAME="AN KHANG STORE"
```

### 3️⃣ Tạo database & chạy migration
```bash
php artisan migrate --seed
```

### 4️⃣ Chạy server
```bash
php artisan serve
```
→ Truy cập: **http://127.0.0.1:8000**

---

## 📈 Định hướng phát triển tương lai
- Tích hợp **API RESTful** để mở rộng kết nối với ứng dụng mobile.  
- Áp dụng **Vue.js hoặc ReactJS** cho frontend hiện đại hơn.  
- Hỗ trợ **in hóa đơn trực tiếp** và **QR thanh toán tự động**.  
- Thêm **dashboard real-time** cho admin với biểu đồ doanh thu.  

---

## 🧠 Kiến thức áp dụng
- Laravel MVC Architecture  
- Blade Template & Routing  
- Laravel Mail (SMTP Gmail)  
- MySQL CRUD Operations  
- jQuery Event Handling & AJAX  
- Bootstrap 5 Responsive Design  

---

## 📅 Thông tin thêm
- **Lớp:** 22050301  
- **Khoá:** 26  
- **Học kỳ:** 2/2023–2024  
- **Khoa:** Công nghệ Thông tin – Đại học Tôn Đức Thắng  

---

> © 2024 AN KHANG STORE Team – Trần Khiết Lôi, Trần Hồ Hoàng Vũ, Phạm Tuấn Đạt, Nguyễn Đức Trung.  
> All rights reserved.
