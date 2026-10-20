@extends('layouts.admin')

@section('title', 'Products')
@section('page-title', 'Product Management')

@section('content')

{{-- PAGE HEADER --}}

<div
    class="flex flex-col gap-4 sm:flex-row
           sm:items-center sm:justify-between"
>

    <div>

        <h2
            class="text-xl font-extrabold text-slate-950"
        >
            Products
        </h2>

        <p
            class="mt-1 text-sm text-slate-500"
        >
            Add, edit, manage stock and control website products.
        </p>

    </div>


    <a
        href="{{ route('products.create') }}"
        class="inline-flex items-center justify-center gap-2
               rounded-xl bg-brand-700 px-5 py-3
               text-sm font-bold text-white shadow-md
               transition hover:bg-brand-800"
    >

        <svg
            class="h-5 w-5"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
        >
            <path d="M12 5v14M5 12h14"/>
        </svg>

        Add Product

    </a>

</div>


{{-- FILTERS --}}

<div
    class="mt-6 rounded-2xl border border-slate-200
           bg-white p-4 shadow-card"
>

    <form
        method="GET"
        action="{{ route('products.index') }}"
        class="grid gap-3 md:grid-cols-4"
    >

        {{-- Search --}}

        <div class="md:col-span-2">

            <label
                class="mb-1.5 block text-xs font-bold
                       text-slate-600"
            >
                Search Product
            </label>

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search by name or category..."
                class="w-full rounded-xl border
                       border-slate-200 bg-white px-4
                       py-2.5 text-sm outline-none
                       transition focus:border-brand-500
                       focus:ring-4 focus:ring-brand-100"
            >

        </div>


        {{-- Category --}}

        <div>

            <label
                class="mb-1.5 block text-xs font-bold
                       text-slate-600"
            >
                Category
            </label>

            <select
                name="category"
                class="w-full rounded-xl border
                       border-slate-200 bg-white px-4
                       py-2.5 text-sm outline-none
                       focus:border-brand-500"
            >

                <option value="">
                    All Categories
                </option>

                @foreach($categories as $category)

                    <option
                        value="{{ $category }}"
                        @selected(
                            request('category') === $category
                        )
                    >
                        {{ $category }}
                    </option>

                @endforeach

            </select>

        </div>


        {{-- Status --}}

        <div>

            <label
                class="mb-1.5 block text-xs font-bold
                       text-slate-600"
            >
                Status
            </label>

            <select
                name="status"
                class="w-full rounded-xl border
                       border-slate-200 bg-white px-4
                       py-2.5 text-sm outline-none
                       focus:border-brand-500"
            >

                <option value="">
                    All Status
                </option>

                <option
                    value="active"
                    @selected(request('status') === 'active')
                >
                    Active
                </option>

                <option
                    value="inactive"
                    @selected(request('status') === 'inactive')
                >
                    Inactive
                </option>

            </select>

        </div>


        <div
            class="flex gap-2 md:col-span-4
                   md:justify-end"
        >

            <a
                href="{{ route('products.index') }}"
                class="rounded-xl border border-slate-200
                       px-5 py-2.5 text-sm font-bold
                       text-slate-600 transition
                       hover:bg-slate-50"
            >
                Reset
            </a>

            <button
                type="submit"
                class="rounded-xl bg-slate-900
                       px-5 py-2.5 text-sm font-bold
                       text-white transition
                       hover:bg-slate-800"
            >
                Apply Filter
            </button>

        </div>

    </form>

</div>


{{-- PRODUCT TABLE --}}

<div
    class="mt-5 overflow-hidden rounded-2xl
           border border-slate-200 bg-white
           shadow-card"
>

    <div
        class="flex items-center justify-between
               border-b border-slate-100
               px-5 py-4"
    >

        <div>

            <div
                class="font-bold text-slate-900"
            >
                Product Catalogue
            </div>

            <div
                class="mt-1 text-xs text-slate-400"
            >
                {{ $products->total() }} total product(s)
            </div>

        </div>

    </div>


    <div class="overflow-x-auto">

        <table
            class="w-full min-w-[1000px] text-left"
        >

            <thead
                class="bg-slate-50 text-[11px]
                       font-bold uppercase tracking-wide
                       text-slate-400"
            >

                <tr>

                    <th class="px-5 py-3">
                        Product
                    </th>

                    <th class="px-5 py-3">
                        Category
                    </th>

                    <th class="px-5 py-3">
                        Price
                    </th>

                    <th class="px-5 py-3">
                        Stock
                    </th>

                    <th class="px-5 py-3">
                        Featured
                    </th>

                    <th class="px-5 py-3">
                        Status
                    </th>

                    {{-- <th class="px-5 py-3">
                        QR Code
                    </th> --}}

                    <th class="px-5 py-3 text-right">
                        Actions
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-slate-100">

            @forelse($products as $product)

                <tr class="hover:bg-slate-50/70">

                    {{-- PRODUCT --}}

                    <td class="px-5 py-4">

                        <div class="flex items-center gap-3">

                            <div
                                class="h-14 w-14 shrink-0
                                       overflow-hidden rounded-xl
                                       border border-slate-100
                                       bg-slate-50"
                            >

                                @if($product->image)

                                    <img
                                        src="{{ Storage::url($product->image) }}"
                                        alt="{{ $product->name }}"
                                        class="h-full w-full
                                               object-cover"
                                    >

                                @else

                                    <div
                                        class="grid h-full w-full
                                               place-items-center
                                               text-slate-300"
                                    >

                                        <svg
                                            class="h-6 w-6"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.8"
                                        >
                                            <path d="M4 5h16v14H4z"/>
                                            <circle cx="9" cy="10" r="2"/>
                                            <path d="M4 17l5-5 3 3 3-2 5 4"/>
                                        </svg>

                                    </div>

                                @endif

                            </div>


                            <div class="min-w-0">

                                <div
                                    class="max-w-[220px] truncate
                                           text-sm font-bold
                                           text-slate-900"
                                >
                                    {{ $product->name }}
                                </div>

                                <div
                                    class="mt-1 max-w-[250px]
                                           truncate text-xs
                                           text-slate-400"
                                >
                                    {{ $product->short_description
                                        ?: 'No description'
                                    }}
                                </div>

                            </div>

                        </div>

                    </td>


                    {{-- CATEGORY --}}

                    <td class="px-5 py-4">

                        <span
                            class="rounded-lg bg-brand-50
                                   px-2.5 py-1.5 text-xs
                                   font-semibold text-brand-700"
                        >
                            {{ $product->category
                                ?: 'Uncategorized'
                            }}
                        </span>

                    </td>


                    {{-- PRICE --}}

                    <td
                        class="px-5 py-4 text-sm
                               font-semibold text-slate-700"
                    >

                        @if($product->price !== null)

                            ₹{{ number_format(
                                (float) $product->price,
                                2
                            ) }}

                            @if($product->unit)
                                <span
                                    class="text-xs
                                           text-slate-400"
                                >
                                    / {{ $product->unit }}
                                </span>
                            @endif

                        @else

                            <span class="text-slate-400">
                                On Request
                            </span>

                        @endif

                    </td>


                    {{-- STOCK --}}

                    <td class="px-5 py-4">

                        @if($product->stock == 0)

                            <span
                                class="rounded-full bg-rose-50
                                       px-2.5 py-1
                                       text-xs font-bold
                                       text-rose-700"
                            >
                                Out of stock
                            </span>

                        @elseif($product->stock <= 5)

                            <span
                                class="rounded-full bg-amber-50
                                       px-2.5 py-1
                                       text-xs font-bold
                                       text-amber-700"
                            >
                                {{ $product->stock }}
                                Low
                            </span>

                        @else

                            <span
                                class="font-bold text-slate-700"
                            >
                                {{ $product->stock }}
                            </span>

                        @endif

                    </td>


                    {{-- FEATURED --}}

                    <td class="px-5 py-4">

                        @if($product->is_featured)

                            <span
                                class="rounded-full bg-violet-50
                                       px-2.5 py-1 text-xs
                                       font-bold text-violet-700"
                            >
                                Featured
                            </span>

                        @else

                            <span class="text-xs text-slate-400">
                                No
                            </span>

                        @endif

                    </td>


                    {{-- STATUS --}}

                    <td class="px-5 py-4">

                        <form
                            method="POST"
                            action="{{ route(
                                'products.toggle-status',
                                $product
                            ) }}"
                        >
                            @csrf
                            @method('PATCH')

                            <button
                                type="submit"
                                class="
                                    rounded-full px-3 py-1.5
                                    text-xs font-bold

                                    {{ $product->is_active
                                        ? 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100'
                                        : 'bg-rose-50 text-rose-700 hover:bg-rose-100'
                                    }}
                                "
                            >
                                {{ $product->is_active
                                    ? 'Active'
                                    : 'Inactive'
                                }}
                            </button>

                        </form>

                    </td>
                    {{-- <td class="px-5 py-4">

                        @if($product->qr_code_url)

                            <div class="flex flex-col items-center gap-2">

                                <img
                                    src="{{ $product->qr_code_url }}"
                                    alt="QR Code"
                                    class="h-20 w-20 rounded border bg-white p-1"
                                >

                                <a
                                    href="{{ $product->qr_code_url }}"
                                    download="product-{{ $product->id }}-qr.svg"
                                    class="text-xs font-semibold text-green-700 underline"
                                >
                                    Download QR
                                </a>

                            </div>

                        @else

                            <span class="text-xs text-gray-400">
                                Not Generated
                            </span>

                        @endif

                    </td> --}}


                    {{-- ACTIONS --}}

                    <td class="px-5 py-4">

                        <div
                            class="flex items-center
                                   justify-end gap-2"
                        >

                            <a
                                href="{{ route(
                                    'products.edit',
                                    $product
                                ) }}"
                                class="grid h-9 w-9
                                       place-items-center
                                       rounded-lg bg-sky-50
                                       text-sky-600 transition
                                       hover:bg-sky-100"
                                title="Edit"
                            >

                                <svg
                                    class="h-4 w-4"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path d="M4 20h4l11-11-4-4L4 16z"/>
                                    <path d="M13 6l4 4"/>
                                </svg>

                            </a>


                            <form
                                method="POST"
                                action="{{ route(
                                    'products.destroy',
                                    $product
                                ) }}"
                                onsubmit="
                                    return confirm(
                                        'Are you sure you want to delete this product?'
                                    );
                                "
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="grid h-9 w-9
                                           place-items-center
                                           rounded-lg bg-rose-50
                                           text-rose-600 transition
                                           hover:bg-rose-100"
                                    title="Delete"
                                >

                                    <svg
                                        class="h-4 w-4"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path d="M4 7h16"/>
                                        <path d="M9 7V4h6v3"/>
                                        <path d="M7 7l1 13h8l1-13"/>
                                    </svg>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="7"
                        class="px-6 py-16 text-center"
                    >

                        <div
                            class="mx-auto grid h-16 w-16
                                   place-items-center
                                   rounded-2xl bg-brand-50
                                   text-brand-700"
                        >

                            <svg
                                class="h-8 w-8"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path d="M4 8l8-4 8 4-8 4z"/>
                                <path d="M4 8v8l8 4 8-4V8"/>
                            </svg>

                        </div>

                        <h3
                            class="mt-4 font-bold
                                   text-slate-900"
                        >
                            No products found
                        </h3>

                        <p
                            class="mt-1 text-sm
                                   text-slate-400"
                        >
                            Add your first agriculture product.
                        </p>

                        <a
                            href="{{ route(
                                'products.create'
                            ) }}"
                            class="mt-5 inline-flex
                                   rounded-xl bg-brand-700
                                   px-5 py-2.5 text-sm
                                   font-bold text-white"
                        >
                            Add Product
                        </a>

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>


    @if($products->hasPages())

        <div
            class="border-t border-slate-100
                   px-5 py-4"
        >
            {{ $products->links() }}
        </div>

    @endif

</div>

@endsection