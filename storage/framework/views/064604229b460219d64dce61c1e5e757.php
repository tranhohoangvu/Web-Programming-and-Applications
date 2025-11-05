<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thông Tin Sản Phẩm</title>
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
        .card-title {
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sửa Thông Tin Sản Phẩm</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('account.update', ['id' => $sanpham->id])); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group mb-3">
                                <label for="tensanpham">Tên Sản Phẩm:</label>
                                <input type="text" name="tensanpham" id="tensanpham" value="<?php echo e($sanpham->tensanpham); ?>" class="form-control" placeholder="Nhập tên sản phẩm">
                            </div>
                            <div class="form-group mb-3">
                                <label for="loaisanpham">Loại Sản Phẩm:</label>
                                <input type="text" name="loaisanpham" id="loaisanpham" value="<?php echo e($sanpham->loaisanpham); ?>" class="form-control" placeholder="Nhập loại sản phẩm">
                            </div>
                            <div class="form-group mb-3">
                                <label for="thuonghieu">Thương Hiệu:</label>
                                <input type="text" name="thuonghieu" id="thuonghieu" value="<?php echo e($sanpham->thuonghieu); ?>" class="form-control" placeholder="Nhập thương hiệu">
                            </div>
                            <div class="form-group mb-3">
                                <label for="gianhap">Giá Nhập:</label>
                                <input type="text" name="gianhap" id="gianhap" value="<?php echo e($sanpham->gianhap); ?>" class="form-control" placeholder="Nhập giá nhập">
                            </div>
                            <div class="form-group mb-3">
                                <label for="giaban">Giá Bán:</label>
                                <input type="text" name="giaban" id="giaban" value="<?php echo e($sanpham->giaban); ?>" class="form-control" placeholder="Nhập giá bán">
                            </div>
                            <div class="form-group mb-3">
                                <label for="ngaynhaphang">Ngày Nhập Hàng:</label>
                                <input type="date" name="ngaynhaphang" id="ngaynhaphang" value="<?php echo e($sanpham->ngaynhaphang); ?>" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="motasanpham">Mô Tả Sản Phẩm:</label>
                                <textarea name="motasanpham" id="motasanpham" class="form-control" rows="3" placeholder="Nhập mô tả sản phẩm"><?php echo e($sanpham->moTaSanPham); ?></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="hinhdaidien">Hình Sản Phẩm:</label>
                                <input type="file" name="hinhdaidien" id="hinhdaidien" class="form-control">
                                <img src="<?php echo e(asset('uploads/employees/' . $sanpham->anhdaidien)); ?>" width="70px" height="70px" alt="avatar" class="mt-2">
                            </div>
                            <div class="form-group mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH D:\LTWVUD\store.com - Backup - 19.05 - 12h24\store.com - Backup - 19.05 - 12h24\resources\views/backend/account/sanpham_edit.blade.php ENDPATH**/ ?>