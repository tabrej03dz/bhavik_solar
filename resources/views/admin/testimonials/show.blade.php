
@extends('layouts.admin')

@section('title', 'View Testimonial')

@section('page-title', 'Testimonial Details')

@section('content')

{{-- PAGE HEADER --}}
<div class="mb-6 flex flex-wrap items-center justify-between gap-3">

    <div>
        <h2 class="text-xl font-extrabold text-slate-950">
            Customer Testimonial
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Review details and website visibility.
        </p>
    </div>

    <div class="flex gap-2">

        <a href="{{ route('testimonials.index') }}"
           class="rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-600 hover:bg-slate-50">
            Back
        </a>

        <a href="{{ route('testimonials.edit', $testimonial) }}"
           class="rounded-xl bg-brand-700 px-5 py-3 text-sm font-bold text-white hover:bg-brand-800">
            Edit Testimonial
        </a>

    </div>
</div>

{{-- CUSTOMER DETAILS --}}
<div class="rounded-2xl border border-slate-200 bg-white p-7 shadow-card">

    <div class="flex flex-wrap items-center gap-5">

        {{-- IMAGE --}}
        @if($testimonial->image)

            <img
                src="{{ Storage::url($testimonial->image) }}"
                alt="{{ $testimonial->name }}"
                class="h-24 w-24 rounded-2xl border border-slate-100 object-cover"
            >

        @else

            <div class="grid h-24 w-24 place-items-center rounded-2xl bg-slate-100 text-3xl font-extrabold text-slate-400">
                {{ strtoupper(substr($testimonial->name, 0, 1)) }}
            </div>

        @endif

        {{-- CUSTOMER INFO --}}
        <div>

            <h3 class="text-2xl font-extrabold text-slate-950">
                {{ $testimonial->name }}
            </h3>

            <p class="mt-1 text-sm text-slate-500">
                {{
                    collect([
                        $testimonial->designation,
                        $testimonial->company,
                        $testimonial->location
                    ])->filter()->join(' · ')
                }}
            </p>

            {{-- STAR RATING --}}
            <p class="mt-3 text-xl text-amber-500">

                {{ str_repeat('★', $testimonial->rating) }}

                <span class="text-sm font-semibold text-slate-500">
                    ({{ $testimonial->rating }}/5)
                </span>

            </p>

        </div>

    </div>

    {{-- REVIEW --}}
    <div class="mt-7 border-t border-slate-100 pt-6">

        <h4 class="mb-2 text-xs font-bold uppercase tracking-wider text-slate-400">
            Customer Review
        </h4>

        <p class="whitespace-pre-line text-base leading-relaxed text-slate-700">
            {{ $testimonial->review }}
        </p>

    </div>

    {{-- STATUS DETAILS --}}
    <div class="mt-7 flex flex-wrap gap-3 border-t border-slate-100 pt-6 text-xs font-bold">

        <span class="rounded-full bg-slate-100 px-3 py-2 text-slate-700">
            Sort Order: {{ $testimonial->sort_order }}
        </span>

        <span class="rounded-full px-3 py-2
            {{ $testimonial->is_active
                ? 'bg-emerald-50 text-emerald-700'
                : 'bg-rose-50 text-rose-700' }}">
            {{ $testimonial->is_active ? 'Active' : 'Inactive' }}
        </span>

        <span class="rounded-full px-3 py-2
            {{ $testimonial->is_featured
                ? 'bg-violet-50 text-violet-700'
                : 'bg-slate-100 text-slate-500' }}">
            {{ $testimonial->is_featured ? 'Featured' : 'Not Featured' }}
        </span>

    </div>

    {{-- ADDITIONAL INFORMATION --}}
    <div class="mt-7 grid gap-5 border-t border-slate-100 pt-6 md:grid-cols-2">

        <div>
            <p class="text-xs font-bold text-slate-400">
                Created At
            </p>

            <p class="mt-1 text-sm font-semibold text-slate-700">
                {{ $testimonial->created_at?->format('d M Y, h:i A') }}
            </p>
        </div>

        <div>
            <p class="text-xs font-bold text-slate-400">
                Last Updated
            </p>

            <p class="mt-1 text-sm font-semibold text-slate-700">
                {{ $testimonial->updated_at?->format('d M Y, h:i A') }}
            </p>
        </div>

    </div>

</div>

{{-- BOTTOM ACTIONS --}}
<div class="mt-6 flex flex-wrap gap-3">

    <a href="{{ route('testimonials.edit', $testimonial) }}"
       class="rounded-xl bg-brand-700 px-6 py-3 text-sm font-bold text-white hover:bg-brand-800">
        Edit Testimonial
    </a>

    <form
        method="POST"
        action="{{ route('testimonials.destroy', $testimonial) }}"
        onsubmit="return confirm('Are you sure you want to delete this testimonial?')"
    >
        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="rounded-xl bg-rose-50 px-6 py-3 text-sm font-bold text-rose-700 hover:bg-rose-100"
        >
            Delete Testimonial
        </button>
    </form>

</div>

@endsection
