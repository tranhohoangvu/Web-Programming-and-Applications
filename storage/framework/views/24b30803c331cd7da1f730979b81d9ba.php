

<link href="<?php echo e(asset('css/user_show.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/header.css')); ?>" rel="stylesheet">

<?php $__env->startSection('title', 'Danh sách người dùng'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Danh sách người dùng</h1>
        
        <!-- Thanh lọc -->
        <div class="add">
            <a href="<?php echo e(route('account.user-create')); ?>" class="btn btn-primary">+ Thêm thành viên</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>STT</th> 
                    <th>Avatar</th>
                    <th>Họ và tên đầy đủ</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Trạng thái khóa</th>
                    <th>Kích hoạt</th>
                    <th>Thống kê</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $employee = $user->employee;
                    ?>
                    
                    <tr id="user-<?php echo e($user->id); ?>">
                        <td><?php echo e($loop->iteration); ?></td>
                        <td>
                            <?php if($employee && $employee->avatar): ?>
                                <a href="<?php echo e(route('account.user_profile', ['id' => $user->id])); ?>"><img src="<?php echo e(asset('uploads/employees/' . $employee->avatar)); ?>" width="70px" height="70px" alt="avatar" class="avatar"></a>
                             <?php else: ?>
                             <img src="<?php echo e(asset('img/AnhMacDinhKhongXoa.jpg')); ?>" width="70px" height="70px" alt="Avatar">
                               
                            <?php endif; ?> 
                        </td>
                        <td><?php echo e($user->employee->hotendaydu); ?></td>
                        <td><?php echo e($user->username); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td>
                            <?php if($user->vaitro): ?>
                                Admin
                            <?php else: ?>
                                Nhân viên
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($user->trangthaikhoa ? 'Đã khóa' : 'Không khóa'); ?></td>
                        <td class="activation-status">
                            <?php if($user->vaitro): ?>
                                Đã kích hoạt
                            <?php else: ?>
                                <?php echo e($user->first_login ? 'Đã kích hoạt' : 'Chưa kích hoạt'); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('account.user.orders', ['id' => $user->id])); ?>" class="btn btn-info">Xem</a>
                        </td>
                        <td>
                            <?php if(!$user->trangthaikichhoat): ?>
                                <form action="<?php echo e(route('account.resend-email', ['id' => $user->id])); ?>" method="POST" class="resend-email-form" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-warning">Gửi lại email</button>
                                </form>
                            <?php endif; ?>
                            <?php if($user->trangthaikhoa == 0): ?>
                                <form class="user_lock" action="<?php echo e(route('account.user-lock', ['id' => $user->id])); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn khóa tài khoản này?')">Khóa</button>
                                </form>
                            <?php else: ?>
                                <form class="user_unlock" action="<?php echo e(route('account.user-unlock', ['id' => $user->id])); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <button type="submit" class="btn btn-success" onclick="return confirm('Bạn có chắc chắn muốn mở khóa tài khoản này?')">Mở Khóa</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const avatarImages = document.querySelectorAll('.avatar');
            avatarImages.forEach(image => {
                image.onload = function () {
                    image.classList.add('loaded');
                }
                if (image.complete) {
                    image.classList.add('loaded');
                }
            });

            const deleteForms = document.querySelectorAll('.delete_user');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    const confirmed = confirm('Bạn có chắc chắn muốn xóa tài khoản này?');
                    if (confirmed) {
                        const row = this.closest('tr');
                        row.classList.add('deleted-row');
                        setTimeout(() => {
                            this.submit();
                        }, 500);
                    }
                });
            });

            const resendEmailForms = document.querySelectorAll('.resend-email-form');
            resendEmailForms.forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    const formData = new FormData(this);
                    const userId = this.closest('tr').id.split('-')[1];
                    
                    fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success' && data.trangthaikichhoat) {
                            const userRow = document.getElementById('user-' + userId);
                            userRow.querySelector('.activation-status').innerText = 'Đã kích hoạt';
                            this.remove();
                        }
                    })
                    .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\store.com\resources\views/backend/account/user_show.blade.php ENDPATH**/ ?>