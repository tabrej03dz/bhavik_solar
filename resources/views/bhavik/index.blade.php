@extends("layouts.website")

@section("title", "Home")

@section("content")

<section class="relative min-h-[690px] lg:min-h-[760px] bg-[#06291f] text-white overflow-hidden">
<div class="absolute inset-0">
<img src="{{ asset("bhavik/assets/project-jharsuguda.jpg") }}" alt="Solar installation in Jharsuguda by Bhavik Solar" class="h-full w-full object-cover opacity-30">
<div class="absolute inset-0 bg-gradient-to-r from-[#041d18] via-[#04271e]/90 to-[#072f26]/25">
</div>
</div>
<div class="absolute -right-24 top-14 h-96 w-96 rounded-full bg-lime-400/10 blur-3xl">
</div>
<div class="relative max-w-7xl mx-auto px-5 lg:px-8 py-24 lg:py-36 grid lg:grid-cols-12 gap-12 items-center">
<div class="lg:col-span-8">
<span class="inline-flex items-center gap-2 rounded-full border border-lime-400/30 bg-lime-300/10 px-4 py-2 text-xs font-extrabold uppercase tracking-[.16em] text-lime-300">
<i data-lucide="leaf" class="w-4 h-4">
</i> Sustainable energy solutions in Odisha</span>
<h1 class="mt-9 text-5xl md:text-7xl xl:text-[86px] leading-[1.03] tracking-tight font-black">Turn sunlight into <span class="text-lime-400">your brighter future.</span>
</h1>
<p class="mt-7 max-w-2xl text-lg md:text-xl text-emerald-50/80 leading-relaxed">Reliable solar solutions for homes, businesses and communities. From Rooftop Solar and EPC to water pumps and street lights, Bhavik Solar helps make clean energy practical.</p>
<div class="mt-10 flex flex-wrap gap-4">
<a href="{{ url("/services") }}" class="inline-flex items-center justify-center gap-2 rounded-full px-6 py-3.5 text-sm font-bold transition hover:-translate-y-0.5 bg-lime-400 text-slate-950 hover:bg-lime-300 shadow-lg shadow-lime-500/15">Explore Solar Solutions <i data-lucide="arrow-up-right" class="w-4 h-4">
</i>
</a>
<a href="{{ url("/projects") }}" class="inline-flex items-center justify-center gap-2 rounded-full px-6 py-3.5 text-sm font-bold transition hover:-translate-y-0.5 border border-white/30 bg-white/10 text-white hover:bg-white/20">View Our Projects <i data-lucide="arrow-up-right" class="w-4 h-4">
</i>
</a>
</div>
<div class="mt-14 flex flex-wrap gap-7 text-sm font-bold text-emerald-50/85">
<span class="inline-flex items-center gap-2">
<i data-lucide="check-circle-2" class="w-5 h-5 text-lime-300">
</i> Site-specific solutions</span>
<span class="inline-flex items-center gap-2">
<i data-lucide="check-circle-2" class="w-5 h-5 text-lime-300">
</i> Domestic & commercial</span>
<span class="inline-flex items-center gap-2">
<i data-lucide="check-circle-2" class="w-5 h-5 text-lime-300">
</i> Odisha-based team</span>
</div>
</div>
<div class="lg:col-span-4 lg:self-end">
<div class="rounded-3xl border border-white/15 bg-white/10 backdrop-blur-xl p-7">
<div class="text-lime-300 mb-5">
<i data-lucide="sun" class="w-10 h-10">
</i>
</div>
<p class="text-xs uppercase tracking-[.18em] text-emerald-50/60 font-black">Your solar partner</p>
<h2 class="mt-3 text-3xl font-black">Energy that works for you.</h2>
<p class="mt-3 text-sm leading-relaxed text-emerald-50/70">Plan your transition with a team focused on your site, priorities and long-term performance.</p>
<a href="tel:+918093870837" class="mt-6 inline-flex items-center gap-2 text-lime-300 font-extrabold">
<i data-lucide="phone" class="w-5 h-5">
</i> +91 80938 70837</a>
</div>
</div>
</div>
</section>

<section class="bg-lime-400 py-8">
<div class="mx-auto max-w-7xl px-5 lg:px-8 flex flex-wrap gap-6 justify-between items-center text-[#072c22] font-extrabold">
<span class="flex items-center gap-2">
<i data-lucide="sun" class="w-5 h-5">
</i> Solar EPC</span>
<span class="flex items-center gap-2">
<i data-lucide="house" class="w-5 h-5">
</i> Rooftop Solar</span>
<span class="flex items-center gap-2">
<i data-lucide="droplets" class="w-5 h-5">
</i> Water Pumps</span>
<span class="flex items-center gap-2">
<i data-lucide="building-2" class="w-5 h-5">
</i> Commercial Projects</span>
<span class="flex items-center gap-2">
<i data-lucide="lamp-street" class="w-5 h-5">
</i> Street Lights</span>
</div>
</section>

<section class="py-24 bg-white">
<div class="max-w-7xl mx-auto px-5 lg:px-8 grid lg:grid-cols-2 gap-16 items-center">
<div class="relative">
<div class="overflow-hidden rounded-[2rem]">
<img src="{{ asset("bhavik/assets/project-diamunda.jpg") }}" alt="Bhavik Solar installation in Diamunda" loading="lazy" class="h-[520px] w-full object-cover" />
</div>
<div class="absolute -bottom-7 right-0 md:-right-5 max-w-[240px] rounded-3xl bg-[#064d38] p-7 text-white shadow-xl">
<span class="text-3xl text-lime-300">
<i data-lucide="zap" class="w-10 h-10">
</i>
</span>
<p class="mt-3 text-xl font-black">Smart energy starts here.</p>
<p class="mt-2 text-xs text-emerald-100/75">Built around your needs, not a one-size-fits-all plan.</p>
</div>
</div>
<div>
<div class="mb-12 max-w-3xl">
<p class="mb-4 text-xs font-black uppercase tracking-[0.25em] text-emerald-600">Welcome to Bhavik Solar</p>
<h2 class="text-4xl md:text-5xl font-black tracking-tight text-slate-950 leading-tight">A cleaner world begins with smarter energy choices.</h2>
<p class="mt-5 text-slate-600 text-lg leading-relaxed">Based in Jharsuguda, Odisha, Bhavik Solar works on solar energy applications for residential, commercial and community requirements. We focus on listening first, understanding the site and recommending relevant solutions.</p>
</div>
<div class="space-y-5 mt-8">
<div class="flex gap-4">
<i data-lucide="badge-check" class="w-7 h-7 text-emerald-600 shrink-0">
</i>
<div>
<h3 class="font-black text-lg">End-to-end Solar EPC</h3>
<p class="text-slate-600">From initial consultation to technical planning, installation and commissioning.</p>
</div>
</div>
<div class="flex gap-4">
<i data-lucide="leaf" class="w-7 h-7 text-emerald-600 shrink-0">
</i>
<div>
<h3 class="font-black text-lg">Solutions for real-world needs</h3>
<p class="text-slate-600">Rooftop, ground-mounted, pumping, lighting and business applications.</p>
</div>
</div>
</div>
<div class="mt-9">
<a href="{{ url("/about") }}" class="inline-flex items-center justify-center gap-2 rounded-full px-6 py-3.5 text-sm font-bold transition hover:-translate-y-0.5 bg-lime-400 text-slate-950 hover:bg-lime-300 shadow-lg shadow-lime-500/15">More About Us <i data-lucide="arrow-up-right" class="w-4 h-4">
</i>
</a>
</div>
</div>
</div>
</section>

<section class="py-24 bg-[#f4f8f5]">

    <div class="max-w-7xl mx-auto px-5 lg:px-8">

        <div class="mb-12 max-w-3xl">

            <p class="mb-4 text-xs font-black uppercase tracking-[0.25em] text-emerald-600">Our Expertise</p>

            <h2 class="text-4xl md:text-5xl font-black tracking-tight text-slate-950 leading-tight">Everything you need to go solar.</h2>

            <p class="mt-5 text-slate-600 text-lg leading-relaxed">Explore our solar services and solutions.</p>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse ($services as $service)

                @php

                    $serviceName = $service->title ?: ($service->name ?: 'Solar Service');

                    $serviceImage = $service->image_url ?: ($service->image ?: null);

                    $serviceImage = $serviceImage ? (preg_match('~^https?://~i', $serviceImage) ? $serviceImage : asset(ltrim(str_starts_with($serviceImage, 'storage/') ? $serviceImage : 'storage/'.$serviceImage, '/'))) : null;

                @endphp

                <article class="group rounded-3xl bg-white border border-slate-200 p-8 hover:border-emerald-300 hover:shadow-2xl hover:shadow-emerald-900/10 transition">

                    <div class="flex items-center justify-between">

                        <span class="flex h-14 w-14 items-center justify-center overflow-hidden rounded-2xl bg-emerald-50 text-emerald-700">

                            @if ($serviceImage)

                                <img src="{{ $serviceImage }}" alt="{{ $serviceName }}" loading="lazy" class="h-full w-full object-cover">

                            @else

                                <i data-lucide="sun" class="w-7 h-7">
</i>

                            @endif

                        </span>

                        <span class="text-xs font-black text-slate-300">{{ sprintf('%02d', $loop->iteration) }}</span>

                    </div>

                    <h3 class="mt-8 mb-3 text-xl font-extrabold text-slate-950">{{ $serviceName }}</h3>

                    <p class="text-slate-600 leading-relaxed min-h-24">{{ \Illuminate\Support\Str::limit(strip_tags($service->short_description ?: ($service->description ?: 'Contact us to learn more about this solar solution.')), 165) }}</p>

                    <a href="{{ url('/contact') . '?' . http_build_query(['service' => $serviceName]) }}" class="mt-6 inline-flex items-center gap-2 font-bold text-emerald-700">Enquire now <i data-lucide="arrow-up-right" class="w-4 h-4">
</i>
</a>

                </article>

            @empty

                <p class="col-span-full text-center text-slate-500 py-12">Services will be available soon.</p>

            @endforelse

        </div>

        <div class="mt-10 text-center">
<a href="{{ url('/services') }}" class="inline-flex items-center gap-2 font-extrabold text-emerald-700">Explore all our services <i data-lucide="arrow-right" class="w-5 h-5">
</i>
</a>
</div>

    </div>

</section>

<section class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-5 lg:px-8">

        <div class="mb-12 max-w-3xl">

            <p class="mb-4 text-xs font-black uppercase tracking-[0.25em] text-emerald-600">Our Work</p>

            <h2 class="text-4xl md:text-5xl font-black tracking-tight text-slate-950 leading-tight">Real installations. Real places.</h2>

            <p class="mt-5 text-slate-600 text-lg leading-relaxed">Explore our latest solar installations.</p>

        </div>

        <div class="grid md:grid-cols-2 gap-7">

            @forelse ($projects as $project)

                @php

                    $projectTitle = $project->title ?: ($project->name ?: 'Solar Project');

                    $projectImage = $project->image_url ?: ($project->image ?: ($project->featured_image ?: null));

                    $projectImage = $projectImage ? (preg_match('~^https?://~i', $projectImage) ? $projectImage : asset(ltrim(str_starts_with($projectImage, 'storage/') ? $projectImage : 'storage/'.$projectImage, '/'))) : asset('bhavik/assets/project-jharsuguda.jpg');

                @endphp

                <article class="group overflow-hidden rounded-3xl bg-white border border-slate-200">

                    <div class="relative aspect-[4/3] overflow-hidden">

                        <img src="{{ $projectImage }}" alt="{{ $projectTitle }}" loading="lazy" class="h-full w-full object-cover group-hover:scale-105 transition duration-700">

                        @if ($project->category || $project->project_type)

                            <span class="absolute left-5 top-5 rounded-full bg-white/95 px-4 py-2 text-xs font-extrabold text-emerald-800 shadow">{{ $project->category ?: $project->project_type }}</span>

                        @endif

                    </div>

                    <div class="p-6">

                        @if ($project->location || $project->city)

                            <p class="flex items-center gap-2 text-xs text-emerald-700 font-bold">
<i data-lucide="map-pin" class="w-4 h-4">
</i> {{ $project->location ?: $project->city }}</p>

                        @endif

                        <h3 class="mt-3 text-xl font-extrabold">{{ $projectTitle }}</h3>

                        <p class="mt-2 text-slate-600">{{ \Illuminate\Support\Str::limit(strip_tags($project->short_description ?: ($project->description ?: 'Discover this completed solar project.')), 170) }}</p>

                    </div>

                </article>

            @empty

                <p class="col-span-full text-center text-slate-500 py-12">Projects will be available soon.</p>

            @endforelse

        </div>

        <div class="mt-10">
<a href="{{ url('/projects') }}" class="inline-flex items-center justify-center gap-2 rounded-full px-6 py-3.5 text-sm font-bold bg-lime-400 text-slate-950 hover:bg-lime-300">See All Projects <i data-lucide="arrow-up-right" class="w-4 h-4">
</i>
</a>
</div>

    </div>

</section>

<section class="py-24 bg-[#f4f8f5]">

    <div class="max-w-7xl mx-auto px-5 lg:px-8">

        <div class="mb-12 max-w-3xl">

            <p class="mb-4 text-xs font-black uppercase tracking-[0.25em] text-emerald-600">Our Products</p>

            <h2 class="text-4xl md:text-5xl font-black tracking-tight text-slate-950 leading-tight">Explore our solar products.</h2>

            <p class="mt-5 text-slate-600 text-lg leading-relaxed">Browse from {{ number_format($totalProducts) }} available products.</p>

        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

            @forelse ($products as $product)

                @php

                    $productName = $product->name ?: ($product->title ?: 'Solar Product');

                    $productImage = $product->image_url ?: ($product->image ?: ($product->featured_image ?: null));

                    $productImage = $productImage ? (preg_match('~^https?://~i', $productImage) ? $productImage : asset(ltrim(str_starts_with($productImage, 'storage/') ? $productImage : 'storage/'.$productImage, '/'))) : null;

                @endphp

                <article class="group rounded-3xl bg-white border border-slate-200 overflow-hidden hover:shadow-xl transition">

                    <div class="aspect-[4/3] bg-emerald-50 flex items-center justify-center overflow-hidden">

                        @if ($productImage)

                            <img src="{{ $productImage }}" alt="{{ $productName }}" loading="lazy" class="w-full h-full object-contain p-4 group-hover:scale-105 transition">

                        @else

                            <i data-lucide="package" class="w-14 h-14 text-emerald-600">
</i>

                        @endif

                    </div>

                    <div class="p-6">

                        <h3 class="text-lg font-extrabold text-slate-950">{{ $productName }}</h3>

                        <p class="mt-2 text-sm text-slate-600">{{ \Illuminate\Support\Str::limit(strip_tags($product->short_description ?: ($product->description ?: 'Contact us for details.')), 100) }}</p>

                        <a href="{{ url('/contact') . '?' . http_build_query(['product' => $productName]) }}" class="mt-5 inline-flex gap-2 items-center font-bold text-emerald-700">Enquire now <i data-lucide="arrow-up-right" class="w-4 h-4">
</i>
</a>

                    </div>

                </article>

            @empty

                <p class="col-span-full text-center text-slate-500 py-12">Products will be available soon.</p>

            @endforelse

        </div>

        <div class="mt-10 text-center">
<a href="{{ url('/products') }}" class="font-extrabold text-emerald-700">View all {{ number_format($totalProducts) }} products →</a>
</div>

    </div>

</section>

{{-- ===================================================== --}}

{{-- DYNAMIC TESTIMONIAL SLIDER --}}

{{-- ===================================================== --}}

@if($testimonials->isNotEmpty())

<section id="customer-testimonials" class="overflow-hidden bg-[#062d24] py-14 lg:py-20 text-white">

    <div class="mx-auto max-w-7xl px-5 lg:px-8">

        <div class="grid items-stretch gap-8 lg:grid-cols-[300px_minmax(0,1fr)] lg:gap-10">

            {{-- LEFT TITLE AND NAVIGATION --}}

            <div class="flex flex-col justify-between lg:min-h-[460px]">

                <div>

                    <div class="text-[95px] font-black leading-[0.8] text-lime-400" aria-hidden="true">“</div>

                    <p class="mt-5 text-xs font-extrabold uppercase tracking-[.2em] text-emerald-100/80">Customer Reviews</p>

                    <h2 class="mt-4 max-w-[300px] text-4xl font-black leading-tight md:text-5xl">

                        What Our Customers Say

                    </h2>

                    <p class="mt-5 max-w-xs text-sm leading-relaxed text-emerald-100/80">

                        Genuine experiences shared by our customers.

                    </p>

                </div>

                <div class="mt-7 flex items-center gap-3">

                    <button type="button" id="testimonialPrev" aria-label="Previous testimonial"

                        class="grid h-12 w-12 place-items-center rounded-full bg-lime-400 text-[#062d24] shadow transition hover:bg-lime-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">

                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
<path stroke-linecap="round" stroke-linejoin="round" d="m15 18-6-6 6-6"/>
</svg>

                    </button>

                    <button type="button" id="testimonialNext" aria-label="Next testimonial"

                        class="grid h-12 w-12 place-items-center rounded-full bg-lime-400 text-[#062d24] shadow transition hover:bg-lime-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">

                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
<path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6"/>
</svg>

                    </button>

                    <span id="testimonialCounter" aria-live="polite" class="ml-3 text-sm font-semibold text-emerald-100/80">01 / {{ sprintf('%02d', $testimonials->count()) }}</span>

                </div>

            </div>

            {{-- RIGHT HORIZONTAL SLIDER --}}

            <div class="min-w-0">

                <div id="testimonialTrack"

                     tabindex="0" aria-label="Customer testimonials, swipe horizontally"

                     class="flex snap-x snap-mandatory gap-4 overflow-x-auto scroll-smooth pb-3"

                     style="scrollbar-width:none;-ms-overflow-style:none;">

                    @foreach($testimonials as $testimonial)

                        @php

                            $reviewer = $testimonial->name ?: 'Happy Customer';

                            $review = $testimonial->review ?: '';

                            $rating = max(1, min(5, (int) ($testimonial->rating ?? 5)));

                            $photo = $testimonial->image;

                            $photoUrl = $photo

                                ? (preg_match('~^https?://~i', $photo)

                                    ? $photo

                                    : (str_starts_with($photo, 'storage/')

                                        ? asset($photo)

                                        : \Illuminate\Support\Facades\Storage::disk('public')->url($photo)))

                                : null;

                        @endphp

                        <article data-testimonial-card

                                 class="w-[min(83vw,360px)] shrink-0 snap-start overflow-hidden rounded-2xl bg-white text-slate-900 shadow-xl ring-1 ring-emerald-200/30 sm:w-[340px] lg:w-[350px]">

                            <div class="h-[220px] overflow-hidden bg-emerald-50 sm:h-[240px]">

                                @if($photoUrl)

                                    <img src="{{ $photoUrl }}" alt="{{ $reviewer }}"

                                         loading="lazy" class="h-full w-full object-cover object-center">

                                @else

                                    <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-emerald-100 to-lime-50">

                                        <span class="text-8xl font-extrabold text-emerald-800">{{ mb_strtoupper(mb_substr($reviewer, 0, 1)) }}</span>

                                    </div>

                                @endif

                            </div>

                            <div class="min-h-[200px] p-5 sm:p-6">

                                <h3 class="text-lg font-extrabold">{{ $reviewer }}</h3>

                                @if($testimonial->designation || $testimonial->company || $testimonial->location)

                                    <p class="mt-1 text-xs font-medium text-slate-500">

                                        {{ collect([$testimonial->designation, $testimonial->company, $testimonial->location])->filter()->join(' · ') }}

                                    </p>

                                @endif

                                <div class="mt-3 flex gap-0.5 text-xl text-amber-500" aria-label="{{ $rating }} out of 5 stars">

                                    @for($star = 1; $star <= 5; $star++)

                                        <span class="{{ $star <= $rating ? 'text-amber-500' : 'text-slate-200' }}" aria-hidden="true">★</span>

                                    @endfor

                                </div>

                                <p class="mt-3 whitespace-pre-line text-sm leading-6 text-slate-600">“{{ $review }}”</p>

                            </div>

                        </article>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>

<style>

    #testimonialTrack::-webkit-scrollbar { display: none; }

</style>

<script>

(function () {

    function initTestimonialSlider() {

        const track = document.getElementById('testimonialTrack');

        if (!track) return;

        const cards = Array.from(track.querySelectorAll('[data-testimonial-card]'));

        const prev = document.getElementById('testimonialPrev');

        const next = document.getElementById('testimonialNext');

        const counter = document.getElementById('testimonialCounter');

        if (!cards.length) return;

        const currentIndex = () => {

            let nearest = 0;

            let distance = Infinity;

            cards.forEach((card, index) => {

                const delta = Math.abs(card.offsetLeft - cards[0].offsetLeft - track.scrollLeft);

                if (delta < distance) { distance = delta; nearest = index; }

            });

            return nearest;

        };

        function updateCounter() {

            if (counter) {

                counter.textContent = String(currentIndex() + 1).padStart(2, '0') +

                    ' / ' + String(cards.length).padStart(2, '0');

            }

        }

        function goTo(index) {

            const bounded = (index + cards.length) % cards.length;

            track.scrollTo({left: cards[bounded].offsetLeft - cards[0].offsetLeft, behavior: 'smooth'});

        }

        prev?.addEventListener('click', () => goTo(currentIndex() - 1));

        next?.addEventListener('click', () => goTo(currentIndex() + 1));

        track.addEventListener('scroll', updateCounter, {passive: true});

        updateCounter();

        if (cards.length > 1 && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {

            let paused = false;

            const section = document.getElementById('customer-testimonials');

            section.addEventListener('mouseenter', () => { paused = true; });

            section.addEventListener('mouseleave', () => { paused = false; });

            section.addEventListener('focusin', () => { paused = true; });

            section.addEventListener('focusout', () => { paused = false; });

            section.addEventListener('touchstart', () => { paused = true; }, {passive: true});

            section.addEventListener('touchend', () => { paused = false; }, {passive: true});

            window.setInterval(() => {

                if (!paused && !document.hidden) goTo(currentIndex() + 1);

            }, 5000);

        }

    }

    if (document.readyState === 'loading') {

        document.addEventListener('DOMContentLoaded', initTestimonialSlider);

    } else {

        initTestimonialSlider();

    }

})();

</script>

@endif

<section class="py-24 bg-[#062d24] text-white">
<div class="mx-auto max-w-7xl px-5 lg:px-8 grid lg:grid-cols-2 gap-14 items-center">
<div>
<p class="text-lime-300 uppercase tracking-[.2em] text-xs font-black">Why solar energy?</p>
<h2 class="mt-4 text-4xl md:text-5xl font-black">Smarter power, lasting possibilities.</h2>
<p class="mt-6 text-emerald-100/75 text-lg">A well-planned solar system can contribute to lower dependence on grid electricity while supporting cleaner energy use. Actual benefits depend on your site, electricity consumption, tariff and system performance.</p>
<div class="mt-8 grid grid-cols-2 gap-6">
<div class="flex gap-3 items-start">
<i data-lucide="wallet" class="w-6 h-6 shrink-0 text-lime-300">
</i>
<p class="font-bold">Potential bill savings</p>
</div>
<div class="flex gap-3 items-start">
<i data-lucide="leaf" class="w-6 h-6 shrink-0 text-lime-300">
</i>
<p class="font-bold">Cleaner energy use</p>
</div>
<div class="flex gap-3 items-start">
<i data-lucide="shield-check" class="w-6 h-6 shrink-0 text-lime-300">
</i>
<p class="font-bold">Long-term utility</p>
</div>
<div class="flex gap-3 items-start">
<i data-lucide="sun" class="w-6 h-6 shrink-0 text-lime-300">
</i>
<p class="font-bold">Use of sunlight</p>
</div>
</div>
</div>
<div class="overflow-hidden rounded-[2rem] border-8 border-white/10">
<img src="{{ asset("bhavik/assets/project-sundargarh.jpg") }}" alt="Sundargarh solar installation" loading="lazy" class="h-[440px] w-full object-cover" />
</div>
</div>
</section>

<section class="py-24 bg-white">
<div class="max-w-7xl mx-auto px-5 lg:px-8">
<div class="mb-12 text-center mx-auto max-w-3xl">
<p class="mb-4 text-xs font-black uppercase tracking-[0.25em] text-emerald-600">Common Questions</p>
<h2 class="text-4xl md:text-5xl font-black tracking-tight text-slate-950 leading-tight">Everything you want to know.</h2>
</div>
<div class="mx-auto max-w-3xl">
<div class="space-y-3">
<details class="group rounded-2xl border border-slate-200 bg-white px-6 py-5">
<summary class="flex cursor-pointer items-center justify-between gap-4 font-bold text-slate-900 list-none">What types of solar projects does Bhavik Solar handle?<span class="text-emerald-700 group-open:rotate-45 transition">
<i data-lucide="plus" class="w-5 h-5">
</i>
</span>
</summary>
<p class="pt-4 leading-relaxed text-slate-600">We offer Solar EPC, domestic and commercial rooftop solar, ground-mounted solutions, solar water pumps and solar street lighting. Contact us to discuss project suitability.</p>
</details>
<details class="group rounded-2xl border border-slate-200 bg-white px-6 py-5">
<summary class="flex cursor-pointer items-center justify-between gap-4 font-bold text-slate-900 list-none">Can I request a solar installation quotation?<span class="text-emerald-700 group-open:rotate-45 transition">
<i data-lucide="plus" class="w-5 h-5">
</i>
</span>
</summary>
<p class="pt-4 leading-relaxed text-slate-600">Yes. Use our enquiry form or call 8093870837. Share your location, electricity usage, roof or land details and preferred solution.</p>
</details>
<details class="group rounded-2xl border border-slate-200 bg-white px-6 py-5">
<summary class="flex cursor-pointer items-center justify-between gap-4 font-bold text-slate-900 list-none">Is rooftop solar suitable for my building?<span class="text-emerald-700 group-open:rotate-45 transition">
<i data-lucide="plus" class="w-5 h-5">
</i>
</span>
</summary>
<p class="pt-4 leading-relaxed text-slate-600">Suitability depends on shade, roof strength, usable area, electricity use and site conditions. A technical assessment helps decide the right system.</p>
</details>
<details class="group rounded-2xl border border-slate-200 bg-white px-6 py-5">
<summary class="flex cursor-pointer items-center justify-between gap-4 font-bold text-slate-900 list-none">Do you assist with system sizing?<span class="text-emerald-700 group-open:rotate-45 transition">
<i data-lucide="plus" class="w-5 h-5">
</i>
</span>
</summary>
<p class="pt-4 leading-relaxed text-slate-600">We can discuss your electricity requirements and proposed site to help identify a suitable system configuration.</p>
</details>
</div>
</div>
<div class="mt-10 text-center">
<a href="{{ url("/contact") }}#faq" class="font-extrabold text-emerald-700">Have more questions? Talk to us →</a>
</div>
</div>
</section>@if ($selectedProduct)

<section class="bg-emerald-50 py-8">

    <div class="mx-auto max-w-7xl px-5 lg:px-8 flex flex-wrap justify-between items-center gap-4">

        <p class="text-emerald-950 font-bold">Interested in {{ $selectedProduct }}?</p>

        <a href="{{ url('/contact') . '?' . http_build_query(['product' => $selectedProduct]) }}" class="rounded-full bg-emerald-700 text-white font-bold px-6 py-3">Send Product Enquiry →</a>

    </div>

</section>

@endif

{{-- ===================================================== --}}
{{-- FIND US / GOOGLE MAPS --}}
{{-- ===================================================== --}}
<section id="find-us" class="bg-[#f4f8f5] py-20 lg:py-24">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="mb-10 max-w-3xl">
            <p class="mb-4 text-xs font-black uppercase tracking-[0.25em] text-emerald-600">
                Our Location
            </p>
            <h2 class="text-4xl font-black leading-tight tracking-tight text-slate-950 md:text-5xl">
                Visit Bhavik Solar.
            </h2>
            <p class="mt-5 text-lg leading-relaxed text-slate-600">
                We would love to discuss your next solar project. Find us in Jharsuguda, Odisha.
            </p>
        </div>

        <div class="grid overflow-hidden rounded-3xl border border-emerald-100 bg-white shadow-xl lg:grid-cols-3">
            <div class="p-7 sm:p-10 lg:col-span-1">
                <div class="mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-700">
                    <i data-lucide="map-pin" class="h-7 w-7">
</i>
                </div>
                <h3 class="text-2xl font-black text-slate-950">Bhavik Solar</h3>
                <p class="mt-4 text-sm leading-7 text-slate-600">
                    Panchpada Road, Bijju Nagar,<br>
                    Jharsuguda, Odisha 768203
                </p>
                <a href="https://maps.app.goo.gl/6sp1qVB54ZDxSUnY6?g_st=aw"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="mt-8 inline-flex items-center justify-center gap-2 rounded-full bg-lime-400 px-6 py-3.5 text-sm font-extrabold text-[#062d24] transition hover:bg-lime-300">
                    <i data-lucide="navigation" class="h-4 w-4">
</i>
                    Get Directions
                </a>
                <p class="mt-4 text-xs text-slate-400">
                    Opens Google Maps in a new tab.
                </p>
            </div>

            <div class="min-h-[350px] bg-emerald-50 lg:col-span-2 lg:min-h-[440px]">
                <iframe
                    title="Bhavik Solar Location - Google Maps"
                    src="https://www.google.com/maps?q=Bhavik%20Solar%2C%20Panchpada%20Rd%2C%20Bijju%20Nagar%2C%20Jharsuguda%2C%20Odisha%20768203&output=embed"
                    width="100%"
                    height="100%"
                    style="border:0; min-height:350px;"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</section>

<section class="bg-[#072d25] py-16 text-white">
<div class="mx-auto max-w-7xl px-5 lg:px-8 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-8">
<div>
<p class="text-lime-300 text-xs tracking-[.25em] font-black uppercase mb-4">Make the switch</p>
<h2 class="text-3xl md:text-5xl font-black leading-tight">Ready to power your future<br>with the sun?</h2>
<p class="mt-4 text-emerald-100">Talk to our team about your site, requirement and next steps.</p>
</div>
<div class="flex flex-wrap gap-3">
<a href="{{ url("/contact") }}" class="inline-flex items-center justify-center gap-2 rounded-full px-6 py-3.5 text-sm font-bold transition hover:-translate-y-0.5 bg-lime-400 text-slate-950 hover:bg-lime-300 shadow-lg shadow-lime-500/15">Get a Free Consultation <i data-lucide="arrow-up-right" class="w-4 h-4">
</i>
</a>
<a href="tel:+918093870837" class="inline-flex items-center justify-center gap-2 rounded-full px-6 py-3.5 text-sm font-bold transition hover:-translate-y-0.5 border border-white/30 bg-white/10 text-white hover:bg-white/20">Call 8093870837 <i data-lucide="arrow-up-right" class="w-4 h-4">
</i>
</a>
</div>
</div>
</section>

@endsection

