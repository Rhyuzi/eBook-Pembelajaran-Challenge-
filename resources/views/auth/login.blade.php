<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <!-- Logo bisa ditambahkan di sini jika ada -->
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <!-- Menambahkan CDN Bootstrap 5 -->
        <head>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>

        <form method="POST" action="{{ route('login') }}" class="p-4 border rounded shadow-sm bg-light">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="mb-3 form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label text-muted">{{ __('Remember me') }}</label>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                @if (Route::has('password.request'))
                    <a class="text-muted" href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                @endif

                <x-button class="btn btn-primary">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>

        <!-- Menambahkan CDN untuk Bootstrap JS (optional, hanya untuk fitur tertentu seperti dropdowns) -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    </x-auth-card>
</x-guest-layout>
