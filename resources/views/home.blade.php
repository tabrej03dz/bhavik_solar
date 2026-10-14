<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>

    <meta charset="UTF-8">


    {{-- WEBSITE FAVICON --}}
    <link rel="icon"
        type="image/x-icon"
        href="{{ asset('images/favicon_io/favicon.ico') }}?v=2">

    <link rel="icon"
        type="image/png"
        sizes="32x32"
        href="{{ asset('images/favicon_io/favicon-32x32.png') }}?v=2">

    <link rel="icon"
        type="image/png"
        sizes="16x16"
        href="{{ asset('images/favicon_io/favicon-16x16.png') }}?v=2">

    <link rel="apple-touch-icon"
        sizes="180x180"
        href="{{ asset('images/favicon_io/apple-touch-icon.png') }}?v=2">

    <link rel="manifest"
        href="{{ asset('images/favicon_io/site.webmanifest') }}?v=2">



    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <meta
        name="description"
        content="Kalindri Agritech Private Limited - crop nutrition, bio inputs, humic products, micronutrients and crop protection solutions."
    >

    <title>
        Kalindri Agritech Private Limited | Agriculture Inputs & Crop Solutions
    </title>


    {{-- ======================================================== --}}
    {{-- TAILWIND CSS --}}
    {{-- ======================================================== --}}

    <script src="https://cdn.tailwindcss.com"></script>

    <script>

        tailwind.config = {

            theme: {

                extend: {

                    colors: {

                        kal: {

                            50: '#f7f8ec',
                            100: '#eef0cf',
                            200: '#dfe2a4',
                            300: '#c9cd72',
                            400: '#a8ad45',
                            500: '#858a2d',
                            600: '#6d7225',
                            700: '#555a21',
                            800: '#44481f',
                            900: '#393d1e',
                            950: '#1e210c'

                        },

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

                        gold: '#c99a18',

                        cream: '#fbfaf5'

                    },

                    fontFamily: {

                        sans: [
                            'Inter',
                            'sans-serif'
                        ],

                        display: [
                            'Manrope',
                            'sans-serif'
                        ]

                    },

                    boxShadow: {

                        soft:
                            '0 20px 60px rgba(13,62,33,.10)',

                        lift:
                            '0 25px 80px rgba(9,55,29,.16)'

                    }

                }

            }

        };

    </script>


    {{-- ======================================================== --}}
    {{-- GOOGLE FONT --}}
    {{-- ======================================================== --}}

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Manrope:wght@600;700;800&display=swap"
        rel="stylesheet"
    >


    {{-- ======================================================== --}}
    {{-- CUSTOM CSS --}}
    {{-- ======================================================== --}}

    <style>

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {

            font-family: Inter, sans-serif;

        }


        .font-display,
        h1,
        h2,
        h3,
        h4 {

            font-family: Manrope, sans-serif;

        }


        .hero-bg {

            background:

                linear-gradient(
                    100deg,
                    rgba(8, 36, 18, .97) 0%,
                    rgba(8, 36, 18, .91) 50%,
                    rgba(8, 36, 18, .65) 100%
                ),

                url(
                    'https://images.unsplash.com/photo-1625246333195-78d9c38ad449?auto=format&fit=crop&w=1800&q=85'
                )
                center / cover;

        }


        .leaf-grid {

            background-image:

                radial-gradient(
                    rgba(44, 154, 73, .10) 1px,
                    transparent 1px
                );

            background-size: 22px 22px;

        }


        .glass {

            background:
                rgba(255, 255, 255, .09);

            backdrop-filter:
                blur(14px);

            -webkit-backdrop-filter:
                blur(14px);

        }


        .product-card-image {

            transition:
                transform .45s ease;

        }


        .product-card:hover
        .product-card-image {

            transform:
                scale(1.06);

        }


        input,
        textarea,
        select {

            color:
                #0f172a;

        }


        input::placeholder,
        textarea::placeholder {

            color:
                #94a3b8;

        }

    </style>

</head>


<body
    class="bg-cream text-slate-800 antialiased"
>


{{-- ============================================================ --}}
{{-- TOP BAR --}}
{{-- ============================================================ --}}

<div
    class="bg-forest-950 text-white/85"
>

    <div
        class="mx-auto flex max-w-7xl flex-col gap-2
               px-4 py-2.5 text-xs
               sm:flex-row sm:items-center
               sm:justify-between sm:px-6
               lg:px-8"
    >

        <div
            class="flex flex-wrap
                   gap-x-5 gap-y-1"
        >

            <a
                href="tel:+918840702499"
                class="transition hover:text-white"
            >
                📞 +91 88407 02499
            </a>


            <a
                href="mailto:kalindriagritechprivatelimited@gmail.com"
                class="transition hover:text-white"
            >
                ✉ kalindriagritechprivatelimited@gmail.com
            </a>

        </div>


        <div
            class="font-semibold text-white"
        >
            Kalindri Agritech Private Limited
        </div>

    </div>

</div>


{{-- ============================================================ --}}
{{-- HEADER --}}
{{-- ============================================================ --}}

<header
    class="sticky top-0 z-50
           border-b border-black/5
           bg-white/95 backdrop-blur"
>

    <nav
        class="mx-auto flex max-w-7xl
               items-center justify-between
               px-4 py-3
               sm:px-6 lg:px-8"
    >


        {{-- LOGO --}}

        <a
            href="{{ route('home') }}"
            class="flex items-center gap-3"
        >

            <div
                class="grid h-14 w-20
                       place-items-center
                       overflow-hidden rounded-xl
                       bg-white"
            >

                <img
                    src="{{ asset('images/kalindri-logo.png') }}"
                    alt="Kalindri Agritech Private Limited"
                    class="h-full w-full object-contain"
                >

            </div>


            <div
                class="hidden sm:block"
            >

                <div
                    class="font-display text-lg
                           font-extrabold leading-none
                           text-forest-950"
                >

                    KALINDRI

                    <span class="text-gold">
                        AGRITECH
                    </span>

                </div>


                <div
                    class="mt-1 text-[9px]
                           font-extrabold uppercase
                           tracking-[.22em]
                           text-slate-500"
                >
                    Private Limited
                </div>

            </div>

        </a>


        {{-- DESKTOP MENU --}}

        <div
            class="hidden items-center gap-7
                   text-sm font-bold
                   text-slate-700
                   lg:flex"
        >

            <a
                href="#home"
                class="transition hover:text-forest-700"
            >
                Home
            </a>

            <a
                href="#about"
                class="transition hover:text-forest-700"
            >
                About
            </a>

            <a href="{{ route('home') }}#products">
                Products
            </a>

            <a
                href="#quality"
                class="transition hover:text-forest-700"
            >
                Why Us
            </a>

            <a
                href="#contact"
                class="transition hover:text-forest-700"
            >
                Contact
            </a>

        </div>


        {{-- DESKTOP RIGHT BUTTONS --}}

        <div
            class="hidden items-center gap-3
                   lg:flex"
        >

            @auth

                <a
                    href="{{ route('dashboard') }}"
                    class="rounded-full
                           border border-forest-200
                           bg-forest-50
                           px-4 py-2.5
                           text-sm font-extrabold
                           text-forest-800
                           transition
                           hover:bg-forest-100"
                >
                    Dashboard
                </a>

            @else

                <a
                    href="{{ route('login') }}"
                    class="rounded-full
                           border border-slate-200
                           px-4 py-2.5
                           text-sm font-bold
                           transition
                           hover:bg-slate-50"
                >
                    Login
                </a>

            @endauth


            <a
                href="#contact"
                class="rounded-full
                       bg-forest-700
                       px-5 py-3
                       text-sm font-extrabold
                       text-white shadow-lg
                       transition
                       hover:bg-forest-800"
            >
                Send Enquiry →
            </a>

        </div>


        {{-- MOBILE BUTTON --}}

        <button
            id="menuBtn"
            type="button"
            aria-label="Open Menu"
            aria-expanded="false"
            class="grid h-11 w-11
                   place-items-center
                   rounded-xl
                   border border-slate-200
                   text-xl
                   lg:hidden"
        >
            ☰
        </button>

    </nav>


    {{-- MOBILE MENU --}}

    <div
        id="mobileMenu"
        class="hidden
               border-t border-slate-100
               bg-white p-4
               shadow-lg
               lg:hidden"
    >

        <div
            class="mx-auto flex max-w-7xl
                   flex-col text-sm font-bold"
        >

            <a
                href="#home"
                class="rounded-xl
                       px-4 py-3
                       hover:bg-forest-50"
            >
                Home
            </a>

            <a
                href="#about"
                class="rounded-xl
                       px-4 py-3
                       hover:bg-forest-50"
            >
                About
            </a>

            <a
                href="#products"
                class="rounded-xl
                       px-4 py-3
                       hover:bg-forest-50"
            >
                Products
            </a>

            <a
                href="#quality"
                class="rounded-xl
                       px-4 py-3
                       hover:bg-forest-50"
            >
                Why Us
            </a>

            <a
                href="#contact"
                class="rounded-xl
                       px-4 py-3
                       hover:bg-forest-50"
            >
                Contact
            </a>


            @auth

                <a
                    href="{{ route('dashboard') }}"
                    class="rounded-xl
                           px-4 py-3
                           text-forest-800
                           hover:bg-forest-50"
                >
                    Dashboard
                </a>

            @else

                <a
                    href="{{ route('login') }}"
                    class="rounded-xl
                           px-4 py-3
                           text-forest-800
                           hover:bg-forest-50"
                >
                    Login
                </a>

            @endauth

        </div>

    </div>

</header>


<main>


{{-- ============================================================ --}}
{{-- HERO --}}
{{-- ============================================================ --}}

<section
    id="home"
    class="hero-bg
           relative overflow-hidden
           text-white"
>

    <div
        class="absolute -left-24 bottom-0
               h-80 w-80 rounded-full
               bg-lime-400/10 blur-3xl"
    ></div>


    <div
        class="absolute right-0 top-0
               h-80 w-80 rounded-full
               bg-gold/10 blur-3xl"
    ></div>


    <div
        class="mx-auto grid min-h-[690px]
               max-w-7xl items-center
               gap-12 px-4 py-20
               sm:px-6
               lg:grid-cols-[1.08fr_.92fr]
               lg:px-8"
    >


        {{-- HERO CONTENT --}}

        <div class="max-w-3xl">

            <div
                class="mb-6 inline-flex
                       items-center gap-2
                       rounded-full
                       border border-white/15
                       bg-white/10
                       px-4 py-2
                       text-xs font-extrabold
                       uppercase
                       tracking-[.18em]
                       backdrop-blur"
            >

                <span
                    class="h-2 w-2
                           rounded-full
                           bg-yellow-400"
                ></span>

                Crop Nutrition • Bio Inputs • Crop Protection

            </div>


            <h1
                class="text-4xl
                       font-extrabold
                       leading-[1.05]
                       sm:text-6xl
                       lg:text-7xl"
            >

                Better Inputs.

                <br>

                <span class="text-yellow-400">
                    Stronger Crops.
                </span>

            </h1>


            <p
                class="mt-6 max-w-2xl
                       text-base leading-8
                       text-white/75
                       sm:text-lg"
            >

                Kalindri Agritech Private Limited offers
                agricultural inputs including humic products,
                amino based solutions, micronutrients,
                bio products, granules and crop protection
                formulations.

            </p>


            <div
                class="mt-9 flex flex-col
                       gap-3 sm:flex-row"
            >

                <a
                    href="#products"
                    class="inline-flex items-center
                           justify-center
                           rounded-full
                           bg-yellow-400
                           px-7 py-4
                           text-sm font-extrabold
                           text-forest-950
                           transition
                           hover:bg-yellow-300"
                >
                    View Product Range →
                </a>


                <a
                    href="#contact"
                    class="inline-flex items-center
                           justify-center
                           rounded-full
                           border border-white/25
                           bg-white/10
                           px-7 py-4
                           text-sm font-bold
                           backdrop-blur
                           transition
                           hover:bg-white/15"
                >
                    Contact Sales
                </a>

            </div>


            {{-- HERO STATS --}}

            <div
                class="mt-10 grid max-w-2xl
                       grid-cols-2 gap-4
                       border-t border-white/15
                       pt-7 sm:grid-cols-4"
            >

                <div>

                    <div
                        class="font-display
                               text-2xl
                               font-extrabold"
                    >
                        {{ number_format($totalProducts) }}+
                    </div>

                    <div
                        class="mt-1 text-xs
                               text-white/55"
                    >
                        Products
                    </div>

                </div>


                <div>

                    <div
                        class="font-display
                               text-2xl
                               font-extrabold"
                    >
                        Bio
                    </div>

                    <div
                        class="mt-1 text-xs
                               text-white/55"
                    >
                        Product Range
                    </div>

                </div>


                <div>

                    <div
                        class="font-display
                               text-2xl
                               font-extrabold"
                    >
                        Crop
                    </div>

                    <div
                        class="mt-1 text-xs
                               text-white/55"
                    >
                        Nutrition
                    </div>

                </div>


                <div>

                    <div
                        class="font-display
                               text-2xl
                               font-extrabold"
                    >
                        UP
                    </div>

                    <div
                        class="mt-1 text-xs
                               text-white/55"
                    >
                        Kanpur Nagar
                    </div>

                </div>

            </div>

        </div>


        {{-- HERO LOGO CARD --}}

        <div class="hidden lg:block">

            <div
                class="glass rounded-[2rem]
                       border border-white/15
                       p-5 shadow-2xl"
            >

                <div
                    class="rounded-[1.6rem]
                           bg-white p-10
                           shadow-2xl"
                >

                    <img
                        src="{{ asset('images/kalindri-logo.png') }}"
                        alt="Kalindri Agritech Logo"
                        class="mx-auto
                               h-[310px]
                               w-full
                               object-contain"
                    >

                </div>


                <div
                    class="relative mx-5
                           -mt-8 flex
                           items-center
                           justify-between
                           rounded-2xl
                           bg-forest-800
                           p-5 shadow-2xl"
                >

                    <div>

                        <div
                            class="text-[10px]
                                   font-extrabold
                                   uppercase
                                   tracking-[.16em]
                                   text-yellow-400"
                        >
                            Founder & CEO
                        </div>

                        <div
                            class="mt-1 font-display
                                   text-lg
                                   font-extrabold"
                        >
                            Sudeep Kumar
                        </div>

                    </div>


                    <div
                        class="grid h-12 w-12
                               place-items-center
                               rounded-full
                               bg-white/10
                               text-2xl"
                    >
                        🌱
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================ --}}
{{-- PRODUCT TYPES --}}
{{-- ============================================================ --}}

<section
    class="relative z-10
           -mt-8 px-4
           sm:px-6 lg:px-8"
>

    <div
        class="mx-auto grid max-w-7xl
               gap-3 rounded-[2rem]
               bg-white p-4
               shadow-lift
               sm:grid-cols-2
               lg:grid-cols-4"
    >


        <div
            class="rounded-2xl
                   p-5 transition
                   hover:bg-forest-50"
        >

            <div class="text-3xl">
                🌿
            </div>

            <h3
                class="mt-3
                       text-base
                       font-extrabold"
            >
                Humic Range
            </h3>

            <p
                class="mt-1
                       text-xs
                       leading-5
                       text-slate-500"
            >
                Humic acid flakes and humic liquid formulations.
            </p>

        </div>


        <div
            class="rounded-2xl
                   p-5 transition
                   hover:bg-forest-50"
        >

            <div class="text-3xl">
                🧪
            </div>

            <h3
                class="mt-3
                       text-base
                       font-extrabold"
            >
                Amino & Nutrition
            </h3>

            <p
                class="mt-1
                       text-xs
                       leading-5
                       text-slate-500"
            >
                Amino, fulvic, micronutrients and chelated zinc.
            </p>

        </div>


        <div
            class="rounded-2xl
                   p-5 transition
                   hover:bg-forest-50"
        >

            <div class="text-3xl">
                🛡️
            </div>

            <h3
                class="mt-3
                       text-base
                       font-extrabold"
            >
                Crop Protection
            </h3>

            <p
                class="mt-1
                       text-xs
                       leading-5
                       text-slate-500"
            >
                Bio-pesticide and crop protection products.
            </p>

        </div>


        <div
            class="rounded-2xl
                   p-5 transition
                   hover:bg-forest-50"
        >

            <div class="text-3xl">
                🌾
            </div>

            <h3
                class="mt-3
                       text-base
                       font-extrabold"
            >
                Bio & Granules
            </h3>

            <p
                class="mt-1
                       text-xs
                       leading-5
                       text-slate-500"
            >
                Bio formulations and granule agriculture inputs.
            </p>

        </div>

    </div>

</section>


{{-- ============================================================ --}}
{{-- ABOUT --}}
{{-- ============================================================ --}}

<section
    id="about"
    class="leaf-grid py-24"
>

    <div
        class="mx-auto grid
               max-w-7xl
               items-center
               gap-14 px-4
               sm:px-6
               lg:grid-cols-2
               lg:px-8"
    >


        {{-- LEFT --}}

        <div
            class="relative
                   overflow-hidden
                   rounded-[2rem]
                   bg-forest-900
                   p-8 shadow-soft
                   sm:p-12"
        >

            <div
                class="absolute
                       -right-20
                       -top-20
                       h-64 w-64
                       rounded-full
                       bg-yellow-400/10"
            ></div>


            <div class="relative">

                <img
                    src="{{ asset('images/kalindri-logo.png') }}"
                    alt="Kalindri Agritech"
                    class="mx-auto
                           h-56 w-full
                           rounded-2xl
                           bg-white
                           object-contain
                           p-5"
                >


                <div
                    class="mt-8 grid
                           gap-4
                           sm:grid-cols-2"
                >

                    <div
                        class="rounded-2xl
                               border
                               border-white/10
                               bg-white/5
                               p-5
                               text-white"
                    >

                        <div
                            class="text-xs
                                   uppercase
                                   tracking-[.18em]
                                   text-yellow-400"
                        >
                            Founder & CEO
                        </div>

                        <div
                            class="mt-2
                                   text-xl
                                   font-extrabold"
                        >
                            Sudeep Kumar
                        </div>

                    </div>


                    <div
                        class="rounded-2xl
                               border
                               border-white/10
                               bg-white/5
                               p-5
                               text-white"
                    >

                        <div
                            class="text-xs
                                   uppercase
                                   tracking-[.18em]
                                   text-yellow-400"
                        >
                            Phone
                        </div>

                        <div
                            class="mt-2
                                   text-xl
                                   font-extrabold"
                        >
                            +91 88407 02499
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- RIGHT --}}

        <div>

            <div
                class="text-xs
                       font-extrabold
                       uppercase
                       tracking-[.22em]
                       text-forest-700"
            >
                About Kalindri Agritech
            </div>


            <h2
                class="mt-4
                       text-3xl
                       font-extrabold
                       leading-tight
                       text-slate-950
                       sm:text-5xl"
            >
                Agriculture solutions focused on crop growth
                and field performance.
            </h2>


            <p
                class="mt-6
                       text-base
                       leading-8
                       text-slate-600"
            >

                Kalindri Agritech Private Limited is based in
                Kanpur Nagar, Uttar Pradesh. Our product range
                includes crop nutrition, humic, amino,
                micronutrient, bio, granule and crop protection
                products for modern agriculture.

            </p>


            <div
                class="mt-8
                       rounded-3xl
                       border
                       border-forest-100
                       bg-white
                       p-6 shadow-sm"
            >

                <div
                    class="text-xs
                           font-extrabold
                           uppercase
                           tracking-[.18em]
                           text-forest-700"
                >
                    Registered / Business Address
                </div>


                <p
                    class="mt-3
                           text-sm
                           font-semibold
                           leading-7
                           text-slate-700"
                >

                    Plot No. 151, Bairi,
                    Arazi No. 549,
                    Akbarpur Bangar,
                    Kalyanpur,
                    Kanpur Nagar,
                    Uttar Pradesh – 208017.

                </p>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================ --}}
{{-- PRODUCTS --}}
{{-- ============================================================ --}}

{{-- ============================================================ --}}
{{-- PRODUCTS --}}
{{-- ============================================================ --}}

<section
    id="products"
    class="bg-white py-24"
>

    <div
        class="mx-auto max-w-7xl
               px-4 sm:px-6 lg:px-8"
    >

        {{-- HEADER --}}

        <div
            class="flex flex-col gap-6
                   lg:flex-row
                   lg:items-end
                   lg:justify-between"
        >

            <div class="max-w-3xl">

                <div
                    class="text-xs font-extrabold
                           uppercase tracking-[.22em]
                           text-forest-700"
                >
                    Product Catalogue
                </div>


                <h2
                    class="mt-4 text-3xl
                           font-extrabold
                           text-slate-950
                           sm:text-5xl"
                >
                    Kalindri Agritech Product Range
                </h2>


                <p
                    class="mt-5 max-w-2xl
                           text-base leading-8
                           text-slate-600"
                >
                    Explore some of our agriculture inputs,
                    crop nutrition, bio products,
                    micronutrients and crop protection
                    solutions.
                </p>

            </div>


            <a
                href="{{ route('catalog.index') }}"
                class="inline-flex items-center
                       justify-center gap-2
                       rounded-full
                       border border-forest-200
                       bg-forest-50
                       px-6 py-3.5
                       text-sm font-extrabold
                       text-forest-800
                       transition
                       hover:bg-forest-700
                       hover:text-white"
            >
                View All Products

                <span>
                    →
                </span>
            </a>

        </div>


        {{-- ==================================================== --}}
        {{-- ONLY 8 PRODUCTS --}}
        {{-- ==================================================== --}}

        <div
            class="mt-12 grid gap-6
                   md:grid-cols-2
                   lg:grid-cols-3
                   xl:grid-cols-4"
        >

            @forelse($products as $index => $product)

                <article
                    class="product-card
                           group overflow-hidden
                           rounded-[1.6rem]
                           border border-slate-100
                           bg-white shadow-sm
                           transition duration-300
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
                        class="relative block
                               aspect-[4/3]
                               overflow-hidden
                               bg-gradient-to-br
                               from-slate-50
                               to-forest-50"
                    >

                        @if($product->image_url)

                            <img
                                src="{{ $product->image_url }}"
                                alt="{{ $product->name }}"
                                loading="lazy"
                                class="product-card-image
                                       h-full w-full
                                       object-cover"
                            >

                        @else

                            <div
                                class="flex h-full w-full
                                       items-center
                                       justify-center
                                       bg-gradient-to-br
                                       from-forest-50
                                       via-white
                                       to-kal-100"
                            >

                                <div class="text-center">

                                    <div
                                        class="mx-auto grid
                                               h-20 w-20
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

                                    <div
                                        class="mt-3
                                               text-[10px]
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


                        @if($product->is_featured)

                            <div
                                class="absolute left-4 top-4
                                       rounded-full
                                       bg-yellow-400
                                       px-3 py-1.5
                                       text-[10px]
                                       font-extrabold
                                       uppercase
                                       text-forest-950
                                       shadow"
                            >
                                ★ Featured
                            </div>

                        @endif


                        @if($product->category)

                            <div
                                class="absolute bottom-4
                                       right-4
                                       rounded-full
                                       bg-white/95
                                       px-3 py-1.5
                                       text-[10px]
                                       font-extrabold
                                       uppercase
                                       tracking-wide
                                       text-forest-800
                                       shadow"
                            >
                                {{ $product->category }}
                            </div>

                        @endif

                    </a>


                    {{-- CONTENT --}}

                    <div class="p-6">

                        <div
                            class="flex items-center
                                   justify-between gap-3"
                        >

                            <div
                                class="grid h-10 w-10
                                       place-items-center
                                       rounded-xl
                                       bg-forest-50
                                       text-sm
                                       font-extrabold
                                       text-forest-700"
                            >
                                {{ str_pad(
                                    $index + 1,
                                    2,
                                    '0',
                                    STR_PAD_LEFT
                                ) }}
                            </div>


                            @if($product->stock > 0)

                                <span
                                    class="rounded-full
                                           bg-emerald-50
                                           px-2.5 py-1
                                           text-[10px]
                                           font-bold
                                           text-emerald-700"
                                >
                                    Available
                                </span>

                            @else

                                <span
                                    class="rounded-full
                                           bg-slate-100
                                           px-2.5 py-1
                                           text-[10px]
                                           font-bold
                                           text-slate-500"
                                >
                                    Contact Us
                                </span>

                            @endif

                        </div>


                        <a
                            href="{{ route(
                                'catalog.show',
                                $product
                            ) }}"
                        >

                            <h3
                                class="mt-5 text-xl
                                       font-extrabold
                                       text-slate-950
                                       transition
                                       group-hover:text-forest-700"
                            >
                                {{ $product->name }}
                            </h3>

                        </a>


                        <p
                            class="mt-2 min-h-[48px]
                                   text-sm leading-6
                                   text-slate-500"
                        >
                            {{ $product->short_description
                                ?: \Illuminate\Support\Str::limit(
                                    $product->description
                                        ?: 'Contact us for complete product details.',
                                    100
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
                                               font-semibold
                                               text-slate-400"
                                    >
                                        / {{ $product->unit }}
                                    </span>

                                @endif

                            </div>

                        @endif


                        <div
                            class="mt-5 flex
                                   items-center
                                   justify-between
                                   gap-3
                                   border-t
                                   border-slate-100
                                   pt-4"
                        >

                            <a
                                href="{{ route(
                                    'catalog.show',
                                    $product
                                ) }}"
                                class="text-sm
                                       font-extrabold
                                       text-forest-700
                                       hover:text-forest-900"
                            >
                                View Details →
                            </a>


                            <button
                                type="button"
                                data-product-name="{{ $product->name }}"
                                class="productEnquiryBtn
                                       text-xs
                                       font-bold
                                       text-slate-500
                                       hover:text-forest-700"
                            >
                                Enquire
                            </button>

                        </div>

                    </div>

                </article>

            @empty

                <div
                    class="col-span-full
                           rounded-[2rem]
                           border-2
                           border-dashed
                           border-slate-200
                           bg-slate-50
                           px-6 py-16
                           text-center"
                >

                    <div class="text-4xl">
                        🌱
                    </div>

                    <h3
                        class="mt-4 text-xl
                               font-extrabold
                               text-slate-900"
                    >
                        Products are being updated
                    </h3>

                    <p
                        class="mt-2 text-sm
                               text-slate-500"
                    >
                        Please contact us for our latest products.
                    </p>

                </div>

            @endforelse

        </div>


        {{-- VIEW ALL BUTTON --}}

        @if($totalProducts > 8)

            <div
                class="mt-12 text-center"
            >

                <a
                    href="{{ route('catalog.index') }}"
                    class="inline-flex
                           items-center
                           justify-center
                           gap-3
                           rounded-full
                           bg-forest-700
                           px-8 py-4
                           text-sm
                           font-extrabold
                           text-white
                           shadow-lg
                           transition
                           hover:-translate-y-0.5
                           hover:bg-forest-800"
                >
                    View All
                    {{ number_format($totalProducts) }}
                    Products

                    <span>
                        →
                    </span>

                </a>

            </div>

        @endif


        {{-- PRODUCT SEGMENTS --}}

        <div
            class="mt-14
                   rounded-[2rem]
                   bg-forest-950
                   p-7 text-white
                   lg:p-10"
        >

            <div
                class="grid gap-8
                       lg:grid-cols-[.9fr_1.1fr]
                       lg:items-center"
            >

                <div>

                    <div
                        class="text-xs
                               font-extrabold
                               uppercase
                               tracking-[.2em]
                               text-yellow-400"
                    >
                        Product Segments
                    </div>


                    <h3
                        class="mt-3
                               text-2xl
                               font-extrabold
                               sm:text-3xl"
                    >
                        Complete crop solution product range.
                    </h3>


                    <p
                        class="mt-4 text-sm
                               leading-7
                               text-white/65"
                    >
                        Contact our team for product pack size,
                        formulation, dosage, crop recommendation,
                        dealer pricing and availability.
                    </p>

                </div>


                <div
                    class="grid grid-cols-2
                           gap-3 text-sm
                           sm:grid-cols-3"
                >

                    <div class="rounded-xl bg-white/10 p-4">
                        ✔ Humic Acid
                    </div>

                    <div class="rounded-xl bg-white/10 p-4">
                        ✔ Humic Liquid
                    </div>

                    <div class="rounded-xl bg-white/10 p-4">
                        ✔ Amino Acid
                    </div>

                    <div class="rounded-xl bg-white/10 p-4">
                        ✔ Amino Fulvic
                    </div>

                    <div class="rounded-xl bg-white/10 p-4">
                        ✔ Micronutrients
                    </div>

                    <div class="rounded-xl bg-white/10 p-4">
                        ✔ Chelated Zinc
                    </div>

                    <div class="rounded-xl bg-white/10 p-4">
                        ✔ Bio Products
                    </div>

                    <div class="rounded-xl bg-white/10 p-4">
                        ✔ Bio Pesticide
                    </div>

                    <div class="rounded-xl bg-white/10 p-4">
                        ✔ Granules
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================ --}}
{{-- WHY US --}}
{{-- ============================================================ --}}

<section
    id="quality"
    class="py-24"
>

    <div
        class="mx-auto
               max-w-7xl
               px-4
               sm:px-6
               lg:px-8"
    >

        <div
            class="mx-auto
                   max-w-3xl
                   text-center"
        >

            <div
                class="text-xs
                       font-extrabold
                       uppercase
                       tracking-[.22em]
                       text-forest-700"
            >
                Why Kalindri Agritech
            </div>


            <h2
                class="mt-4
                       text-3xl
                       font-extrabold
                       text-slate-950
                       sm:text-5xl"
            >
                Reliable agriculture solutions for modern farming.
            </h2>

        </div>


        <div
            class="mt-12
                   grid gap-5
                   md:grid-cols-2
                   lg:grid-cols-4"
        >


            <div
                class="rounded-3xl
                       border
                       border-slate-100
                       bg-white
                       p-7 shadow-sm
                       transition
                       hover:-translate-y-1
                       hover:shadow-soft"
            >

                <div class="text-3xl">
                    🌱
                </div>

                <h3
                    class="mt-4
                           text-lg
                           font-extrabold"
                >
                    Crop Focused
                </h3>

                <p
                    class="mt-3
                           text-sm
                           leading-6
                           text-slate-500"
                >
                    Products focused on crop growth,
                    nutrition and field performance.
                </p>

            </div>


            <div
                class="rounded-3xl
                       border
                       border-slate-100
                       bg-white
                       p-7 shadow-sm
                       transition
                       hover:-translate-y-1
                       hover:shadow-soft"
            >

                <div class="text-3xl">
                    🧪
                </div>

                <h3
                    class="mt-4
                           text-lg
                           font-extrabold"
                >
                    Multiple Formulations
                </h3>

                <p
                    class="mt-3
                           text-sm
                           leading-6
                           text-slate-500"
                >
                    Liquid, technical, bio and granule
                    based agriculture products.
                </p>

            </div>


            <div
                class="rounded-3xl
                       border
                       border-slate-100
                       bg-white
                       p-7 shadow-sm
                       transition
                       hover:-translate-y-1
                       hover:shadow-soft"
            >

                <div class="text-3xl">
                    🤝
                </div>

                <h3
                    class="mt-4
                           text-lg
                           font-extrabold"
                >
                    Dealer Friendly
                </h3>

                <p
                    class="mt-3
                           text-sm
                           leading-6
                           text-slate-500"
                >
                    Direct enquiry support for distributors,
                    dealers and agriculture retailers.
                </p>

            </div>


            <div
                class="rounded-3xl
                       border
                       border-slate-100
                       bg-white
                       p-7 shadow-sm
                       transition
                       hover:-translate-y-1
                       hover:shadow-soft"
            >

                <div class="text-3xl">
                    📞
                </div>

                <h3
                    class="mt-4
                           text-lg
                           font-extrabold"
                >
                    Direct Support
                </h3>

                <p
                    class="mt-3
                           text-sm
                           leading-6
                           text-slate-500"
                >
                    Easy contact with Kalindri Agritech
                    for product requirements and support.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================ --}}
{{-- CONTACT --}}
{{-- ============================================================ --}}

<section
    id="contact"
    class="bg-forest-900
           py-24
           text-white"
>

    <div
        class="mx-auto
               max-w-7xl
               px-4
               sm:px-6
               lg:px-8"
    >


        {{-- SUCCESS MESSAGE --}}

        @if(session('success'))

            <div
                class="mb-6
                       rounded-2xl
                       border
                       border-green-300/20
                       bg-green-500/10
                       px-5 py-4
                       font-semibold
                       text-green-100"
            >
                {{ session('success') }}
            </div>

        @endif


        {{-- VALIDATION ERRORS --}}

        @if($errors->any())

            <div
                class="mb-6
                       rounded-2xl
                       border
                       border-red-300/20
                       bg-red-500/10
                       px-5 py-4
                       text-red-100"
            >

                <div class="font-extrabold">
                    Please check the form:
                </div>


                <ul
                    class="mt-2
                           list-disc
                           space-y-1
                           pl-5
                           text-sm"
                >

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <div
            class="overflow-hidden
                   rounded-[2rem]
                   bg-white
                   shadow-2xl"
        >

            <div
                class="grid
                       lg:grid-cols-[.85fr_1.15fr]"
            >


                {{-- CONTACT DETAILS --}}

                <div
                    class="bg-forest-950
                           p-8 text-white
                           sm:p-10
                           lg:p-12"
                >

                    <div
                        class="text-xs
                               font-extrabold
                               uppercase
                               tracking-[.2em]
                               text-yellow-400"
                    >
                        Contact Kalindri Agritech
                    </div>


                    <h2
                        class="mt-4
                               text-3xl
                               font-extrabold"
                    >
                        Product, dealership or bulk enquiry?
                    </h2>


                    <p
                        class="mt-4
                               text-sm
                               leading-7
                               text-white/65"
                    >

                        Send your requirement and contact
                        Kalindri Agritech Private Limited
                        directly for product details,
                        dealership, distribution and availability.

                    </p>


                    <div
                        class="mt-8
                               space-y-4
                               text-sm"
                    >


                        <div
                            class="rounded-2xl
                                   bg-white/10
                                   p-4"
                        >

                            👤

                            <span
                                class="ml-2 font-bold"
                            >
                                Sudeep Kumar — Founder & CEO
                            </span>

                        </div>


                        <a
                            href="tel:+918840702499"
                            class="block
                                   rounded-2xl
                                   bg-white/10
                                   p-4
                                   transition
                                   hover:bg-white/15"
                        >

                            📞

                            <span
                                class="ml-2 font-bold"
                            >
                                +91 88407 02499
                            </span>

                        </a>


                        <a
                            href="mailto:kalindriagritechprivatelimited@gmail.com"
                            class="block
                                   break-all
                                   rounded-2xl
                                   bg-white/10
                                   p-4
                                   transition
                                   hover:bg-white/15"
                        >

                            ✉

                            <span
                                class="ml-2 font-bold"
                            >
                                kalindriagritechprivatelimited@gmail.com
                            </span>

                        </a>


                        <div
                            class="rounded-2xl
                                   bg-white/10
                                   p-4"
                        >

                            📍

                            <span
                                class="ml-2
                                       font-bold
                                       leading-6"
                            >
                                Plot No. 151, Bairi,
                                Arazi No. 549,
                                Akbarpur Bangar,
                                Kalyanpur,
                                Kanpur Nagar,
                                Uttar Pradesh – 208017.
                            </span>

                        </div>

                    </div>

                </div>


                {{-- CONTACT FORM --}}

                <form
                    method="POST"
                    action="{{ route('enquiries.store') }}"
                    class="grid gap-5
                           p-8
                           text-slate-800
                           sm:p-10
                           lg:grid-cols-2
                           lg:p-12"
                >

                    @csrf


                    <div class="lg:col-span-2">

                        <div
                            class="text-xs
                                   font-extrabold
                                   uppercase
                                   tracking-[.2em]
                                   text-forest-700"
                        >
                            Quick Enquiry
                        </div>


                        <h3
                            class="mt-2
                                   text-2xl
                                   font-extrabold
                                   text-slate-950"
                        >
                            Tell us what you need
                        </h3>

                    </div>


                    {{-- PRODUCT NAME --}}

                    <div
                        id="selectedProductBox"
                        class="
                            lg:col-span-2

                            {{ old('product_name')
                                ? ''
                                : 'hidden'
                            }}
                        "
                    >

                        <div
                            class="rounded-xl
                                   border
                                   border-forest-200
                                   bg-forest-50
                                   p-4"
                        >

                            <div
                                class="text-xs
                                       font-bold
                                       uppercase
                                       tracking-wide
                                       text-forest-700"
                            >
                                Selected Product
                            </div>


                            <div
                                id="selectedProductName"
                                class="mt-1
                                       font-extrabold
                                       text-forest-950"
                            >
                                {{ old('product_name') }}
                            </div>

                        </div>

                    </div>


                    <input
                        id="productNameInput"
                        type="hidden"
                        name="product_name"
                        value="{{ old('product_name') }}"
                    >


                    {{-- NAME --}}

                    <label
                        class="text-sm font-bold"
                    >

                        Full Name

                        <span class="text-red-500">
                            *
                        </span>


                        <input
                            required
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Your name"
                            class="mt-2
                                   w-full
                                   rounded-xl
                                   border
                                   border-slate-200
                                   px-4 py-3.5
                                   font-normal
                                   outline-none
                                   transition
                                   focus:border-forest-500
                                   focus:ring-4
                                   focus:ring-forest-100"
                        >

                    </label>


                    {{-- MOBILE --}}

                    <label
                        class="text-sm font-bold"
                    >

                        Mobile Number

                        <span class="text-red-500">
                            *
                        </span>


                        <input
                            required
                            type="tel"
                            name="mobile"
                            value="{{ old('mobile') }}"
                            placeholder="+91 XXXXX XXXXX"
                            class="mt-2
                                   w-full
                                   rounded-xl
                                   border
                                   border-slate-200
                                   px-4 py-3.5
                                   font-normal
                                   outline-none
                                   transition
                                   focus:border-forest-500
                                   focus:ring-4
                                   focus:ring-forest-100"
                        >

                    </label>


                    {{-- REQUIREMENT --}}

                    <label
                        class="text-sm font-bold"
                    >

                        Requirement

                        <select
                            id="requirementSelect"
                            name="requirement"
                            class="mt-2
                                   w-full
                                   rounded-xl
                                   border
                                   border-slate-200
                                   bg-white
                                   px-4 py-3.5
                                   font-normal
                                   outline-none
                                   transition
                                   focus:border-forest-500
                                   focus:ring-4
                                   focus:ring-forest-100"
                        >

                            <option
                                value="Product Enquiry"
                                @selected(
                                    old('requirement')
                                    ===
                                    'Product Enquiry'
                                )
                            >
                                Product Enquiry
                            </option>


                            <option
                                value="Humic Products"
                                @selected(
                                    old('requirement')
                                    ===
                                    'Humic Products'
                                )
                            >
                                Humic Products
                            </option>


                            <option
                                value="Amino / Fulvic"
                                @selected(
                                    old('requirement')
                                    ===
                                    'Amino / Fulvic'
                                )
                            >
                                Amino / Fulvic
                            </option>


                            <option
                                value="Micronutrients"
                                @selected(
                                    old('requirement')
                                    ===
                                    'Micronutrients'
                                )
                            >
                                Micronutrients
                            </option>


                            <option
                                value="Bio Products"
                                @selected(
                                    old('requirement')
                                    ===
                                    'Bio Products'
                                )
                            >
                                Bio Products
                            </option>


                            <option
                                value="Crop Protection"
                                @selected(
                                    old('requirement')
                                    ===
                                    'Crop Protection'
                                )
                            >
                                Crop Protection
                            </option>


                            <option
                                value="Dealership / Bulk Order"
                                @selected(
                                    old('requirement')
                                    ===
                                    'Dealership / Bulk Order'
                                )
                            >
                                Dealership / Bulk Order
                            </option>

                        </select>

                    </label>


                    {{-- CITY --}}

                    <label
                        class="text-sm font-bold"
                    >

                        City / District


                        <input
                            type="text"
                            name="city"
                            value="{{ old('city') }}"
                            placeholder="Your location"
                            class="mt-2
                                   w-full
                                   rounded-xl
                                   border
                                   border-slate-200
                                   px-4 py-3.5
                                   font-normal
                                   outline-none
                                   transition
                                   focus:border-forest-500
                                   focus:ring-4
                                   focus:ring-forest-100"
                        >

                    </label>


                    {{-- MESSAGE --}}

                    <label
                        class="text-sm
                               font-bold
                               lg:col-span-2"
                    >

                        Message


                        <textarea
                            id="messageInput"
                            name="message"
                            rows="4"
                            placeholder="Product name, quantity or any specific requirement"
                            class="mt-2
                                   w-full
                                   resize-y
                                   rounded-xl
                                   border
                                   border-slate-200
                                   px-4 py-3.5
                                   font-normal
                                   outline-none
                                   transition
                                   focus:border-forest-500
                                   focus:ring-4
                                   focus:ring-forest-100"
                        >{{ old('message') }}</textarea>

                    </label>


                    <div class="lg:col-span-2">

                        <button
                            type="submit"
                            class="w-full
                                   rounded-xl
                                   bg-forest-700
                                   px-6 py-4
                                   text-sm
                                   font-extrabold
                                   text-white
                                   shadow-lg
                                   transition
                                   hover:bg-forest-800"
                        >
                            Send Enquiry →
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>

</main>


{{-- ============================================================ --}}
{{-- FOOTER --}}
{{-- ============================================================ --}}

<footer
    class="bg-forest-950
           text-white/70"
>

    <div
        class="mx-auto
               max-w-7xl
               px-4 py-14
               sm:px-6
               lg:px-8"
    >

        <div
            class="grid gap-10
                   md:grid-cols-2
                   lg:grid-cols-4"
        >


            {{-- LOGO --}}

            <div>

                <img
                    src="{{ asset('images/kalindri-logo.png') }}"
                    alt="Kalindri Agritech"
                    class="h-24
                           w-44
                           rounded-xl
                           bg-white
                           object-contain
                           p-2"
                >


                <p
                    class="mt-4
                           text-sm
                           leading-7"
                >
                    Agriculture inputs, crop nutrition,
                    bio products, micronutrients and
                    crop protection solutions.
                </p>

            </div>


            {{-- LINKS --}}

            <div>

                <h4
                    class="text-sm
                           font-extrabold
                           text-white"
                >
                    Quick Links
                </h4>


                <div
                    class="mt-4
                           space-y-3
                           text-sm"
                >

                    <a
                        href="#about"
                        class="block hover:text-white"
                    >
                        About Company
                    </a>

                    <a
                        href="#products"
                        class="block hover:text-white"
                    >
                        Products
                    </a>

                    <a
                        href="#quality"
                        class="block hover:text-white"
                    >
                        Why Us
                    </a>

                    <a
                        href="#contact"
                        class="block hover:text-white"
                    >
                        Contact
                    </a>

                </div>

            </div>


            {{-- SEGMENTS --}}

            <div>

                <h4
                    class="text-sm
                           font-extrabold
                           text-white"
                >
                    Product Segments
                </h4>


                <div
                    class="mt-4
                           space-y-3
                           text-sm"
                >

                    <div>
                        Humic Products
                    </div>

                    <div>
                        Amino & Fulvic
                    </div>

                    <div>
                        Micronutrients
                    </div>

                    <div>
                        Bio & Crop Protection
                    </div>

                </div>

            </div>


            {{-- CONTACT --}}

            <div>

                <h4
                    class="text-sm
                           font-extrabold
                           text-white"
                >
                    Contact
                </h4>


                <div
                    class="mt-4
                           space-y-3
                           text-sm"
                >

                    <a
                        href="tel:+918840702499"
                        class="block hover:text-white"
                    >
                        +91 88407 02499
                    </a>


                    <a
                        href="mailto:kalindriagritechprivatelimited@gmail.com"
                        class="block
                               break-all
                               hover:text-white"
                    >
                        kalindriagritechprivatelimited@gmail.com
                    </a>


                    <div>
                        Kanpur Nagar,
                        Uttar Pradesh – 208017
                    </div>

                </div>

            </div>

        </div>


        <div
            class="mt-12
                   flex flex-col
                   gap-3
                   border-t
                   border-white/10
                   pt-6
                   text-xs
                   sm:flex-row
                   sm:justify-between"
        >

            <div>
                © {{ date('Y') }}
                Kalindri Agritech Private Limited.
                All rights reserved.
            </div>


            <div>
                Founder & CEO: Sudeep Kumar
            </div>

        </div>

    </div>

</footer>


{{-- ============================================================ --}}
{{-- WHATSAPP BUTTON --}}
{{-- ============================================================ --}}

<a
    href="https://wa.me/918840702499?text={{ urlencode('Hello Kalindri Agritech, I want information about your agriculture products.') }}"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="Chat on WhatsApp"
    class="fixed
           bottom-5 right-5
           z-50
           grid h-14 w-14
           place-items-center
           rounded-full
           bg-green-500
           text-2xl
           text-white
           shadow-2xl
           transition
           hover:scale-105
           hover:bg-green-600"
>
    💬
</a>


{{-- ============================================================ --}}
{{-- JAVASCRIPT --}}
{{-- ============================================================ --}}

<script>

    document.addEventListener(
        'DOMContentLoaded',
        function () {


            /*
            |--------------------------------------------------------------------------
            | Mobile Menu
            |--------------------------------------------------------------------------
            */

            const menuBtn =
                document.getElementById(
                    'menuBtn'
                );


            const mobileMenu =
                document.getElementById(
                    'mobileMenu'
                );


            if (
                menuBtn
                &&
                mobileMenu
            ) {

                menuBtn.addEventListener(
                    'click',
                    function () {

                        mobileMenu
                            .classList
                            .toggle(
                                'hidden'
                            );


                        const expanded =
                            !mobileMenu
                                .classList
                                .contains(
                                    'hidden'
                                );


                        menuBtn.setAttribute(
                            'aria-expanded',
                            expanded
                                ? 'true'
                                : 'false'
                        );


                        menuBtn.textContent =
                            expanded
                                ? '✕'
                                : '☰';

                    }
                );


                mobileMenu
                    .querySelectorAll('a')
                    .forEach(
                        function (link) {

                            link.addEventListener(
                                'click',
                                function () {

                                    mobileMenu
                                        .classList
                                        .add(
                                            'hidden'
                                        );


                                    menuBtn
                                        .setAttribute(
                                            'aria-expanded',
                                            'false'
                                        );


                                    menuBtn.textContent =
                                        '☰';

                                }
                            );

                        }
                    );

            }



            /*
            |--------------------------------------------------------------------------
            | Product Search
            |--------------------------------------------------------------------------
            */

            const productSearch =
                document.getElementById(
                    'productSearch'
                );


            const productCards =
                document.querySelectorAll(
                    '.product-card'
                );


            const noProducts =
                document.getElementById(
                    'noProducts'
                );


            if (
                productSearch
                &&
                productCards.length > 0
            ) {

                productSearch.addEventListener(
                    'input',
                    function () {

                        const query =
                            this.value
                                .trim()
                                .toLowerCase();


                        let visibleProducts =
                            0;


                        productCards.forEach(
                            function (card) {

                                const searchableText =
                                    (
                                        card.dataset.product
                                        ||
                                        ''
                                    )
                                    .toLowerCase();


                                const shouldShow =
                                    searchableText
                                        .includes(
                                            query
                                        );


                                card.classList.toggle(
                                    'hidden',
                                    !shouldShow
                                );


                                if (shouldShow) {

                                    visibleProducts++;

                                }

                            }
                        );


                        if (noProducts) {

                            noProducts
                                .classList
                                .toggle(
                                    'hidden',
                                    visibleProducts !== 0
                                );

                        }

                    }
                );

            }



            /*
            |--------------------------------------------------------------------------
            | Product Enquiry
            |--------------------------------------------------------------------------
            */

            const enquiryButtons =
                document.querySelectorAll(
                    '.productEnquiryBtn'
                );


            const productNameInput =
                document.getElementById(
                    'productNameInput'
                );


            const selectedProductBox =
                document.getElementById(
                    'selectedProductBox'
                );


            const selectedProductName =
                document.getElementById(
                    'selectedProductName'
                );


            const requirementSelect =
                document.getElementById(
                    'requirementSelect'
                );


            const messageInput =
                document.getElementById(
                    'messageInput'
                );


            enquiryButtons.forEach(
                function (button) {

                    button.addEventListener(
                        'click',
                        function () {

                            const productName =
                                this.dataset
                                    .productName;


                            if (
                                productNameInput
                            ) {

                                productNameInput.value =
                                    productName;

                            }


                            if (
                                selectedProductName
                            ) {

                                selectedProductName.textContent =
                                    productName;

                            }


                            if (
                                selectedProductBox
                            ) {

                                selectedProductBox
                                    .classList
                                    .remove(
                                        'hidden'
                                    );

                            }


                            if (
                                requirementSelect
                            ) {

                                requirementSelect.value =
                                    'Product Enquiry';

                            }


                            if (
                                messageInput
                                &&
                                !messageInput.value.trim()
                            ) {

                                messageInput.value =
                                    'I want information about ' +
                                    productName +
                                    '.';

                            }


                            const contactSection =
                                document.getElementById(
                                    'contact'
                                );


                            if (
                                contactSection
                            ) {

                                contactSection
                                    .scrollIntoView(
                                        {
                                            behavior:
                                                'smooth',
                                            block:
                                                'start'
                                        }
                                    );

                            }

                        }
                    );

                }
            );



            /*
            |--------------------------------------------------------------------------
            | Scroll To Form When Validation Error Exists
            |--------------------------------------------------------------------------
            */

            @if($errors->any())

                const contactSection =
                    document.getElementById(
                        'contact'
                    );


                if (contactSection) {

                    setTimeout(
                        function () {

                            contactSection
                                .scrollIntoView(
                                    {
                                        behavior:
                                            'smooth',
                                        block:
                                            'start'
                                    }
                                );

                        },
                        200
                    );

                }

            @endif

        }
    );

</script>
</body>

</html>