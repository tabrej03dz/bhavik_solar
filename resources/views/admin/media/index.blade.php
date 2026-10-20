@extends('layouts.admin')

@section('title', 'Manage Media')
@section('page-title', 'Media Manager')

@section('content')
@php
    $backRoute = $type === 'product' ? route('products.index') : route('admin.projects.index');
    $totalMedia = $mediaItems->count();
@endphp

<div class="mx-auto max-w-6xl space-y-6">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-950">Media Manager</h1>
            <p class="mt-1 text-sm text-slate-500">{{ ucfirst($type) }}: <span class="font-bold text-slate-700">{{ $title }}</span></p>
        </div>
        <a href="{{ $backRoute }}" class="rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-bold text-slate-600 hover:bg-slate-50">← Back to {{ ucfirst($type) }}s</a>
    </div>

    @if(session('success'))
        <div class="rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm font-semibold text-emerald-700">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700">
            <p class="font-extrabold">Please fix the following errors:</p>
            <ul class="mt-2 list-disc pl-5">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <div class="grid gap-6 lg:grid-cols-[minmax(0,1fr)_320px]">
        <div class="space-y-6">
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                <h2 class="font-extrabold text-slate-900">Upload Images & Videos</h2>
                <p class="mt-1 text-xs text-slate-500">Choose images and videos together in one field, just like the Product Create gallery.</p>

                <form id="mediaUploadForm" method="POST" action="{{ route('admin.media.store', ['type' => $type, 'id' => $item->id]) }}" enctype="multipart/form-data" class="mt-5 space-y-5">
                    @csrf
                    <label for="mediaInput" id="mediaDropZone" class="flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-200 bg-slate-50 px-5 py-10 text-center transition hover:border-brand-400 hover:bg-brand-50">
                        <svg class="h-11 w-11 text-slate-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="16" rx="2"/><circle cx="8.5" cy="9" r="1.5"/><path d="M3 17l5-5 4 3 3-2 6 5"/><path d="M15 8l3 2-3 2V8z"/></svg>
                        <span class="mt-3 text-sm font-bold text-slate-700">Click to Select Images & Videos</span>
                        <span class="mt-1 text-xs text-slate-400">Or drag and drop files here</span>
                        <span class="mt-2 text-xs text-slate-400">JPG, PNG, WebP (10 MB) • MP4, MOV, WebM (50 MB)</span>
                        <span class="mt-1 text-xs text-slate-400">Up to 20 images and 10 videos per upload</span>
                    </label>
                    <input id="mediaInput" name="media[]" type="file" class="sr-only" accept=".jpg,.jpeg,.png,.webp,.mp4,.mov,.webm,image/jpeg,image/png,image/webp,video/mp4,video/quicktime,video/webm" multiple>
                    <div id="selectionArea" class="hidden">
                        <div class="flex flex-wrap items-center justify-between gap-3">
                            <p id="selectedCount" class="text-sm font-bold text-slate-700"></p>
                            <button type="button" id="clearSelection" class="text-xs font-bold text-rose-600 hover:underline">Clear Selection</button>
                        </div>
                        <div id="mediaPreview" class="mt-4 grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-4"></div>
                    </div>
                    <p id="selectionError" class="hidden rounded-lg bg-rose-50 p-3 text-sm font-semibold text-rose-700" role="alert"></p>
                    <button id="uploadButton" type="submit" class="inline-flex w-full items-center justify-center rounded-xl bg-brand-700 px-6 py-3.5 text-sm font-extrabold text-white transition hover:bg-brand-800 disabled:cursor-not-allowed disabled:opacity-60">Upload Media</button>
                </form>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <h2 class="font-extrabold text-slate-900">Existing Media <span class="text-slate-400">({{ $totalMedia }})</span></h2>
                        <p class="mt-1 text-xs text-slate-400">View or delete existing gallery files.</p>
                    </div>
                    <div class="flex flex-wrap gap-2 text-xs font-bold">
                        <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-emerald-700">{{ $images->count() }} Images</span>
                        <span class="rounded-full bg-violet-50 px-3 py-1.5 text-violet-700">{{ $videos->count() }} Videos</span>
                    </div>
                </div>

                <div class="mb-5 flex flex-wrap gap-2" id="mediaFilters">
                    <button type="button" data-filter="all" class="media-filter rounded-lg bg-brand-700 px-4 py-2 text-xs font-bold text-white">All</button>
                    <button type="button" data-filter="image" class="media-filter rounded-lg bg-slate-100 px-4 py-2 text-xs font-bold text-slate-600">Images</button>
                    <button type="button" data-filter="video" class="media-filter rounded-lg bg-slate-100 px-4 py-2 text-xs font-bold text-slate-600">Videos</button>
                </div>

                <div id="existingMediaGrid" class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4">
                    @forelse($mediaItems as $media)
                        <div data-media-type="{{ $media->type }}" class="overflow-hidden rounded-xl border border-slate-200 bg-white">
                            @if($media->type === 'image')
                                <a href="{{ $media->url }}" target="_blank" rel="noopener noreferrer" title="View image"><img src="{{ $media->url }}" alt="{{ $media->alt_text ?: $title }}" loading="lazy" class="aspect-square w-full object-cover"></a>
                            @else
                                <video controls preload="metadata" playsinline class="aspect-square w-full bg-black object-contain"><source src="{{ $media->url }}">Your browser does not support this video.</video>
                            @endif
                            <div class="space-y-2 border-t border-slate-100 p-3">
                                <div class="flex items-center justify-between gap-2"><span class="rounded bg-slate-100 px-2 py-1 text-[10px] font-extrabold uppercase text-slate-600">{{ $media->type }}</span><span class="text-[10px] text-slate-400">#{{ $media->id }}</span></div>
                                <p title="{{ $media->original_name }}" class="truncate text-xs text-slate-500">{{ $media->original_name }}</p>
                                <form method="POST" action="{{ route('admin.media.destroy', ['type' => $type, 'id' => $item->id, 'media' => $media->id]) }}" onsubmit="return confirm('Delete this media permanently?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="w-full rounded-lg bg-rose-50 px-3 py-2 text-xs font-extrabold text-rose-600 hover:bg-rose-100">Delete</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="col-span-full rounded-xl border border-dashed border-slate-200 bg-slate-50 p-8 text-center text-sm text-slate-400">No media uploaded yet.</p>
                    @endforelse
                </div>
                <p id="emptyFilter" class="mt-4 hidden text-sm text-slate-500">No media in this category.</p>
            </div>
        </div>

        <aside class="space-y-6">
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <h3 class="font-extrabold text-slate-900">Media Summary</h3>
                <div class="mt-5 grid grid-cols-3 gap-2 text-center">
                    <div class="rounded-xl bg-slate-50 p-3"><p class="text-xl font-black text-slate-900">{{ $totalMedia }}</p><p class="mt-1 text-[10px] font-semibold text-slate-500">Total</p></div>
                    <div class="rounded-xl bg-emerald-50 p-3"><p class="text-xl font-black text-emerald-700">{{ $images->count() }}</p><p class="mt-1 text-[10px] font-semibold text-emerald-700">Images</p></div>
                    <div class="rounded-xl bg-violet-50 p-3"><p class="text-xl font-black text-violet-700">{{ $videos->count() }}</p><p class="mt-1 text-[10px] font-semibold text-violet-700">Videos</p></div>
                </div>
                <p class="mt-4 text-xs leading-5 text-slate-500">The main featured image is managed separately on the Product/Project edit page. This page manages additional gallery media.</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <h3 class="font-extrabold text-slate-900">Upload Guidelines</h3>
                <ul class="mt-4 list-disc space-y-2 pl-5 text-xs leading-5 text-slate-500">
                    <li>Pick photos and videos together.</li>
                    <li>Maximum 20 images, 10 videos in one upload.</li>
                    <li>Maximum image size: 10 MB.</li>
                    <li>Maximum video size: 50 MB.</li>
                    <li>MP4 is recommended for browser playback.</li>
                </ul>
            </div>
        </aside>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('mediaInput');
    const zone = document.getElementById('mediaDropZone');
    const preview = document.getElementById('mediaPreview');
    const area = document.getElementById('selectionArea');
    const count = document.getElementById('selectedCount');
    const error = document.getElementById('selectionError');
    const form = document.getElementById('mediaUploadForm');
    const submit = document.getElementById('uploadButton');
    let urls = [];

    function resetUrls() { urls.forEach(url => URL.revokeObjectURL(url)); urls = []; }
    function validateFiles(files) {
        let images = 0, videos = 0;
        const imageExtensions = ['jpg','jpeg','png','webp'];
        const videoExtensions = ['mp4','mov','webm'];
        for (const file of files) {
            const ext = (file.name.split('.').pop() || '').toLowerCase();
            if (imageExtensions.includes(ext) && file.type.startsWith('image/')) {
                images++;
                if (file.size > 10 * 1024 * 1024) return 'Each image must be 10 MB or smaller.';
            } else if (videoExtensions.includes(ext) && (file.type.startsWith('video/') || file.type === '')) {
                videos++;
                if (file.size > 50 * 1024 * 1024) return 'Each video must be 50 MB or smaller.';
            } else return 'Unsupported file: ' + file.name;
        }
        if (images > 20 || videos > 10 || files.length > 30) return 'Maximum 20 images and 10 videos per upload.';
        return '';
    }
    function render() {
        resetUrls(); preview.innerHTML = ''; error.classList.add('hidden');
        const files = Array.from(input.files || []);
        area.classList.toggle('hidden', files.length === 0);
        if (!files.length) return;
        const message = validateFiles(files);
        if (message) { error.textContent = message; error.classList.remove('hidden'); }
        count.textContent = files.length + ' file(s) selected';
        files.forEach(file => {
            const url = URL.createObjectURL(file); urls.push(url);
            const card = document.createElement('div');
            card.className = 'overflow-hidden rounded-xl border border-slate-200 bg-slate-50';
            const ext = (file.name.split('.').pop() || '').toLowerCase();
            let element;
            if (['jpg','jpeg','png','webp'].includes(ext)) {
                element = document.createElement('img'); element.alt = file.name;
                element.className = 'aspect-square w-full object-cover';
            } else {
                element = document.createElement('video'); element.controls = true; element.preload = 'metadata';
                element.className = 'aspect-square w-full bg-black object-contain';
            }
            element.src = url;
            const name = document.createElement('p'); name.textContent = file.name;
            name.className = 'truncate p-2 text-xs text-slate-500';
            card.append(element, name); preview.appendChild(card);
        });
    }
    input.addEventListener('change', render);
    document.getElementById('clearSelection').addEventListener('click', () => { input.value = ''; render(); });
    ['dragenter','dragover'].forEach(evt => zone.addEventListener(evt, event => { event.preventDefault(); zone.classList.add('border-brand-500'); }));
    ['dragleave','drop'].forEach(evt => zone.addEventListener(evt, event => { event.preventDefault(); zone.classList.remove('border-brand-500'); }));
    zone.addEventListener('drop', event => {
        const data = new DataTransfer();
        Array.from(event.dataTransfer.files).forEach(file => data.items.add(file));
        input.files = data.files; render();
    });
    form.addEventListener('submit', event => {
        const files = Array.from(input.files || []);
        const message = !files.length ? 'Please select at least one image or video.' : validateFiles(files);
        if (message) { event.preventDefault(); error.textContent = message; error.classList.remove('hidden'); return; }
        submit.disabled = true; submit.textContent = 'Uploading...';
    });
    document.querySelectorAll('.media-filter').forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.dataset.filter;
            let visible = 0;
            document.querySelectorAll('[data-media-type]').forEach(card => {
                const show = filter === 'all' || card.dataset.mediaType === filter;
                card.classList.toggle('hidden', !show); if (show) visible++;
            });
            document.getElementById('emptyFilter').classList.toggle('hidden', visible !== 0);
            document.querySelectorAll('.media-filter').forEach(b => {
                const active = b === button;
                b.classList.toggle('bg-brand-700', active); b.classList.toggle('text-white', active);
                b.classList.toggle('bg-slate-100', !active); b.classList.toggle('text-slate-600', !active);
            });
        });
    });
    window.addEventListener('pagehide', resetUrls);
});
</script>
@endpush
