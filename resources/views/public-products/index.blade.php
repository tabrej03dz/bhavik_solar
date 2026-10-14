<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        All Products | Kalindri Agritech Private Limited
    </title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>

        tailwind.config = {

            theme: {

                extend: {

                    colors: {

                        forest: {
                            50: '#effaf1',
                            100: '#daf2df',
                            200: '#b7e6c2',
                            300: '#85d293',
                            400: '#50b968',
                            500: '#2c9a49',
                            600: '#1d7c39',
                            700: '#17632f',
                            800: '#145028',
                            900: '#123f22',
                            950: '#082412'
                        },

                        kal: {
                            50: '#f7f8ec',
                            100: '#eef0cf',
                            500: '#858a2d',
                            700: '#555a21'
                        },

                        gold: '#c99a18'
                    },

                    boxShadow: {

                        soft:
                            '0 20px 60px rgba(13,62,33,.10)'

                    }

                }

            }

        };

    </script>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Manrope:wght@600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        body {
            font-family: Inter, sans-serif;
        }

        h1,
        h2,
        h3,
        h4 {
            font-family: Manrope, sans-serif;
        }

        .product-image {
            transition: transform .45s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.06);
        }

    </style>

</head>


<body
    class="bg-[#f8faf8]
           text-slate-800"
>


{{-- ============================================================ --}}
{{-- TOP BAR --}}
{{-- ============================================================ --}}

<div
    class="bg-forest-950
           text-white/80"
>

    <div
        class="mx-auto flex
               max-w-7xl
               flex-col gap-2
               px-4 py-2.5
               text-xs
               sm:flex-row
               sm:items-center
               sm:justify-between
               sm:px-6
               lg:px-8"
    >

        <div
            class="flex flex-wrap
                   gap-4"
        >

            <a
                href="tel:+918840702499"
                class="hover:text-white"
            >
                📞 +91 88407 02499
            </a>


            <a
                href="mailto:kalindriagritechprivatelimited@gmail.com"
                class="hover:text-white"
            >
                ✉ kalindriagritechprivatelimited@gmail.com
            </a>

        </div>


        <div class="font-semibold">
            Kalindri Agritech Private Limited
        </div>

    </div>

</div>


{{-- ============================================================ --}}
{{-- HEADER --}}
{{-- ============================================================ --}}

<header
    class="sticky top-0 z-50
           border-b border-slate-200
           bg-white/95
           backdrop-blur"
>

    <div
        class="mx-auto flex
               max-w-7xl
               items-center
               justify-between
               px-4 py-3
               sm:px-6 lg:px-8"
    >

        <a
            href="{{ route('home') }}"
            class="flex items-center gap-3"
        >

            <img
                src="{{ asset('images/kalindri-logo.png') }}"
                alt="Kalindri Agritech"
                class="h-14 w-20
                       object-contain"
            >


            <div class="hidden sm:block">

                <div
                    class="text-lg
                           font-extrabold
                           text-forest-950"
                >
                    KALINDRI

                    <span class="text-gold">
                        AGRITECH
                    </span>
                </div>

                <div
                    class="text-[9px]
                           font-bold
                           uppercase
                           tracking-[.18em]
                           text-slate-400"
                >
                    Private Limited
                </div>

            </div>

        </a>


        <div
            class="flex items-center gap-2"
        >

            <a
                href="{{ route('home') }}"
                class="hidden
                       rounded-full
                       px-4 py-2.5
                       text-sm
                       font-bold
                       text-slate-600
                       hover:bg-slate-50
                       sm:block"
            >
                Home
            </a>


            <a
                href="{{ route('home') }}#contact"
                class="rounded-full
                       bg-forest-700
                       px-5 py-3
                       text-sm
                       font-extrabold
                       text-white
                       transition
                       hover:bg-forest-800"
            >
                Contact Us
            </a>

        </div>

    </div>

</header>


{{-- ============================================================ --}}
{{-- PAGE HERO --}}
{{-- ============================================================ --}}

<section
    class="relative
           overflow-hidden
           bg-forest-950
           py-16 text-white
           sm:py-20"
>

    <div
        class="absolute
               -right-32 -top-32
               h-96 w-96
               rounded-full
               bg-green-400/10
               blur-3xl"
    ></div>


    <div
        class="relative mx-auto
               max-w-7xl
               px-4 sm:px-6
               lg:px-8"
    >

        <a
            href="{{ route('home') }}"
            class="inline-flex
                   items-center gap-2
                   text-sm
                   font-bold
                   text-white/60
                   hover:text-white"
        >
            ← Back to Home
        </a>


        <div
            class="mt-8
                   max-w-3xl"
        >

            <div
                class="text-xs
                       font-extrabold
                       uppercase
                       tracking-[.2em]
                       text-yellow-400"
            >
                Product Catalogue
            </div>


            <h1
                class="mt-4
                       text-4xl
                       font-extrabold
                       sm:text-5xl"
            >
                All Agriculture Products
            </h1>


            <p
                class="mt-5
                       max-w-2xl
                       text-sm
                       leading-7
                       text-white/65
                       sm:text-base"
            >
                Browse Kalindri Agritech's complete range
                of crop nutrition, humic, bio,
                micronutrient, granule and crop protection
                products.
            </p>

        </div>

    </div>

</section>


{{-- ============================================================ --}}
{{-- PRODUCTS --}}
{{-- ============================================================ --}}

<section class="py-16">

    <div
        class="mx-auto
               max-w-7xl
               px-4 sm:px-6
               lg:px-8"
    >


        {{-- FILTER BOX --}}

        <form
            method="GET"
            action="{{ route('catalog.index') }}"
            class="rounded-2xl
                   border border-slate-200
                   bg-white
                   p-4 shadow-sm"
        >

            <div
                class="grid gap-4
                       md:grid-cols-[1fr_280px_auto]"
            >


                {{-- SEARCH --}}

                <div>

                    <label
                        class="mb-2 block
                               text-xs
                               font-bold
                               text-slate-600"
                    >
                        Search Product
                    </label>

                    <input
                        type="search"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Product name, category..."
                        class="w-full
                               rounded-xl
                               border
                               border-slate-200
                               px-4 py-3
                               text-sm
                               outline-none
                               transition
                               focus:border-forest-500
                               focus:ring-4
                               focus:ring-forest-100"
                    >

                </div>


                {{-- CATEGORY --}}

                <div>

                    <label
                        class="mb-2 block
                               text-xs
                               font-bold
                               text-slate-600"
                    >
                        Category
                    </label>

                    <select
                        name="category"
                        class="w-full
                               rounded-xl
                               border
                               border-slate-200
                               bg-white
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-forest-500"
                    >

                        <option value="">
                            All Categories
                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category }}"
                                @selected(
                                    request('category')
                                    ===
                                    $category
                                )
                            >
                                {{ $category }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- BUTTONS --}}

                <div
                    class="flex items-end
                           gap-2"
                >

                    <button
                        type="submit"
                        class="rounded-xl
                               bg-forest-700
                               px-5 py-3
                               text-sm
                               font-bold
                               text-white
                               hover:bg-forest-800"
                    >
                        Search
                    </button>


                    @if(
                        request()->filled('search')
                        ||
                        request()->filled('category')
                    )

                        <a
                            href="{{ route('catalog.index') }}"
                            class="rounded-xl
                                   border
                                   border-slate-200
                                   px-5 py-3
                                   text-sm
                                   font-bold
                                   text-slate-600
                                   hover:bg-slate-50"
                        >
                            Reset
                        </a>

                    @endif

                </div>

            </div>

        </form>


        {{-- RESULT INFO --}}

        <div
            class="mt-8
                   flex flex-col
                   gap-2
                   sm:flex-row
                   sm:items-center
                   sm:justify-between"
        >

            <div>

                <h2
                    class="text-2xl
                           font-extrabold
                           text-slate-950"
                >
                    Products
                </h2>

                <p
                    class="mt-1
                           text-sm
                           text-slate-500"
                >
                    Showing
                    {{ $products->firstItem() ?? 0 }}
                    -
                    {{ $products->lastItem() ?? 0 }}
                    of
                    {{ $products->total() }}
                    products
                </p>

            </div>

        </div>


        {{-- GRID --}}

        <div
            class="mt-8
                   grid gap-6
                   sm:grid-cols-2
                   lg:grid-cols-3
                   xl:grid-cols-4"
        >

            @forelse($products as $product)

                <article
                    class="product-card
                           group
                           overflow-hidden
                           rounded-2xl
                           border
                           border-slate-200
                           bg-white
                           shadow-sm
                           transition
                           duration-300
                           hover:-translate-y-1
                           hover:border-forest-200
                           hover:shadow-soft"
                >

                    {{-- IMAGE --}}

                    <a
                        href="{{ route(
                            'catalog.show',
                            $product
                        ) }}"
                        class="relative
                               block
                               aspect-[4/3]
                               overflow-hidden
                               bg-gradient-to-br
                               from-forest-50
                               to-white"
                    >

                        @if($product->image_url)

                            <img
                                src="{{ $product->image_url }}"
                                alt="{{ $product->name }}"
                                loading="lazy"
                                class="product-image
                                       h-full w-full
                                       object-cover"
                            >

                        @else

                            <div
                                class="flex h-full w-full
                                       items-center
                                       justify-center"
                            >

                                <div
                                    class="grid h-20 w-20
                                           place-items-center
                                           rounded-full
                                           bg-white
                                           text-2xl
                                           font-extrabold
                                           text-forest-700
                                           shadow"
                                >
                                    {{ strtoupper(
                                        mb_substr(
                                            $product->name,
                                            0,
                                            1
                                        )
                                    ) }}
                                </div>

                            </div>

                        @endif


                        @if($product->is_featured)

                            <span
                                class="absolute
                                       left-4 top-4
                                       rounded-full
                                       bg-yellow-400
                                       px-3 py-1.5
                                       text-[10px]
                                       font-extrabold
                                       text-forest-950"
                            >
                                ★ FEATURED
                            </span>

                        @endif

                    </a>


                    {{-- CONTENT --}}

                    <div class="p-5">

                        @if($product->category)

                            <div
                                class="text-[10px]
                                       font-extrabold
                                       uppercase
                                       tracking-[.15em]
                                       text-forest-700"
                            >
                                {{ $product->category }}
                            </div>

                        @endif


                        <a
                            href="{{ route(
                                'catalog.show',
                                $product
                            ) }}"
                        >

                            <h3
                                class="mt-2
                                       text-lg
                                       font-extrabold
                                       text-slate-950
                                       transition
                                       group-hover:text-forest-700"
                            >
                                {{ $product->name }}
                            </h3>

                        </a>


                        <p
                            class="mt-2
                                   min-h-[48px]
                                   text-sm
                                   leading-6
                                   text-slate-500"
                        >
                            {{ $product->short_description
                                ?: \Illuminate\Support\Str::limit(
                                    $product->description
                                        ?: 'Contact us for complete product details.',
                                    90
                                )
                            }}
                        </p>


                        @if($product->price !== null)

                            <div class="mt-4">

                                <span
                                    class="text-lg
                                           font-extrabold
                                           text-forest-800"
                                >
                                    ₹{{ number_format(
                                        (float) $product->price,
                                        2
                                    ) }}
                                </span>

                                @if($product->unit)

                                    <span
                                        class="text-xs
                                               text-slate-400"
                                    >
                                        / {{ $product->unit }}
                                    </span>

                                @endif

                            </div>

                        @endif


                        <div
                            class="mt-5
                                   border-t
                                   border-slate-100
                                   pt-4"
                        >

                            <a
                                href="{{ route(
                                    'catalog.show',
                                    $product
                                ) }}"
                                class="inline-flex
                                       items-center
                                       text-sm
                                       font-extrabold
                                       text-forest-700
                                       hover:text-forest-900"
                            >
                                View Product Details →
                            </a>

                        </div>

                    </div>

                </article>

            @empty

                <div
                    class="col-span-full
                           rounded-2xl
                           border-2
                           border-dashed
                           border-slate-200
                           bg-white
                           p-14
                           text-center"
                >

                    <div class="text-4xl">
                        🔍
                    </div>

                    <h3
                        class="mt-4
                               text-xl
                               font-extrabold
                               text-slate-900"
                    >
                        No Products Found
                    </h3>

                    <p
                        class="mt-2
                               text-sm
                               text-slate-500"
                    >
                        Please try another search or category.
                    </p>

                    <a
                        href="{{ route('catalog.index') }}"
                        class="mt-5
                               inline-flex
                               rounded-xl
                               bg-forest-700
                               px-5 py-3
                               text-sm
                               font-bold
                               text-white"
                    >
                        View All Products
                    </a>

                </div>

            @endforelse

        </div>


        {{-- ==================================================== --}}
        {{-- PAGINATION --}}
        {{-- ==================================================== --}}

        @if($products->hasPages())

            <div
                class="mt-12
                       rounded-2xl
                       border
                       border-slate-200
                       bg-white
                       px-5 py-4"
            >
                {{ $products->links() }}
            </div>

        @endif

    </div>

</section>


{{-- ============================================================ --}}
{{-- CTA --}}
{{-- ============================================================ --}}

<section
    class="bg-forest-900
           py-16 text-white"
>

    <div
        class="mx-auto
               flex max-w-7xl
               flex-col gap-6
               px-4
               sm:px-6
               lg:flex-row
               lg:items-center
               lg:justify-between
               lg:px-8"
    >

        <div>

            <div
                class="text-xs
                       font-extrabold
                       uppercase
                       tracking-[.2em]
                       text-yellow-400"
            >
                Need Help?
            </div>

            <h2
                class="mt-2
                       text-2xl
                       font-extrabold"
            >
                Looking for a specific agriculture product?
            </h2>

            <p
                class="mt-2
                       text-sm
                       text-white/65"
            >
                Contact our team for product information,
                dealership and bulk orders.
            </p>

        </div>


        <a
            href="{{ route('home') }}#contact"
            class="inline-flex
                   self-start
                   rounded-full
                   bg-yellow-400
                   px-7 py-4
                   text-sm
                   font-extrabold
                   text-forest-950"
        >
            Send Enquiry →
        </a>

    </div>

</section>


{{-- ============================================================ --}}
{{-- FOOTER --}}
{{-- ============================================================ --}}

<footer
    class="bg-forest-950
           py-8
           text-white/60"
>

    <div
        class="mx-auto
               flex max-w-7xl
               flex-col gap-3
               px-4
               text-xs
               sm:flex-row
               sm:justify-between
               sm:px-6
               lg:px-8"
    >

        <div>
            © {{ date('Y') }}
            Kalindri Agritech Private Limited.
            All rights reserved.
        </div>

        <div>
            Kanpur Nagar, Uttar Pradesh
        </div>

    </div>

</footer>


{{-- WHATSAPP --}}

<a
    href="https://wa.me/918840702499?text={{ urlencode('Hello Kalindri Agritech, I want information about your products.') }}"
    target="_blank"
    rel="noopener noreferrer"
    class="fixed
           bottom-5 right-5
           grid h-14 w-14
           place-items-center
           rounded-full
           bg-green-500
           text-2xl
           text-white
           shadow-2xl
           transition
           hover:scale-105"
>
    💬
</a>


</body>

</html>