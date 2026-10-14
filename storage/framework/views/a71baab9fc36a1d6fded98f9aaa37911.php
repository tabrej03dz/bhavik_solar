<header class="sticky top-0 z-50 border-b border-white/10 bg-[#06271f]/95 backdrop-blur-xl text-white">
    <div class="mx-auto max-w-7xl px-5 lg:px-8 flex h-20 items-center justify-between gap-4">
        <a href="<?php echo e(url("/")); ?>" class="flex items-center gap-3 shrink-0">
            <span class="h-12 w-12 rounded-xl overflow-hidden bg-white flex items-center justify-center">
                <img src="<?php echo e(asset("bhavik/assets/logo.jpg")); ?>" alt="Bhavik Solar logo" class="w-full h-full object-contain">
            </span>
            <span class="text-xl tracking-tight font-black">BHAVIK <span class="text-lime-400">SOLAR</span>
        </span>
    </a>
    <nav class="hidden lg:flex items-center gap-8 text-sm font-bold text-emerald-50">
        <a href="<?php echo e(url("/")); ?>" class="hover:text-lime-300 transition" data-nav="<?php echo e(url("/")); ?>">Home</a>
        <a href="<?php echo e(url("/about")); ?>" class="hover:text-lime-300 transition" data-nav="<?php echo e(url("/about")); ?>">About Us</a>
        <a href="<?php echo e(url("/product")); ?>" class="hover:text-lime-300 transition" data-nav="<?php echo e(url("/product")); ?>">Products</a>
        <a href="<?php echo e(url("/services")); ?>" class="hover:text-lime-300 transition" data-nav="<?php echo e(url("/services")); ?>">Services</a>
        <a href="<?php echo e(url("/projects")); ?>" class="hover:text-lime-300 transition" data-nav="<?php echo e(url("/projects")); ?>">Projects</a>
        <a href="<?php echo e(url("/contact")); ?>" class="hover:text-lime-300 transition" data-nav="<?php echo e(url("/contact")); ?>">Contact</a>
    </nav>
    <div class="hidden md:flex items-center gap-3">
        <a href="tel:+918093870837" aria-label="Call Bhavik Solar" class="rounded-full border border-white/20 p-3 hover:bg-white/10">
            <i data-lucide="phone" class="w-4 h-4"></i>
        </a>
        <a href="<?php echo e(url("/contact")); ?>" class="inline-flex items-center justify-center gap-2 rounded-full px-6 py-3.5 text-sm font-bold transition hover:-translate-y-0.5 bg-lime-400 text-slate-950 hover:bg-lime-300 shadow-lg shadow-lime-500/15">
            Get a Quote
            <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
        </a>
    </div>
    <button id="menuBtn" type="button" aria-label="Toggle menu" aria-expanded="false" class="lg:hidden rounded-xl border border-white/20 p-3">
        <i data-lucide="menu" class="w-6 h-6"></i>
    </button>
</div>
<div id="mobileNav" class="hidden lg:hidden border-t border-white/10 px-5 pb-5">
    <nav class="flex flex-col gap-1">
        <a href="<?php echo e(url("/")); ?>" class="rounded-lg py-3 px-4 hover:bg-white/10">Home</a>
        <a href="<?php echo e(url("/about")); ?>" class="rounded-lg py-3 px-4 hover:bg-white/10">About Us</a>
        <a href="<?php echo e(url("/products")); ?>" class="rounded-lg py-3 px-4 hover:bg-white/10">Products</a>
        <a href="<?php echo e(url("/services")); ?>" class="rounded-lg py-3 px-4 hover:bg-white/10">Services</a>
        <a href="<?php echo e(url("/projects")); ?>" class="rounded-lg py-3 px-4 hover:bg-white/10">Projects</a>
        <a href="<?php echo e(url("/contact")); ?>" class="rounded-lg py-3 px-4 hover:bg-white/10">Contact</a>
    </nav>
</div>
</header><?php /**PATH D:\work1\Bhavik_Solar_Complete_CMS_Laravel\resources\views/bhavik/partials/header.blade.php ENDPATH**/ ?>