<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">
</head>
<body>
    <header>
        <!-- Định nghĩa header của trang -->
        <?php if(auth()->user()->vaitro): ?>
            <a class="a"  href="<?php echo e(route('dashboard.index')); ?>">ANKHANG STORE</a>
        <?php else: ?> 
            <a class="a" href="<?php echo e(route('dashboard.nhanvien')); ?>">ANKHANG STORE</a>
        <?php endif; ?>
    </header>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

   
    
    <!-- JS -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\lpn31\OneDrive - IT\Desktop\Cuoi_ki\store.com - Backup - 23.05 - 13h37\resources\views/layouts/main.blade.php ENDPATH**/ ?>