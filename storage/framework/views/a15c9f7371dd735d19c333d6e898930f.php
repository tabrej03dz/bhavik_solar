


<?php $__env->startSection('title', 'Manage Media'); ?>
<?php $__env->startSection('page-title', 'Media Gallery'); ?>

<?php $__env->startSection('content'); ?>

<div class="mx-auto max-w-7xl space-y-8">

    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900">
                <?php echo e($title); ?>

            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Manage <?php echo e(ucfirst($type)); ?> Images & Videos
            </p>
        </div>

        <a
            href="<?php echo e($type === 'product'
                ? route('products.index')
                : route('admin.projects.index')); ?>"
            class="rounded-xl border border-slate-200 bg-white px-5 py-3 font-semibold text-slate-700"
        >
            ← Back to <?php echo e(ucfirst($type)); ?>s
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="rounded-xl border border-green-200 bg-green-50 p-4 text-green-700">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
            <ul class="list-inside list-disc">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="rounded-xl border border-blue-200 bg-blue-50 px-5 py-4 text-sm text-blue-900">
        Uploaded images and videos appear automatically on the public detail page.
        <a class="font-bold underline" target="_blank" rel="noopener" href="<?php echo e($type === 'product' ? route('solar.product.show', $item->slug) : route('solar.project.show', $item->slug)); ?>">View public page ↗</a>
    </div>

    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">

        <h2 class="mb-6 text-xl font-extrabold">
            Upload New Media
        </h2>

        <form
            action="<?php echo e(route('admin.media.store', [
                'type' => $type,
                'id' => $item->id
            ])); ?>"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6"
        >
            <?php echo csrf_field(); ?>

            <div>
                <label class="mb-2 block font-bold text-slate-800">
                    Select Multiple Images
                </label>

                <input
                    type="file"
                    name="images[]"
                    accept=".jpg,.jpeg,.png,.webp"
                    multiple
                    id="galleryImages"
                    class="w-full rounded-xl border border-slate-200 p-4"
                >

                <p class="mt-2 text-xs text-slate-500">
                    JPG, PNG, WebP • Maximum 20 images • 10 MB each
                </p>

                <div id="imagePreview" class="mt-4 grid grid-cols-2 gap-3 sm:grid-cols-4"></div>
            </div>

            <div>
                <label class="mb-2 block font-bold text-slate-800">
                    Select Multiple Videos
                </label>

                <input
                    type="file"
                    name="videos[]"
                    accept=".mp4,.mov,.webm"
                    multiple
                    id="galleryVideos"
                    class="w-full rounded-xl border border-slate-200 p-4"
                >

                <p class="mt-2 text-xs text-slate-500">
                    MP4, MOV, WebM • Maximum 10 videos • 50 MB each
                </p>

                <div id="videoPreview" class="mt-4 grid grid-cols-1 gap-3 sm:grid-cols-2"></div>
            </div>

            <button
                type="submit"
                class="rounded-xl bg-emerald-700 px-8 py-3 font-bold text-white transition hover:bg-emerald-800"
            >
                Upload Images & Videos
            </button>
        </form>
    </div>

    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
        <h2 class="mb-6 text-xl font-extrabold">
            Uploaded Images (<?php echo e($images->count()); ?>)
        </h2>

        <div class="grid grid-cols-2 gap-5 md:grid-cols-3 lg:grid-cols-4">
            <?php $__empty_1 = true; $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="overflow-hidden rounded-2xl border border-slate-200">
                    <img
                        src="<?php echo e($media->url); ?>"
                        alt="<?php echo e($media->alt_text); ?>"
                        class="h-44 w-full object-cover"
                        loading="lazy"
                    >

                    <div class="p-3">
                        <form
                            method="POST"
                            action="<?php echo e(route('admin.media.destroy', [
                                'type' => $type,
                                'id' => $item->id,
                                'media' => $media->id
                            ])); ?>"
                            onsubmit="return confirm('Delete this image?')"
                        >
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button
                                type="submit"
                                class="w-full rounded-lg bg-red-50 px-4 py-2 text-sm font-bold text-red-600 hover:bg-red-100"
                            >
                                Delete Image
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="col-span-full text-slate-500">
                    No gallery images uploaded yet.
                </p>
            <?php endif; ?>
        </div>
    </div>

    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
        <h2 class="mb-6 text-xl font-extrabold">
            Uploaded Videos (<?php echo e($videos->count()); ?>)
        </h2>

        <div class="grid gap-6 md:grid-cols-2">
            <?php $__empty_1 = true; $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="overflow-hidden rounded-2xl border border-slate-200">

                    <video
                        controls
                        preload="metadata"
                        playsinline
                        class="aspect-video w-full bg-black object-contain"
                    >
                        <source src="<?php echo e($media->url); ?>">
                        Your browser does not support video.
                    </video>

                    <div class="p-4">
                        <p class="mb-3 truncate text-sm text-slate-500">
                            <?php echo e($media->original_name); ?>

                        </p>

                        <form
                            method="POST"
                            action="<?php echo e(route('admin.media.destroy', [
                                'type' => $type,
                                'id' => $item->id,
                                'media' => $media->id
                            ])); ?>"
                            onsubmit="return confirm('Delete this video?')"
                        >
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button
                                type="submit"
                                class="rounded-lg bg-red-50 px-5 py-2 text-sm font-bold text-red-600 hover:bg-red-100"
                            >
                                Delete Video
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-slate-500">
                    No videos uploaded yet.
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    function setupPreview(inputId, previewId, type) {
        const input = document.getElementById(inputId);
        const container = document.getElementById(previewId);

        if (!input || !container) return;

        let previewUrls = [];

        input.addEventListener('change', function () {
            previewUrls.forEach(url => URL.revokeObjectURL(url));
            previewUrls = [];
            container.innerHTML = '';

            Array.from(this.files).forEach(file => {
                const url = URL.createObjectURL(file);
                previewUrls.push(url);

                const element = document.createElement(
                    type === 'image' ? 'img' : 'video'
                );

                element.src = url;
                element.className =
                    type === 'image'
                        ? 'h-32 w-full rounded-xl object-cover'
                        : 'aspect-video w-full rounded-xl bg-black';

                if (type === 'video') {
                    element.controls = true;
                    element.preload = 'metadata';
                }

                container.appendChild(element);
            });
        });
    }

    setupPreview('galleryImages', 'imagePreview', 'image');
    setupPreview('galleryVideos', 'videoPreview', 'video');

});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\work1\Bhavik_Solar_Complete_CMS_Laravel\resources\views/admin/media/index.blade.php ENDPATH**/ ?>