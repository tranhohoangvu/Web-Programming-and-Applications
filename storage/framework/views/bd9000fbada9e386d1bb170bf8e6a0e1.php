
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?php echo e(asset('css/change_password.css')); ?>" rel="stylesheet">
   
    <title>Đổi mật khẩu</title>
   
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Đổi Mật Khẩu')); ?></div>

                    <div class="card-body">
                        <?php if(session('error')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>

                        <form method="POST" role="form" action="<?php echo e(route('auth.change_password2.submit')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="mb-3">
                                <label for="currentPasswordInput" class="form-label">Mật Khẩu Hiện Tại</label>
                                <input id="currentPasswordInput" name="currentpassword" type="password" class="form-control <?php $__errorArgs = ['currentpassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <?php $__errorArgs = ['currentpassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">Mật Khẩu Mới</label>
                                <input id="newPasswordInput" name="newpassword" type="password" class="form-control <?php $__errorArgs = ['newpassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <?php $__errorArgs = ['newpassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Xác Nhận Mật Khẩu Mới</label>
                                <input id="confirmNewPasswordInput" type="password" class="form-control" name="newpassword_confirmation" required>
                            </div>

                           
                            <div class="nut">
                                <button type="submit" class="btn">Đổi mật khẩu</button>
                                <?php if(auth()->user()->vaitro): ?>
                                    <a href="<?php echo e(route('dashboard.index')); ?>" class="btn">Quay về</a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('dashboard.nhanvien')); ?>" class="btn">Quay về</a>   
                                <?php endif; ?> 
                            </div>
                            
                            <?php if(session('success')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo e(session('success')); ?>

                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


  
<?php /**PATH C:\Users\lpn31\OneDrive - IT\Desktop\Cuoi_ki\store.com - Backup - 23.05 - 13h37\resources\views/backend/auth/change_password2.blade.php ENDPATH**/ ?>