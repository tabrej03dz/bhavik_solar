<?php $__env->startSection('title', ($item->exists ? 'Edit ' : 'Add ') . ucfirst(rtrim($type, 's'))); ?>
<?php $__env->startSection('page-title', ($item->exists ? 'Edit ' : 'Add ') . ucfirst(rtrim($type, 's'))); ?>

<?php $__env->startSection('content'); ?>
<?php
    $isProject = $type === 'projects';
    $pageTitle = ($item->exists ? 'Edit ' : 'Add New ') . ucfirst(rtrim($type, 's'));
    $action = $item->exists
        ? route('admin.' . $type . '.update', $item->id)
        : route('admin.' . $type . '.store');
    $existingMedia = ($isProject && $item->exists) ? $item->media : collect();
?>

<div class="mx-auto max-w-6xl">
    <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h2 class="text-xl font-extrabold text-slate-950"><?php echo e($pageTitle); ?></h2>
            <p class="mt-1 text-sm text-slate-500">Manage project details, photos and videos in one place.</p>
        </div>
        <a href="<?php echo e(route('admin.' . $type . '.index')); ?>" class="rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-bold text-slate-600 hover:bg-slate-50">← Back</a>
    </div>

    <?php if(session('success')): ?>
        <div class="mb-5 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-sm font-semibold text-emerald-800"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="mb-5 rounded-2xl border border-rose-200 bg-rose-50 p-4 text-rose-700">
            <strong>Please fix these errors:</strong>
            <ul class="mt-2 list-disc space-y-1 pl-5 text-sm"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
        </div>
    <?php endif; ?>

    <form id="solarItemForm" action="<?php echo e($action); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php if($item->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

        <div class="grid gap-6 lg:grid-cols-[minmax(0,1fr)_360px]">
            
            <div class="space-y-6">
                <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                    <h3 class="font-extrabold text-slate-900">Basic Information</h3>
                    <div class="mt-5 grid gap-5 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label for="title" class="mb-2 block text-sm font-bold text-slate-700">Title <span class="text-rose-500">*</span></label>
                            <input id="title" type="text" name="title" maxlength="255" required value="<?php echo e(old('title', $item->title)); ?>" placeholder="Enter project title" class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="short_description" class="mb-2 block text-sm font-bold text-slate-700">Short Description</label>
                            <textarea id="short_description" name="short_description" rows="3" maxlength="500" placeholder="Brief project introduction" class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-emerald-500"><?php echo e(old('short_description', $item->short_description)); ?></textarea>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="description" class="mb-2 block text-sm font-bold text-slate-700">Full Description</label>
                            <textarea id="description" name="description" rows="7" placeholder="Project details, highlights..." class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-emerald-500"><?php echo e(old('description', $item->description)); ?></textarea>
                        </div>
                        <?php if($isProject): ?>
                            <div>
                                <label for="location" class="mb-2 block text-sm font-bold text-slate-700">Project Location</label>
                                <input id="location" type="text" name="location" value="<?php echo e(old('location', $item->location)); ?>" placeholder="e.g. Jharsuguda, Odisha" class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm">
                            </div>
                            <div>
                                <label for="capacity" class="mb-2 block text-sm font-bold text-slate-700">Capacity</label>
                                <input id="capacity" type="text" name="capacity" value="<?php echo e(old('capacity', $item->capacity)); ?>" placeholder="e.g. 50 kW" class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm">
                            </div>
                            <div>
                                <label for="completed_at" class="mb-2 block text-sm font-bold text-slate-700">Completion Date</label>
                                <input id="completed_at" type="date" name="completed_at" value="<?php echo e(old('completed_at', $item->completed_at?->format('Y-m-d'))); ?>" class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm">
                            </div>
                        <?php endif; ?>
                    </div>
                </section>

                <?php if($isProject): ?>
                    <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                        <div class="flex flex-wrap items-start justify-between gap-3">
                            <div>
                                <h3 class="font-extrabold text-slate-900">Project Gallery</h3>
                                <p class="mt-1 text-xs text-slate-500">Images and videos in the same gallery, just like product create.</p>
                            </div>
                            <?php if($item->exists): ?>
                                <a href="<?php echo e(route('admin.media.index', ['type' => 'project', 'id' => $item->id])); ?>" class="rounded-lg bg-emerald-50 px-3 py-2 text-xs font-bold text-emerald-700 hover:bg-emerald-100">Media Manager ↗</a>
                            <?php endif; ?>
                        </div>

                        <label for="mixedMediaInput" class="mt-5 flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-200 bg-slate-50 px-5 py-9 text-center transition hover:border-emerald-400 hover:bg-emerald-50">
                            <svg class="h-11 w-11 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="16" rx="2"/><circle cx="8" cy="9" r="1.5"/><path d="m3 17 6-5 4 4 3-3 5 4"/><path d="m15 7 3 2-3 2z"/></svg>
                            <span class="mt-3 text-sm font-bold text-slate-700">Select Multiple Images & Videos</span>
                            <span class="mt-1 text-xs text-slate-500">JPG, PNG, WebP, MP4, MOV, WebM • 30 files max • Image 10 MB, Video 50 MB</span>
                        </label>
                        <input id="mixedMediaInput" type="file" name="media[]" accept="image/jpeg,image/png,image/webp,video/mp4,video/quicktime,video/webm,.jpg,.jpeg,.png,.webp,.mp4,.mov,.webm" multiple class="sr-only">
                        <div id="mediaError" role="alert" class="mt-3 hidden text-sm font-semibold text-rose-600"></div>
                        <div id="mixedMediaPreview" class="mt-5 hidden grid-cols-2 gap-4 sm:grid-cols-3"></div>

                        <?php if($item->exists && $existingMedia->isNotEmpty()): ?>
                            <div class="mt-8 border-t border-slate-100 pt-6">
                                <div class="mb-4 flex items-center justify-between gap-3">
                                    <h4 class="font-extrabold text-slate-900">Existing Gallery (<?php echo e($existingMedia->count()); ?>)</h4>
                                    <span class="text-xs text-slate-400">Check Delete and save to remove</span>
                                </div>
                                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3">
                                    <?php $__currentLoopData = $existingMedia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="overflow-hidden rounded-xl border border-slate-200 bg-slate-50">
                                            <?php if($media->type === 'video'): ?>
                                                <video controls preload="metadata" playsinline class="aspect-video w-full bg-black object-contain"><source src="<?php echo e($media->url); ?>">Video unsupported</video>
                                            <?php else: ?>
                                                <img src="<?php echo e($media->url); ?>" alt="<?php echo e($media->alt_text ?: $item->title); ?>" loading="lazy" class="aspect-video w-full object-cover">
                                            <?php endif; ?>
                                            <div class="p-3">
                                                <p class="mb-2 truncate text-xs text-slate-500" title="<?php echo e($media->original_name); ?>"><?php echo e($media->original_name); ?></p>
                                                <label class="inline-flex cursor-pointer items-center gap-2 text-xs font-bold text-rose-600"><input type="checkbox" name="delete_media[]" value="<?php echo e($media->id); ?>" class="h-4 w-4 rounded border-slate-300"> Delete on Save</label>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </section>
                <?php endif; ?>
            </div>

            
            <aside class="space-y-6">
                <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <h3 class="font-extrabold text-slate-900">Feature Image</h3>
                    <p class="mt-1 text-xs text-slate-500">Main thumbnail for listing cards (optional).</p>
                    <label for="mainImageInput" class="mt-4 flex aspect-square cursor-pointer items-center justify-center overflow-hidden rounded-2xl border-2 border-dashed border-slate-200 bg-slate-50">
                        <div id="mainPlaceholder" class="p-5 text-center <?php echo e($item->exists && $item->image ? 'hidden' : ''); ?>">
                            <svg class="mx-auto h-10 w-10 text-slate-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="16"/><circle cx="8" cy="10" r="2"/><path d="m3 17 6-5 4 4 3-3 5 4"/></svg>
                            <p class="mt-3 text-sm font-semibold text-slate-500">Upload Feature Image</p>
                        </div>
                        <img id="mainPreview" src="<?php echo e($item->exists && $item->image ? asset('storage/' . $item->image) : ''); ?>" alt="Feature image preview" class="h-full w-full object-cover <?php echo e($item->exists && $item->image ? '' : 'hidden'); ?>">
                    </label>
                    <input id="mainImageInput" type="file" name="image" accept="image/jpeg,image/png,image/webp" class="mt-4 block w-full text-xs text-slate-500 file:mr-3 file:rounded-lg file:border-0 file:bg-emerald-50 file:px-4 file:py-2 file:font-bold file:text-emerald-700">
                    <p class="mt-2 text-xs text-slate-400">JPG, PNG, WebP • up to 5 MB</p>
                    <?php if($item->exists && $item->image): ?>
                        <label class="mt-4 flex items-center gap-2 text-sm font-semibold text-rose-600"><input type="checkbox" name="remove_image" value="1" class="h-4 w-4"> Remove current feature image</label>
                    <?php endif; ?>
                </section>

                <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <h3 class="font-extrabold text-slate-900">Publishing Settings</h3>
                    <div class="mt-5 space-y-5">
                        <div>
                            <label for="sort_order" class="mb-2 block text-sm font-bold text-slate-700">Sort Order</label>
                            <input id="sort_order" type="number" name="sort_order" min="0" value="<?php echo e(old('sort_order', $item->sort_order ?? 0)); ?>" class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm">
                            <p class="mt-1 text-xs text-slate-400">Smaller numbers appear first.</p>
                        </div>
                        <label class="flex cursor-pointer items-start gap-3"><input type="checkbox" name="is_active" value="1" <?php if(old('is_active', $item->exists ? $item->is_active : true)): echo 'checked'; endif; ?> class="mt-1 h-4 w-4 accent-emerald-700"><span><span class="block text-sm font-bold text-slate-700">Active / Published</span><span class="text-xs text-slate-400">Show on website.</span></span></label>
                        <label class="flex cursor-pointer items-start gap-3"><input type="checkbox" name="is_featured" value="1" <?php if(old('is_featured', $item->is_featured)): echo 'checked'; endif; ?> class="mt-1 h-4 w-4 accent-violet-600"><span><span class="block text-sm font-bold text-slate-700">Featured</span><span class="text-xs text-slate-400">Highlight this project.</span></span></label>
                    </div>
                </section>

                <button id="solarSubmitButton" type="submit" class="flex w-full items-center justify-center rounded-xl bg-emerald-700 px-5 py-3.5 text-sm font-bold text-white shadow-md transition hover:bg-emerald-800 disabled:cursor-not-allowed disabled:opacity-60"><span id="solarSubmitText"><?php echo e($item->exists ? 'Update' : 'Save'); ?> <?php echo e(ucfirst(rtrim($type, 's'))); ?></span></button>
            </aside>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const main = document.getElementById('mainImageInput');
    const mainPreview = document.getElementById('mainPreview');
    const mainPlaceholder = document.getElementById('mainPlaceholder');
    const mediaInput = document.getElementById('mixedMediaInput');
    const previewBox = document.getElementById('mixedMediaPreview');
    const errorBox = document.getElementById('mediaError');
    const form = document.getElementById('solarItemForm');
    const submit = document.getElementById('solarSubmitButton');
    const submitText = document.getElementById('solarSubmitText');
    let mainURL = null;
    let previewURLs = [];

    if (main) main.addEventListener('change', function () {
        if (mainURL) URL.revokeObjectURL(mainURL);
        const file = this.files[0];
        if (!file) return;
        if (file.size > 5 * 1024 * 1024 || !['image/jpeg','image/png','image/webp'].includes(file.type)) {
            alert('Feature image must be JPG, PNG or WebP (max 5 MB).');
            this.value = '';
            return;
        }
        mainURL = URL.createObjectURL(file);
        mainPreview.src = mainURL;
        mainPreview.classList.remove('hidden');
        mainPlaceholder.classList.add('hidden');
    });

    if (mediaInput) mediaInput.addEventListener('change', function () {
        previewURLs.forEach(url => URL.revokeObjectURL(url));
        previewURLs = [];
        previewBox.replaceChildren();
        previewBox.classList.add('hidden');
        previewBox.classList.remove('grid');
        errorBox.classList.add('hidden');
        const files = Array.from(this.files);
        const allowedImages = ['image/jpeg', 'image/png', 'image/webp'];
        const allowedVideos = ['video/mp4', 'video/quicktime', 'video/webm'];
        let error = '';
        if (files.length > 30) error = 'Maximum 30 files allowed at once.';
        for (const file of files) {
            const isImage = allowedImages.includes(file.type);
            const isVideo = allowedVideos.includes(file.type);
            if (!isImage && !isVideo) { error = 'Only JPG, PNG, WebP, MP4, MOV and WebM are allowed.'; break; }
            if (isImage && file.size > 10 * 1024 * 1024) { error = 'Images must be 10 MB or smaller.'; break; }
            if (isVideo && file.size > 50 * 1024 * 1024) { error = 'Videos must be 50 MB or smaller.'; break; }
        }
        if (error) {
            this.value = '';
            errorBox.textContent = error;
            errorBox.classList.remove('hidden');
            return;
        }
        if (!files.length) return;
        previewBox.classList.remove('hidden');
        previewBox.classList.add('grid');
        files.forEach(file => {
            const url = URL.createObjectURL(file);
            previewURLs.push(url);
            const card = document.createElement('div');
            card.className = 'overflow-hidden rounded-xl border border-slate-200 bg-white';
            const media = document.createElement(allowedImages.includes(file.type) ? 'img' : 'video');
            media.src = url;
            media.className = 'aspect-video w-full object-cover bg-slate-100';
            if (media.tagName === 'VIDEO') { media.controls = true; media.preload = 'metadata'; }
            const caption = document.createElement('div');
            caption.className = 'truncate p-3 text-xs text-slate-500';
            caption.textContent = file.name;
            card.append(media, caption);
            previewBox.appendChild(card);
        });
    });

    if (form) form.addEventListener('submit', function () {
        submit.disabled = true;
        submitText.textContent = 'Saving...';
    });
    window.addEventListener('beforeunload', () => {
        previewURLs.forEach(url => URL.revokeObjectURL(url));
        if (mainURL) URL.revokeObjectURL(mainURL);
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\work1\Bhavik_Solar_Complete_CMS_Laravel\resources\views/admin/solar/form.blade.php ENDPATH**/ ?>