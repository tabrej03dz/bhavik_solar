
@extends('layouts.website')

@section('title', 'Login')

@section('content')

<section class="relative overflow-hidden bg-[#f3f8f5] py-12 sm:py-20">

    <div class="pointer-events-none absolute -right-28 top-2 h-80 w-80 rounded-full bg-lime-200/45 blur-3xl"></div>

    <div class="relative mx-auto grid max-w-6xl items-center gap-10 px-5 lg:grid-cols-2 lg:gap-20">

        {{-- LEFT SIDE --}}
        <div class="hidden lg:block">

            <span class="inline-flex items-center gap-2 rounded-full bg-emerald-900 px-4 py-2 text-xs font-extrabold uppercase tracking-widest text-lime-300">
                <span class="h-2 w-2 rounded-full bg-lime-400"></span>
                BHAVIK SOLAR • ADMIN PORTAL
            </span>

            <h1 class="mt-8 text-5xl font-extrabold leading-tight text-[#06271f]">
                Powering a
                <span class="text-emerald-600">greener future.</span>
            </h1>

            <p class="mt-6 max-w-md text-lg leading-8 text-slate-600">
                Manage solar products, rooftop installations,
                services, projects and customer enquiries
                in one secure workspace.
            </p>

            <div class="mt-9 grid grid-cols-2 gap-4 text-sm font-bold text-emerald-950">

                <div class="rounded-2xl border border-emerald-100 bg-white/85 p-5">
                    ☀️ Solar Projects
                </div>

                <div class="rounded-2xl border border-emerald-100 bg-white/85 p-5">
                    ⚡ Solar Services
                </div>

                <div class="rounded-2xl border border-emerald-100 bg-white/85 p-5">
                    📦 Solar Products
                </div>

                <div class="rounded-2xl border border-emerald-100 bg-white/85 p-5">
                    📩 Enquiries
                </div>

            </div>

        </div>


        {{-- RIGHT SIDE LOGIN CARD --}}
        <div class="w-full max-w-lg justify-self-center rounded-3xl border border-emerald-100 bg-white p-7 shadow-2xl shadow-emerald-950/10 sm:p-10">

            <a href="{{ route('home') }}"
               class="text-sm font-bold text-emerald-700 hover:text-emerald-900">
                ← Back to website
            </a>

            <div class="mt-7 inline-block rounded-full bg-lime-100 px-3 py-1 text-xs font-extrabold uppercase tracking-wider text-emerald-800">
                Administrator Login
            </div>

            <h2 class="mt-3 text-3xl font-extrabold text-[#06271f]">
                Welcome back
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Sign in to your Bhavik Solar dashboard.
            </p>


            {{-- SUCCESS MESSAGE --}}
            @if (session('status'))

                <div role="status"
                     class="mt-5 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">

                    {{ session('status') }}

                </div>

            @endif


            {{-- VALIDATION ERRORS --}}
            @if ($errors->any())

                <div role="alert"
                     class="mt-5 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700">

                    <ul class="list-disc pl-5">

                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- LOGIN FORM --}}
            <form method="POST"
                  action="{{ route('login') }}"
                  class="mt-7 space-y-5">

                @csrf


                {{-- EMAIL --}}
                <div>

                    <label for="email"
                           class="block text-sm font-bold text-slate-700">
                        Email address
                    </label>

                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                        autofocus
                        placeholder="admin@example.com"
                        class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3.5 text-sm outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100"
                    >

                </div>


                {{-- PASSWORD --}}
                <div>

                    <label for="password"
                           class="block text-sm font-bold text-slate-700">
                        Password
                    </label>

                    <div class="relative mt-2">

                        <input
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            required
                            placeholder="Enter your password"
                            class="w-full rounded-xl border border-slate-200 py-3.5 pl-4 pr-16 text-sm outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100"
                        >

                        <button
                            type="button"
                            data-toggle-password="password"
                            aria-label="Show password"
                            aria-pressed="false"
                            class="absolute inset-y-0 right-0 px-4 text-xs font-bold text-emerald-700"
                        >
                            Show
                        </button>

                    </div>

                </div>


                {{-- REMEMBER ME --}}
                <label class="inline-flex items-center gap-2 text-sm text-slate-600">

                    <input
                        type="checkbox"
                        name="remember"
                        value="1"
                        @checked(old('remember'))
                        class="accent-emerald-700"
                    >

                    Remember me

                </label>


                {{-- SUBMIT BUTTON --}}
                <button
                    type="submit"
                    class="w-full rounded-xl bg-[#075b40] px-5 py-4 text-sm font-extrabold text-white transition hover:bg-[#064630]"
                >
                    Login to Dashboard →
                </button>

            </form>


            {{-- REGISTER LINK --}}
            <p class="mt-7 border-t border-slate-100 pt-6 text-center text-sm text-slate-500">

                Need an account?

                <a href="{{ route('register') }}"
                   class="font-bold text-emerald-700 hover:underline">
                    Register
                </a>

            </p>

        </div>

    </div>

</section>

@endsection


@push('scripts')

<script>
document.querySelectorAll('[data-toggle-password]').forEach(button => {

    button.addEventListener('click', () => {

        const input = document.getElementById(
            button.dataset.togglePassword
        );

        if (!input) return;

        const visible = input.type === 'password';

        input.type = visible ? 'text' : 'password';

        button.textContent = visible ? 'Hide' : 'Show';

        button.setAttribute(
            'aria-pressed',
            String(visible)
        );

        button.setAttribute(
            'aria-label',
            visible ? 'Hide password' : 'Show password'
        );

    });

});
</script>

@endpush
