
<?php
    $editing = isset($testimonial);
?>


<?php if($errors->any()): ?>
    <div class="mb-5 rounded-xl border border-rose-200 bg-rose-50 px-5 py-4 text-sm text-rose-800">
        <p class="font-bold">
            Please correct the following errors:
        </p>

        <ul class="mt-2 list-inside list-disc">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<form
    method="POST"
    action="<?php echo e($editing
        ? route('testimonials.update', $testimonial)
        : route('testimonials.store')); ?>"
    enctype="multipart/form-data"
>
    <?php echo csrf_field(); ?>

    <?php if($editing): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>

    <div class="grid gap-6 lg:grid-cols-3">

        
        <div class="space-y-6 lg:col-span-2">

            
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-card">

                <h3 class="mb-5 text-lg font-extrabold text-slate-950">
                    Customer Details
                </h3>

                <div class="grid gap-5 md:grid-cols-2">

                    
                    <div>
                        <label for="name"
                               class="mb-1.5 block text-xs font-bold text-slate-600">
                            Customer Name
                            <span class="text-rose-500">*</span>
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            required
                            maxlength="255"
                            value="<?php echo e(old('name', $testimonial->name ?? '')); ?>"
                            placeholder="Enter customer name"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-100"
                        >

                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-xs text-rose-600">
                                <?php echo e($message); ?>

                            </p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div>
                        <label for="designation"
                               class="mb-1.5 block text-xs font-bold text-slate-600">
                            Designation
                        </label>

                        <input
                            type="text"
                            id="designation"
                            name="designation"
                            maxlength="255"
                            value="<?php echo e(old('designation', $testimonial->designation ?? '')); ?>"
                            placeholder="e.g. Business Owner"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-brand-500"
                        >
                    </div>

                    
                    <div>
                        <label for="company"
                               class="mb-1.5 block text-xs font-bold text-slate-600">
                            Company
                        </label>

                        <input
                            type="text"
                            id="company"
                            name="company"
                            maxlength="255"
                            value="<?php echo e(old('company', $testimonial->company ?? '')); ?>"
                            placeholder="Enter company name"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-brand-500"
                        >
                    </div>

                    
                    <div>
                        <label for="location"
                               class="mb-1.5 block text-xs font-bold text-slate-600">
                            Location
                        </label>

                        <input
                            type="text"
                            id="location"
                            name="location"
                            maxlength="255"
                            value="<?php echo e(old('location', $testimonial->location ?? '')); ?>"
                            placeholder="City, State"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-brand-500"
                        >
                    </div>

                </div>
            </div>

            
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-card">

                <h3 class="mb-5 text-lg font-extrabold text-slate-950">
                    Customer Feedback
                </h3>

                <div>
                    <label for="review"
                           class="mb-1.5 block text-xs font-bold text-slate-600">
                        Customer Review
                        <span class="text-rose-500">*</span>
                    </label>

                    <textarea
                        id="review"
                        name="review"
                        required
                        rows="6"
                        maxlength="5000"
                        placeholder="Write customer feedback..."
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none transition focus:border-brand-500 focus:ring-4 focus:ring-brand-100"
                    ><?php echo e(old('review', $testimonial->review ?? '')); ?></textarea>

                    <?php $__errorArgs = ['review'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-xs text-rose-600">
                            <?php echo e($message); ?>

                        </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="mt-5">
                    <label for="rating"
                           class="mb-1.5 block text-xs font-bold text-slate-600">
                        Customer Rating
                        <span class="text-rose-500">*</span>
                    </label>

                    <select
                        id="rating"
                        name="rating"
                        required
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-brand-500"
                    >
                        <?php for($i = 5; $i >= 1; $i--): ?>
                            <option
                                value="<?php echo e($i); ?>"
                                <?php if(
                                    (int) old(
                                        'rating',
                                        $testimonial->rating ?? 5
                                    ) === $i
                                ): echo 'selected'; endif; ?>
                            >
                                <?php echo e($i); ?> Star<?php echo e($i !== 1 ? 's' : ''); ?>

                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>

        </div>

        
        <div class="space-y-6">

            
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-card">

                <h3 class="mb-5 text-lg font-extrabold text-slate-950">
                    Customer Photo
                </h3>

                <?php if($editing && $testimonial->image): ?>
                    <div class="mb-4">
                        <img
                            src="<?php echo e(Storage::url($testimonial->image)); ?>"
                            alt="Current customer photo"
                            class="h-40 w-full rounded-xl border border-slate-100 object-contain"
                        >

                        <p class="mt-2 text-xs text-slate-400">
                            Current customer photo
                        </p>
                    </div>
                <?php endif; ?>

                <input
                    type="file"
                    name="image"
                    id="image"
                    accept="image/jpeg,image/png,image/webp"
                    class="w-full rounded-xl border border-slate-200 bg-white p-3 text-sm"
                >

                <img
                    id="imagePreview"
                    alt="Selected photo preview"
                    class="mt-4 hidden h-40 w-full rounded-xl border border-slate-200 object-contain"
                >

                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-2 text-xs text-rose-600">
                        <?php echo e($message); ?>

                    </p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <p class="mt-3 text-xs leading-relaxed text-slate-400">
                    Supported: JPG, PNG, WebP.
                    Maximum file size: 2 MB.

                    <?php if($editing): ?>
                        Leave blank to keep the existing image.
                    <?php endif; ?>
                </p>
            </div>

            
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-card">

                <h3 class="mb-5 text-lg font-extrabold text-slate-950">
                    Visibility & Sorting
                </h3>

                <div class="mb-5">
                    <label for="sort_order"
                           class="mb-1.5 block text-xs font-bold text-slate-600">
                        Sort Order
                    </label>

                    <input
                        type="number"
                        id="sort_order"
                        name="sort_order"
                        min="0"
                        max="4294967295"
                        value="<?php echo e(old('sort_order', $testimonial->sort_order ?? 0)); ?>"
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-brand-500"
                    >

                    <p class="mt-2 text-xs text-slate-400">
                        Lower numbers appear first within each featured group.
                    </p>
                </div>

                
                <input type="hidden" name="is_featured" value="0">

                <label class="mb-4 flex cursor-pointer items-center gap-3 text-sm font-semibold text-slate-700">
                    <input
                        type="checkbox"
                        name="is_featured"
                        value="1"
                        <?php if(
                            (bool) old(
                                'is_featured',
                                $testimonial->is_featured ?? false
                            )
                        ): echo 'checked'; endif; ?>
                        class="h-4 w-4 rounded border-slate-300 text-brand-700"
                    >

                    Featured Testimonial
                </label>

                
                <input type="hidden" name="is_active" value="0">

                <label class="flex cursor-pointer items-center gap-3 text-sm font-semibold text-slate-700">
                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        <?php if(
                            (bool) old(
                                'is_active',
                                $testimonial->is_active ?? true
                            )
                        ): echo 'checked'; endif; ?>
                        class="h-4 w-4 rounded border-slate-300 text-brand-700"
                    >

                    Active (Show on Website)
                </label>

            </div>
        </div>
    </div>

    
    <div class="mt-6 flex flex-wrap items-center gap-3">

        <button
            type="submit"
            class="rounded-xl bg-brand-700 px-6 py-3 text-sm font-bold text-white shadow-md transition hover:bg-brand-800"
        >
            <?php echo e($editing
                ? 'Update Testimonial'
                : 'Save Testimonial'); ?>

        </button>

        <a href="<?php echo e(route('testimonials.index')); ?>"
           class="rounded-xl border border-slate-200 bg-white px-6 py-3 text-sm font-bold text-slate-600 transition hover:bg-slate-50">
            Cancel
        </a>

    </div>

</form>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('image');
    const preview = document.getElementById('imagePreview');

    if (!input || !preview) return;

    input.addEventListener('change', function () {
        const file = this.files?.[0];

        if (!file) {
            preview.classList.add('hidden');
            preview.removeAttribute('src');
            return;
        }

        if (!file.type.startsWith('image/')) {
            this.value = '';
            preview.classList.add('hidden');
            alert('Please select a valid image.');
            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            this.value = '';
            preview.classList.add('hidden');
            alert('Image must be smaller than 2 MB.');
            return;
        }

        const reader = new FileReader();

        reader.onload = function (event) {
            preview.src = event.target.result;
            preview.classList.remove('hidden');
        };

        reader.readAsDataURL(file);
    });
});
</script>
<?php /**PATH D:\work1\Bhavik_Solar_Complete_CMS_Laravel\resources\views/admin/testimonials/_form.blade.php ENDPATH**/ ?>