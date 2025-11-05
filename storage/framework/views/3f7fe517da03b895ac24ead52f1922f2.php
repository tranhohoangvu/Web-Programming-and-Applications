<link href="<?php echo e(asset('css/customer_management.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/header.css')); ?>" rel="stylesheet">    


<?php $__env->startSection('title', 'Lịch sử mua hàng'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h1>Lịch sử mua hàng của <?php echo e($customer->TenKhachHang); ?></h1>
            </div>
            <div class="col-sm-3">
                <a style="float: right;" href="<?php echo e(route('dashboard.nhanvien')); ?>"><button class="btn btn-danger">Quay lại</button></a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Mã hóa đơn</th>
                    <th>Ngày mua</th>
                    <th>Tổng số tiền</th>
                    <th>Phương thức thanh toán</th>
                    <th>Chi tiết đơn hàng</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($order->MaHD); ?></td>
                        <td><?php echo e($order->NgayDatHang); ?></td>
                        <td><?php echo e($order->formatted_tongtien); ?> VNĐ</td>
                        <td><?php echo e($order->formatted_phuong_thuc_thanh_toan); ?></td>
                        <td><a href="<?php echo e(route('order.details', ['orderId' => $order->id])); ?>" class="btn btn-primary">Xem chi tiết</a></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="4" style="text-align: right"><strong>Tổng số tiền đã mua:</strong></td>
                    <td><strong><?php echo e(number_format($totalAmount, 0, '', ',')); ?> VNĐ</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\store.com\resources\views/customer_history.blade.php ENDPATH**/ ?>