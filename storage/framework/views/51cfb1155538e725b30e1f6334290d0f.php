


<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>

<?php
    // Convert stored paths into public storage URLs using the same method
    // as the working service images: asset('storage/...').
    $mediaUrl = function ($path) {
        if (!$path) {
            return null;
        }

        $path = trim((string) $path);

        // Keep genuine external media URLs intact.
        if (preg_match('~^https?://~i', $path)) {
            $host = parse_url($path, PHP_URL_HOST);
            // Older local development URLs should not be used on production.
            if (!in_array(strtolower($host ?? ''), ['localhost', '127.0.0.1'], true)) {
                return $path;
            }
            $path = parse_url($path, PHP_URL_PATH) ?: '';
        }

        $path = ltrim($path, '/');
        if (str_starts_with($path, 'public/')) {
            $path = substr($path, strlen('public/'));
        }
        if (str_starts_with($path, 'storage/')) {
            $path = substr($path, strlen('storage/'));
        }

        return asset('storage/' . $path);
    };

    $mainImage = $mediaUrl($item->image ?? null);

    $backRoute = match ($type) {
        'product' => route('product'),
        'service' => route('services'),
        'project' => route('projects'),
    };

    $typeLabel = ucfirst($type);

    $imageGallery = collect($media)
        ->where('type', 'image')
        ->map(fn($file) => [
            'url' => $mediaUrl($file->file_path),
            'alt' => $file->alt_text ?: $title,
        ])
        ->values();

    foreach ($legacyImages as $image) {
        $legacyPath = is_array($image)
            ? ($image['url'] ?? $image['file_path'] ?? $image['path'] ?? null)
            : (is_object($image) ? ($image->file_path ?? $image->url ?? null) : $image);
        if ($legacyPath) {
            $imageGallery->push([
                'url' => $mediaUrl($legacyPath),
                'alt' => is_array($image) ? ($image['alt'] ?? $title) : $title,
            ]);
        }
    }

    if ($mainImage) {
        $imageGallery->prepend([
            'url' => $mainImage,
            'alt' => $title,
        ]);
    }

    $videoGallery = collect($media)
        ->where('type', 'video')
        ->values();
?>

<section class="relative overflow-hidden bg-[#062d24] py-20 text-white md:py-28">
    <div class="absolute -right-32 -top-32 h-96 w-96 rounded-full bg-emerald-400/10 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-5 lg:px-8">
        <a href="<?php echo e($backRoute); ?>"
           class="mb-8 inline-flex text-sm font-semibold text-lime-300 hover:text-white">
            ← Back to <?php echo e($typeLabel); ?>s
        </a>

        <p class="mb-5 text-xs font-extrabold uppercase tracking-[.3em] text-lime-300">
            Bhavik Solar / <?php echo e($typeLabel); ?> Details
        </p>

        <h1 class="max-w-5xl text-4xl font-black leading-tight tracking-tight md:text-6xl">
            <?php echo e($title); ?>

        </h1>

        <?php if($item->short_description): ?>
            <p class="mt-6 max-w-3xl text-lg leading-8 text-emerald-50/80">
                <?php echo e($item->short_description); ?>

            </p>
        <?php endif; ?>
    </div>
</section>

<section class="bg-[#f5f8f6] py-16 md:py-24">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">

        <div class="grid gap-12 lg:grid-cols-5">

            <div class="space-y-7 lg:col-span-3">

                <?php if($imageGallery->isNotEmpty()): ?>
                    <div class="overflow-hidden rounded-3xl bg-white shadow-lg">
                        <img
                            id="mainDetailImage"
                            src="<?php echo e($imageGallery->first()['url']); ?>"
                            alt="<?php echo e($title); ?>"
                            class="aspect-[4/3] w-full object-contain"
                        >
                    </div>

                    <?php if($imageGallery->count() > 1): ?>
                        <div class="grid grid-cols-3 gap-3 sm:grid-cols-4">
                            <?php $__currentLoopData = $imageGallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <button
                                    type="button"
                                    data-gallery-image="<?php echo e($image['url']); ?>"
                                    class="overflow-hidden rounded-xl border-2 border-white bg-white transition hover:border-emerald-600"
                                >
                                    <img
                                        src="<?php echo e($image['url']); ?>"
                                        alt="<?php echo e($image['alt'] ?? $title); ?>"
                                        loading="lazy"
                                        class="aspect-square w-full object-cover"
                                    >
                                </button>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="flex aspect-[4/3] items-center justify-center rounded-3xl bg-emerald-950 text-6xl text-emerald-200">
                        ☀
                    </div>
                <?php endif; ?>

                <?php if($videoGallery->isNotEmpty()): ?>
                    <div class="pt-7">
                        <h2 class="mb-6 text-2xl font-black text-slate-900">
                            Videos
                        </h2>

                        <div class="grid gap-6">
                            <?php $__currentLoopData = $videoGallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="overflow-hidden rounded-2xl bg-white shadow-sm">
                                    <video
                                        controls
                                        playsinline
                                        preload="metadata"
                                        class="aspect-video w-full bg-black object-contain"
                                    >
                                        <source src="<?php echo e($mediaUrl($video->file_path)); ?>">
                                        Your browser does not support video playback.
                                    </video>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="lg:col-span-2">

                <div class="sticky top-8 rounded-3xl border border-slate-200 bg-white p-7 shadow-sm md:p-9">

                    <p class="mb-3 text-xs font-extrabold uppercase tracking-widest text-emerald-600">
                        <?php echo e($typeLabel); ?> Information
                    </p>

                    <h2 class="text-2xl font-black text-slate-900">
                        <?php echo e($title); ?>

                    </h2>

                    <?php if($type === 'product'): ?>
                        <?php if($item->category): ?>
                            <p class="mt-5 text-slate-600">
                                <strong>Category:</strong> <?php echo e($item->category); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($item->price !== null): ?>
                            <p class="mt-4 text-3xl font-black text-emerald-700">
                                ₹<?php echo e(number_format((float)$item->price, 2)); ?>

                                <?php if($item->unit): ?>
                                    <span class="text-sm font-medium text-slate-500">
                                        / <?php echo e($item->unit); ?>

                                    </span>
                                <?php endif; ?>
                            </p>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if($type === 'project'): ?>
                        <?php if($item->location): ?>
                            <p class="mt-5 text-slate-600">
                                <strong>Location:</strong> <?php echo e($item->location); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($item->capacity): ?>
                            <p class="mt-3 text-slate-600">
                                <strong>Capacity:</strong> <?php echo e($item->capacity); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($item->completed_at): ?>
                            <p class="mt-3 text-slate-600">
                                <strong>Completed:</strong>
                                <?php echo e($item->completed_at->format('d M Y')); ?>

                            </p>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if($item->description): ?>
                        <div class="mt-7">
                            <h3 class="mb-3 text-lg font-extrabold">
                                Description
                            </h3>

                            <div class="whitespace-pre-line break-words leading-8 text-slate-600"><?php echo e($item->description); ?></div>
                        </div>
                    <?php endif; ?>

                    <div class="mt-9 space-y-3">
                        <a
                            href="<?php echo e(url('/contact')); ?>"
                            class="flex w-full items-center justify-center rounded-xl bg-emerald-700 px-6 py-4 font-bold text-white transition hover:bg-emerald-800"
                        >
                            Send Enquiry
                        </a>

                        <a
                            href="https://wa.me/918093870837?text=<?php echo e(rawurlencode('Hello Bhavik Solar, I want information about '.$title)); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="flex w-full items-center justify-center rounded-xl border border-emerald-300 px-6 py-4 font-bold text-emerald-700 hover:bg-emerald-50"
                        >
                            Enquire on WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <?php if($related->isNotEmpty()): ?>
            <div class="mt-24">
                <div class="mb-8">
                    <p class="mb-2 text-xs font-extrabold uppercase tracking-widest text-emerald-600">
                        Explore More
                    </p>

                    <h2 class="text-3xl font-black text-slate-900">
                        Related <?php echo e($typeLabel); ?>s
                    </h2>
                </div>

                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php
                            $relatedTitle = $type === 'product'
                                ? $relatedItem->name
                                : $relatedItem->title;

                            $relatedUrl = match ($type) {
                                'product' => route('solar.product.show', $relatedItem->slug),
                                'service' => route('solar.service.show', $relatedItem->slug),
                                'project' => route('solar.project.show', $relatedItem->slug),
                            };
                        ?>

                        <a href="<?php echo e($relatedUrl); ?>"
                           class="group overflow-hidden rounded-2xl border border-slate-200 bg-white transition hover:shadow-xl">

                            <?php if($relatedItem->image): ?>
                                <img
                                    src="<?php echo e($mediaUrl($relatedItem->image)); ?>"
                                    alt="<?php echo e($relatedTitle); ?>"
                                    loading="lazy"
                                    class="aspect-[4/3] w-full object-cover transition duration-500 group-hover:scale-105"
                                >
                            <?php else: ?>
                                <div class="flex aspect-[4/3] items-center justify-center bg-emerald-950 text-4xl text-lime-300">
                                    ☀
                                </div>
                            <?php endif; ?>

                            <div class="p-5">
                                <h3 class="font-extrabold text-slate-900">
                                    <?php echo e($relatedTitle); ?>

                                </h3>

                                <p class="mt-3 text-sm font-bold text-emerald-700">
                                    View Details →
                                </p>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</section>

<?php $__env->startPush('scripts'); ?>
<script>
document.querySelectorAll('[data-gallery-image]').forEach(button => {
    button.addEventListener('click', function () {
        const mainImage = document.getElementById('mainDetailImage');

        if (mainImage) {
            mainImage.src = this.dataset.galleryImage;
        }
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\work1\Bhavik_Solar_Complete_CMS_Laravel\resources\views/bhavik/detail.blade.php ENDPATH**/ ?>