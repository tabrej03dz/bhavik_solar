<?php $__env->startSection("title", "Contact"); ?>

<?php $__env->startSection("content"); ?>

<section class="relative overflow-hidden bg-[#062d24] text-white">
<div class="absolute -right-28 -top-28 h-96 w-96 rounded-full bg-emerald-500/15 blur-3xl">
</div>
<div class="relative mx-auto max-w-7xl px-5 lg:px-8 py-24 md:py-32">
<p class="text-xs font-black tracking-[.3em] uppercase text-lime-300 mb-5">Contact Us
</p>
<h1 class="max-w-4xl text-5xl md:text-7xl font-black tracking-tight leading-[1.05]">Let’s build something brighter.
</h1>
<p class="mt-7 max-w-2xl text-lg text-emerald-50/75 leading-relaxed">Tell us about your solar requirements. Our team can discuss practical solutions for your home, business or site.
</p>
<p class="mt-9 text-xs text-emerald-100/50 font-semibold">
<a href="<?php echo e(url("/")); ?>">Home
</a> / Contact Us
</p>
</div>
</section>
<section class="py-24 bg-[#f4f8f5]">
<div class="max-w-7xl mx-auto px-5 lg:px-8 grid lg:grid-cols-5 gap-12">
<div class="lg:col-span-3 rounded-[2rem] bg-white border border-slate-200 p-7 md:p-12 shadow-xl shadow-emerald-900/5">
<p class="font-black text-emerald-600 text-xs uppercase tracking-[.2em]">Your enquiry
</p>
<h2 class="mt-3 text-3xl md:text-4xl font-black mb-3">Request a solar consultation.
</h2>
<p class="mb-9 text-slate-600">Submit the form to save your enquiry. WhatsApp will then open with a pre-filled message; tap Send to deliver it.
</p>
<form id="solarContactForm" method="POST" action="<?php echo e(route('contact.enquiry.store')); ?>" class="space-y-5">
<?php echo csrf_field(); ?>
<div class="grid md:grid-cols-2 gap-5">
<label class="block text-sm font-bold text-slate-700">Full Name *
<input required name="name" value="<?php echo e(old('name')); ?>" placeholder="Your name" autocomplete="name" class="mt-2 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">
</label>
<label class="block text-sm font-bold text-slate-700">Phone Number *
<input required name="phone" value="<?php echo e(old('phone')); ?>" type="tel" inputmode="tel" pattern="[0-9+() -]{10,18}" placeholder="Your phone number" autocomplete="tel" class="mt-2 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">
</label>
</div>
<div class="grid md:grid-cols-2 gap-5">
<label class="block text-sm font-bold text-slate-700">Service Interested In *
<select required name="service" id="serviceField" class="mt-2 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">
<option value="">Choose service</option>
<option value="Solar EPC" <?php if(old('service') === 'Solar EPC'): echo 'selected'; endif; ?>>Solar EPC</option>
<option value="Rooftop Solar" <?php if(old('service') === 'Rooftop Solar'): echo 'selected'; endif; ?>>Rooftop Solar</option>
<option value="Ground-Mounted Solar" <?php if(old('service') === 'Ground-Mounted Solar'): echo 'selected'; endif; ?>>Ground-Mounted Solar</option>
<option value="Solar Water Pumps" <?php if(old('service') === 'Solar Water Pumps'): echo 'selected'; endif; ?>>Solar Water Pumps</option>
<option value="Commercial Solar" <?php if(old('service') === 'Commercial Solar'): echo 'selected'; endif; ?>>Commercial Solar</option>
<option value="Domestic Solar" <?php if(old('service') === 'Domestic Solar'): echo 'selected'; endif; ?>>Domestic Solar</option>
<option value="Solar Street Lights" <?php if(old('service') === 'Solar Street Lights'): echo 'selected'; endif; ?>>Solar Street Lights</option>
<option value="Support & Maintenance" <?php if(old('service') === 'Support & Maintenance'): echo 'selected'; endif; ?>>Support &amp; Maintenance</option>
<option value="Other / Not Sure" <?php if(old('service') === 'Other / Not Sure'): echo 'selected'; endif; ?>>Other / Not Sure</option>
</select>
</label>
<label class="block text-sm font-bold text-slate-700">Location *
<input required name="location" value="<?php echo e(old('location')); ?>" placeholder="City / area" class="mt-2 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">
</label>
</div>
<label class="block text-sm font-bold text-slate-700">Email (optional)
<input name="email" value="<?php echo e(old('email')); ?>" type="email" placeholder="you@example.com" autocomplete="email" class="mt-2 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">
</label>
<label class="block text-sm font-bold text-slate-700">Your Requirement *
<textarea required name="message" rows="5" placeholder="Tell us about your project, monthly bill, available roof/land, or any question..." class="mt-2 w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"><?php echo e(old('message')); ?>

</textarea>
</label>
<p class="text-xs text-slate-500 leading-relaxed">By submitting, you agree that Bhavik Solar may store your enquiry and contact you about your request. WhatsApp opens after saving; tap Send there to share the message.
</p>
<button type="submit" class="w-full rounded-xl bg-emerald-700 hover:bg-emerald-800 py-4 font-extrabold text-white inline-flex justify-center items-center gap-3">Save Enquiry & Open WhatsApp
<i data-lucide="send" class="w-5 h-5">
</i>
</button>
<?php if($errors->any()): ?>
<div class="rounded-xl bg-red-50 p-4 text-sm text-red-700"><strong>Please correct these fields:</strong>
<ul class="mt-2 list-disc pl-5">
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li><?php echo e($error); ?>

</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>
<?php endif; ?>
</form>
</div>
<aside class="lg:col-span-2 space-y-6">
<div class="rounded-3xl bg-[#07392c] text-white p-9">
<h3 class="text-2xl font-black">Contact details
</h3>
<div class="mt-8 space-y-7">
<div class="flex gap-4">
<i data-lucide="user-round" class="w-6 h-6 text-lime-300 shrink-0">
</i>
<div>
<p class="text-xs text-emerald-100/60 uppercase font-extrabold">Contact person
</p>
<p class="mt-1 text-lg font-bold">Niraj Agrawal
</p>
</div>
</div>
<div class="flex gap-4">
<i data-lucide="phone" class="w-6 h-6 text-lime-300 shrink-0">
</i>
<div>
<p class="text-xs text-emerald-100/60 uppercase font-extrabold">Phone / WhatsApp
</p>
<a href="tel:+918093870837" class="mt-1 block text-lg font-bold">+91 80938 70837
</a>
</div>
</div>
<div class="flex gap-4">
<i data-lucide="map-pin" class="w-6 h-6 text-lime-300 shrink-0">
</i>
<div>
<p class="text-xs text-emerald-100/60 uppercase font-extrabold">Office location
</p>
<p class="mt-1 text-lg font-bold">Bombay Chowk, Jharsuguda,<br>Odisha – 768203
</p>
</div>
</div>
<div class="flex gap-4">
<i data-lucide="globe" class="w-6 h-6 text-lime-300 shrink-0">
</i>
<div>
<p class="text-xs text-emerald-100/60 uppercase font-extrabold">Website
</p>
<a href="https://bhaviksolar.in" class="mt-1 block text-lg font-bold">bhaviksolar.in
</a>
</div>
</div>
</div>
<div class="mt-9 flex gap-3 flex-wrap">
<a href="tel:+918093870837" class="inline-flex items-center justify-center gap-2 rounded-full px-6 py-3.5 text-sm font-bold transition hover:-translate-y-0.5 bg-lime-400 text-slate-950 hover:bg-lime-300 shadow-lg shadow-lime-500/15">Call Now
<i data-lucide="arrow-up-right" class="w-4 h-4">
</i>
</a>
<a href="https://wa.me/918093870837" class="inline-flex items-center justify-center gap-2 rounded-full px-6 py-3.5 text-sm font-bold transition hover:-translate-y-0.5 border border-white/30 bg-white/10 text-white hover:bg-white/20">WhatsApp Us
<i data-lucide="arrow-up-right" class="w-4 h-4">
</i>
</a>
</div>
</div>
<div class="rounded-3xl overflow-hidden border border-slate-200 bg-white">
<div class="p-6">
<h3 class="font-black text-lg">Find us in Jharsuguda
</h3>
<p class="text-sm mt-2 text-slate-500">Bombay Chowk, Jharsuguda, Odisha
</p>
</div>
<iframe title="Map of Bombay Chowk, Jharsuguda, Odisha" src="https://www.google.com/maps?q=Bombay+Chowk+Jharsuguda+Odisha+768203&output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-64 border-0">
</iframe>
<a href="https://www.google.com/maps/search/?api=1&query=Bombay+Chowk+Jharsuguda+Odisha+768203" target="_blank" rel="noopener" class="block p-5 text-emerald-700 font-bold">Open in Google Maps →
</a>
</div>
</aside>
</div>
</section>
<section id="faq" class="py-24 bg-white">
<div class="max-w-7xl mx-auto px-5 lg:px-8">
<div class="mb-12 text-center mx-auto max-w-3xl">
<p class="mb-4 text-xs font-black uppercase tracking-[0.25em] text-emerald-600">Frequently Asked Questions
</p>
<h2 class="text-4xl md:text-5xl font-black tracking-tight text-slate-950 leading-tight">Useful answers before you begin.
</h2>
</div>
<div class="mx-auto max-w-3xl">
<div class="space-y-3">
<details class="group rounded-2xl border border-slate-200 bg-white px-6 py-5">
<summary class="flex cursor-pointer items-center justify-between gap-4 font-bold text-slate-900 list-none">What types of solar projects does Bhavik Solar handle?
<span class="text-emerald-700 group-open:rotate-45 transition">
<i data-lucide="plus" class="w-5 h-5">
</i>
</span>
</summary>
<p class="pt-4 leading-relaxed text-slate-600">We offer Solar EPC, domestic and commercial rooftop solar, ground-mounted solutions, solar water pumps and solar street lighting. Contact us to discuss project suitability.
</p>
</details>
<details class="group rounded-2xl border border-slate-200 bg-white px-6 py-5">
<summary class="flex cursor-pointer items-center justify-between gap-4 font-bold text-slate-900 list-none">Can I request a solar installation quotation?
<span class="text-emerald-700 group-open:rotate-45 transition">
<i data-lucide="plus" class="w-5 h-5">
</i>
</span>
</summary>
<p class="pt-4 leading-relaxed text-slate-600">Yes. Use our enquiry form or call 8093870837. Share your location, electricity usage, roof or land details and preferred solution.
</p>
</details>
<details class="group rounded-2xl border border-slate-200 bg-white px-6 py-5">
<summary class="flex cursor-pointer items-center justify-between gap-4 font-bold text-slate-900 list-none">Is rooftop solar suitable for my building?
<span class="text-emerald-700 group-open:rotate-45 transition">
<i data-lucide="plus" class="w-5 h-5">
</i>
</span>
</summary>
<p class="pt-4 leading-relaxed text-slate-600">Suitability depends on shade, roof strength, usable area, electricity use and site conditions. A technical assessment helps decide the right system.
</p>
</details>
<details class="group rounded-2xl border border-slate-200 bg-white px-6 py-5">
<summary class="flex cursor-pointer items-center justify-between gap-4 font-bold text-slate-900 list-none">Do you assist with system sizing?
<span class="text-emerald-700 group-open:rotate-45 transition">
<i data-lucide="plus" class="w-5 h-5">
</i>
</span>
</summary>
<p class="pt-4 leading-relaxed text-slate-600">We can discuss your electricity requirements and proposed site to help identify a suitable system configuration.
</p>
</details>
<details class="group rounded-2xl border border-slate-200 bg-white px-6 py-5">
<summary class="flex cursor-pointer items-center justify-between gap-4 font-bold text-slate-900 list-none">Do solar panels work on cloudy days?
<span class="text-emerald-700 group-open:rotate-45 transition">
<i data-lucide="plus" class="w-5 h-5">
</i>
</span>
</summary>
<p class="pt-4 leading-relaxed text-slate-600">Solar modules can still produce electricity in diffused daylight, although generation is typically lower than on clear, sunny days.
</p>
</details>
<details class="group rounded-2xl border border-slate-200 bg-white px-6 py-5">
<summary class="flex cursor-pointer items-center justify-between gap-4 font-bold text-slate-900 list-none">What maintenance does a solar system require?
<span class="text-emerald-700 group-open:rotate-45 transition">
<i data-lucide="plus" class="w-5 h-5">
</i>
</span>
</summary>
<p class="pt-4 leading-relaxed text-slate-600">Typical maintenance includes panel cleaning where appropriate, checking for shading and periodic inspection of wiring, mounting and electrical equipment by qualified professionals.
</p>
</details>
<details class="group rounded-2xl border border-slate-200 bg-white px-6 py-5">
<summary class="flex cursor-pointer items-center justify-between gap-4 font-bold text-slate-900 list-none">Can I get information about subsidies or net metering?
<span class="text-emerald-700 group-open:rotate-45 transition">
<i data-lucide="plus" class="w-5 h-5">
</i>
</span>
</summary>
<p class="pt-4 leading-relaxed text-slate-600">Applicable policies and eligibility vary by customer, system and local electricity utility. We can discuss relevant requirements; final eligibility is subject to the appropriate authority.
</p>
</details>
<details class="group rounded-2xl border border-slate-200 bg-white px-6 py-5">
<summary class="flex cursor-pointer items-center justify-between gap-4 font-bold text-slate-900 list-none">How long does installation take?
<span class="text-emerald-700 group-open:rotate-45 transition">
<i data-lucide="plus" class="w-5 h-5">
</i>
</span>
</summary>
<p class="pt-4 leading-relaxed text-slate-600">Timelines depend on site condition, project size, material availability, approvals and installation scope. We can provide an estimate after reviewing your requirements.
</p>
</details>
</div>
</div>
</div>
</section>
<section class="bg-[#072d25] py-16 text-white">
<div class="mx-auto max-w-7xl px-5 lg:px-8 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-8">
<div>
<p class="text-lime-300 text-xs tracking-[.25em] font-black uppercase mb-4">Make the switch
</p>
<h2 class="text-3xl md:text-5xl font-black leading-tight">Ready to power your future<br>with the sun?
</h2>
<p class="mt-4 text-emerald-100">Talk to our team about your site, requirement and next steps.
</p>
</div>
<div class="flex flex-wrap gap-3">
<a href="<?php echo e(url("/contact")); ?>" class="inline-flex items-center justify-center gap-2 rounded-full px-6 py-3.5 text-sm font-bold transition hover:-translate-y-0.5 bg-lime-400 text-slate-950 hover:bg-lime-300 shadow-lg shadow-lime-500/15">Get a Free Consultation
<i data-lucide="arrow-up-right" class="w-4 h-4">
</i>
</a>
<a href="tel:+918093870837" class="inline-flex items-center justify-center gap-2 rounded-full px-6 py-3.5 text-sm font-bold transition hover:-translate-y-0.5 border border-white/30 bg-white/10 text-white hover:bg-white/20">Call 8093870837
<i data-lucide="arrow-up-right" class="w-4 h-4">
</i>
</a>
</div>
</div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.website", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\work1\Bhavik_Solar_Complete_CMS_Laravel\resources\views/bhavik/contact.blade.php ENDPATH**/ ?>