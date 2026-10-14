
@extends('layouts.admin')

@section('title', 'Edit Testimonial')

@section('page-title', 'Edit Testimonial')

@section('content')

<div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

    <div>
        <h2 class="text-xl font-extrabold text-slate-950">
            Edit Customer Testimonial
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Update feedback from
            <span class="font-bold text-slate-700">
                {{ $testimonial->name }}
            </span>
        </p>
    </div>

    <div class="flex flex-wrap gap-2">
        <a href="{{ route('testimonials.show', $testimonial) }}"
           class="rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-600 transition hover:bg-slate-50">
            View
        </a>

        <a href="{{ route('testimonials.index') }}"
           class="rounded-xl bg-slate-900 px-5 py-3 text-sm font-bold text-white transition hover:bg-slate-800">
            Back to List
        </a>
    </div>

</div>

@include('admin.testimonials._form')

@endsection
