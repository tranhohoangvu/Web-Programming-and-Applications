<!DOCTYPE html>
<html>
<head>
    <title>Temporary Link</title>
</head>
<body>
    <p>Hello <?php echo e($user->username); ?>,</p>
    <p>Click the following link to proceed: <a href="<?php echo e($link); ?>"><?php echo e($link); ?></a></p>
    <p>This link will expire in 1 minute.</p>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\store.com\resources\views/emails/employee_created.blade.php ENDPATH**/ ?>