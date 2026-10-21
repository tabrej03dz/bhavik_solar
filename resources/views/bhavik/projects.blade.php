
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
            Explore our latest solar installations and completed projects.
            Select a project to view its complete details.
        </p>

        <p class="mt-9 text-xs font-semibold text-emerald-100/50">
            <a href="{{ url('/') }}" class="hover:text-white">
                Home
            </a>
            / Our Projects
        </p>

    </div>
</section>


{{-- DYNAMIC PROJECT GALLERY --}}
<section class="bg-[#f4f8f5] py-24" id="projects-gallery">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="mb-12 flex flex-wrap items-end justify-between gap-6">
            <div class="max-w-3xl">
                <p class="mb-4 text-xs font-black uppercase tracking-[0.25em] text-emerald-600">Our Recent Work</p>
                <h2 class="text-4xl md:text-5xl font-black tracking-tight text-slate-950 leading-tight">Made for real spaces.</h2>
                <p class="mt-5 text-lg leading-relaxed text-slate-600">Explore our solar projects and click any project to view its details.</p>
            </div>
            <span class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-white px-5 py-3 text-sm font-bold text-emerald-800">
                <i data-lucide="layers" class="h-4 w-4"></i>
                {{ $managedProjects->count() }} Projects
            </span>
        </div>

        <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($managedProjects as $project)
                @php
                    $projectTitle = $project->title ?: ($project->name ?: 'Solar Project');
                    $projectRawImage = $project->image ?: ($project->featured_image ?: ($project->image_url ?? null));
                    $projectImage = null;
                    if ($projectRawImage) {
                        $projectPath = trim((string) $projectRawImage);
                        if (preg_match('~^https?://~i', $projectPath)) {
                            $imageHost = strtolower(parse_url($projectPath, PHP_URL_HOST) ?: '');
                            if (!in_array($imageHost, ['localhost', '127.0.0.1', '0.0.0.0', '::1'], true)) {
                                $projectImage = $projectPath;
                            } else {
                                $projectPath = parse_url($projectPath, PHP_URL_PATH) ?: '';
                            }
                        }
                        if (!$projectImage) {
                            $projectPath = ltrim($projectPath, '/');
                            $projectPath = preg_replace('~^(?:public/|storage/)+~i', '', $projectPath);
                            $projectImage = $projectPath !== '' ? asset('storage/' . $projectPath) : null;
                        }
                    }
                    $projectLink = route('solar.project.show', $project->slug);
                    $projectLocation = $project->location ?: ($project->city ?? null);
                    $projectDescription = $project->short_description ?: ($project->description ?: 'Explore this solar installation project.');
                @endphp
                <a href="{{ $projectLink }}"
                   class="group flex h-full flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-emerald-300 hover:shadow-xl"
                   aria-label="View details for {{ $projectTitle }}">
                    <div class="relative aspect-[4/3] overflow-hidden bg-emerald-50">
                        @if($projectImage)
                            <img src="{{ $projectImage }}"
                                 alt="{{ $projectTitle }}"
                                 loading="lazy"
                                 class="h-full w-full object-cover transition duration-700 group-hover:scale-105">
                        @else
                            <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-emerald-900 to-emerald-700">
                                <i data-lucide="sun" class="h-16 w-16 text-lime-300"></i>
                            </div>
                        @endif
                        <span class="absolute left-5 top-5 rounded-full bg-white/95 px-4 py-2 text-xs font-extrabold text-emerald-800 shadow">Solar Project</span>
                        @if($project->capacity)
                            <span class="absolute bottom-5 left-5 rounded-full bg-lime-400 px-4 py-2 text-xs font-black text-emerald-950 shadow">{{ $project->capacity }}</span>
                        @endif
                    </div>
                    <div class="flex flex-1 flex-col p-6">
                        @if($projectLocation)
                            <p class="flex items-center gap-2 text-xs font-bold text-emerald-700">
                                <i data-lucide="map-pin" class="h-4 w-4 shrink-0"></i>
                                {{ $projectLocation }}
                            </p>
                        @endif
                        <h3 class="mt-3 text-xl font-extrabold text-slate-950 transition group-hover:text-emerald-700">{{ $projectTitle }}</h3>
                        <p class="mt-3 text-sm leading-7 text-slate-600">
                            {{ \Illuminate\Support\Str::limit(strip_tags($projectDescription), 145) }}
                        </p>
                        <span class="mt-auto inline-flex w-full items-center justify-between gap-3 rounded-xl bg-emerald-700 px-5 py-3.5 text-sm font-bold text-white transition group-hover:bg-emerald-800" style="margin-top: 1.5rem;">
                            <span class="inline-flex items-center gap-2"><i data-lucide="eye" class="h-4 w-4"></i> View Project Details</span>
                            <i data-lucide="arrow-up-right" class="h-5 w-5"></i>
                        </span>
                    </div>
                </a>
            @empty
                <div class="col-span-full rounded-3xl border border-dashed border-emerald-200 bg-white px-6 py-16 text-center">
                    <i data-lucide="folder-open" class="mx-auto h-12 w-12 text-emerald-700"></i>
                    <h3 class="mt-5 text-2xl font-extrabold text-slate-900">Projects Coming Soon</h3>
                    <p class="mt-3 text-slate-500">Projects published from the admin panel will appear here.</p>
                </div>
            @endforelse
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
