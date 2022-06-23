<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <title><?php echo $__env->yieldContent('title'); ?></title>


    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="<?php echo e(asset('/css/styles.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/css/style.css')); ?>">


</head>
<body id="page-top">
<div class="content">
    <header>
        <?php echo $__env->make('inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <footer class="footer bg-secondary text-center">
        <?php echo $__env->make('inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>
</div>
<script src="<?php echo e(asset('/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="<?php echo e(asset('/js/app.js')); ?>"></script>

<?php echo $__env->yieldPushContent('script'); ?>
</body>
</html>
<?php /**PATH C:\OpenServer\domains\Kazan\resources\views/layouts/app.blade.php ENDPATH**/ ?>