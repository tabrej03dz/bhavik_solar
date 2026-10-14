<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="{{ $product->short_description ?: $product->name }}"
    >

    <title>
        {{ $product->name }} | Kalindri Agritech
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
        h3 {
            font-family: Manrope, sans-serif;
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

        <a
            href="tel:+918840702499"
            class="hover:text-white"
        >
            📞 +91 88407 02499
        </a>

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
               sm:px-6
               lg:px-8"
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
                href="{{ route('catalog.index') }}"
                class="rounded-full
                       border
                       border-slate-200
                       px-4 py-2.5
                       text-sm
                       font-bold
                       text-slate-600
                       hover:bg-slate-50"
            >
                All Products
            </a>


            <a
                href="{{ route('home') }}#contact"
                class="hidden
                       rounded-full
                       bg-forest-700
                       px-5 py-3
                       text-sm
                       font-extrabold
                       text-white
                       sm:inline-flex"
            >
                Contact
            </a>

        </div>

    </div>

</header>


{{-- ============================================================ --}}
{{-- BREADCRUMB --}}
{{-- ============================================================ --}}

<div
    class="border-b
           border-slate-200
           bg-white"
>

    <div
        class="mx-auto
               max-w-7xl
               px-4 py-4
               text-xs
               text-slate-500
               sm:px-6
               lg:px-8"
    >

        <a
            href="{{ route('home') }}"
            class="hover:text-forest-700"
        >
            Home
        </a>

        <span class="mx-2">
            /
        </span>

        <a
            href="{{ route('catalog.index') }}"
            class="hover:text-forest-700"
        >
            Products
        </a>

        <span class="mx-2">
            /
        </span>

        <span
            class="font-semibold
                   text-slate-700"
        >
            {{ $product->name }}
        </span>

    </div>

</div>


{{-- ============================================================ --}}
{{-- PRODUCT DETAIL --}}
{{-- ============================================================ --}}

<main>

    <section class="py-12 sm:py-16">

        <div
            class="mx-auto
                   max-w-7xl
                   px-4
                   sm:px-6
                   lg:px-8"
        >

            <div
                class="grid gap-10
                       lg:grid-cols-2
                       lg:items-start"
            >


                {{-- IMAGE --}}

                {{-- <div
                    class="overflow-hidden
                           rounded-[2rem]
                           border
                           border-slate-200
                           bg-white
                           shadow-soft"
                >

                    <div
                        class="aspect-square
                               bg-gradient-to-br
                               from-forest-50
                               to-white"
                    >

                        @if($product->image_url)

                            <img
                                src="{{ $product->image_url }}"
                                alt="{{ $product->name }}"
                                class="h-full w-full
                                       object-contain
                                       p-5 sm:p-8"
                            >

                        @else

                            <div
                                class="flex h-full w-full
                                       items-center
                                       justify-center"
                            >

                                <div class="text-center">

                                    <div
                                        class="mx-auto
                                               grid h-32 w-32
                                               place-items-center
                                               rounded-full
                                               bg-white
                                               text-5xl
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

                                    <div
                                        class="mt-5
                                               text-sm
                                               font-bold
                                               uppercase
                                               tracking-wider
                                               text-forest-700/60"
                                    >
                                        Kalindri Agritech
                                    </div>

                                </div>

                            </div>

                        @endif

                    </div>

                </div> --}}


                                
                {{-- PRODUCT IMAGE GALLERY --}}

                @php
                    $galleryImages = collect();

                    // Featured Image
                    if ($product->image_url) {
                        $galleryImages->push([
                            'url' => $product->image_url,
                            'alt' => $product->name,
                        ]);
                    }

                    // Additional Product Images
                    foreach ($product->images as $image) {
                        if ($image->image) {
                            $galleryImages->push([
                                'url' => \Illuminate\Support\Facades\Storage::disk('public')->url($image->image),
                                'alt' => $image->alt_text ?: $product->name,
                            ]);
                        }
                    }

                    $mainImage = $galleryImages->first();
                @endphp

                <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">

                    {{-- MAIN LARGE IMAGE --}}
                    <div class="relative aspect-square bg-gradient-to-br from-forest-50 to-white">

                        @if($mainImage)

                            <img
                                id="mainProductImage"
                                src="{{ $mainImage['url'] }}"
                                alt="{{ $mainImage['alt'] }}"
                                class="h-full w-full object-contain p-5 sm:p-8 transition-opacity duration-200"
                            >

                        @else

                            <div class="flex h-full w-full items-center justify-center">

                                <div class="text-center">
                                    <div class="mx-auto grid h-32 w-32 place-items-center rounded-full bg-white text-5xl font-extrabold text-forest-700 shadow">
                                        {{ strtoupper(mb_substr($product->name, 0, 1)) }}
                                    </div>

                                    <div class="mt-5 text-sm font-bold uppercase tracking-wider text-forest-700/60">
                                        Kalindri Agritech
                                    </div>
                                </div>

                            </div>

                        @endif

                    </div>

                    {{-- HORIZONTAL THUMBNAIL GALLERY --}}
                    @if($galleryImages->count() > 1)

                        <div class="border-t border-slate-100 p-4 sm:p-5">

                            <div class="flex items-center justify-between mb-3">
                                <h3 class="text-sm font-bold text-slate-700">
                                    Product Images
                                </h3>

                                <span class="text-xs font-medium text-slate-400">
                                    {{ $galleryImages->count() }} Images
                                </span>
                            </div>

                            <div
                                id="productThumbnailGallery"
                                class="flex gap-3 overflow-x-auto pb-2"
                            >

                                @foreach($galleryImages as $index => $galleryImage)

                                    <button
                                        type="button"
                                        onclick="changeProductImage(this)"
                                        data-image="{{ $galleryImage['url'] }}"
                                        data-alt="{{ $galleryImage['alt'] }}"
                                        aria-label="View product image {{ $index + 1 }}"
                                        aria-pressed="{{ $index === 0 ? 'true' : 'false' }}"
                                        class="product-thumbnail flex-shrink-0 w-20 h-20 sm:w-24 sm:h-24 rounded-xl border-2 {{ $index === 0 ? 'border-forest-600' : 'border-slate-200' }} bg-white p-1.5 transition-all duration-200 hover:border-forest-500 hover:shadow-md"
                                    >

                                        <img
                                            src="{{ $galleryImage['url'] }}"
                                            alt="{{ $galleryImage['alt'] }}"
                                            loading="lazy"
                                            class="h-full w-full object-contain rounded-lg"
                                        >

                                    </button>

                                @endforeach

                            </div>

                        </div>

                    @endif

                </div>



                {{-- DETAILS --}}

                <div>

                    <div
                        class="flex flex-wrap
                               items-center gap-2"
                    >

                        @if($product->category)

                            <span
                                class="rounded-full
                                       bg-forest-50
                                       px-4 py-2
                                       text-xs
                                       font-extrabold
                                       uppercase
                                       tracking-wide
                                       text-forest-700"
                            >
                                {{ $product->category }}
                            </span>

                        @endif


                        @if($product->is_featured)

                            <span
                                class="rounded-full
                                       bg-yellow-100
                                       px-4 py-2
                                       text-xs
                                       font-extrabold
                                       text-yellow-800"
                            >
                                ★ Featured
                            </span>

                        @endif

                    </div>


                    <h1
                        class="mt-5
                               text-4xl
                               font-extrabold
                               leading-tight
                               text-slate-950
                               sm:text-5xl"
                    >
                        {{ $product->name }}
                    </h1>


                    @if($product->short_description)

                        <p
                            class="mt-5
                                   text-lg
                                   leading-8
                                   text-slate-600"
                        >
                            {{ $product->short_description }}
                        </p>

                    @endif


                    {{-- PRICE --}}

                    <div
                        class="mt-7
                               flex flex-wrap
                               items-center gap-4"
                    >

                        @if($product->price !== null)

                            <div>

                                <div
                                    class="text-xs
                                           font-bold
                                           uppercase
                                           tracking-wide
                                           text-slate-400"
                                >
                                    Price
                                </div>

                                <div
                                    class="mt-1
                                           text-3xl
                                           font-extrabold
                                           text-forest-800"
                                >
                                    ₹{{ number_format(
                                        (float) $product->price,
                                        2
                                    ) }}

                                    @if($product->unit)

                                        <span
                                            class="text-sm
                                                   font-semibold
                                                   text-slate-400"
                                        >
                                            / {{ $product->unit }}
                                        </span>

                                    @endif

                                </div>

                            </div>

                        @else

                            <div>

                                <div
                                    class="text-xs
                                           font-bold
                                           uppercase
                                           tracking-wide
                                           text-slate-400"
                                >
                                    Price
                                </div>

                                <div
                                    class="mt-1
                                           text-xl
                                           font-extrabold
                                           text-forest-800"
                                >
                                    Contact for Price
                                </div>

                            </div>

                        @endif

                    </div>


                    {{-- STOCK --}}

                    <div
                        class="mt-6
                               rounded-2xl
                               border
                               border-slate-200
                               bg-white
                               p-5"
                    >

                        <div
                            class="flex
                                   items-center
                                   justify-between
                                   gap-4"
                        >

                            <div>

                                <div
                                    class="text-xs
                                           font-bold
                                           uppercase
                                           text-slate-400"
                                >
                                    Availability
                                </div>

                                @if($product->stock > 0)

                                    <div
                                        class="mt-1
                                               font-extrabold
                                               text-emerald-700"
                                    >
                                        ✓ Available
                                    </div>

                                @else

                                    <div
                                        class="mt-1
                                               font-extrabold
                                               text-slate-700"
                                    >
                                        Contact for Availability
                                    </div>

                                @endif

                            </div>


                            @if($product->unit)

                                <div
                                    class="text-right"
                                >

                                    <div
                                        class="text-xs
                                               font-bold
                                               uppercase
                                               text-slate-400"
                                    >
                                        Unit
                                    </div>

                                    <div
                                        class="mt-1
                                               font-bold
                                               text-slate-700"
                                    >
                                        {{ $product->unit }}
                                    </div>

                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- ACTION BUTTONS --}}

                    <div
                        class="mt-8
                               flex flex-col
                               gap-3
                               sm:flex-row"
                    >

                        <a
                            href="{{ route('home', [
                                'product' => $product->name
                            ]) }}#contact"
                            class="inline-flex
                                   flex-1
                                   items-center
                                   justify-center
                                   rounded-xl
                                   bg-forest-700
                                   px-7 py-4
                                   text-sm
                                   font-extrabold
                                   text-white
                                   shadow-lg
                                   transition
                                   hover:bg-forest-800"
                        >
                            Send Product Enquiry →
                        </a>


                        <a
                            href="https://wa.me/918840702499?text={{ urlencode(
                                'Hello Kalindri Agritech, I want information about ' .
                                $product->name .
                                '.'
                            ) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex
                                   items-center
                                   justify-center
                                   rounded-xl
                                   bg-green-500
                                   px-7 py-4
                                   text-sm
                                   font-extrabold
                                   text-white
                                   transition
                                   hover:bg-green-600"
                        >
                            WhatsApp
                        </a>

                    </div>

                </div>

            </div>


            {{-- ==================================================== --}}
            {{-- DESCRIPTION --}}
            {{-- ==================================================== --}}

            <div
                class="mt-12
                       grid gap-6
                       lg:grid-cols-[1fr_320px]"
            >

                <div
                    class="rounded-[2rem]
                           border
                           border-slate-200
                           bg-white
                           p-6
                           shadow-sm
                           sm:p-8"
                >

                    <h2
                        class="text-2xl
                               font-extrabold
                               text-slate-950"
                    >
                        Product Details
                    </h2>


                    <div
                        class="mt-5
                               whitespace-pre-line
                               text-sm
                               leading-8
                               text-slate-600"
                    >
                        {{ $product->description
                            ?: $product->short_description
                            ?: 'Please contact Kalindri Agritech for detailed product information, formulation, usage, dosage and crop recommendation.'
                        }}
                    </div>

                </div>


                <aside
                    class="rounded-[2rem]
                           bg-forest-950
                           p-6
                           text-white
                           sm:p-8"
                >

                    <div
                        class="text-xs
                               font-extrabold
                               uppercase
                               tracking-[.18em]
                               text-yellow-400"
                    >
                        Need Assistance?
                    </div>


                    <h3
                        class="mt-3
                               text-xl
                               font-extrabold"
                    >
                        Talk to our product team
                    </h3>


                    <p
                        class="mt-3
                               text-sm
                               leading-7
                               text-white/65"
                    >
                        Contact us for dosage,
                        availability, dealership,
                        bulk order and product information.
                    </p>


                    <a
                        href="tel:+918840702499"
                        class="mt-6
                               block
                               rounded-xl
                               bg-white/10
                               p-4
                               text-sm
                               font-bold
                               transition
                               hover:bg-white/15"
                    >
                        📞 +91 88407 02499
                    </a>


                    <a
                        href="{{ route('home') }}#contact"
                        class="mt-3
                               flex
                               justify-center
                               rounded-xl
                               bg-yellow-400
                               px-5 py-3.5
                               text-sm
                               font-extrabold
                               text-forest-950"
                    >
                        Contact Form
                    </a>

                </aside>

            </div>

        </div>

    </section>


    {{-- ============================================================ --}}
    {{-- RELATED PRODUCTS --}}
    {{-- ============================================================ --}}

    @if($relatedProducts->isNotEmpty())

        <section
            class="border-t
                   border-slate-200
                   bg-white
                   py-16"
        >

            <div
                class="mx-auto
                       max-w-7xl
                       px-4
                       sm:px-6
                       lg:px-8"
            >

                <div
                    class="flex
                           items-end
                           justify-between
                           gap-4"
                >

                    <div>

                        <div
                            class="text-xs
                                   font-extrabold
                                   uppercase
                                   tracking-[.18em]
                                   text-forest-700"
                        >
                            You May Also Like
                        </div>

                        <h2
                            class="mt-2
                                   text-2xl
                                   font-extrabold
                                   text-slate-950"
                        >
                            Related Products
                        </h2>

                    </div>


                    <a
                        href="{{ route('catalog.index') }}"
                        class="hidden
                               text-sm
                               font-extrabold
                               text-forest-700
                               sm:block"
                    >
                        View All →
                    </a>

                </div>


                <div
                    class="mt-8
                           grid gap-5
                           sm:grid-cols-2
                           lg:grid-cols-4"
                >

                    @foreach(
                        $relatedProducts as $relatedProduct
                    )

                        <a
                            href="{{ route(
                                'catalog.show',
                                $relatedProduct
                            ) }}"
                            class="group
                                   overflow-hidden
                                   rounded-2xl
                                   border
                                   border-slate-200
                                   bg-white
                                   transition
                                   hover:-translate-y-1
                                   hover:border-forest-200
                                   hover:shadow-soft"
                        >

                            <div
                                class="aspect-[4/3]
                                       overflow-hidden
                                       bg-forest-50"
                            >

                                @if($relatedProduct->image_url)

                                    <img
                                        src="{{ $relatedProduct->image_url }}"
                                        alt="{{ $relatedProduct->name }}"
                                        loading="lazy"
                                        class="h-full
                                               w-full
                                               object-cover
                                               transition
                                               duration-500
                                               group-hover:scale-105"
                                    >

                                @else

                                    <div
                                        class="flex h-full
                                               items-center
                                               justify-center"
                                    >

                                        <div
                                            class="grid
                                                   h-16 w-16
                                                   place-items-center
                                                   rounded-full
                                                   bg-white
                                                   text-xl
                                                   font-extrabold
                                                   text-forest-700"
                                        >
                                            {{ strtoupper(
                                                mb_substr(
                                                    $relatedProduct->name,
                                                    0,
                                                    1
                                                )
                                            ) }}
                                        </div>

                                    </div>

                                @endif

                            </div>


                            <div class="p-5">

                                @if($relatedProduct->category)

                                    <div
                                        class="text-[10px]
                                               font-bold
                                               uppercase
                                               tracking-wide
                                               text-forest-700"
                                    >
                                        {{ $relatedProduct->category }}
                                    </div>

                                @endif


                                <h3
                                    class="mt-2
                                           font-extrabold
                                           text-slate-900
                                           group-hover:text-forest-700"
                                >
                                    {{ $relatedProduct->name }}
                                </h3>


                                <div
                                    class="mt-3
                                           text-xs
                                           font-bold
                                           text-forest-700"
                                >
                                    View Details →
                                </div>

                            </div>

                        </a>

                    @endforeach

                </div>

            </div>

        </section>

    @endif

    @if($product->qr_code_url)

    <section class="mx-auto max-w-7xl px-4 pb-12">

        <div class="inline-flex flex-col items-center rounded-2xl border bg-white p-5 shadow-sm">

            <h2 class="mb-3 text-lg font-bold">
                Scan Product QR Code
            </h2>

            <img
                src="{{ $product->qr_code_url }}"
                alt="{{ $product->name }} QR Code"
                class="h-40 w-40"
            >

            <a
                href="{{ $product->qr_code_url }}"
                download="product-{{ $product->id }}-qr.svg"
                class="mt-3 text-sm font-semibold text-green-700 underline"
            >
                Download QR Code
            </a>

        </div>

    </section>

    @endif

</main>


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
        </div>

        <div>
            Kanpur Nagar,
            Uttar Pradesh
        </div>

    </div>

</footer>


<script>
    function changeProductImage(button) {

        const mainImage = document.getElementById('mainProductImage');

        if (!mainImage) return;

        const newImage = button.dataset.image;
        const newAlt = button.dataset.alt;

        if (!newImage) return;

        // Change main image
        mainImage.src = newImage;
        mainImage.alt = newAlt || 'Product Image';

        // Remove active border from thumbnails
        document.querySelectorAll('.product-thumbnail').forEach((item) => {
            item.classList.remove('border-forest-600');
            item.classList.add('border-slate-200');
            item.setAttribute('aria-pressed', 'false');
        });

        // Highlight clicked thumbnail
        button.classList.remove('border-slate-200');
        button.classList.add('border-forest-600');
        button.setAttribute('aria-pressed', 'true');
    }
</script>


</body>

</html>