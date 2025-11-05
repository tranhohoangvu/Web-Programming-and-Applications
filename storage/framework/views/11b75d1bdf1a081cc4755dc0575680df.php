<!-- resources/views/layouts/main.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- CSS -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <header>
        <!-- Định nghĩa header của trang -->
        <h1>AN KHANG STORE</h1>
    </header>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer>
        <!-- Định nghĩa footer của trang -->
        <p></p>
    </footer>
    
    <!-- JS -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\USER\OneDrive - IT\Desktop\Học Tập\HK2_2023-2024\Lập Trình Web\final-web\store.com\store.com\resources\views/layouts/main.blade.php ENDPATH**/ ?>