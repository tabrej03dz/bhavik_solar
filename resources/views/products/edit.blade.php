@extends('layouts.admin')

@section('title', 'Edit Product')
@section('page-title', 'Edit Product')

@section('content')

<div class="mx-auto max-w-6xl">

    {{-- HEADER --}}
    <div class="mb-5 flex items-center justify-between gap-3">

        <div>

            <h2 class="text-xl font-extrabold text-slate-950">
                Edit Product
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Update {{ $product->name }} information.
            </p>

        </div>


        <a
            href="{{ route('products.index') }}"
            class="rounded-xl border border-slate-200
                   bg-white px-4 py-2.5
                   text-sm font-bold text-slate-600
                   hover:bg-slate-50"
        >
            ← Back
        </a>

    </div>


    {{-- VALIDATION ERRORS --}}
    @if($errors->any())

        <div class="mb-5 rounded-2xl border border-rose-200
                    bg-rose-50 p-4">

            <div class="font-bold text-rose-700">
                Please fix the following errors:
            </div>

            <ul class="mt-2 list-disc space-y-1 pl-5
                       text-sm text-rose-600">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    <form
        method="POST"
        action="{{ route('products.update', $product) }}"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')


        <div class="grid gap-6 lg:grid-cols-[minmax(0,1fr)_360px]">

            {{-- ========================================================= --}}
            {{-- LEFT --}}
            {{-- ========================================================= --}}

            <div class="space-y-6">

                {{-- BASIC INFORMATION --}}
                <div
                    class="rounded-2xl border border-slate-200
                           bg-white p-5 shadow-card sm:p-6"
                >

                    <h3 class="font-extrabold text-slate-900">
                        Basic Information
                    </h3>


                    <div class="mt-5 grid gap-5 sm:grid-cols-2">

                        {{-- NAME --}}
                        <div class="sm:col-span-2">

                            <label class="mb-2 block text-sm
                                          font-bold text-slate-700">

                                Product Name

                                <span class="text-rose-500">*</span>

                            </label>

                            <input
                                type="text"
                                name="name"
                                required
                                value="{{ old(
                                    'name',
                                    $product->name
                                ) }}"
                                class="w-full rounded-xl border
                                       border-slate-200 px-4 py-3
                                       text-sm outline-none
                                       focus:border-brand-500
                                       focus:ring-4
                                       focus:ring-brand-100"
                            >

                        </div>


                        {{-- CATEGORY --}}
                        <div>

                            <label class="mb-2 block text-sm
                                          font-bold text-slate-700">
                                Category
                            </label>

                            <input
                                type="text"
                                name="category"
                                list="categoryOptions"
                                value="{{ old(
                                    'category',
                                    $product->category
                                ) }}"
                                class="w-full rounded-xl border
                                       border-slate-200 px-4 py-3
                                       text-sm outline-none
                                       focus:border-brand-500"
                            >

                            <datalist id="categoryOptions">

                                @foreach($categories as $category)
                                    <option value="{{ $category }}">
                                @endforeach

                                <option value="Agriculture Machine">
                                <option value="Agriculture Tools">
                                <option value="Sprayer">
                                <option value="Cultivator">
                                <option value="Seeder">
                                <option value="Harvester">
                                <option value="Power Tools">
                                <option value="Farm Equipment">
                                <option value="Irrigation">
                                <option value="Crop Protection">

                            </datalist>

                        </div>


                        {{-- UNIT --}}
                        <div>

                            <label class="mb-2 block text-sm
                                          font-bold text-slate-700">
                                Unit
                            </label>

                            <input
                                type="text"
                                name="unit"
                                value="{{ old(
                                    'unit',
                                    $product->unit
                                ) }}"
                                placeholder="piece / set / machine"
                                class="w-full rounded-xl border
                                       border-slate-200 px-4 py-3
                                       text-sm outline-none
                                       focus:border-brand-500"
                            >

                        </div>


                        {{-- PRICE --}}
                        <div>

                            <label class="mb-2 block text-sm
                                          font-bold text-slate-700">
                                Price
                            </label>

                            <div class="relative">

                                <span
                                    class="absolute left-4 top-1/2
                                           -translate-y-1/2
                                           text-slate-400"
                                >
                                    ₹
                                </span>

                                <input
                                    type="number"
                                    name="price"
                                    value="{{ old(
                                        'price',
                                        $product->price
                                    ) }}"
                                    step="0.01"
                                    min="0"
                                    class="w-full rounded-xl
                                           border border-slate-200
                                           py-3 pl-8 pr-4
                                           text-sm outline-none
                                           focus:border-brand-500"
                                >

                            </div>

                        </div>


                        {{-- STOCK --}}
                        <div>

                            <label class="mb-2 block text-sm
                                          font-bold text-slate-700">
                                Stock Quantity
                            </label>

                            <input
                                type="number"
                                name="stock"
                                value="{{ old(
                                    'stock',
                                    $product->stock
                                ) }}"
                                min="0"
                                class="w-full rounded-xl border
                                       border-slate-200 px-4 py-3
                                       text-sm outline-none
                                       focus:border-brand-500"
                            >

                        </div>


                        {{-- SHORT DESCRIPTION --}}
                        <div class="sm:col-span-2">

                            <label class="mb-2 block text-sm
                                          font-bold text-slate-700">
                                Short Description
                            </label>

                            <textarea
                                name="short_description"
                                rows="3"
                                maxlength="500"
                                class="w-full resize-none rounded-xl
                                       border border-slate-200
                                       px-4 py-3 text-sm outline-none
                                       focus:border-brand-500"
                            >{{ old(
                                'short_description',
                                $product->short_description
                            ) }}</textarea>

                        </div>


                        {{-- FULL DESCRIPTION --}}
                        <div class="sm:col-span-2">

                            <label class="mb-2 block text-sm
                                          font-bold text-slate-700">
                                Full Description
                            </label>

                            <textarea
                                name="description"
                                rows="7"
                                class="w-full resize-y rounded-xl
                                       border border-slate-200
                                       px-4 py-3 text-sm outline-none
                                       focus:border-brand-500"
                            >{{ old(
                                'description',
                                $product->description
                            ) }}</textarea>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- EXISTING GALLERY --}}
                {{-- ================================================= --}}

                <div
                    class="rounded-2xl border border-slate-200
                           bg-white p-5 shadow-card sm:p-6"
                >

                    <div>

                        <h3 class="font-extrabold text-slate-900">
                            Product Gallery
                        </h3>

                        <p class="mt-1 text-xs text-slate-400">
                            Manage existing images or upload new images.
                        </p>

                    </div>


                    @if($product->images->count())

                        <div class="mt-5 grid grid-cols-2 gap-4
                                    sm:grid-cols-3 md:grid-cols-4">

                            @foreach($product->images as $galleryImage)

                                <label
                                    class="gallery-existing-image
                                           group relative cursor-pointer
                                           overflow-hidden rounded-xl
                                           border border-slate-200
                                           bg-slate-50"
                                >

                                    <div class="aspect-square">

                                        <img
                                            src="{{ Storage::url(
                                                $galleryImage->image
                                            ) }}"
                                            alt="{{ $galleryImage->alt_text
                                                ?: $product->name }}"
                                            class="h-full w-full object-cover"
                                        >

                                    </div>


                                    <div
                                        class="flex items-center gap-2
                                               border-t border-slate-100
                                               bg-white px-3 py-2"
                                    >

                                        <input
                                            type="checkbox"
                                            name="remove_gallery_images[]"
                                            value="{{ $galleryImage->id }}"
                                            class="remove-gallery-checkbox
                                                   h-4 w-4
                                                   accent-rose-600"
                                        >

                                        <span
                                            class="text-[11px]
                                                   font-bold
                                                   text-rose-600"
                                        >
                                            Remove
                                        </span>

                                    </div>


                                    <div
                                        class="delete-overlay
                                               pointer-events-none
                                               absolute inset-0
                                               hidden items-center
                                               justify-center
                                               bg-rose-900/50"
                                    >

                                        <span
                                            class="rounded-lg bg-white
                                                   px-3 py-1.5
                                                   text-xs font-bold
                                                   text-rose-600"
                                        >
                                            Will be removed
                                        </span>

                                    </div>

                                </label>

                            @endforeach

                        </div>

                    @else

                        <div
                            class="mt-5 rounded-xl border
                                   border-dashed border-slate-200
                                   bg-slate-50 p-6 text-center
                                   text-sm text-slate-400"
                        >
                            No additional gallery images added yet.
                        </div>

                    @endif


                    {{-- ADD NEW IMAGES --}}
                    <label
                        for="galleryImagesInput"
                        class="mt-5 flex cursor-pointer
                               items-center justify-center
                               rounded-2xl border-2 border-dashed
                               border-slate-200 bg-slate-50
                               px-5 py-7 text-center
                               transition hover:border-brand-400
                               hover:bg-brand-50"
                    >

                        <div>

                            <svg
                                class="mx-auto h-9 w-9
                                       text-slate-300"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                            >
                                <path d="M4 5h16v14H4z"/>
                                <circle cx="9" cy="10" r="2"/>
                                <path d="M4 17l5-5 3 3 3-2 5 4"/>
                            </svg>

                            <div class="mt-2 text-sm
                                        font-bold text-slate-600">
                                Add More Images
                            </div>

                            <div class="mt-1 text-xs
                                        text-slate-400">
                                Select multiple images
                            </div>

                        </div>

                    </label>


                    <input
                        id="galleryImagesInput"
                        type="file"
                        name="gallery_images[]"
                        multiple
                        accept="image/jpeg,image/png,image/webp"
                        class="hidden"
                    >


                    {{-- NEW IMAGE PREVIEW --}}
                    <div
                        id="galleryPreview"
                        class="mt-5 hidden grid-cols-2 gap-4
                               sm:grid-cols-3 md:grid-cols-4"
                    >
                    </div>

                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- RIGHT --}}
            {{-- ========================================================= --}}

            <div class="space-y-6">

                {{-- FEATURE IMAGE --}}
                <div
                    class="rounded-2xl border border-slate-200
                           bg-white p-5 shadow-card"
                >

                    <h3 class="font-extrabold text-slate-900">
                        Feature Image
                    </h3>

                    <p class="mt-1 text-xs text-slate-400">
                        Main image used on product listing.
                    </p>


                    <label
                        for="imageInput"
                        class="mt-4 flex aspect-square
                               cursor-pointer items-center
                               justify-center overflow-hidden
                               rounded-2xl border
                               border-slate-200 bg-slate-50"
                    >

                        @if($product->image)

                            <img
                                id="imagePreview"
                                src="{{ Storage::url(
                                    $product->image
                                ) }}"
                                alt="{{ $product->name }}"
                                class="h-full w-full object-cover"
                            >

                            <div
                                id="uploadPlaceholder"
                                class="hidden text-center
                                       text-slate-400"
                            >
                                No image
                            </div>

                        @else

                            <img
                                id="imagePreview"
                                src=""
                                alt=""
                                class="hidden h-full
                                       w-full object-cover"
                            >

                            <div
                                id="uploadPlaceholder"
                                class="p-5 text-center"
                            >

                                <svg
                                    class="mx-auto h-10 w-10
                                           text-slate-300"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                >
                                    <path d="M4 5h16v14H4z"/>
                                    <circle cx="9" cy="10" r="2"/>
                                    <path d="M4 17l5-5 3 3 3-2 5 4"/>
                                </svg>

                                <div
                                    class="mt-3 text-sm
                                           font-semibold
                                           text-slate-500"
                                >
                                    Upload Feature Image
                                </div>

                            </div>

                        @endif

                    </label>


                    <input
                        id="imageInput"
                        type="file"
                        name="image"
                        accept="image/jpeg,image/png,image/webp"
                        class="mt-4 block w-full
                               text-xs text-slate-500
                               file:mr-3
                               file:rounded-lg
                               file:border-0
                               file:bg-brand-50
                               file:px-4
                               file:py-2.5
                               file:text-xs
                               file:font-bold
                               file:text-brand-700"
                    >

                    <p class="mt-2 text-[11px] text-slate-400">
                        Leave empty to keep existing feature image.
                        Maximum size 5 MB.
                    </p>

                </div>


                {{-- SETTINGS --}}
                <div
                    class="rounded-2xl border border-slate-200
                           bg-white p-5 shadow-card"
                >

                    <h3 class="font-extrabold text-slate-900">
                        Product Settings
                    </h3>


                    <div class="mt-5 space-y-5">

                        {{-- SORT ORDER --}}
                        <div>

                            <label class="mb-2 block text-sm
                                          font-bold text-slate-700">
                                Sort Order
                            </label>

                            <input
                                type="number"
                                name="sort_order"
                                min="0"
                                value="{{ old(
                                    'sort_order',
                                    $product->sort_order
                                ) }}"
                                class="w-full rounded-xl border
                                       border-slate-200 px-4 py-3
                                       text-sm outline-none
                                       focus:border-brand-500"
                            >

                            <p class="mt-1 text-[11px]
                                      text-slate-400">
                                Smaller number appears first.
                            </p>

                        </div>


                        {{-- ACTIVE --}}
                        <label class="flex cursor-pointer
                                      items-start gap-3">

                            <input
                                type="checkbox"
                                name="is_active"
                                value="1"
                                @checked(
                                    old(
                                        'is_active',
                                        $product->is_active
                                    )
                                )
                                class="mt-1 h-4 w-4
                                       accent-brand-700"
                            >

                            <span>

                                <span
                                    class="block text-sm
                                           font-bold text-slate-700"
                                >
                                    Active Product
                                </span>

                                <span
                                    class="text-xs text-slate-400"
                                >
                                    Product appears on website.
                                </span>

                            </span>

                        </label>


                        {{-- FEATURED --}}
                        <label class="flex cursor-pointer
                                      items-start gap-3">

                            <input
                                type="checkbox"
                                name="is_featured"
                                value="1"
                                @checked(
                                    old(
                                        'is_featured',
                                        $product->is_featured
                                    )
                                )
                                class="mt-1 h-4 w-4
                                       accent-violet-600"
                            >

                            <span>

                                <span
                                    class="block text-sm
                                           font-bold text-slate-700"
                                >
                                    Featured Product
                                </span>

                                <span
                                    class="text-xs text-slate-400"
                                >
                                    Highlight this product.
                                </span>

                            </span>

                        </label>

                    </div>

                </div>


                {{-- UPDATE --}}
                <button
                    type="submit"
                    class="flex w-full items-center
                           justify-center gap-2 rounded-xl
                           bg-brand-700 px-5 py-3.5
                           text-sm font-bold text-white
                           shadow-md transition
                           hover:bg-brand-800"
                >
                    Update Product
                </button>

            </div>

        </div>

    </form>

</div>

@endsection


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Feature Image Preview
    |--------------------------------------------------------------------------
    */

    const imageInput =
        document.getElementById('imageInput');

    const imagePreview =
        document.getElementById('imagePreview');

    const uploadPlaceholder =
        document.getElementById('uploadPlaceholder');


    imageInput.addEventListener('change', function (event) {

        const file = event.target.files[0];

        if (!file) {
            return;
        }

        const reader = new FileReader();

        reader.onload = function (e) {

            imagePreview.src = e.target.result;

            imagePreview.classList.remove('hidden');

            if (uploadPlaceholder) {
                uploadPlaceholder.classList.add('hidden');
            }
        };

        reader.readAsDataURL(file);

    });


    /*
    |--------------------------------------------------------------------------
    | New Gallery Images Preview
    |--------------------------------------------------------------------------
    */

    const galleryInput =
        document.getElementById('galleryImagesInput');

    const galleryPreview =
        document.getElementById('galleryPreview');


    galleryInput.addEventListener('change', function () {

        galleryPreview.innerHTML = '';

        const files = Array.from(this.files);

        if (files.length === 0) {

            galleryPreview.classList.add('hidden');
            galleryPreview.classList.remove('grid');

            return;
        }

        galleryPreview.classList.remove('hidden');
        galleryPreview.classList.add('grid');


        files.forEach(function (file, index) {

            const reader = new FileReader();

            reader.onload = function (event) {

                const wrapper =
                    document.createElement('div');

                wrapper.className =
                    'relative overflow-hidden rounded-xl ' +
                    'border border-slate-200 bg-slate-50';


                wrapper.innerHTML = `
                    <div class="aspect-square">

                        <img
                            src="${event.target.result}"
                            alt="New Image ${index + 1}"
                            class="h-full w-full object-cover"
                        >

                    </div>

                    <div
                        class="border-t border-slate-100
                               bg-white px-2 py-1.5
                               text-center text-[10px]
                               font-semibold text-brand-600"
                    >
                        New Image ${index + 1}
                    </div>
                `;

                galleryPreview.appendChild(wrapper);
            };

            reader.readAsDataURL(file);
        });

    });


    /*
    |--------------------------------------------------------------------------
    | Existing Image Remove Preview
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll('.remove-gallery-checkbox')
        .forEach(function (checkbox) {

            checkbox.addEventListener('change', function () {

                const card =
                    this.closest('.gallery-existing-image');

                const overlay =
                    card.querySelector('.delete-overlay');


                if (this.checked) {

                    overlay.classList.remove('hidden');

                    overlay.classList.add('flex');

                    card.classList.add(
                        'border-rose-300'
                    );

                } else {

                    overlay.classList.add('hidden');

                    overlay.classList.remove('flex');

                    card.classList.remove(
                        'border-rose-300'
                    );
                }

            });

        });

});

</script>

@endpush