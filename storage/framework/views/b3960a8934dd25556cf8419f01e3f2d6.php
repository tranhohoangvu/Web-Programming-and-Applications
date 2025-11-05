

<link href="<?php echo e(asset('css/change_password.css')); ?>" rel="stylesheet">
<?php $__env->startSection('content'); ?>
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

                        <form method="POST" role="form" action="<?php echo e(route('auth.change_password.submit')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="mb-3">
                                <label for="newpasswordInput" class="form-label">Mật Khẩu Mới</label>
                                <input id="newPasswordInput" name ="newpassword" type="password" class="form-control <?php $__errorArgs = ['newpassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="newpassword" required>
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

                            <button type="submit" class="btn btn-primary">Đổi Mật Khẩu</button>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lpn31\OneDrive - IT\Desktop\store.com\store.com\resources\views/backend/auth/change_password.blade.php ENDPATH**/ ?>