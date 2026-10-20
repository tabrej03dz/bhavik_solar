
@extends('layouts.admin')

@section('title', ($item->exists ? 'Edit ' : 'Add ') . ucfirst(rtrim($type, 's')))

@section('page-title', ($item->exists ? 'Edit ' : 'Add ') . ucfirst(rtrim($type, 's')))

@section('content')

@php
    $isProject = $type === 'projects';

    $formAction = $item->exists
        ? route('admin.' . $type . '.update', $item->id)
        : route('admin.' . $type . '.store');

    $mediaItems = $isProject && $item->exists
        ? $item->media
        : collect();

    $galleryImages = $mediaItems->where('type', 'image');
    $galleryVideos = $mediaItems->where('type', 'video');
@endphp

<div class="mx-auto max-w-6xl space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-wrap items-center justify-between gap-4">

        <div>
            <h1 class="text-2xl font-black text-slate-900 md:text-3xl">
                {{ $item->exists ? 'Edit' : 'Add New' }}
                {{ ucfirst(rtrim($type, 's')) }}
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Manage information, images and videos.
            </p>
        </div>

        <a
            href="{{ route('admin.' . $type . '.index') }}"
            class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-700 hover:bg-slate-50"
        >
            ← Back to List
        </a>

    </div>


    @if($isProject && $item->exists)
        <a href="{{ route('admin.media.index', ['type' => 'project', 'id' => $item->id]) }}"
           class="inline-flex rounded-xl bg-emerald-800 px-6 py-3 font-bold text-white hover:bg-emerald-900">
            Open Project Media Manager (Images &amp; Videos)
        </a>
    @endif

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))

        <div class="rounded-xl border border-green-200 bg-green-50 p-4 font-semibold text-green-700">
            {{ session('success') }}
        </div>

    @endif


    {{-- VALIDATION ERRORS --}}
    @if($errors->any())

        <div class="rounded-xl border border-red-200 bg-red-50 p-5 text-red-700">

            <h3 class="mb-3 font-bold">
                Please fix the following errors:
            </h3>

            <ul class="list-inside list-disc space-y-1 text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif


    <form
        method="POST"
        enctype="multipart/form-data"
        action="{{ $formAction }}"
        id="solarItemForm"
        class="space-y-6"
    >

        @csrf

        @if($item->exists)
            @method('PUT')
        @endif


        {{-- BASIC INFORMATION --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">

            <h2 class="mb-6 text-xl font-extrabold text-slate-900">
                Basic Information
            </h2>

            <div class="grid gap-6 md:grid-cols-2">

                {{-- TITLE --}}
                <div class="md:col-span-2">

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Title <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="title"
                        required
                        maxlength="255"
                        value="{{ old('title', $item->title) }}"
                        placeholder="Enter title"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100"
                    >

                </div>


                {{-- SHORT DESCRIPTION --}}
                <div class="md:col-span-2">

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Short Description
                    </label>

                    <textarea
                        name="short_description"
                        rows="3"
                        maxlength="500"
                        placeholder="Enter short description"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100"
                    >{{ old('short_description', $item->short_description) }}</textarea>

                </div>


                {{-- FULL DESCRIPTION --}}
                <div class="md:col-span-2">

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Full Description
                    </label>

                    <textarea
                        name="description"
                        rows="7"
                        placeholder="Enter full description"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100"
                    >{{ old('description', $item->description) }}</textarea>

                </div>


                {{-- PROJECT SPECIFIC FIELDS --}}
                @if($isProject)

                    <div>

                        <label class="mb-2 block text-sm font-bold text-slate-700">
                            Project Location
                        </label>

                        <input
                            type="text"
                            name="location"
                            value="{{ old('location', $item->location) }}"
                            placeholder="Jharsuguda, Odisha"
                            class="w-full rounded-xl border border-slate-200 px-4 py-3"
                        >

                    </div>


                    <div>

                        <label class="mb-2 block text-sm font-bold text-slate-700">
                            Capacity
                        </label>

                        <input
                            type="text"
                            name="capacity"
                            value="{{ old('capacity', $item->capacity) }}"
                            placeholder="e.g. 50 kW"
                            class="w-full rounded-xl border border-slate-200 px-4 py-3"
                        >

                    </div>


                    <div>

                        <label class="mb-2 block text-sm font-bold text-slate-700">
                            Completion Date
                        </label>

                        <input
                            type="date"
                            name="completed_at"
                            value="{{ old('completed_at', $item->completed_at?->format('Y-m-d')) }}"
                            class="w-full rounded-xl border border-slate-200 px-4 py-3"
                        >

                    </div>

                @endif


                {{-- SORT ORDER --}}
                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Display Order
                    </label>

                    <input
                        type="number"
                        min="0"
                        name="sort_order"
                        value="{{ old('sort_order', $item->sort_order ?? 0) }}"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3"
                    >

                </div>

            </div>

        </div>


        {{-- MAIN IMAGE --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">

            <h2 class="mb-2 text-xl font-extrabold text-slate-900">
                Main / Featured Image
            </h2>

            <p class="mb-6 text-sm text-slate-500">
                This image is used as the main thumbnail in listing cards.
            </p>


            <input
                type="file"
                name="image"
                id="mainImageInput"
                accept=".jpg,.jpeg,.png,.webp"
                class="w-full rounded-xl border border-dashed border-slate-300 p-4"
            >

            <p class="mt-2 text-xs text-slate-500">
                JPG, JPEG, PNG, WebP. Maximum 5 MB.
            </p>


            <div id="mainImagePreview" class="mt-5 hidden">

                <img
                    id="mainImagePreviewImg"
                    src=""
                    alt="Image preview"
                    class="h-48 max-w-full rounded-xl border object-contain"
                >

            </div>


            @if($item->exists && $item->image)

                <div class="mt-6">

                    <p class="mb-3 text-sm font-bold text-slate-700">
                        Current Main Image
                    </p>

                    <img
                        src="{{ asset('storage/' . $item->image) }}"
                        alt="Current image"
                        class="h-44 max-w-full rounded-xl border object-contain"
                    >

                    <label class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-red-600">

                        <input
                            type="checkbox"
                            name="remove_image"
                            value="1"
                            class="h-4 w-4 rounded"
                        >

                        Remove Current Main Image

                    </label>

                </div>

            @endif

        </div>


        {{-- PROJECT MULTIPLE IMAGES --}}
        @if($isProject)

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">

                <div class="mb-6 flex items-center gap-3">

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                        <i data-lucide="images" class="h-6 w-6"></i>
                    </div>

                    <div>
                        <h2 class="text-xl font-extrabold text-slate-900">
                            Project Gallery Images
                        </h2>

                        <p class="text-sm text-slate-500">
                            Upload multiple installation photographs.
                        </p>
                    </div>

                </div>


                <label
                    for="galleryImages"
                    class="flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-emerald-200 bg-emerald-50/50 px-6 py-10 text-center transition hover:border-emerald-500 hover:bg-emerald-50"
                >

                    <i data-lucide="image-plus" class="mb-4 h-10 w-10 text-emerald-600"></i>

                    <span class="font-bold text-emerald-800">
                        Click to Select Multiple Images
                    </span>

                    <span class="mt-2 text-xs text-slate-500">
                        Up to 20 images • Maximum 10 MB each
                    </span>

                </label>


                <input
                    type="file"
                    name="images[]"
                    id="galleryImages"
                    accept=".jpg,.jpeg,.png,.webp"
                    multiple
                    class="sr-only"
                >


                <div
                    id="galleryImagePreview"
                    class="mt-6 grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4"
                ></div>


                {{-- EXISTING IMAGES --}}
                @if($item->exists && $galleryImages->isNotEmpty())

                    <div class="mt-8 border-t border-slate-100 pt-7">

                        <h3 class="mb-5 text-lg font-extrabold text-slate-900">
                            Existing Gallery Images
                            ({{ $galleryImages->count() }})
                        </h3>

                        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4">

                            @foreach($galleryImages as $media)

                                <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">

                                    <img
                                        src="{{ $media->url }}"
                                        alt="{{ $media->alt_text ?: $item->title }}"
                                        loading="lazy"
                                        class="h-36 w-full object-cover"
                                    >

                                    <div class="p-3">

                                        <label class="flex items-center gap-2 text-xs font-bold text-red-600">

                                            <input
                                                type="checkbox"
                                                name="delete_media[]"
                                                value="{{ $media->id }}"
                                                class="h-4 w-4"
                                            >

                                            Delete on Save

                                        </label>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                @endif

            </div>


            {{-- PROJECT MULTIPLE VIDEOS --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">

                <div class="mb-6 flex items-center gap-3">

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-700">
                        <i data-lucide="video" class="h-6 w-6"></i>
                    </div>

                    <div>
                        <h2 class="text-xl font-extrabold text-slate-900">
                            Project Videos
                        </h2>

                        <p class="text-sm text-slate-500">
                            Upload multiple project or installation videos.
                        </p>
                    </div>

                </div>


                <label
                    for="galleryVideos"
                    class="flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-blue-200 bg-blue-50/50 px-6 py-10 text-center transition hover:border-blue-500 hover:bg-blue-50"
                >

                    <i data-lucide="video" class="mb-4 h-10 w-10 text-blue-600"></i>

                    <span class="font-bold text-blue-800">
                        Click to Select Multiple Videos
                    </span>

                    <span class="mt-2 text-xs text-slate-500">
                        MP4, MOV, WebM • Up to 10 videos • 50 MB each
                    </span>

                </label>


                <input
                    type="file"
                    name="videos[]"
                    id="galleryVideos"
                    accept=".mp4,.mov,.webm"
                    multiple
                    class="sr-only"
                >


                <div
                    id="galleryVideoPreview"
                    class="mt-6 grid gap-4 sm:grid-cols-2"
                ></div>


                {{-- EXISTING VIDEOS --}}
                @if($item->exists && $galleryVideos->isNotEmpty())

                    <div class="mt-8 border-t border-slate-100 pt-7">

                        <h3 class="mb-5 text-lg font-extrabold text-slate-900">
                            Existing Videos
                            ({{ $galleryVideos->count() }})
                        </h3>

                        <div class="grid gap-5 sm:grid-cols-2">

                            @foreach($galleryVideos as $media)

                                <div class="overflow-hidden rounded-xl border border-slate-200">

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

                                        <p class="mb-3 truncate text-xs text-slate-500">
                                            {{ $media->original_name }}
                                        </p>

                                        <label class="flex items-center gap-2 text-sm font-bold text-red-600">

                                            <input
                                                type="checkbox"
                                                name="delete_media[]"
                                                value="{{ $media->id }}"
                                                class="h-4 w-4"
                                            >

                                            Delete on Save

                                        </label>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                @endif

            </div>

        @endif


        {{-- STATUS OPTIONS --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <h2 class="mb-5 text-lg font-extrabold text-slate-900">
                Publishing Settings
            </h2>

            <div class="flex flex-wrap gap-8">

                <label class="inline-flex cursor-pointer items-center gap-3 font-semibold text-slate-700">

                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        class="h-5 w-5 rounded"
                        {{ old('is_active', $item->exists ? $item->is_active : true) ? 'checked' : '' }}
                    >

                    Active / Published

                </label>


                <label class="inline-flex cursor-pointer items-center gap-3 font-semibold text-slate-700">

                    <input
                        type="checkbox"
                        name="is_featured"
                        value="1"
                        class="h-5 w-5 rounded"
                        {{ old('is_featured', $item->is_featured) ? 'checked' : '' }}
                    >

                    Featured

                </label>

            </div>

        </div>


        {{-- SUBMIT BUTTONS --}}
        <div class="flex flex-wrap items-center gap-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <button
                type="submit"
                id="solarSubmitButton"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-700 px-8 py-3.5 font-extrabold text-white transition hover:bg-emerald-800 disabled:cursor-not-allowed disabled:opacity-60"
            >

                <i data-lucide="save" class="h-5 w-5"></i>

                <span id="solarSubmitText">
                    {{ $item->exists ? 'Update' : 'Save' }}
                    {{ ucfirst(rtrim($type, 's')) }}
                </span>

            </button>


            <a
                href="{{ route('admin.' . $type . '.index') }}"
                class="rounded-xl border border-slate-200 bg-white px-8 py-3.5 font-bold text-slate-700 hover:bg-slate-50"
            >
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection


@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const previewUrls = {
        main: [],
        images: [],
        videos: []
    };

    function clearPreview(type, container) {

        previewUrls[type].forEach(function (url) {
            URL.revokeObjectURL(url);
        });

        previewUrls[type] = [];

        if (container) {
            container.innerHTML = '';
        }
    }


    // MAIN IMAGE PREVIEW
    const mainInput = document.getElementById('mainImageInput');
    const mainWrapper = document.getElementById('mainImagePreview');
    const mainPreview = document.getElementById('mainImagePreviewImg');

    if (mainInput && mainPreview && mainWrapper) {

        mainInput.addEventListener('change', function () {

            previewUrls.main.forEach(function (url) {
                URL.revokeObjectURL(url);
            });

            previewUrls.main = [];

            const file = this.files[0];

            if (!file) {
                mainWrapper.classList.add('hidden');
                return;
            }

            const url = URL.createObjectURL(file);
            previewUrls.main.push(url);

            mainPreview.src = url;
            mainWrapper.classList.remove('hidden');

        });

    }


    // MULTIPLE IMAGE PREVIEW
    const imagesInput = document.getElementById('galleryImages');
    const imagesContainer = document.getElementById('galleryImagePreview');

    if (imagesInput && imagesContainer) {

        imagesInput.addEventListener('change', function () {

            clearPreview('images', imagesContainer);

            const files = Array.from(this.files);

            if (files.length > 20) {
                alert('Maximum 20 images allowed.');
                this.value = '';
                return;
            }

            files.forEach(function (file) {

                const url = URL.createObjectURL(file);
                previewUrls.images.push(url);

                const wrapper = document.createElement('div');
                wrapper.className =
                    'overflow-hidden rounded-xl border border-slate-200 bg-white';

                const img = document.createElement('img');
                img.src = url;
                img.alt = file.name;
                img.className = 'h-32 w-full object-cover';

                const caption = document.createElement('p');
                caption.className =
                    'truncate p-2 text-xs text-slate-500';
                caption.textContent = file.name;

                wrapper.appendChild(img);
                wrapper.appendChild(caption);

                imagesContainer.appendChild(wrapper);

            });

        });

    }


    // MULTIPLE VIDEO PREVIEW
    const videosInput = document.getElementById('galleryVideos');
    const videosContainer = document.getElementById('galleryVideoPreview');

    if (videosInput && videosContainer) {

        videosInput.addEventListener('change', function () {

            clearPreview('videos', videosContainer);

            const files = Array.from(this.files);

            if (files.length > 10) {
                alert('Maximum 10 videos allowed.');
                this.value = '';
                return;
            }

            files.forEach(function (file) {

                const url = URL.createObjectURL(file);
                previewUrls.videos.push(url);

                const wrapper = document.createElement('div');
                wrapper.className =
                    'overflow-hidden rounded-xl border border-slate-200 bg-white';

                const video = document.createElement('video');
                video.src = url;
                video.controls = true;
                video.preload = 'metadata';
                video.className =
                    'aspect-video w-full bg-black object-contain';

                const caption = document.createElement('p');
                caption.className =
                    'truncate p-3 text-xs text-slate-500';
                caption.textContent = file.name;

                wrapper.appendChild(video);
                wrapper.appendChild(caption);

                videosContainer.appendChild(wrapper);

            });

        });

    }


    // PREVENT DOUBLE SUBMISSION
    const form = document.getElementById('solarItemForm');
    const submitButton = document.getElementById('solarSubmitButton');
    const submitText = document.getElementById('solarSubmitText');

    if (form && submitButton) {

        form.addEventListener('submit', function () {

            submitButton.disabled = true;

            if (submitText) {
                submitText.textContent = 'Saving, please wait...';
            }

        });

    }

});
</script>

@endpush
