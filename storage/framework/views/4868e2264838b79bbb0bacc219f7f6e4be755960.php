<?php $__env->startSection("content"); ?>


<div class="container">
    <h1><?php echo e($category->name); ?></h1>
    <li>Description-<?php echo e($category->description); ?></li>
    <hr>
    <a href="/category/<?php echo e($category->id); ?>/edit"><button class="btn btn-success">Edit</button></a>

    <form method="POST" action="/category/<?php echo e($category->id); ?>">
        <?php echo e(method_field("DELETE")); ?>

        <?php echo e(csrf_field()); ?>

        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure want to delete this Category?');">Delete</button>
    </form>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\thett\laravel-class\first_laravel\resources\views/categoryviews/show.blade.php ENDPATH**/ ?>