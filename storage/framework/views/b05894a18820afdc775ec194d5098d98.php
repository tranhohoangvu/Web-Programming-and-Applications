<link href="<?php echo e(asset('css/customer_management.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/header.css')); ?>" rel="stylesheet"> 


<?php $__env->startSection('title', 'Thông tin khách hàng'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class=""><h1>Tìm kiếm khách hàng</h1>
                    <form action="/search" method="post">
                        <?php echo e(csrf_field()); ?>

                        <label for="soDienThoai">Số điện thoại:</label>
                        <input type="text" name="soDienThoai" id="soDienThoai">
                        <button type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-3">
                <?php if(auth()->user()->vaitro): ?>
                    <a style="float: right;" href="<?php echo e(route('dashboard.index')); ?>"><button class="btn btn-danger">Quay lại</button></a>
                <?php else: ?> 
                    <a style="float: right;" href="<?php echo e(route('dashboard.nhanvien')); ?>"><button class="btn btn-danger">Quay lại</button></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <h1>Thông tin khách hàng</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã KH</th>
                    <th>Tên khách hàng</th>
                    <th>SĐT</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <?php if(auth()->user()->vaitro): ?>
                        <td>Thao tác</td>
                    <?php endif; ?> 
                    <th>Lịch sử mua hàng</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($customer->MaKhachHang); ?></td>
                        <td><?php echo e($customer->TenKhachHang); ?></td>
                        <td><?php echo e($customer->soDienThoai); ?></td>
                        <td><?php echo e($customer->ngaysinh); ?></td>
                        <td><?php echo e($customer->diaChi); ?></td>
                        <?php if(auth()->user()->vaitro): ?>
                            <td class="edit_customer">
                                <a href="<?php echo e(route('edit_customer', ['id' => $customer->id])); ?>" class="btn btn-primary">Sửa thông tin</a>
                            </td>
                        <?php endif; ?>
                        <td class="">
                            <a href="<?php echo e(route('history_customer', ['id' => $customer->id])); ?>" class="btn xem">Xem</a>
                        </td>                        
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\store.com\resources\views/backend/account/customer_management.blade.php ENDPATH**/ ?>