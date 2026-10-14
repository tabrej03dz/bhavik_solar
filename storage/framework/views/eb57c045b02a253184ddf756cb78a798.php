


<?php $__env->startSection('title', 'Testimonials'); ?>
<?php $__env->startSection('page-title', 'Testimonial Management'); ?>

<?php $__env->startSection('content'); ?>


<div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <div>
        <h2 class="text-xl font-extrabold text-slate-950">
            Testimonials
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Manage customer feedback, ratings and visibility on your website.
        </p>
    </div>

    <a href="<?php echo e(route('testimonials.create')); ?>"
       class="inline-flex items-center justify-center gap-2 rounded-xl bg-brand-700 px-5 py-3 text-sm font-bold text-white shadow-md transition hover:bg-brand-800">
        <span class="text-xl leading-none">+</span>
        Add Testimonial
    </a>
</div>


<?php if(session('success')): ?>
    <div class="mt-5 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-3 text-sm font-semibold text-emerald-800">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>


<div class="mt-6 rounded-2xl border border-slate-200 bg-white p-4 shadow-card">
    <form method="GET"
          action="<?php echo e(route('testimonials.index')); ?>"
          class="grid gap-3 md:grid-cols-4">

        <div class="md:col-span-2">
            <label class="mb-1.5 block text-xs font-bold text-slate-600">
                Search Testimonial
            </label>

            <input
                type="text"
                name="search"
                value="<?php echo e(request('search')); ?>"
                placeholder="Search name, company, location or review..."
                class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm outline-none focus:border-brand-500 focus:ring-4 focus:ring-brand-100"
            >
        </div>

        <div>
            <label class="mb-1.5 block text-xs font-bold text-slate-600">
                Status
            </label>

            <select name="status"
                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm focus:border-brand-500">
                <option value="">All Status</option>

                <option value="active"
                    <?php if(request('status') === 'active'): echo 'selected'; endif; ?>>
                    Active
                </option>

                <option value="inactive"
                    <?php if(request('status') === 'inactive'): echo 'selected'; endif; ?>>
                    Inactive
                </option>
            </select>
        </div>

        <div>
            <label class="mb-1.5 block text-xs font-bold text-slate-600">
                Featured
            </label>

            <select name="featured"
                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm focus:border-brand-500">
                <option value="">All</option>

                <option value="yes"
                    <?php if(request('featured') === 'yes'): echo 'selected'; endif; ?>>
                    Featured
                </option>

                <option value="no"
                    <?php if(request('featured') === 'no'): echo 'selected'; endif; ?>>
                    Not Featured
                </option>
            </select>
        </div>

        <div class="flex gap-2 md:col-span-4 md:justify-end">
            <a href="<?php echo e(route('testimonials.index')); ?>"
               class="rounded-xl border border-slate-200 px-5 py-2.5 text-sm font-bold text-slate-600 hover:bg-slate-50">
                Reset
            </a>

            <button type="submit"
                    class="rounded-xl bg-slate-900 px-5 py-2.5 text-sm font-bold text-white hover:bg-slate-800">
                Apply Filter
            </button>
        </div>
    </form>
</div>


<div class="mt-5 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-card">

    <div class="border-b border-slate-100 px-5 py-4">
        <div class="font-bold text-slate-900">
            Customer Testimonials
        </div>

        <div class="mt-1 text-xs text-slate-400">
            <?php echo e($testimonials->total()); ?> total testimonial(s)
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full min-w-[920px] text-left">

            <thead class="bg-slate-50 text-[11px] font-bold uppercase tracking-wide text-slate-400">
                <tr>
                    <th class="px-5 py-3">Customer</th>
                    <th class="px-5 py-3">Review</th>
                    <th class="px-5 py-3">Rating</th>
                    <th class="px-5 py-3">Order</th>
                    <th class="px-5 py-3">Featured</th>
                    <th class="px-5 py-3">Status</th>
                    <th class="px-5 py-3 text-right">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">

                <?php $__empty_1 = true; $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr class="hover:bg-slate-50/70">

                        
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3">

                                <div class="h-14 w-14 shrink-0 overflow-hidden rounded-xl border border-slate-100 bg-slate-50">

                                    <?php if($testimonial->image): ?>
                                        <img
                                            src="<?php echo e(Storage::url($testimonial->image)); ?>"
                                            alt="<?php echo e($testimonial->name); ?>"
                                            class="h-full w-full object-cover"
                                        >
                                    <?php else: ?>
                                        <div class="grid h-full w-full place-items-center text-xl font-extrabold text-slate-400">
                                            <?php echo e(strtoupper(substr($testimonial->name, 0, 1))); ?>

                                        </div>
                                    <?php endif; ?>

                                </div>

                                <div>
                                    <a href="<?php echo e(route('testimonials.show', $testimonial)); ?>"
                                       class="text-sm font-bold text-slate-900 hover:text-brand-700">
                                        <?php echo e($testimonial->name); ?>

                                    </a>

                                    <div class="mt-1 max-w-[190px] truncate text-xs text-slate-400">
                                        <?php echo e($testimonial->company ?: ($testimonial->designation ?: 'Customer')); ?>

                                    </div>

                                    <?php if($testimonial->location): ?>
                                        <div class="text-xs text-slate-400">
                                            <?php echo e($testimonial->location); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </td>

                        
                        <td class="max-w-[290px] px-5 py-4 text-sm text-slate-600">
                            <p class="line-clamp-3">
                                <?php echo e($testimonial->review); ?>

                            </p>
                        </td>

                        
                        <td class="whitespace-nowrap px-5 py-4 text-sm font-bold text-amber-500">
                            <?php echo e(str_repeat('★', $testimonial->rating)); ?>


                            <span class="text-slate-200">
                                <?php echo e(str_repeat('☆', 5 - $testimonial->rating)); ?>

                            </span>
                        </td>

                        
                        <td class="px-5 py-4 text-sm text-slate-600">
                            <?php echo e($testimonial->sort_order); ?>

                        </td>

                        
                        <td class="px-5 py-4">
                            <form method="POST"
                                  action="<?php echo e(route('testimonials.toggle-featured', $testimonial)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>

                                <button type="submit"
                                        class="rounded-full px-3 py-1.5 text-xs font-bold
                                        <?php echo e($testimonial->is_featured
                                            ? 'bg-violet-50 text-violet-700 hover:bg-violet-100'
                                            : 'bg-slate-100 text-slate-500 hover:bg-slate-200'); ?>">
                                    <?php echo e($testimonial->is_featured
                                        ? 'Featured'
                                        : 'Not Featured'); ?>

                                </button>
                            </form>
                        </td>

                        
                        <td class="px-5 py-4">
                            <form method="POST"
                                  action="<?php echo e(route('testimonials.toggle-status', $testimonial)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>

                                <button type="submit"
                                        class="rounded-full px-3 py-1.5 text-xs font-bold
                                        <?php echo e($testimonial->is_active
                                            ? 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100'
                                            : 'bg-rose-50 text-rose-700 hover:bg-rose-100'); ?>">
                                    <?php echo e($testimonial->is_active
                                        ? 'Active'
                                        : 'Inactive'); ?>

                                </button>
                            </form>
                        </td>

                        
                        <td class="px-5 py-4">
                            <div class="flex justify-end gap-2">

                                <a href="<?php echo e(route('testimonials.show', $testimonial)); ?>"
                                   title="View"
                                   class="rounded-lg bg-emerald-50 px-3 py-2 text-xs font-bold text-emerald-700 hover:bg-emerald-100">
                                    View
                                </a>

                                <a href="<?php echo e(route('testimonials.edit', $testimonial)); ?>"
                                   title="Edit"
                                   class="rounded-lg bg-sky-50 px-3 py-2 text-xs font-bold text-sky-700 hover:bg-sky-100">
                                    Edit
                                </a>

                                <form method="POST"
                                      action="<?php echo e(route('testimonials.destroy', $testimonial)); ?>"
                                      onsubmit="return confirm('Delete this testimonial permanently?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button type="submit"
                                            title="Delete"
                                            class="rounded-lg bg-rose-50 px-3 py-2 text-xs font-bold text-rose-700 hover:bg-rose-100">
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>
                        <td colspan="7" class="px-6 py-16 text-center">

                            <h3 class="font-bold text-slate-900">
                                No testimonials found
                            </h3>

                            <p class="mt-1 text-sm text-slate-400">
                                Add your first customer testimonial or change your filters.
                            </p>

                            <a href="<?php echo e(route('testimonials.create')); ?>"
                               class="mt-5 inline-flex rounded-xl bg-brand-700 px-5 py-2.5 text-sm font-bold text-white">
                                Add Testimonial
                            </a>

                        </td>
                    </tr>

                <?php endif; ?>

            </tbody>
        </table>
    </div>

    
    <?php if($testimonials->hasPages()): ?>
        <div class="border-t border-slate-100 px-5 py-4">
            <?php echo e($testimonials->links()); ?>

        </div>
    <?php endif; ?>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\work1\Bhavik_Solar_Complete_CMS_Laravel\resources\views/admin/testimonials/index.blade.php ENDPATH**/ ?>