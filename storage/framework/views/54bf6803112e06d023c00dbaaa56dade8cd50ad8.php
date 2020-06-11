<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row justify-content-center">
   <div class="col-md-8">
    <div class="card-body">
        <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
          <div class="container">

            <h1>Receipe Home Page</h1>

            <?php if($message = Session::get('message')): ?>
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong><?php echo e($message); ?></strong>
                </div>
            <?php endif; ?>
              
            <a href="/receipe/create"><button class="btn btn-success">Create</button></a>
             <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="receipe/<?php echo e($value->id); ?>"><li><?php echo e($value->name); ?></li></a>

                <hr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php echo e($data->links()); ?>

    </div>
   </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
            
                

            




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\thett\laravel-class\first_laravel\resources\views/receipeviews/home.blade.php ENDPATH**/ ?>