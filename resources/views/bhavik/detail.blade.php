
@extends('layouts.website')

@section('title', $title)

@section('content')

@php
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
@endphp

<section class="relative overflow-hidden bg-[#062d24] py-20 text-white md:py-28">
    <div class="absolute -right-32 -top-32 h-96 w-96 rounded-full bg-emerald-400/10 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-5 lg:px-8">
        <a href="{{ $backRoute }}"
           class="mb-8 inline-flex text-sm font-semibold text-lime-300 hover:text-white">
            ← Back to {{ $typeLabel }}s
        </a>

        <p class="mb-5 text-xs font-extrabold uppercase tracking-[.3em] text-lime-300">
            Bhavik Solar / {{ $typeLabel }} Details
        </p>

        <h1 class="max-w-5xl text-4xl font-black leading-tight tracking-tight md:text-6xl">
            {{ $title }}
        </h1>

        @if($item->short_description)
            <p class="mt-6 max-w-3xl text-lg leading-8 text-emerald-50/80">
                {{ $item->short_description }}
            </p>
        @endif
    </div>
</section>

<section class="bg-[#f5f8f6] py-16 md:py-24">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">

        <div class="grid gap-12 lg:grid-cols-5">

            <div class="space-y-7 lg:col-span-3">

                @if($imageGallery->isNotEmpty())
                    <div class="overflow-hidden rounded-3xl bg-white shadow-lg">
                        <img
                            id="mainDetailImage"
                            src="{{ $imageGallery->first()['url'] }}"
                            alt="{{ $title }}"
                            class="aspect-[4/3] w-full object-contain"
                        >
                    </div>

                    @if($imageGallery->count() > 1)
                        <div class="grid grid-cols-3 gap-3 sm:grid-cols-4">
                            @foreach($imageGallery as $image)
                                <button
                                    type="button"
                                    data-gallery-image="{{ $image['url'] }}"
                                    class="overflow-hidden rounded-xl border-2 border-white bg-white transition hover:border-emerald-600"
                                >
                                    <img
                                        src="{{ $image['url'] }}"
                                        alt="{{ $image['alt'] ?? $title }}"
                                        loading="lazy"
                                        class="aspect-square w-full object-cover"
                                    >
                                </button>
                            @endforeach
                        </div>
                    @endif
                @else
                    <div class="flex aspect-[4/3] items-center justify-center rounded-3xl bg-emerald-950 text-6xl text-emerald-200">
                        ☀
                    </div>
                @endif

                @if($videoGallery->isNotEmpty())
                    <div class="pt-7">
                        <h2 class="mb-6 text-2xl font-black text-slate-900">
                            Videos
                        </h2>

                        <div class="grid gap-6">
                            @foreach($videoGallery as $video)
                                <div class="overflow-hidden rounded-2xl bg-white shadow-sm">
                                    <video
                                        controls
                                        playsinline
                                        preload="metadata"
                                        class="aspect-video w-full bg-black object-contain"
                                    >
                                        <source src="{{ $mediaUrl($video->file_path) }}">
                                        Your browser does not support video playback.
                                    </video>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <div class="lg:col-span-2">

                <div class="sticky top-8 rounded-3xl border border-slate-200 bg-white p-7 shadow-sm md:p-9">

                    <p class="mb-3 text-xs font-extrabold uppercase tracking-widest text-emerald-600">
                        {{ $typeLabel }} Information
                    </p>

                    <h2 class="text-2xl font-black text-slate-900">
                        {{ $title }}
                    </h2>

                    @if($type === 'product')
                        @if($item->category)
                            <p class="mt-5 text-slate-600">
                                <strong>Category:</strong> {{ $item->category }}
                            </p>
                        @endif

                        @if($item->price !== null)
                            <p class="mt-4 text-3xl font-black text-emerald-700">
                                ₹{{ number_format((float)$item->price, 2) }}
                                @if($item->unit)
                                    <span class="text-sm font-medium text-slate-500">
                                        / {{ $item->unit }}
                                    </span>
                                @endif
                            </p>
                        @endif
                    @endif

                    @if($type === 'project')
                        @if($item->location)
                            <p class="mt-5 text-slate-600">
                                <strong>Location:</strong> {{ $item->location }}
                            </p>
                        @endif

                        @if($item->capacity)
                            <p class="mt-3 text-slate-600">
                                <strong>Capacity:</strong> {{ $item->capacity }}
                            </p>
                        @endif

                        @if($item->completed_at)
                            <p class="mt-3 text-slate-600">
                                <strong>Completed:</strong>
                                {{ $item->completed_at->format('d M Y') }}
                            </p>
                        @endif
                    @endif

                    @if($item->description)
                        <div class="mt-7">
                            <h3 class="mb-3 text-lg font-extrabold">
                                Description
                            </h3>

                            <div class="whitespace-pre-line break-words leading-8 text-slate-600">{{ $item->description }}</div>
                        </div>
                    @endif

                    <div class="mt-9 space-y-3">
                        <a
                            href="{{ url('/contact') }}"
                            class="flex w-full items-center justify-center rounded-xl bg-emerald-700 px-6 py-4 font-bold text-white transition hover:bg-emerald-800"
                        >
                            Send Enquiry
                        </a>

                        <a
                            href="https://wa.me/918093870837?text={{ rawurlencode('Hello Bhavik Solar, I want information about '.$title) }}"
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

        @if($related->isNotEmpty())
            <div class="mt-24">
                <div class="mb-8">
                    <p class="mb-2 text-xs font-extrabold uppercase tracking-widest text-emerald-600">
                        Explore More
                    </p>

                    <h2 class="text-3xl font-black text-slate-900">
                        Related {{ $typeLabel }}s
                    </h2>
                </div>

                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($related as $relatedItem)

                        @php
                            $relatedTitle = $type === 'product'
                                ? $relatedItem->name
                                : $relatedItem->title;

                            $relatedUrl = match ($type) {
                                'product' => route('solar.product.show', $relatedItem->slug),
                                'service' => route('solar.service.show', $relatedItem->slug),
                                'project' => route('solar.project.show', $relatedItem->slug),
                            };
                        @endphp

                        <a href="{{ $relatedUrl }}"
                           class="group overflow-hidden rounded-2xl border border-slate-200 bg-white transition hover:shadow-xl">

                            @if($relatedItem->image)
                                <img
                                    src="{{ $mediaUrl($relatedItem->image) }}"
                                    alt="{{ $relatedTitle }}"
                                    loading="lazy"
                                    class="aspect-[4/3] w-full object-cover transition duration-500 group-hover:scale-105"
                                >
                            @else
                                <div class="flex aspect-[4/3] items-center justify-center bg-emerald-950 text-4xl text-lime-300">
                                    ☀
                                </div>
                            @endif

                            <div class="p-5">
                                <h3 class="font-extrabold text-slate-900">
                                    {{ $relatedTitle }}
                                </h3>

                                <p class="mt-3 text-sm font-bold text-emerald-700">
                                    View Details →
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</section>

@push('scripts')
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
@endpush

@endsection
