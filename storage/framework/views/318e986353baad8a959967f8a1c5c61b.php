<!-- resources/views/user_show.blade.php -->


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
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $employee = $user->employee;
                    ?>
                    
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td>
                            <?php if($employee && $employee->avatar): ?>
                                <a href="<?php echo e(route('account.user_profile', ['id' => $user->id])); ?>"><img src="<?php echo e(asset('uploads/employees/' . $employee->avatar)); ?>" width="70px" height="70px" alt="avatar" class="avatar"></a>
                             <?php else: ?>
                                
                                <span>No Avatar</span>
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
                        <td><?php echo e($user->trangthaikichhoat ? 'Đã kích hoạt' : 'Chưa kích hoạt'); ?></td>
                        <td>
                            <form class="delete_user" action="<?php echo e(route('account.user-delete', ['id' => $user->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')">Xóa</button>
                            </form>
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
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\store.com - Backup - 19.05 - 12h24\store.com - Backup - 19.05 - 12h24\resources\views/backend/account/user_show.blade.php ENDPATH**/ ?>