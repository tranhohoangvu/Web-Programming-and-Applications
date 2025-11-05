

 --}}
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Chào mừng</title>
</head>
<body>
    <h2>Xin chào <?php echo e($user->username); ?>,</h2>
    <p>
        Tài khoản của bạn đã được tạo. Vui lòng nhấn vào liên kết bên dưới để xác thực và thiết lập mật khẩu:
    </p>
    <a href="<?php echo e($changePasswordUrl); ?>">Link ở đây</a>
    <p>
        Liên kết này sẽ chỉ có hiệu lực trong 1 phút.
    </p>
    <p>
        Cảm ơn!
    </p>
</body>
</html><?php /**PATH C:\Users\lpn31\OneDrive - IT\Desktop\store.com\store.com\resources\views/emails/employee_created.blade.php ENDPATH**/ ?>