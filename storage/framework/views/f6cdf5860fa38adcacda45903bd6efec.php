<link href="<?php echo e(asset('css/customer_management.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/header.css')); ?>" rel="stylesheet">    


<?php $__env->startSection('content'); ?>

<div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h1>Chi tiết đơn hàng</h1>
            </div>
            <div class="col-sm-3">
                <a style="float: right;" href="<?php echo e(route('dashboard.nhanvien')); ?>"><button class="btn btn-danger">Quay lại</button></a>
            </div>
        </div>
        <p><strong>Mã đơn hàng:</strong> <?php echo e($order->MaHD); ?></p>
        <p><strong>Khách hàng:</strong> <?php echo e($order->TenKhachHang); ?></p>
        <p><strong>Ngày mua:</strong> <?php echo e($order->NgayDatHang); ?></p>
        <p><strong>Giờ mua:</strong> <?php echo e($order->GioDatHang); ?></p>
        <p><strong>Phương thức thanh toán:</strong> <?php echo e($order->formatted_phuong_thuc_thanh_toan); ?></p>
        <p><strong>Tổng tiền:</strong> <?php echo e($order->formatted_tongtien); ?> VNĐ</p>
</div>
    <div class="container">

        <h1>Chi tiết sản phẩm</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá bán</th>
                    <th>Thành tiền</th>
                    <th>Số tiền khách đưa</th>
                    <th>Số tiền thối</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($detail->SanPham->tensanpham); ?></td>
                        <td><?php echo e($detail->soLuong); ?></td>
                        <td><?php echo e(number_format($detail->SanPham->giaban, 0, '', ',')); ?> VNĐ</td>
                        <td><?php echo e(number_format($detail->SanPham->giaban * $detail->soLuong, 0, '', ',')); ?> VNĐ</td>
                        <td><?php echo e(number_format($detail->soTienKhachDua, 0, '', ',')); ?> VNĐ</td>
                        <td><?php echo e(number_format($detail->soTienTraLaiKhach, 0, '', ',')); ?> VNĐ</td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lpn31\OneDrive - IT\Desktop\Cuoi_ki\store.com - Backup - 23.05 - 13h37\resources\views/details.blade.php ENDPATH**/ ?>