<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <?php if(session('message')): ?>
            <h4 class="alert alert-success text-center"><?php echo e(session('message')); ?></h4>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            <a href="<?php echo e(route('tasks')); ?>">
                                <?php echo e('COMPLETED TASKS'); ?>

                            </a>
                            <i class="fa-solid fa-list-check"></i>
                        </div>
                    </div>
                    <div class="card-body text-center ">
                        <?php echo e($counttask); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            <a href="<?php echo e(route('pending')); ?>">
                                <?php echo e('PENDING TASKS'); ?>

                            </a>
                            <i class="fa-solid fa-clock"></i>
                        </div>
                    </div>
                    <div class="card-body text-center ">
                        <?php echo e($countpending); ?>

                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\to do list\resources\views/home.blade.php ENDPATH**/ ?>