<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MDAS MDM Management</title>
    <link rel="stylesheet" href="<?php echo asset('css/styles.css') ?>" type="text/css">
</head>

<body>
    <div class="">
        <!-- Nav -->
        <?php echo $__env->make('nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container">

            <!-- Page Content -->
            <?php if(Route::is('distribution')): ?>
            <?php echo $__env->make('distr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if(Route::is('distribution-filter')): ?>
            <?php echo $__env->make('distr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if(Route::is('editions')): ?>
            <?php echo $__env->make('edition', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if(Route::is('versions')): ?>
            <?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(Route::is('os')): ?>
            <?php echo $__env->make('os', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(Route::is('alias.os')): ?>
            <?php echo $__env->make('alias', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if(Route::is('alias.partner')): ?>
            <?php echo $__env->make('alias', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>


            <?php if(Route::is('alias')): ?>
            <?php echo $__env->make('alias', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <?php if(Route::is('aliasmodel')): ?>
            <?php echo $__env->make('aliasmodel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
    </div>
</body>

</html><?php /**PATH C:\src\Laravel\mdm-project\mdm_management\resources\views/layout.blade.php ENDPATH**/ ?>