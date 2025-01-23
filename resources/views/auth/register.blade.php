<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <!-- Menambahkan CDN Bootstrap 5 -->
        <head>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>

        <!-- Center the form with a dark background card -->
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <form method="POST" action="{{ route('register') }}" class="p-4 border rounded shadow-sm bg-dark text-light w-100" style="max-width: 400px;">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <x-label for="name" :value="__('Name')" />
                    <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Username -->
                <div class="mb-3">
                    <x-label for="username" :value="__('Username')" />
                    <x-input id="username" class="form-control" type="text" name="username" :value="old('username')" required />
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-label for="password" :value="__('Password')" />
                    <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a class="text-light" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="btn btn-primary">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </div>

        <!-- Menambahkan CDN untuk Bootstrap JS (optional, hanya untuk fitur tertentu seperti dropdowns) -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    </x-auth-card>
</x-guest-layout>
