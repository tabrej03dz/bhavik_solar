
@extends('layouts.admin')

@section('title', 'Add Testimonial')

@section('page-title', 'Add Testimonial')

@section('content')

<div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

    <div>
        <h2 class="text-xl font-extrabold text-slate-950">
            Add Customer Testimonial
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Create a new customer review for your website.
        </p>
    </div>

    <a href="{{ route('testimonials.index') }}"
       class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-600 transition hover:bg-slate-50">
        Back to Testimonials
    </a>

</div>

@include('admin.testimonials._form')

@endsection
