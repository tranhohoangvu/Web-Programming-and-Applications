<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #e8f5e9;
        }
        .card {
            margin-top: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #28a745;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .card-body {
            padding: 30px;
            background-color: white;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            border-radius: 10px;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        label {
            font-weight: bold;
        }
        .btn-light {
            background-color: #f8f9fa;
            border-radius: 10px;
        }
        .btn-light:hover {
            background-color: #e2e6ea;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Thêm Sản Phẩm</h3>
                        <a href="{{route('account.sanpham')}}" class="btn btn-light">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{route('account.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="tensanpham">Tên Sản Phẩm:</label>
                                <input type="text" name="tensanpham" id="tensanpham" class="form-control" placeholder="Nhập tên sản phẩm">
                            </div>
                            <div class="form-group mb-3">
                                <label for="loaisanpham">Loại Sản Phẩm:</label><br>
                                <input type="radio" name="loaisanpham" id="di_dong" value="Di Động">
                                <label for="di_dong">Di động</label><br>
                                <input type="radio" name="loaisanpham" id="laptop" value="Laptop">
                                <label for="laptop">Laptop</label><br>
                                <input type="radio" name="loaisanpham" id="phu_kien" value="Phụ Kiện">
                                <label for="phu_kien">Phụ Kiện</label><br>
                                <input type="radio" name="loaisanpham" id="ipad" value="Ipad">
                                <label for="ipad">Ipad</label>
                            </div>
                            <div class="form-group mb-3">
                                <label for="thuonghieu">Thương Hiệu:</label>
                                <input type="text" name="thuonghieu" id="thuonghieu" class="form-control" placeholder="Nhập thương hiệu">
                            </div>
                            <div class="form-group mb-3">
                                <label for="gianhap">Giá Nhập:</label>
                                <input type="text" name="gianhap" id="gianhap" class="form-control" placeholder="Nhập giá nhập">
                            </div>
                            <div class="form-group mb-3">
                                <label for="giaban">Giá Bán:</label>
                                <input type="text" name="giaban" id="giaban" class="form-control" placeholder="Nhập giá bán">
                            </div>
                            <div class="form-group mb-3">
                                <label for="soLuongNhap">Số Lượng Nhập:</label>
                                <input type="text" name="soLuongNhap" id="soLuongNhap" class="form-control" placeholder="Nhập số lượng nhập">
                            </div>
                            <div class="form-group mb-3">
                                <label for="ngaynhaphang">Ngày Nhập Hàng:</label>
                                <input type="date" name="ngaynhaphang" id="ngaynhaphang" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="motasanpham">Mô Tả Sản Phẩm:</label>
                                <textarea name="motasanpham" id="motasanpham" class="form-control" rows="3" placeholder="Nhập mô tả sản phẩm"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="hinhdaidien">Hình Sản Phẩm:</label>
                                <input type="file" name="hinhdaidien" id="hinhdaidien" class="form-control">
                            </div>
                            <div class="form-group mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
