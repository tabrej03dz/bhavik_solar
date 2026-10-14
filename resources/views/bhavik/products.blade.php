
@extends('layouts.website')

@section('title', 'Solar Products | Bhavik Solar')

@section('content')

{{-- =====================================================
    HERO SECTION
===================================================== --}}
<section class="relative overflow-hidden bg-[#062d24] text-white">

    <div class="absolute -right-32 -top-32 h-96 w-96 rounded-full bg-emerald-500/20 blur-3xl"></div>

    <div class="absolute -bottom-32 left-10 h-80 w-80 rounded-full bg-lime-400/10 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-5 py-20 lg:px-8 md:py-28">

        <div class="max-w-4xl">

            <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-lime-300/20 bg-white/10 px-4 py-2 text-xs font-extrabold uppercase tracking-[.2em] text-lime-300">

                <i data-lucide="sun" class="h-4 w-4"></i>

                BHAVIK SOLAR PRODUCTS

            </div>

            <h1 class="text-5xl font-black leading-tight tracking-tight md:text-7xl">

                Smart Solar Products.

                <span class="block text-lime-400">
                    Sustainable Future.
                </span>

            </h1>

            <p class="mt-7 max-w-2xl text-lg leading-8 text-emerald-100/75">

                Discover our range of solar panels, inverters,
                rooftop systems, solar pumps and advanced
                renewable energy solutions.

            </p>

            <div class="mt-9 flex flex-wrap gap-4">

                <a href="#products-section"
                   class="inline-flex items-center gap-2 rounded-full bg-lime-400 px-7 py-3.5 text-sm font-extrabold text-emerald-950 transition hover:bg-lime-300">

                    Explore Products

                    <i data-lucide="arrow-down" class="h-4 w-4"></i>

                </a>

                <a href="{{ route('contact') }}"
                   class="inline-flex items-center gap-2 rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold transition hover:bg-white/10">

                    Get a Quote

                    <i data-lucide="arrow-up-right" class="h-4 w-4"></i>

                </a>

            </div>

            <div class="mt-10 text-sm text-emerald-100/60">

                <a href="{{ route('home') }}" class="hover:text-white">
                    Home
                </a>

                <span class="mx-2">/</span>

                Solar Products

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
    PRODUCTS SECTION
===================================================== --}}
<section id="products-section" class="bg-[#f4f8f5] py-16 md:py-24">

    <div class="mx-auto max-w-7xl px-5 lg:px-8">

        {{-- SECTION HEADER --}}
        <div class="mb-12">

            <p class="mb-4 text-xs font-black uppercase tracking-[.25em] text-emerald-600">
                Our Product Collection
            </p>

            <h2 class="text-4xl font-black tracking-tight text-slate-950 md:text-5xl">

                Explore Our Solar Products

            </h2>

            <p class="mt-5 max-w-3xl text-lg leading-8 text-slate-600">

                Browse our renewable energy products designed
                for residential, commercial and industrial requirements.

            </p>

        </div>


        {{-- =================================================
            SEARCH AND CATEGORY FILTER
        ================================================= --}}
        @php

            $categories = $managedProducts
                ->pluck('category')
                ->filter()
                ->unique()
                ->sort()
                ->values();

        @endphp

        <div class="mb-10 rounded-3xl border border-slate-200 bg-white p-5 shadow-sm md:p-7">

            <div class="grid gap-4 md:grid-cols-12">

                {{-- SEARCH --}}
                <div class="md:col-span-7">

                    <label for="productSearch"
                           class="mb-2 block text-xs font-extrabold uppercase tracking-wider text-slate-500">

                        Search Products

                    </label>

                    <div class="relative">

                        <i data-lucide="search"
                           class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400">
                        </i>

                        <input
                            type="search"
                            id="productSearch"
                            placeholder="Search solar panel, inverter, pump..."
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3.5 pl-12 pr-4 text-sm outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100"
                        >

                    </div>

                </div>


                {{-- CATEGORY FILTER --}}
                <div class="md:col-span-5">

                    <label for="productCategory"
                           class="mb-2 block text-xs font-extrabold uppercase tracking-wider text-slate-500">

                        Product Category

                    </label>

                    <select
                        id="productCategory"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100"
                    >

                        <option value="">
                            All Categories
                        </option>

                        @foreach($categories as $category)

                            <option value="{{ $category }}">
                                {{ $category }}
                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

        </div>


        {{-- PRODUCT COUNTER --}}
        <div class="mb-7 flex flex-wrap items-center justify-between gap-4">

            <div>

                <h3 class="text-xl font-extrabold text-slate-950">
                    Available Solar Products
                </h3>

                <p class="mt-1 text-sm text-slate-500">

                    Showing
                    <span id="visibleProductCount">
                        {{ $managedProducts->count() }}
                    </span>
                    products

                </p>

            </div>

            <div class="inline-flex items-center gap-2 rounded-full border border-emerald-100 bg-emerald-50 px-4 py-2 text-xs font-bold text-emerald-700">

                <i data-lucide="leaf" class="h-4 w-4"></i>

                Clean Energy Solutions

            </div>

        </div>


        {{-- =================================================
            DYNAMIC PRODUCTS GRID
        ================================================= --}}
        @if($managedProducts->isNotEmpty())

            <div id="productsGrid"
                 class="grid gap-7 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                @foreach($managedProducts as $product)

                    @php
                        $searchContent = strtolower(
                            ($product->name ?? '') . ' ' .
                            ($product->category ?? '') . ' ' .
                            ($product->short_description ?? '') . ' ' .
                            strip_tags($product->description ?? '')
                        );

                        $whatsappMessage =
                            'Hello Bhavik Solar, I want to enquire about ' .
                            $product->name . '.';

                        $whatsappUrl =
                            'https://wa.me/918093870837?text=' .
                            rawurlencode($whatsappMessage);
                    @endphp

                    <article
                        class="product-card group flex h-full flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-emerald-300 hover:shadow-2xl hover:shadow-emerald-900/10"

                        data-search="{{ $searchContent }}"
                        data-category="{{ $product->category }}"
                    >

                        {{-- PRODUCT IMAGE --}}
                        <div class="relative h-64 overflow-hidden bg-[#eef5f0]">

                            @php
                                $productImage = $product->image_url
                                    ?? (!empty($product->image)
                                        ? asset('storage/' . $product->image)
                                        : null);
                            @endphp

                            @if($productImage)

                                <img
                                    src="{{ $productImage }}"
                                    alt="{{ $product->name }}"
                                    loading="lazy"
                                    class="h-full w-full object-contain p-5 transition duration-500 group-hover:scale-105"
                                >

                            @else

                                <div class="flex h-full w-full flex-col items-center justify-center bg-gradient-to-br from-[#063d30] to-emerald-700 text-white">

                                    <i data-lucide="sun" class="h-16 w-16 text-lime-300"></i>

                                    <span class="mt-5 text-sm font-black tracking-widest">

                                        BHAVIK SOLAR

                                    </span>

                                </div>

                            @endif


                            {{-- FEATURED BADGE --}}
                            @if($product->is_featured)

                                <span class="absolute left-4 top-4 rounded-full bg-lime-400 px-3 py-1.5 text-[10px] font-extrabold uppercase tracking-wider text-emerald-950 shadow">

                                    Featured

                                </span>

                            @endif


                            {{-- CATEGORY --}}
                            @if($product->category)

                                <span class="absolute bottom-4 left-4 max-w-[90%] truncate rounded-full bg-white/95 px-3 py-1.5 text-xs font-extrabold text-emerald-800 shadow">

                                    {{ $product->category }}

                                </span>

                            @endif

                        </div>


                        {{-- PRODUCT DETAILS --}}
                        <div class="flex flex-1 flex-col p-6">

                            <h3 class="text-xl font-extrabold leading-snug text-slate-950 transition group-hover:text-emerald-700">

                                {{ $product->name }}

                            </h3>


                            {{-- SHORT DESCRIPTION --}}
                            <p class="mt-3 min-h-[72px] text-sm leading-6 text-slate-600">

                                {{ \Illuminate\Support\Str::limit(
                                    $product->short_description
                                        ?: strip_tags($product->description ?? ''),
                                    130
                                ) }}

                            </p>


                            {{-- PRICE --}}
                            @if($product->price !== null)

                                <div class="mt-5 border-t border-slate-100 pt-5">

                                    <span class="text-xs font-semibold text-slate-400">
                                        Product Price
                                    </span>

                                    <div class="mt-1 flex items-center gap-2">

                                        <span class="text-2xl font-black text-emerald-800">

                                            ₹{{ number_format((float) $product->price, 2) }}

                                        </span>

                                        @if($product->unit)

                                            <span class="text-xs text-slate-400">

                                                / {{ $product->unit }}

                                            </span>

                                        @endif

                                    </div>

                                </div>

                            @else

                                <div class="mt-5 border-t border-slate-100 pt-5">

                                    <span class="text-xs font-semibold text-slate-400">
                                        Product Pricing
                                    </span>

                                    <p class="mt-1 text-lg font-bold text-emerald-700">
                                        Request a Quote
                                    </p>

                                </div>

                            @endif


                            {{-- BUTTONS --}}
                            <div class="mt-auto grid grid-cols-2 gap-3 pt-6">

                                <a
                                    href="{{ route('contact', ['product' => $product->name]) }}"
                                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-emerald-200 px-3 py-3 text-xs font-extrabold text-emerald-800 transition hover:bg-emerald-50"
                                >

                                    Get Quote

                                    <i data-lucide="arrow-up-right" class="h-4 w-4"></i>

                                </a>


                                <a
                                    href="{{ $whatsappUrl }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-700 px-3 py-3 text-xs font-extrabold text-white transition hover:bg-emerald-900"
                                >

                                    Enquire Now

                                    <i data-lucide="message-circle" class="h-4 w-4"></i>

                                </a>

                            </div>

                        </div>

                    </article>

                @endforeach

            </div>


            {{-- NO SEARCH RESULTS --}}
            <div
                id="noProductsFound"
                class="hidden rounded-3xl border border-slate-200 bg-white px-6 py-20 text-center shadow-sm"
            >

                <i data-lucide="package-search"
                   class="mx-auto h-14 w-14 text-emerald-700">
                </i>

                <h3 class="mt-6 text-2xl font-extrabold text-slate-950">
                    No Products Found
                </h3>

                <p class="mt-3 text-slate-500">
                    Try another keyword or select a different category.
                </p>

                <button
                    type="button"
                    id="clearProductFilters"
                    class="mt-6 rounded-xl bg-emerald-700 px-6 py-3 text-sm font-bold text-white hover:bg-emerald-900"
                >
                    Clear Filters
                </button>

            </div>

        @else

            {{-- DATABASE EMPTY --}}
            <div class="rounded-3xl border border-slate-200 bg-white px-6 py-20 text-center shadow-sm">

                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-emerald-50">

                    <i data-lucide="package"
                       class="h-10 w-10 text-emerald-700">
                    </i>

                </div>

                <h3 class="mt-6 text-2xl font-extrabold text-slate-950">

                    Products Coming Soon

                </h3>

                <p class="mx-auto mt-3 max-w-md text-slate-500">

                    Our solar product collection will be available soon.
                    Contact us for product information.

                </p>

                <a
                    href="{{ route('contact') }}"
                    class="mt-7 inline-flex rounded-xl bg-emerald-700 px-6 py-3 font-bold text-white hover:bg-emerald-900"
                >
                    Contact Our Team
                </a>

            </div>

        @endif

    </div>

</section>


{{-- =====================================================
    WHY CHOOSE BHAVIK SOLAR
===================================================== --}}
<section class="bg-white py-20">

    <div class="mx-auto max-w-7xl px-5 lg:px-8">

        <div class="mx-auto mb-12 max-w-2xl text-center">

            <p class="mb-3 text-xs font-black uppercase tracking-[.25em] text-emerald-600">

                Why Choose Us

            </p>

            <h2 class="text-3xl font-black text-slate-950 md:text-5xl">

                Why Bhavik Solar?

            </h2>

            <p class="mt-5 text-slate-600">

                Helping homes and businesses move towards smarter,
                cleaner and sustainable energy solutions.

            </p>

        </div>

        <div class="grid gap-6 md:grid-cols-3">

            <div class="rounded-3xl border border-slate-100 bg-[#f4f8f5] p-8">

                <div class="mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-800">

                    <i data-lucide="sun" class="h-7 w-7"></i>

                </div>

                <h3 class="text-xl font-extrabold text-slate-950">
                    Quality Solar Solutions
                </h3>

                <p class="mt-3 leading-7 text-slate-600">

                    Explore solar energy products for residential,
                    commercial and industrial applications.

                </p>

            </div>


            <div class="rounded-3xl border border-slate-100 bg-[#f4f8f5] p-8">

                <div class="mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-800">

                    <i data-lucide="wrench" class="h-7 w-7"></i>

                </div>

                <h3 class="text-xl font-extrabold text-slate-950">
                    Installation Support
                </h3>

                <p class="mt-3 leading-7 text-slate-600">

                    Solar system planning, installation support
                    and technical guidance.

                </p>

            </div>


            <div class="rounded-3xl border border-slate-100 bg-[#f4f8f5] p-8">

                <div class="mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-800">

                    <i data-lucide="headset" class="h-7 w-7"></i>

                </div>

                <h3 class="text-xl font-extrabold text-slate-950">
                    Customer Assistance
                </h3>

                <p class="mt-3 leading-7 text-slate-600">

                    Contact our team for product enquiries,
                    quotations and assistance.

                </p>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
    CALL TO ACTION
===================================================== --}}
<section class="bg-[#072d25] py-20 text-white">

    <div class="mx-auto flex max-w-7xl flex-col items-start justify-between gap-9 px-5 lg:flex-row lg:items-center lg:px-8">

        <div class="max-w-2xl">

            <p class="mb-4 text-xs font-black uppercase tracking-[.25em] text-lime-300">
                Switch To Solar
            </p>

            <h2 class="text-3xl font-black leading-tight md:text-5xl">

                Ready to Start Your

                <span class="text-lime-400">
                    Solar Journey?
                </span>

            </h2>

            <p class="mt-5 text-lg text-emerald-100/75">

                Talk to Bhavik Solar for product details,
                pricing and solar installation solutions.

            </p>

        </div>

        <div class="flex flex-wrap gap-4">

            <a
                href="{{ route('contact') }}"
                class="inline-flex items-center gap-2 rounded-full bg-lime-400 px-7 py-4 text-sm font-extrabold text-emerald-950 transition hover:bg-lime-300"
            >

                Get Free Consultation

                <i data-lucide="arrow-up-right" class="h-4 w-4"></i>

            </a>

            <a
                href="tel:+918093870837"
                class="inline-flex items-center gap-2 rounded-full border border-white/30 bg-white/10 px-7 py-4 text-sm font-extrabold text-white transition hover:bg-white/20"
            >

                <i data-lucide="phone" class="h-4 w-4"></i>

                Call 8093870837

            </a>

        </div>

    </div>

</section>

@endsection


{{-- =====================================================
    LIVE PRODUCT SEARCH JAVASCRIPT
===================================================== --}}
@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('productSearch');
    const categorySelect = document.getElementById('productCategory');

    const productCards = document.querySelectorAll('.product-card');

    const productCounter = document.getElementById('visibleProductCount');

    const noProductsFound = document.getElementById('noProductsFound');

    const clearFilters = document.getElementById('clearProductFilters');


    function filterProducts() {

        const search = (searchInput?.value || '')
            .toLowerCase()
            .trim();

        const category = categorySelect?.value || '';

        let visibleCount = 0;


        productCards.forEach(function(card) {

            const searchContent = (card.dataset.search || '')
                .toLowerCase();

            const productCategory = card.dataset.category || '';

            const matchesSearch = searchContent.includes(search);

            const matchesCategory =
                category === '' || productCategory === category;

            const shouldShow =
                matchesSearch && matchesCategory;


            card.classList.toggle('hidden', !shouldShow);

            if (shouldShow) {
                visibleCount++;
            }

        });


        if (productCounter) {
            productCounter.textContent = visibleCount;
        }

        if (noProductsFound) {

            noProductsFound.classList.toggle(
                'hidden',
                visibleCount !== 0
            );

        }

    }


    searchInput?.addEventListener('input', filterProducts);

    categorySelect?.addEventListener('change', filterProducts);


    clearFilters?.addEventListener('click', function() {

        if (searchInput) {
            searchInput.value = '';
        }

        if (categorySelect) {
            categorySelect.value = '';
        }

        filterProducts();

        searchInput?.focus();

    });

});
</script>

@endpush
