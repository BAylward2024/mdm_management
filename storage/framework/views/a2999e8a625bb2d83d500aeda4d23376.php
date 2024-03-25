<ul class="list-group">
    <?php $__currentLoopData = $os_join; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $os): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="list-group-item">Version Number: <?php echo e($os->version_number); ?> <br>Edition Name: <?php echo e($os->edition_name); ?><br>Distribution Name: <?php echo e($os->distribution_name); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH C:\src\Laravel\mdm-project\resources\views/os.blade.php ENDPATH**/ ?>