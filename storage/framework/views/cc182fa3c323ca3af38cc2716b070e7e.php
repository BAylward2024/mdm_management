<h1>MDM Alias</h1>

<div class="container d-flex">
    <div class="container d-flex w-100">
        <table class="table">
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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignFact-<?php echo e($a->id); ?>">
                            Assign Fact
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAlias-<?php echo e($a->id); ?>">
                            Delete
                        </button>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <!-- <ul class="list-group">
            <?php $__currentLoopData = $alias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between w-50 align-items-center">
                    <div>Alias: <?php echo e($a->alias ?? 'ID: ' . $a->id . ' - NULL'); ?></div>
                    <div></div>
                </div>

                <div>Fact ID: <?php echo e($a->fact_id ?? 'No Fact Assigned'); ?></div>
            </li> -->


        <div class="modal fade" id="assignFact-<?php echo e($a->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Assign Fact to Alias</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/alias.assign" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body d-flex">
                            <div class="container">Alias: <?php echo e($a->alias ?? 'ID: ' . $a->id . ' - NULL'); ?>

                                <input type="hidden" name="aliasId" value="<?php echo e($a->id); ?>">
                            </div>
                            <div class="container">

                                <select class="form-select" aria-label="Default select example" name="factPicker">
                                    <?php $__currentLoopData = $os_join; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $os): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($os->os_id); ?>">Fact ID: <?php echo e($os->os_id); ?> Version Number: <?php echo e($os->version_number); ?> Edition Name: <?php echo e($os->edition_name); ?> Distribution Name: <?php echo e($os->distribution_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"> Assign </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteAlias-<?php echo e($a->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Are you sure?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/alias.delete" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body d-flex">
                            <div class="container">Are you sure you want to delete Alias: <b><?php echo e($a->alias ?? 'ID: ' . $a->id . ' - NULL'); ?></b> ?
                                <input type="hidden" name="aliasId" value="<?php echo e($a->id); ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
        <!-- </ul> -->
    </div>


    <!-- <div class="container">
        <ul class="list-group">
            <?php $__currentLoopData = $os_join; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $os): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item">Fact ID: <?php echo e($os->os_id); ?> <br>Version Number: <?php echo e($os->version_number); ?> <br>Edition Name: <?php echo e($os->edition_name); ?><br>Distribution Name: <?php echo e($os->distribution_name); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div> -->
</div><?php /**PATH C:\src\Laravel\mdm-project\mdm_management\resources\views/alias.blade.php ENDPATH**/ ?>