
@extends('layouts.admin')

@section('title', 'Manage Media')
@section('page-title', 'Media Gallery')

@section('content')

<div class="mx-auto max-w-7xl space-y-8">

    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900">
                {{ $title }}
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Manage {{ ucfirst($type) }} Images & Videos
            </p>
        </div>

        <a
            href="{{ $type === 'product'
                ? route('products.index')
                : route('admin.projects.index') }}"
            class="rounded-xl border border-slate-200 bg-white px-5 py-3 font-semibold text-slate-700"
        >
            ← Back to {{ ucfirst($type) }}s
        </a>
    </div>

    @if(session('success'))
        <div class="rounded-xl border border-green-200 bg-green-50 p-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
            <ul class="list-inside list-disc">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">

        <h2 class="mb-6 text-xl font-extrabold">
            Upload New Media
        </h2>

        <form
            action="{{ route('admin.media.store', [
                'type' => $type,
                'id' => $item->id
            ]) }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6"
        >
            @csrf

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
            Uploaded Images ({{ $images->count() }})
        </h2>

        <div class="grid grid-cols-2 gap-5 md:grid-cols-3 lg:grid-cols-4">
            @forelse($images as $media)
                <div class="overflow-hidden rounded-2xl border border-slate-200">
                    <img
                        src="{{ $media->url }}"
                        alt="{{ $media->alt_text }}"
                        class="h-44 w-full object-cover"
                        loading="lazy"
                    >

                    <div class="p-3">
                        <form
                            method="POST"
                            action="{{ route('admin.media.destroy', [
                                'type' => $type,
                                'id' => $item->id,
                                'media' => $media->id
                            ]) }}"
                            onsubmit="return confirm('Delete this image?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="w-full rounded-lg bg-red-50 px-4 py-2 text-sm font-bold text-red-600 hover:bg-red-100"
                            >
                                Delete Image
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-slate-500">
                    No gallery images uploaded yet.
                </p>
            @endforelse
        </div>
    </div>

    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
        <h2 class="mb-6 text-xl font-extrabold">
            Uploaded Videos ({{ $videos->count() }})
        </h2>

        <div class="grid gap-6 md:grid-cols-2">
            @forelse($videos as $media)
                <div class="overflow-hidden rounded-2xl border border-slate-200">

                    <video
                        controls
                        preload="metadata"
                        playsinline
                        class="aspect-video w-full bg-black object-contain"
                    >
                        <source src="{{ $media->url }}">
                        Your browser does not support video.
                    </video>

                    <div class="p-4">
                        <p class="mb-3 truncate text-sm text-slate-500">
                            {{ $media->original_name }}
                        </p>

                        <form
                            method="POST"
                            action="{{ route('admin.media.destroy', [
                                'type' => $type,
                                'id' => $item->id,
                                'media' => $media->id
                            ]) }}"
                            onsubmit="return confirm('Delete this video?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="rounded-lg bg-red-50 px-5 py-2 text-sm font-bold text-red-600 hover:bg-red-100"
                            >
                                Delete Video
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-slate-500">
                    No videos uploaded yet.
                </p>
            @endforelse
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

@endsection
