

<link href="<?php echo e(asset('css/sanpham.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/header.css')); ?>" rel="stylesheet">

    
<?php $__env->startSection('content'); ?>



<div class="container">
    <h1>Danh sách sản phẩm</h1>
    <?php if(auth()->user()->vaitro): ?>
    <h3> <a href="<?php echo e(route('account.addSP')); ?>" class="btn btn-primary float-end" id="themsp">+ Thêm sản phẩm</a></h3>
    <?php else: ?>
    <?php endif; ?>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh đại diện</th>
                <th>Mã Vạch</th>
                <th>Tên Sản Phẩm</th>
                <th>Loại Sản Phẩm</th>
                <th>Thương Hiệu</th>
                <?php if(auth()->user()->vaitro): ?>
                <th>Giá Nhập</th>
                <?php else: ?>
                <?php endif; ?>
                <th>Giá Bán</th>
                <th>Số Lượng Nhập</th>
                <th>Số Trong Kho</th>
                <?php if(auth()->user()->vaitro): ?>
                <th>Ngày Nhập Hàng</th>
                <?php else: ?>
                <?php endif; ?>
                <th>Mô Tả Sản Phẩm</th>
                <?php if(auth()->user()->vaitro): ?>
                <th>Trạng Thái</th>
                <th>Sửa thông tin</th>
                <th>Xóa sản phẩm</th>
                <?php else: ?>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $sanphams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sanpham): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($sanpham->id); ?></td>
                <td>
                    <?php if($sanpham->anhdaidien): ?>
                        <img src="<?php echo e(asset('uploads/employees/' . $sanpham->anhdaidien)); ?>" width="70px" height="70px" alt="avatar">
                    <?php else: ?>
                        <span>No Avatar</span>
                    <?php endif; ?>
                </td>
                <td><?php echo e($sanpham->MaVach); ?></td>
                <td><?php echo e($sanpham->tensanpham); ?></td>
                <td><?php echo e($sanpham->loaisanpham); ?></td>
                <td><?php echo e($sanpham->thuonghieu); ?></td>
                <?php if(auth()->user()->vaitro): ?>
                <td><?php echo e($sanpham->gianhap); ?></td>
                <?php else: ?>
                <?php endif; ?>
                <td><?php echo e($sanpham->giaban); ?></td>
                <td><?php echo e($sanpham->soLuongNhap); ?></td>
                <td><?php echo e($sanpham->soLuongConLai); ?></td>
                <?php if(auth()->user()->vaitro): ?>
                <td><?php echo e($sanpham->ngaynhaphang); ?></td>
                <?php else: ?>
                <?php endif; ?>
                <td><?php echo e($sanpham->moTaSanPham); ?></td>

                <?php if(auth()->user()->vaitro): ?>
                <td><?php echo e($sanpham->trangthai ? 'Đã Bán' : 'Chưa Bán'); ?></td>
                <td>
                    <a href="<?php echo e(route('account.edit',['id' => $sanpham->id] )); ?>" class="btn btn-primary ">Sửa</a>
                </td>
                <td>
                    <a href="<?php echo e(route('account.delete',['id' => $sanpham->id] )); ?>" class="btn btn-danger">Xóa</a>
                </td>
                <?php else: ?>
                <?php endif; ?>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lpn31\OneDrive - IT\Desktop\Cuoi_ki\store.com - Backup - 23.05 - 13h37\resources\views/backend/account/sanpham.blade.php ENDPATH**/ ?>