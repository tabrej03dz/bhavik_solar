


<?php $__env->startSection('title', 'Add Testimonial'); ?>

<?php $__env->startSection('page-title', 'Add Testimonial'); ?>

<?php $__env->startSection('content'); ?>

<div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

    <div>
        <h2 class="text-xl font-extrabold text-slate-950">
            Add Customer Testimonial
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Create a new customer review for your website.
        </p>
    </div>

    <a href="<?php echo e(route('testimonials.index')); ?>"
       class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-600 transition hover:bg-slate-50">
        Back to Testimonials
    </a>

</div>

<?php echo $__env->make('admin.testimonials._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\work1\Bhavik_Solar_Complete_CMS_Laravel\resources\views/admin/testimonials/create.blade.php ENDPATH**/ ?>