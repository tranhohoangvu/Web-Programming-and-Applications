
<h1>Xin chào, <?php echo e($employee->name); ?>!</h1>
<p>Tài khoản của bạn đã được tạo. Dưới đây là thông tin đăng nhập:</p>
<ul>
    <li>Email: <?php echo e($employee->email); ?></li>
    <li><p>Mật khẩu được cấp là tên email của bạn 
        Ví dụ: abc@gmail.com->password ="abc"</p>  </li> <!-- Note: Không nên hiển thị mật khẩu trong email -->
</ul>
<p>Vui lòng truy cập vào trang web để đăng nhập và thay đổi mật khẩu của bạn.</p>
<?php /**PATH C:\Users\USER\OneDrive - IT\Desktop\Học Tập\HK2_2023-2024\Lập Trình Web\final-web\store.com\store.com\resources\views/emails/employee_created.blade.php ENDPATH**/ ?>