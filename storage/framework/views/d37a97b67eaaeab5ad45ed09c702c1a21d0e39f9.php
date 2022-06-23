<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!--Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('/css/styles.css')); ?>">
    <script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>" defer></script>
</head>
<?php echo $__env->make('inc.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main class="container-fluid">
    <div class="row">
    <?php echo $__env->make('inc.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('inc.admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</main>
</body>
</html>
<?php /**PATH C:\OpenServer\domains\Kazan\resources\views/layouts/admin.blade.php ENDPATH**/ ?>