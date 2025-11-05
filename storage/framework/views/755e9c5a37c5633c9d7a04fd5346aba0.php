<!--Giao dien dang nhap--> 
<!--Sử dụng bootstrap-->
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LARAVEL</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/custormize.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name; color: blue;">AK+</h1>

            </div>
            <h3>Cửa hàng điểm bán thiết bị di động AN KHANG</h3>
            <p>Uy tín - Chất lượng - Nhanh chóng - Sang trọng
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>(--Nhân viên cửa hàng An Khang Store--)</p>
            <p></p>

                <div class = "inbox-content"> 
                    <!--In hết tất cả lỗi hiện có-->
                    
                    <form method="post" class="m-t" role="form" action="<?php echo e(route('auth.login.employee.submit')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Email" value="<?php echo e(old('username')); ?>">
                            <?php if($errors->has('username')): ?>
                                <span class="error-message">*<?php echo e($errors->first('username')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <?php if($errors->has('password')): ?>
                                <span class="error-message">*<?php echo e($errors->first('password')); ?></span>
                            <?php endif; ?>
                        </div>
               
                        <button type="submit" class="btn btn-primary block full-width m-b">Đăng nhập</button>
                        <a href="#"><small>Quên mật khẩu?</small></a>
                    </form>
                    
                
          
            
            
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php /**PATH C:\Users\lpn31\OneDrive - IT\Desktop\store.com\resources\views/backend/auth/login-employee.blade.php ENDPATH**/ ?>