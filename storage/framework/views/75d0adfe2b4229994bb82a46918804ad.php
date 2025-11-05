
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
                    
                    <form method="post" class="m-t" role="form" action="<?php echo e(route('profile.updateAvatar.submit')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?> <!-- Sử dụng phương thức PUT -->
                        <div class="col-md-12">
                            <label class="labels">Avatar:</label>
                            <input type="file" class="form-control" name="avatar">
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Lưu</button>
                        </div>
                    </form>
                    
                    
                    
                
          
            
            
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php /**PATH C:\Users\ASUS\Downloads\store.com - Backup - 19.05 - 12h24\store.com - Backup - 19.05 - 12h24\resources\views/backend/account/update_avatar.blade.php ENDPATH**/ ?>