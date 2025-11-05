<link href="<?php echo e(asset('css/customer_create.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/custormize.css')); ?>" rel="stylesheet">


<?php $__env->startSection('title', 'Sửa thông tin khách hàng'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Sửa thông tin khách hàng</h1>
        <form action="<?php echo e(route('update_customer' , ['id' => $customer->id])); ?>" method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label for="TenKhachHang" class="required">Tên khách hàng:</label>
                <input type="text" name="TenKhachHang" class="form-control" id="TenKhachHang" value="<?php echo e($customer->TenKhachHang); ?>">
                <?php $__errorArgs = ['TenKhachHang'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message">*<?php echo e($errors->first('TenKhachHang')); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="soDienThoai" class="required">Số điện thoại:</label>
                <input type="text" name="soDienThoai" class="form-control" id="soDienThoai" value="<?php echo e($customer->soDienThoai); ?>">
                <?php $__errorArgs = ['soDienThoai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message">*<?php echo e($errors->first('soDienThoai')); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="ngaysinh" class="required">Ngày sinh:</label>
                <input type="date" name="ngaysinh" class="form-control" id="ngaysinh" value="<?php echo e($customer->ngaysinh); ?>">
                <?php $__errorArgs = ['ngaysinh'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message">*<?php echo e($errors->first('ngaysinh')); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>   
            <div class="form-group">
                <label for="diaChi" class="required">Địa chỉ:</label>
                <input type="text" name="diaChi" class="form-control" id="diaChi" value="<?php echo e($customer->diaChi); ?>">
                <?php $__errorArgs = ['diaChi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message">*<?php echo e($errors->first('diaChi')); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>  
                   
            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\store.com\resources\views/backend/account/customer_edit.blade.php ENDPATH**/ ?>