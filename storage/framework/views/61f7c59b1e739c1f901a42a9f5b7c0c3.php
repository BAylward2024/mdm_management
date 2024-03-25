<div class="d-flex w-100 justify-content-between align-items-center">
    <div class="d-flex">
        <form action="/distributions-filter" method="GET">
            <div class="mb-3 p-4">
                <label for="exampleFormControlInput1" class="form-label">Filter by Distribution Name:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name='dist-name'>
                <button type="submit" class="mt-3 btn btn-primary">Submit</button>
            </div>
        </form>
        <a href="/distributions"><button class="mt-3 btn btn-primary">Clear</button></a>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addDistro">
        Add new Distro
    </button>



</div>


<?php if(isset($distributions)): ?>
<?php if($distributions instanceof \Illuminate\Pagination\AbstractPaginator): ?>
<div class="mt-3 mb-3 d-flex justify-content-between"><?php echo e($distributions->links()); ?>

    <div class="rec-count">Total Records: <?php echo e($distributions->total()); ?></div>
</div>
<?php endif; ?>
<ul class="list-group mb-5">
    <?php $__currentLoopData = $distributions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(isset($d->id)): ?>
    <li class="list-group-item d-flex justify-content-between align-items-center mb-3">
        <div><span class="fs-4">Distribution Name:</span> <span class="fs-5 ms-4"><?php echo e($d->distribution_name); ?></span></div>
        <div class="d-flex">
            <button type="button" class="me-1 btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editDistro-<?php echo e($d->id); ?>">
                Edit
            </button>
            <form action="/distributions-delete" method="POST">
                <?php echo csrf_field(); ?>
                <div class="">
                    <input type="hidden" name="dist-id" value="<?php echo e($d->id); ?>">
                    <button type="submit" class="btn btn-danger">X</button>
                </div>
            </form>
        </div>

    </li>


    <!-- Modal For adding editing Distros-->
    <div class="modal fade" id="editDistro-<?php echo e($d->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Distribution</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/distributions-edit" method="POST" class="me-1">
                        <?php echo csrf_field(); ?>
                        <div class="">
                            <input type="hidden" name="dist-id" value="<?php echo e($d->id); ?>">
                            <input type="text" class="form-control" id="exampleFormControlInput1" name='dist-name-edit' value="<?php echo e($d->distribution_name); ?>">
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



</ul>
<?php endif; ?>



<!-- Modal For adding new Distros-->
<div class="modal fade" id="addDistro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add new Distribution</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/distributions" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Distribution Name:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name='dist-name-in'>
                        <button type="submit" class="mt-3 btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\src\Laravel\mdm-project\resources\views/distr.blade.php ENDPATH**/ ?>