<!-- resources/views/backend/account/user_create.blade.php -->

<link href="<?php echo e(asset('css/user_create.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/custormize.css')); ?>" rel="stylesheet">


<?php $__env->startSection('title', 'Thêm người dùng mới'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Thêm người dùng mới</h1>
    <form action="<?php echo e(route('account.user-store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="username" class="required">Username:</label>
            <input type="text" name="username" class="form-control" id="username">
            <?php $__errorArgs = ['username'];
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
            <label for="hotendaydu">Họ tên đầy đủ:</label>
            <input type="text" name="hotendaydu" class="form-control" id="hotendaydu">
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
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lpn31\OneDrive - IT\Desktop\store.com\store.com\resources\views/backend/account/user_create.blade.php ENDPATH**/ ?>