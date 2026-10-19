
@extends('layouts.website')

@section('title', 'Projects')

@section('content')

{{-- HERO SECTION --}}
<section class="relative overflow-hidden bg-[#062d24] text-white">

    <div class="absolute -right-28 -top-28 h-96 w-96 rounded-full bg-emerald-500/15 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-5 lg:px-8 py-24 md:py-32">

        <p class="mb-5 text-xs font-black uppercase tracking-[.3em] text-lime-300">
            Our Projects
        </p>

        <h1 class="max-w-4xl text-5xl md:text-7xl font-black tracking-tight leading-[1.05]">
            Solar power in action.
        </h1>

        <p class="mt-7 max-w-2xl text-lg leading-relaxed text-emerald-50/75">
            Explore our photo gallery featuring installation sites
            in Jharsuguda, Diamunda, Chhatenpali and Sundargarh, Odisha.
        </p>

        <p class="mt-9 text-xs font-semibold text-emerald-100/50">
            <a href="{{ url('/') }}" class="hover:text-white">
                Home
            </a>
            / Our Projects
        </p>

    </div>
</section>


{{-- INSTALLATION GALLERY --}}
<section class="bg-[#f4f8f5] py-24">

    <div class="mx-auto max-w-7xl px-5 lg:px-8">

        <div class="mb-12 max-w-3xl">

            <p class="mb-4 text-xs font-black uppercase tracking-[0.25em] text-emerald-600">
                Installation Gallery
            </p>

            <h2 class="text-4xl md:text-5xl font-black tracking-tight text-slate-950 leading-tight">
                Made for real spaces.
            </h2>

            <p class="mt-5 text-lg leading-relaxed text-slate-600">
                These are customer-provided project photographs from Odisha.
                The GPS and location labels visible in some images are part
                of the original photographs.
            </p>

        </div>

        @php
            $galleryProjects = [
                [
                    'image' => 'project-jharsuguda.jpg',
                    'title' => 'Jharsuguda rooftop installation',
                    'location' => 'Jharsuguda, Odisha',
                    'description' => 'Solar panel installation photographed in Jharsuguda, Odisha.',
                ],
                [
                    'image' => 'project-diamunda.jpg',
                    'title' => 'Diamunda solar installation',
                    'location' => 'Diamunda, Odisha',
                    'description' => 'Solar panel array installed on a rooftop in Diamunda, Odisha.',
                ],
                [
                    'image' => 'project-chhatenpali.jpg',
                    'title' => 'Chhatenpali rooftop installation',
                    'location' => 'Chhatenpali, Odisha',
                    'description' => 'On-roof solar module installation at Chhatenpali, Odisha.',
                ],
                [
                    'image' => 'project-sundargarh.jpg',
                    'title' => 'Sundargarh solar installation',
                    'location' => 'Sundargarh, Odisha',
                    'description' => 'Rooftop solar installation captured in Sundargarh, Odisha.',
                ],
            ];
        @endphp

        <div class="grid gap-7 md:grid-cols-2">

            @foreach($galleryProjects as $gallery)

                <article class="group overflow-hidden rounded-3xl border border-slate-200 bg-white transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                    <div class="relative aspect-[4/3] overflow-hidden">

                        <img
                            src="{{ asset('bhavik/assets/'.$gallery['image']) }}"
                            alt="{{ $gallery['title'] }}"
                            loading="lazy"
                            class="h-full w-full object-cover transition duration-700 group-hover:scale-105"
                        >

                        <span class="absolute left-5 top-5 rounded-full bg-white/95 px-4 py-2 text-xs font-extrabold text-emerald-800 shadow">
                            Rooftop Solar
                        </span>

                    </div>

                    <div class="p-6">

                        <p class="flex items-center gap-2 text-xs font-bold text-emerald-700">
                            <i data-lucide="map-pin" class="h-4 w-4"></i>
                            {{ $gallery['location'] }}
                        </p>

                        <h3 class="mt-3 text-xl font-extrabold text-slate-950">
                            {{ $gallery['title'] }}
                        </h3>

                        <p class="mt-2 text-slate-600">
                            {{ $gallery['description'] }}
                        </p>

                    </div>

                </article>

            @endforeach

        </div>

    </div>

</section>


{{-- TECHNICAL INSTALLATION --}}
<section class="bg-white py-24">

    <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 lg:grid-cols-2 lg:px-8">

        <div class="overflow-hidden rounded-[2rem]">

            <img
                src="{{ asset('bhavik/assets/solar-inverter.jpg') }}"
                alt="Solar inverter and switching equipment"
                loading="lazy"
                class="h-[470px] w-full object-cover"
            >

        </div>

        <div>

            <p class="mb-4 text-xs font-black uppercase tracking-[0.25em] text-emerald-600">
                Technical Installation
            </p>

            <h2 class="text-4xl md:text-5xl font-black tracking-tight text-slate-950 leading-tight">
                The system behind the energy.
            </h2>

            <p class="mt-5 text-lg leading-relaxed text-slate-600">
                From solar modules and mounting to inverter and electrical
                controls, the overall installation matters.
            </p>

            <p class="mt-6 leading-relaxed text-slate-600">
                The pictured setup shows solar inverter and related
                electrical equipment. Contact our team to learn which
                components may be suitable for your particular project.
            </p>

            <div class="mt-8">

                <a
                    href="{{ url('/contact') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-full bg-lime-400 px-6 py-3.5 text-sm font-bold text-slate-950 shadow-lg shadow-lime-500/15 transition hover:-translate-y-0.5 hover:bg-lime-300"
                >
                    Start a Similar Project

                    <i data-lucide="arrow-up-right" class="h-4 w-4"></i>
                </a>

            </div>

        </div>

    </div>

</section>


{{-- MANAGED SOLAR PROJECTS --}}
<section class="bg-[#f4f8f5] py-20 md:py-24">

    <div class="mx-auto max-w-7xl px-5 lg:px-8">

        <div class="mb-12 flex flex-col gap-5 md:flex-row md:items-end md:justify-between">

            <div class="max-w-3xl">

                <p class="mb-4 text-xs font-black uppercase tracking-[0.25em] text-emerald-600">
                    Our Recent Work
                </p>

                <h2 class="text-4xl font-black tracking-tight text-slate-950 md:text-5xl">
                    Managed Solar Projects
                </h2>

                <p class="mt-5 text-lg leading-relaxed text-slate-600">
                    Explore our completed solar installations,
                    discover project details and view installation
                    images and videos.
                </p>

            </div>

            <div class="inline-flex w-fit items-center gap-2 rounded-full border border-emerald-200 bg-white px-5 py-3 text-sm font-bold text-emerald-800">
                <i data-lucide="layers" class="h-4 w-4"></i>
                {{ $managedProjects->count() }} Projects
            </div>

        </div>


        <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-3">

            @forelse($managedProjects as $project)

                <article class="group flex h-full flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-xl">

                    {{-- PROJECT IMAGE --}}
                    <div class="relative aspect-[4/3] overflow-hidden bg-emerald-950">

                        @if($project->image)

                            <img
                                src="{{ asset('storage/'.$project->image) }}"
                                alt="{{ $project->title }}"
                                loading="lazy"
                                class="h-full w-full object-cover transition duration-700 group-hover:scale-110"
                            >

                        @else

                            <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-emerald-900 to-emerald-700">

                                <i data-lucide="sun" class="h-16 w-16 text-lime-300"></i>

                            </div>

                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>

                        <span class="absolute left-5 top-5 rounded-full border border-white/30 bg-white/95 px-4 py-2 text-xs font-extrabold text-emerald-800 shadow">
                            Solar Project
                        </span>

                        @if($project->capacity)

                            <span class="absolute bottom-5 left-5 inline-flex items-center gap-2 rounded-full bg-lime-400 px-4 py-2 text-xs font-black text-emerald-950 shadow">
                                <i data-lucide="zap" class="h-3.5 w-3.5"></i>
                                {{ $project->capacity }}
                            </span>

                        @endif

                    </div>


                    {{-- PROJECT INFORMATION --}}
                    <div class="flex flex-1 flex-col p-6">

                        @if($project->location)

                            <p class="flex items-center gap-2 text-xs font-bold uppercase tracking-wide text-emerald-700">

                                <i data-lucide="map-pin" class="h-4 w-4 shrink-0"></i>

                                {{ $project->location }}

                            </p>

                        @endif

                        <h3 class="mt-3 text-xl font-extrabold leading-snug text-slate-950 transition group-hover:text-emerald-700">
                            {{ $project->title }}
                        </h3>

                        @if($project->short_description)

                            <p class="mt-3 text-sm leading-7 text-slate-600">
                                {{ \Illuminate\Support\Str::limit($project->short_description, 140) }}
                            </p>

                        @elseif($project->description)

                            <p class="mt-3 text-sm leading-7 text-slate-600">
                                {{ \Illuminate\Support\Str::limit(strip_tags($project->description), 140) }}
                            </p>

                        @endif


                        {{-- PROJECT BUTTON --}}
                        <div class="mt-auto pt-6">

                            <div class="mb-5 h-px w-full bg-slate-100"></div>

                            <a
                                href="{{ route('solar.project.show', $project->slug) }}"
                                class="flex w-full items-center justify-between gap-3 rounded-xl bg-emerald-700 px-5 py-3.5 text-sm font-bold text-white transition duration-300 hover:bg-emerald-800"
                            >

                                <span class="inline-flex items-center gap-2">
                                    <i data-lucide="eye" class="h-4 w-4"></i>
                                    View Project Details
                                </span>

                                <i data-lucide="arrow-up-right" class="h-5 w-5 transition group-hover:translate-x-0.5 group-hover:-translate-y-0.5"></i>

                            </a>

                        </div>

                    </div>

                </article>

            @empty

                <div class="col-span-full rounded-3xl border border-dashed border-emerald-200 bg-white px-6 py-16 text-center">

                    <div class="mx-auto mb-5 flex h-20 w-20 items-center justify-center rounded-full bg-emerald-50">

                        <i data-lucide="folder-open" class="h-9 w-9 text-emerald-700"></i>

                    </div>

                    <h3 class="text-2xl font-extrabold text-slate-900">
                        Projects Coming Soon
                    </h3>

                    <p class="mx-auto mt-3 max-w-md text-slate-500">
                        New solar installation projects will appear
                        here as soon as they are published.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- CUSTOMER EXPERIENCES --}}
<section class="bg-white py-20">

    <div class="mx-auto max-w-7xl px-5 lg:px-8">

        <div class="mb-12 max-w-3xl">

            <p class="mb-4 text-xs font-black uppercase tracking-[0.25em] text-emerald-600">
                Customer Experiences
            </p>

            <h2 class="text-4xl md:text-5xl font-black tracking-tight text-slate-950 leading-tight">
                Your feedback matters.
            </h2>

            <p class="mt-5 text-lg leading-relaxed text-slate-600">
                We are building this space for verified feedback
                from Bhavik Solar customers.
            </p>

        </div>

        <div class="max-w-3xl rounded-3xl border border-emerald-200 bg-[#f4f8f5] p-9">

            <div class="mb-4 text-emerald-600">

                <i data-lucide="message-square-quote" class="h-9 w-9"></i>

            </div>

            <h3 class="text-2xl font-extrabold text-slate-950">
                Have you worked with Bhavik Solar?
            </h3>

            <p class="mt-3 leading-relaxed text-slate-600">
                We would love to hear about your experience.
                Contact us to share a genuine review that
                can be featured here with your permission.
            </p>

            <a
                href="{{ url('/contact') }}"
                class="mt-6 inline-flex items-center gap-2 font-bold text-emerald-700 hover:text-emerald-900"
            >
                Share your experience

                <i data-lucide="arrow-right" class="h-5 w-5"></i>
            </a>

        </div>

    </div>

</section>


{{-- FINAL CTA --}}
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
                Talk to our team about your site,
                requirement and next steps.
            </p>

        </div>

        <div class="flex flex-wrap gap-3">

            <a
                href="{{ url('/contact') }}"
                class="inline-flex items-center justify-center gap-2 rounded-full bg-lime-400 px-6 py-3.5 text-sm font-bold text-slate-950 shadow-lg shadow-lime-500/15 transition hover:-translate-y-0.5 hover:bg-lime-300"
            >
                Get a Free Consultation

                <i data-lucide="arrow-up-right" class="h-4 w-4"></i>
            </a>

            <a
                href="tel:+918093870837"
                class="inline-flex items-center justify-center gap-2 rounded-full border border-white/30 bg-white/10 px-6 py-3.5 text-sm font-bold text-white transition hover:-translate-y-0.5 hover:bg-white/20"
            >
                Call 8093870837

                <i data-lucide="phone" class="h-4 w-4"></i>
            </a>

        </div>

    </div>

</section>

@endsection
