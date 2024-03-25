<ul class="list-group">
    <?php $__currentLoopData = $versions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="list-group-item">ID: <?php echo e($v->id); ?> <br>Version Number: <?php echo e($v->version_number); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH C:\src\Laravel\mdm-project\resources\views/version.blade.php ENDPATH**/ ?>