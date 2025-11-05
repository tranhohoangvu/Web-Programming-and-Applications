
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/user_create.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/custormize.css')); ?>" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #008c28, #71b7e6);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        @keyframes slideIn {
            0% {
                transform: translateY(-100%);
            }
            100% {
                transform: translateY(0);
            }
        }

        .container {
            animation: slideIn 0.5s ease forwards;
            visibility: hidden;
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            border: 2px solid #004d00;
            border-radius: 8px;
            background-color: #f0f8ff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .container {
            animation: slideIn 0.5s ease forwards;
            visibility: hidden;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: auto;
            padding: 30px;
            border: 2px solid #004d00;
            border-radius: 8px;
            background-color: #f0f8ff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Thêm chiều cao và overflow */
            height: 100%; /* hoặc chiều cao phù hợp */
            overflow-y: auto;
        }


        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #004d00;
            text-transform: uppercase;
        }

        .form-group {
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            color: #004d00;
        }

        .required::after {
            content: '*';
            color: red;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url('down-arrow.png') no-repeat right;
            padding-right: 40px;
        }
        .button-container {
    display: flex;
    justify-content: space-between; /* Canh giữa các button */
    width: 100%; /* Chiều rộng tối đa */
}

.button-container button,
.button-container a {
    flex: 1; /* Phân chia đều chiều rộng cho các phần tử */
    margin: 0 5px; /* Khoảng cách giữa các phần tử */
}


        button {
            padding: 12px 24px;
            font-size: 16px;
            font-weight: bold;
            background-color: #004d00;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #003300;
        }

        @media screen and (max-width: 600px) {
            input[type="text"],
            input[type="email"],
            input[type="password"],
            select {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thêm người dùng mới</h1>
        <form action="<?php echo e(route('account.user-store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="email" class="required">Email:</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="abc@gmail.com">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="vaitro" class="required">Vai trò:</label>
                <select name="vaitro" id="vaitro" class="form-control">
                    <option value="">Chọn vai trò</option>
                    <option value="1">Admin</option>
                    <option value="0">Nhân viên</option>
                </select>
                <?php $__errorArgs = ['vaitro'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="trangthaikhoa" class="required">Trạng thái khóa:</label>
                <select name="trangthaikhoa" id="trangthaikhoa" class="form-control">
                    <option value="">Chọn trạng thái khóa</option>
                    <option value="1">Đã khóa</option>
                    <option value="0">Không khóa</option>
                </select>
                <?php $__errorArgs = ['trangthaikhoa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="hotendaydu" class="required">Họ tên đầy đủ:</label>
                <input type="text" name="hotendaydu" class="form-control" id="hotendaydu">
                <?php $__errorArgs = ['hotendaydu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="avatar">Avatar:</label>
                <input type="file" name="avatar" id="avatar" class="form-control">
            </div>
            <div class="form-group">
                <label for="sodienthoai" class="required">Số điện thoại:</label>
                <input type="text" name="sodienthoai" class="form-control" id="sodienthoai">
                <?php $__errorArgs = ['sodienthoai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="diachi">Địa chỉ:</label>
                <input type="text" name="diachi" class="form-control" id="diachi">
            </div>
            <div class="form-group">
                <label for="ngayvaolam">Ngày vào làm:</label>
                <input type="date" name="ngayvaolam" class="form-control" id="ngayvaolam">
            </div>
            <div class="form-group">
                <label for="ngaysinh">Ngày sinh:</label>
                <input type="date" name="ngaysinh" class="form-control" id="ngaysinh" placeholder="01/01/1001">
            </div>
            <div class="form-group">
                <label for="trinhdo">Trình độ:</label>
                <input type="string" name="trinhdo" class="form-control" id="trinhdo" placeholder="12/12">
            </div>
            <div class="button-container">
                <button type="submit" class="btn btn-primary">Thêm</button>
                <a href="<?php echo e(route('dashboard.nhanvien')); ?>" class="btn btn-primary">Quay về</a>
            </div>
            
          
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector(".container").style.visibility = "visible";
        });
    </script>
</body>
</html>

<?php /**PATH C:\Users\Hoang Vu\Downloads\N23+25\N23+25\store.com\store.com\resources\views/backend/account/user_create.blade.php ENDPATH**/ ?>