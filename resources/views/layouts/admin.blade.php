<!DOCTYPE html>
<html lang="en">

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

    <title>
        @yield('title', 'Dashboard') | Bhavik Solar
    </title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#effcf7',
                            100: '#daf2df',
                            200: '#b7e6c2',
                            300: '#85d293',
                            400: '#50b968',
                            500: '#2c9a49',
                            600: '#087f5b',
                            700: '#086a50',
                            800: '#075642',
                            900: '#064435',
                            950: '#032c24',
                        },
                    },

                    boxShadow: {
                        sidebar:
                            '0 15px 40px rgba(15, 23, 42, 0.08)',
                        card:
                            '0 8px 30px rgba(15, 23, 42, 0.05)',
                    }
                }
            }
        }
    </script>

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

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Inter, sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        .font-display {
            font-family: Manrope, sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 30px;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-[#f7f9fb] text-slate-800">

<div class="min-h-screen">

    {{-- ====================================================== --}}
    {{-- MOBILE OVERLAY --}}
    {{-- ====================================================== --}}

    <div
        id="sidebarOverlay"
        onclick="closeSidebar()"
        class="fixed inset-0 z-40 hidden bg-slate-950/50
               backdrop-blur-sm lg:hidden"
    ></div>


    {{-- ====================================================== --}}
    {{-- SIDEBAR --}}
    {{-- ====================================================== --}}

    <aside
        id="sidebar"
        class="fixed left-0 top-0 z-50 flex h-screen w-[270px]
               -translate-x-full flex-col border-r border-slate-200
               bg-white transition-transform duration-300
               lg:translate-x-0"
    >

        {{-- LOGO --}}

        <div
            class="flex h-[82px] items-center border-b
                   border-slate-100 px-5"
        >

            <a
                href="{{ route('dashboard') }}"
                class="flex items-center gap-3"
            >

                <div
                    class="grid h-12 w-14 place-items-center
                           overflow-hidden rounded-xl border
                           border-slate-100 bg-white"
                >
                    <img
                        src="{{ asset('bhavik/assets/logo.jpg') }}"
                        alt="Bhavik Solar"
                        class="h-full w-full object-contain"
                    >
                </div>

                <div>

                    <div
                        class="text-[15px] font-extrabold
                               text-slate-950"
                    >
                        BHAVIK
                        <span class="text-brand-700">
                            SOLAR
                        </span>
                    </div>

                    <div
                        class="mt-0.5 text-[9px] font-bold
                               uppercase tracking-[.16em]
                               text-slate-400"
                    >
                        Admin Panel
                    </div>

                </div>

            </a>

        </div>


        {{-- USER / BUSINESS CARD --}}

        <div class="px-4 pt-5">

            <div
                class="rounded-2xl border border-brand-100
                       bg-gradient-to-br from-brand-50
                       to-white p-3.5"
            >

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-11 w-11 shrink-0 items-center
                               justify-center rounded-xl
                               bg-brand-700 text-base font-extrabold
                               text-white"
                    >
                        {{ strtoupper(
                            substr(auth()->user()->name ?? 'A', 0, 1)
                        ) }}
                    </div>

                    <div class="min-w-0 flex-1">

                        <div
                            class="truncate text-sm font-extrabold
                                   text-slate-900"
                        >
                            {{ auth()->user()->name }}
                        </div>

                        <div
                            class="mt-1 flex items-center gap-1.5
                                   text-[10px] font-semibold
                                   text-brand-700"
                        >

                            <span
                                class="h-2 w-2 rounded-full
                                       bg-emerald-500"
                            ></span>

                            Active Admin

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- MENU --}}

        <div
            class="custom-scrollbar flex-1 overflow-y-auto
                   px-4 pb-8 pt-6"
        >

            <div
                class="mb-2 px-3 text-[10px] font-bold
                       uppercase tracking-[.18em]
                       text-slate-400"
            >
                Overview
            </div>


            {{-- Dashboard --}}

            <a
                href="{{ route('dashboard') }}"
                class="
                    mb-1.5 flex items-center gap-3 rounded-xl
                    px-3.5 py-3 text-sm font-semibold transition

                    {{ request()->routeIs('dashboard')
                        ? 'bg-brand-50 text-brand-800'
                        : 'text-slate-600 hover:bg-slate-50 hover:text-slate-950'
                    }}
                "
            >

                <svg
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <rect x="3" y="3" width="7" height="7" rx="2"/>
                    <rect x="14" y="3" width="7" height="7" rx="2"/>
                    <rect x="3" y="14" width="7" height="7" rx="2"/>
                    <rect x="14" y="14" width="7" height="7" rx="2"/>
                </svg>

                <span>Dashboard</span>

            </a>


            <div class="mb-2 mt-7 px-3 text-[10px] font-bold uppercase tracking-[.18em] text-slate-400">Website Management</div>


            {{-- Enquiries --}}

            <a
                href="{{ route('admin.enquiries.index') }}"
                class="
                    mb-1.5 flex items-center justify-between
                    rounded-xl px-3.5 py-3 text-sm
                    font-semibold transition

                    {{ request()->routeIs('admin.enquiries.*')
                        ? 'bg-brand-50 text-brand-800'
                        : 'text-slate-600 hover:bg-slate-50 hover:text-slate-950'
                    }}
                "
            >

                <span class="flex items-center gap-3">

                    <svg
                        class="h-5 w-5"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path d="M6 2h9l5 5v15H6z"/>
                        <path d="M14 2v6h6"/>
                        <path d="M9 13h8M9 17h6"/>
                    </svg>

                    Enquiries

                </span>

            </a>

            @foreach(['services'=>'Solar Services','projects'=>'Solar Projects'] as $resource=>$label)
            <a href="{{ route('admin.'.$resource.'.index') }}" class="mb-1.5 flex items-center gap-3 rounded-xl px-3.5 py-3 text-sm font-semibold {{ request()->routeIs('admin.'.$resource.'.*') ? 'bg-brand-50 text-brand-800' : 'text-slate-600 hover:bg-slate-50' }}"><span>☀</span><span>{{ $label }}</span></a>
            @endforeach
            <a href="{{ route('home') }}" target="_blank" class="mb-1.5 flex items-center gap-3 rounded-xl px-3.5 py-3 text-sm font-semibold text-slate-600 hover:bg-slate-50"><span>↗</span>View Website</a>

            {{-- Product Heading --}}

            <div
                class="mb-2 mt-7 px-3 text-[10px] font-bold
                       uppercase tracking-[.18em]
                       text-slate-400"
            >
                Catalogue
            </div>


            {{-- Products --}}

            <a
                href="{{ route('products.index') }}"
                class="
                    mb-1.5 flex items-center justify-between
                    rounded-xl px-3.5 py-3 text-sm
                    font-semibold transition

                    {{ request()->routeIs('products.*')
                        ? 'bg-brand-50 text-brand-800'
                        : 'text-slate-600 hover:bg-slate-50 hover:text-slate-950'
                    }}
                "
            >

                <span class="flex items-center gap-3">

                    <svg
                        class="h-5 w-5"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path d="M6 2h9l5 5v15H6z"/>
                        <path d="M14 2v6h6"/>
                        <path d="M9 13h8M9 17h6"/>
                    </svg>

                    Products

                </span>

            </a>


            {{-- Add Product --}}

            <a
                href="{{ route('products.create') }}"
                class="
                    mb-1.5 flex items-center gap-3 rounded-xl
                    px-3.5 py-3 text-sm font-semibold transition

                    {{ request()->routeIs('products.create')
                        ? 'bg-brand-50 text-brand-800'
                        : 'text-slate-600 hover:bg-slate-50 hover:text-slate-950'
                    }}
                "
            >

                <svg
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <circle cx="12" cy="12" r="9"/>
                    <path d="M12 8v8M8 12h8"/>
                </svg>

                Add Product

            </a>


            
            {{-- ======================================= --}}
            {{-- TESTIMONIAL MANAGEMENT --}}
            {{-- ======================================= --}}

            <div class="mb-2 mt-7 px-3 text-[10px] font-bold
                        uppercase tracking-[.18em] text-slate-400">
                Customer Reviews
            </div>

            {{-- ALL TESTIMONIALS --}}
            <a
                href="{{ route('testimonials.index') }}"
                class="mb-1.5 flex items-center justify-between
                    rounded-xl px-3.5 py-3 text-sm
                    font-semibold transition
                    {{ request()->routeIs('testimonials.index', 'testimonials.show', 'testimonials.edit')
                            ? 'bg-brand-50 text-brand-800'
                            : 'text-slate-600 hover:bg-slate-50 hover:text-slate-950' }}"
            >
                <span class="flex items-center gap-3">

                    <svg
                        class="h-5 w-5"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8
                                8.5 8.5 0 0 1-7.6 4.7
                                8.38 8.38 0 0 1-3.8-.9L3 21
                                l1.9-5.7a8.38 8.38 0 0 1-.9-3.8
                                8.5 8.5 0 0 1 4.7-7.6
                                8.38 8.38 0 0 1 3.8-.9h.5
                                a8.48 8.48 0 0 1 8 8v.5z"/>

                        <path d="m9 11 2 2 4-4"/>
                    </svg>

                    <span>Testimonials</span>

                </span>
            </a>

            {{-- ADD TESTIMONIAL --}}
            <a
                href="{{ route('testimonials.create') }}"
                class="mb-1.5 flex items-center gap-3
                    rounded-xl px-3.5 py-3 text-sm
                    font-semibold transition
                    {{ request()->routeIs('testimonials.create')
                            ? 'bg-brand-50 text-brand-800'
                            : 'text-slate-600 hover:bg-slate-50 hover:text-slate-950' }}"
            >

                <svg
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <circle cx="12" cy="12" r="9"/>

                    <path d="M12 8v8M8 12h8"/>
                </svg>

                <span>Add Testimonial</span>

            </a>



            {{-- WEBSITE --}}

            <div
                class="mb-2 mt-7 px-3 text-[10px] font-bold
                       uppercase tracking-[.18em]
                       text-slate-400"
            >
                Website
            </div>

            <a
                href="{{ route('home') }}"
                target="_blank"
                class="mb-1.5 flex items-center gap-3 rounded-xl
                       px-3.5 py-3 text-sm font-semibold
                       text-slate-600 transition hover:bg-slate-50
                       hover:text-slate-950"
            >

                <svg
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                >
                    <circle cx="12" cy="12" r="9"/>
                    <path d="M3 12h18"/>
                    <path d="M12 3c3 3 4 6 4 9s-1 6-4 9"/>
                    <path d="M12 3c-3 3-4 6-4 9s1 6 4 9"/>
                </svg>

                View Website

                <svg
                    class="ml-auto h-3.5 w-3.5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path d="M7 17L17 7"/>
                    <path d="M7 7h10v10"/>
                </svg>

            </a>

        </div>


        {{-- LOGOUT --}}

        <div class="border-t border-slate-100 p-4">

            <form
                method="POST"
                action="{{ route('logout') }}"
            >
                @csrf

                <button
                    type="submit"
                    class="flex w-full items-center gap-3
                           rounded-xl px-3.5 py-3
                           text-sm font-semibold
                           text-rose-600 transition
                           hover:bg-rose-50"
                >

                    <svg
                        class="h-5 w-5"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path d="M10 17l5-5-5-5"/>
                        <path d="M15 12H3"/>
                        <path d="M14 4h5a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-5"/>
                    </svg>

                    Logout

                </button>

            </form>

        </div>

    </aside>


    {{-- ====================================================== --}}
    {{-- MAIN AREA --}}
    {{-- ====================================================== --}}

    <div class="min-h-screen lg:pl-[270px]">


        {{-- TOPBAR --}}

        <header
            class="sticky top-0 z-30 flex h-[82px]
                   items-center border-b border-slate-200
                   bg-white/95 px-4 backdrop-blur
                   sm:px-6 lg:px-8"
        >

            <button
                onclick="openSidebar()"
                type="button"
                class="mr-3 grid h-10 w-10 place-items-center
                       rounded-xl border border-slate-200
                       text-slate-600 lg:hidden"
            >

                <svg
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path d="M4 6h16M4 12h16M4 18h16"/>
                </svg>

            </button>


            <div>

                <h1
                    class="text-lg font-extrabold text-slate-950
                           sm:text-xl"
                >
                    @yield('page-title', 'Dashboard')
                </h1>

                <div
                    class="hidden text-xs text-slate-400 sm:block"
                >
                    Bhavik Solar
                </div>

            </div>


            <div class="ml-auto flex items-center gap-3">

                <div
                    class="hidden rounded-xl border border-slate-200
                           bg-white px-4 py-2 text-xs
                           text-slate-500 sm:block"
                >
                    Today:
                    <strong class="text-slate-700">
                        {{ now()->format('d M Y') }}
                    </strong>
                </div>

                <a
                    href="{{ route('home') }}"
                    target="_blank"
                    title="View Website"
                    class="grid h-10 w-10 place-items-center
                           rounded-xl border border-slate-200
                           bg-white text-slate-600 transition
                           hover:bg-brand-50 hover:text-brand-700"
                >

                    <svg
                        class="h-5 w-5"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M3 12h18"/>
                        <path d="M12 3c3 3 4 6 4 9s-1 6-4 9"/>
                    </svg>

                </a>

            </div>

        </header>


        {{-- PAGE CONTENT --}}

        <main class="p-4 sm:p-6 lg:p-8">

            {{-- SUCCESS MESSAGE --}}

            @if(session('success'))

                <div
                    class="mb-6 flex items-start gap-3
                           rounded-2xl border border-emerald-200
                           bg-emerald-50 p-4
                           text-sm text-emerald-800"
                >

                    <svg
                        class="mt-0.5 h-5 w-5 shrink-0"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M8 12l2.5 2.5L16 9"/>
                    </svg>

                    <div class="font-semibold">
                        {{ session('success') }}
                    </div>

                </div>

            @endif


            {{-- VALIDATION ERRORS --}}

            @if($errors->any())

                <div
                    class="mb-6 rounded-2xl border border-rose-200
                           bg-rose-50 p-4"
                >

                    <div
                        class="font-bold text-rose-800"
                    >
                        Please fix the following errors:
                    </div>

                    <ul
                        class="mt-2 list-disc space-y-1 pl-5
                               text-sm text-rose-700"
                    >

                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif


            @yield('content')

        </main>

    </div>

</div>


<script>

    function openSidebar() {

        const sidebar =
            document.getElementById('sidebar');

        const overlay =
            document.getElementById('sidebarOverlay');

        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');

        document.body.classList.add('overflow-hidden');
    }


    function closeSidebar() {

        const sidebar =
            document.getElementById('sidebar');

        const overlay =
            document.getElementById('sidebarOverlay');

        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');

        document.body.classList.remove('overflow-hidden');
    }


    window.addEventListener('resize', function () {

        if (window.innerWidth >= 1024) {

            document
                .getElementById('sidebarOverlay')
                .classList
                .add('hidden');

            document.body.classList.remove('overflow-hidden');

        }

    });

</script>

@stack('scripts')

</body>
</html>