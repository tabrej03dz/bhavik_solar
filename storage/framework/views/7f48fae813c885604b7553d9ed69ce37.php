<?php $__env->startSection('title', 'Solar Services | Bhavik Solar'); ?>

<?php $__env->startSection('content'); ?>


<section class="relative overflow-hidden bg-[#062d24] text-white">

    <div class="absolute -right-28 -top-28 h-96 w-96 rounded-full bg-emerald-500/15 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-5 py-24 lg:px-8 md:py-32">

        <p class="mb-5 text-xs font-black uppercase tracking-[.3em] text-lime-300">
            Our Services
        </p>

        <h1 class="max-w-4xl text-5xl font-black leading-[1.05] tracking-tight md:text-7xl">
            Complete solar energy solutions.
        </h1>

        <p class="mt-7 max-w-2xl text-lg leading-relaxed text-emerald-50/75">
            From rooftop systems to water pumping and outdoor lighting,
            explore our range of clean energy services.
        </p>

        <p class="mt-9 text-xs font-semibold text-emerald-100/50">
            <a href="<?php echo e(route('home')); ?>" class="hover:text-white">
                Home
            </a>
            / Our Services
        </p>

    </div>

</section>



<section class="bg-[#f4f8f5] py-24">

    <div class="mx-auto max-w-7xl px-5 lg:px-8">

        <div class="mb-12 max-w-3xl">

            <p class="mb-4 text-xs font-black uppercase tracking-[0.25em] text-emerald-600">
                Solutions We Offer
            </p>

            <h2 class="text-4xl font-black leading-tight tracking-tight text-slate-950 md:text-5xl">
                Tailored to your energy needs.
            </h2>

            <p class="mt-5 text-lg leading-relaxed text-slate-600">
                Explore our solar services and find the right energy
                solution for your home, business or commercial project.
            </p>

        </div>


        <?php if($managedServices->isNotEmpty()): ?>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                <?php $__currentLoopData = $managedServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <article
                        class="group flex flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white transition duration-300 hover:-translate-y-1 hover:border-emerald-300 hover:shadow-2xl hover:shadow-emerald-900/10"
                    >

                        
                        <div class="relative h-56 overflow-hidden bg-emerald-50">

                            <?php if($service->image): ?>

                                <img
                                    src="<?php echo e(asset('storage/' . $service->image)); ?>"
                                    alt="<?php echo e($service->title); ?>"
                                    loading="lazy"
                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                >

                            <?php else: ?>

                                <div class="flex h-full w-full flex-col items-center justify-center bg-gradient-to-br from-[#073b30] to-emerald-700 text-white">

                                    <i data-lucide="sun" class="h-16 w-16 text-lime-300"></i>

                                    <span class="mt-4 text-sm font-bold tracking-widest">
                                        BHAVIK SOLAR
                                    </span>

                                </div>

                            <?php endif; ?>

                            <?php if($service->is_featured): ?>

                                <span class="absolute left-4 top-4 rounded-full bg-lime-400 px-4 py-1.5 text-xs font-extrabold text-emerald-950 shadow">
                                    Featured Service
                                </span>

                            <?php endif; ?>

                        </div>


                        
                        <div class="flex flex-1 flex-col p-7">

                            <div class="mb-4 flex items-center justify-between">

                                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-700">

                                    <i data-lucide="zap" class="h-6 w-6"></i>

                                </span>

                                <span class="text-xs font-black text-slate-300">
                                    <?php echo e(str_pad($loop->iteration, 2, '0', STR_PAD_LEFT)); ?>

                                </span>

                            </div>


                            <h3 class="mb-3 text-2xl font-extrabold leading-snug text-slate-950 transition group-hover:text-emerald-700">

                                <?php echo e($service->title); ?>


                            </h3>


                            <?php if($service->short_description): ?>

                                <p class="leading-7 text-slate-600">

                                    <?php echo e($service->short_description); ?>


                                </p>

                            <?php elseif($service->description): ?>

                                <p class="leading-7 text-slate-600">

                                    <?php echo e(\Illuminate\Support\Str::limit(strip_tags($service->description), 160)); ?>


                                </p>

                            <?php endif; ?>


                            
                            <?php if($service->description): ?>

                                <div class="mt-4">

                                    <button
                                        type="button"
                                        onclick="toggleServiceDescription(<?php echo e($service->id); ?>)"
                                        class="text-sm font-bold text-emerald-700 hover:text-emerald-900"
                                        id="service-button-<?php echo e($service->id); ?>"
                                        aria-expanded="false"
                                        aria-controls="service-description-<?php echo e($service->id); ?>"
                                    >
                                        Read More +
                                    </button>

                                    <div
                                        id="service-description-<?php echo e($service->id); ?>"
                                        class="mt-4 hidden whitespace-pre-line rounded-xl bg-emerald-50 p-4 text-sm leading-7 text-slate-700"
                                    ><?php echo e($service->description); ?></div>

                                </div>

                            <?php endif; ?>


                            
                            <div class="mt-auto pt-7">

                                <a
                                    href="<?php echo e(route('contact', ['service' => $service->title])); ?>"
                                    class="inline-flex items-center gap-2 rounded-xl bg-emerald-700 px-5 py-3 text-sm font-extrabold text-white transition hover:bg-emerald-900"
                                >

                                    Enquire Now

                                    <i data-lucide="arrow-up-right" class="h-4 w-4"></i>

                                </a>

                            </div>

                        </div>

                    </article>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        <?php else: ?>

            
            <div class="rounded-3xl border border-emerald-100 bg-white px-6 py-20 text-center shadow-sm">

                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-emerald-50 text-emerald-700">

                    <i data-lucide="sun" class="h-10 w-10"></i>

                </div>

                <h3 class="mt-6 text-2xl font-extrabold text-slate-950">
                    Our solar services are coming soon.
                </h3>

                <p class="mx-auto mt-3 max-w-md text-slate-500">
                    Contact our team to discuss solar installation,
                    project requirements and available solutions.
                </p>

                <a
                    href="<?php echo e(route('contact')); ?>"
                    class="mt-7 inline-flex rounded-xl bg-emerald-700 px-6 py-3 font-bold text-white hover:bg-emerald-900"
                >
                    Contact Our Team
                </a>

            </div>

        <?php endif; ?>

    </div>

</section>



<section class="bg-white py-24">

    <div class="mx-auto max-w-7xl px-5 lg:px-8">

        <div class="mx-auto mb-12 max-w-3xl text-center">

            <p class="mb-4 text-xs font-black uppercase tracking-[0.25em] text-emerald-600">
                Our Process
            </p>

            <h2 class="text-4xl font-black tracking-tight text-slate-950 md:text-5xl">
                A simple path to solar.
            </h2>

        </div>

        <?php
            $steps = [
                [
                    'title' => 'Consultation',
                    'description' => 'Share your location, energy needs and project objectives.',
                ],
                [
                    'title' => 'Site Assessment',
                    'description' => 'Review suitability, space and technical requirements.',
                ],
                [
                    'title' => 'Planning & Proposal',
                    'description' => 'Discuss system configuration, scope and quotation.',
                ],
                [
                    'title' => 'Installation & Guidance',
                    'description' => 'Proceed with installation and operating guidance.',
                ],
            ];
        ?>

        <div class="grid gap-7 md:grid-cols-4">

            <?php $__currentLoopData = $steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="border-l-2 border-emerald-200 pl-6">

                    <span class="text-5xl font-black text-emerald-200">
                        <?php echo e(str_pad($loop->iteration, 2, '0', STR_PAD_LEFT)); ?>

                    </span>

                    <h3 class="mt-5 text-xl font-black text-slate-950">
                        <?php echo e($step['title']); ?>

                    </h3>

                    <p class="mt-3 leading-7 text-slate-600">
                        <?php echo e($step['description']); ?>

                    </p>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </div>

</section>



<section class="bg-[#f4f8f5] py-24">

    <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 lg:grid-cols-2 lg:px-8">

        <div>

            <p class="mb-4 text-xs font-black uppercase tracking-[0.25em] text-emerald-600">
                System Components
            </p>

            <h2 class="text-4xl font-black leading-tight text-slate-950 md:text-5xl">
                More than just solar panels.
            </h2>

            <p class="mt-5 text-lg leading-relaxed text-slate-600">
                An effective solar setup uses multiple coordinated components.
                Equipment selection depends on system design, load and site requirements.
            </p>

            <?php
                $components = [
                    'PV solar modules and mounting structures',
                    'Solar inverter and electrical connections',
                    'Suitable protection and safety components',
                    'Wiring, commissioning and system checks',
                    'Operations and maintenance guidance',
                ];
            ?>

            <ul class="mt-8 space-y-4">

                <?php $__currentLoopData = $components; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <li class="flex items-center gap-3 font-semibold text-slate-700">

                        <i data-lucide="check-circle-2" class="h-5 w-5 shrink-0 text-emerald-600"></i>

                        <?php echo e($component); ?>


                    </li>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>

        </div>


        <div class="overflow-hidden rounded-[2rem] shadow-xl">

            <img
                src="<?php echo e(asset('bhavik/assets/solar-inverter.jpg')); ?>"
                alt="Solar inverter installation"
                loading="lazy"
                class="h-[430px] w-full object-cover"
            >

        </div>

    </div>

</section>



<section class="bg-[#072d25] py-16 text-white">

    <div class="mx-auto flex max-w-7xl flex-col items-start justify-between gap-8 px-5 lg:flex-row lg:items-center lg:px-8">

        <div>

            <p class="mb-4 text-xs font-black uppercase tracking-[.25em] text-lime-300">
                Make the Switch
            </p>

            <h2 class="text-3xl font-black leading-tight md:text-5xl">
                Ready to power your future
                <br>
                with the sun?
            </h2>

            <p class="mt-4 text-emerald-100">
                Talk to our team about your site, requirements and next steps.
            </p>

        </div>

        <div class="flex flex-wrap gap-3">

            <a
                href="<?php echo e(route('contact')); ?>"
                class="inline-flex items-center gap-2 rounded-full bg-lime-400 px-6 py-3.5 text-sm font-bold text-slate-950 hover:bg-lime-300"
            >
                Get a Free Consultation
                <i data-lucide="arrow-up-right" class="h-4 w-4"></i>
            </a>

            <a
                href="tel:+918093870837"
                class="inline-flex items-center gap-2 rounded-full border border-white/30 bg-white/10 px-6 py-3.5 text-sm font-bold text-white hover:bg-white/20"
            >
                Call 8093870837
                <i data-lucide="phone" class="h-4 w-4"></i>
            </a>

        </div>

    </div>

</section>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

<script>
function toggleServiceDescription(id) {

    const description = document.getElementById(
        'service-description-' + id
    );

    const button = document.getElementById(
        'service-button-' + id
    );

    if (!description || !button) {
        return;
    }

    const isHidden = description.classList.toggle('hidden');

    button.textContent = isHidden
        ? 'Read More +'
        : 'Read Less −';

    button.setAttribute('aria-expanded', String(!isHidden));
}
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.website', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\work1\Bhavik_Solar_Complete_CMS_Laravel\resources\views/bhavik/services.blade.php ENDPATH**/ ?>