

<?php $__env->startSection('title', 'Thông tin người dùng'); ?>

<link href="<?php echo e(asset('css/profile.css')); ?>" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<?php $__env->startSection('content'); ?>
<div class="container rounded bg-white mt-5 mb-5 ">
    <div class="row">
        <div class="col-md-3 border-right">
            

            <div class="d-flex flex-column align-items-center text-center p-3 py-5" id="avatar-container">
                <img class="rounded-circle  border border-primary mt-5" width="150px" src="<?php echo e(asset('uploads/employees/' . $user->employee->avatar)); ?>" alt="Avatar">
                <span class="font-weight-bold"><p><?php echo e($user->employee->hotendaydu); ?></p></span>
                <span class="text-black-50"><?php echo e($user->email); ?></span>
                <span> </span>
                <div class="d-flex flex-md-row flex-column">
                    <div class="col-md-6 p-3">
                        <button class="btn mt-3">
                            <a href="<?php echo e(route('profile.showAvatar')); ?>" class="btn btn-primary">Đổi avatar</a>
                        </button>
                    </div>
                    <div class="col-md-6 p-3">
                        <button class="btn mt-3">
                            <a href="<?php echo e(route('auth.change_password2')); ?>" class="btn btn-primary">Đổi mật khẩu</a>
                        </button>
                    </div>
                </div>
                
                
            </div>
            
            
            

        </div>
        
        

        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Thông tin cá nhân</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="labels">Họ tên đầy đủ:</label>
                        <div style="border: 1px solid #ccc; padding: 5px;"><?php echo e($user->employee->hotendaydu); ?></div>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Username:</label>
                        <div style="border: 1px solid #ccc; padding: 5px;"><?php echo e($user->username); ?></div>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Số điện thoại:</label>
                        <div style="border: 1px solid #ccc; padding: 5px;"><?php echo e($user->employee->sodienthoai); ?></div>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Địa chỉ:</label>
                        <div style="border: 1px solid #ccc; padding: 5px;"><?php echo e($user->employee->diachi); ?></div>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Ngày sinh:</label>
                        <div style="border: 1px solid #ccc; padding: 5px;"><?php echo e($user->employee->ngaysinh); ?></div>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Ngày vào làm:</label>
                        <div style="border: 1px solid #ccc; padding: 5px;"><?php echo e($user->employee->ngayvaolam); ?></div>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Trạng thái tài khoản:</label>
                        <div style="border: 1px solid #ccc; padding: 5px;">
                            <?php if($user->trangthaikhoa): ?>
                                Đã khóa
                            <?php else: ?>
                                Không khóa
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Địa chỉ email:</label>
                        <div style="border: 1px solid #ccc; padding: 5px;"><?php echo e($user->email); ?></div>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Trình độ học vấn:</label>
                        <div style="border: 1px solid #ccc; padding: 5px;"><?php echo e($user->employee->trinhdo); ?></div>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="button" id="edit-profile-button">Chỉnh sửa</button>
                </div>
                <form action="<?php echo e(route('profile.update', ['id' => $user->id])); ?>" method="POST" id="edit-profile-form" style="display: none;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label class="labels">Họ tên đầy đủ:</label>
                            <?php if(auth()->user()->vaitro == 1): ?> 
                                <input type="text" class="form-control" name="hotendaydu" value="<?php echo e($user->employee->hotendaydu); ?>">
                            <?php else: ?>
                                <div style="border: 1px solid #ccc; padding: 5px;"><?php echo e($user->employee->hotendaydu); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Username:</label>
                            <?php if(auth()->user()->vaitro == 1): ?> 
                                <input type="text" class="form-control" name="username" value="<?php echo e($user->username); ?>">
                            <?php else: ?>
                                <div style="border: 1px solid #ccc; padding: 5px;"><?php echo e($user->username); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Số điện thoại:</label>
                            <input type="text" class="form-control" name="sodienthoai" value="<?php echo e($user->employee->sodienthoai); ?>">
                        </div>
                       <div>
                            <label class="labels">Địa chỉ:</label>
                            <input type="text" class="form-control" name="diachi" value="<?php echo e($user->employee->diachi); ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Ngày sinh::</label>
                            <input type="date" class="form-control" name="ngaysinh" value="<?php echo e($user->employee->ngaysinh); ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Ngày vào làm:</label>
                            <?php if(auth()->user()->vaitro == 1): ?> 
                                <input type="date" class="form-control" name="ngayvaolam" value="<?php echo e($user->employee->ngayvaolam); ?>">
                            <?php else: ?>
                                <div style="border: 1px solid #ccc; padding: 5px;"><?php echo e($user->employee->ngayvaolam); ?></div>
                            <?php endif; ?>
                            
                        </div>
                        
                        <div class="col-md-12">
                            <label class="labels">Trạng thái tài khoản:</label>
                            <?php if(auth()->user()->vaitro == 1): ?> 
                                 <select name="trangthaikhoa" id="trangthaikhoa" class="form-control">
                                    <option value="0">Không khóa</option>
                                    <option value="1">Đã khóa</option>
                                </select>
                            <?php else: ?>
                                <div style="border: 1px solid #ccc; padding: 5px;">
                                    <?php if($user->trangthaikhoa): ?>
                                        Đã khóa
                                    <?php else: ?>
                                        Không khóa
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                        
                        <div class="col-md-12">
                            <label class="labels">Email:</label>
                            <?php if(auth()->user()->vaitro == 1): ?> 
                                <input type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>">
                            <?php else: ?>
                                <div style="border: 1px solid #ccc; padding: 5px;"><?php echo e($user->email); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Trình độ học vấn:</label>
                            <?php if(auth()->user()->vaitro == 1): ?> 
                                <input type="date" class="form-control" name="trinhdo" value="<?php echo e($user->employee->trinhdo); ?>">
                            <?php else: ?>
                                <div style="border: 1px solid #ccc; padding: 5px;"><?php echo e($user->employee->trinhdo); ?></div>
                            <?php endif; ?>
                            
                        </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<script>
    $(document).ready(function() {
        $('#edit-profile-button').click(function() {
            $('#edit-profile-form').toggle();
        });
    });
    // $(document).ready(function() {
    //     $('#edit-avatar-button').click(function() {
    //         $('#edit-profile-form').toggle();
    //     });
    // });
</script>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lpn31\OneDrive - IT\Desktop\store.com\resources\views/backend/account/user_profile.blade.php ENDPATH**/ ?>