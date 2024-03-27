<div>
    <div>
        <table>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Alias Name</th>
                    <th scope="col">Fact ID</th>
                    <th scope="col">Fact Table</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $alias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php echo e($a->id); ?>

                    </td>
                    <td>
                        <?php echo e($a->alias ?? 'ID: ' . $a->id . ' - NULL'); ?>

                    </td>
                    <td>
                        <?php echo e($a->fact_id ?? 'NULL'); ?>

                    </td>
                    <td>
                        <?php echo e($a->fact_table ?? 'NULL'); ?>

                    </td>
                    <td>
                        <button type="button">
                            Assign Fact
                        </button>
                        <button type="button">
                            Delete
                        </button>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div><?php /**PATH C:\src\Laravel\mdm-project\mdm_management\resources\views/alias.blade.php ENDPATH**/ ?>