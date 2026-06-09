<x-guest-layout>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nome -->
        <div class="mb-3">
            <label class="form-label">Nome</label>

            <input
                id="name"
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name') }}"
                required
                autofocus
                autocomplete="name"
            >

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">E-mail</label>

            <input
                id="email"
                type="email"
                name="email"
                class="form-control"
                value="{{ old('email') }}"
                required
                autocomplete="username"
            >

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Senha -->
        <div class="mb-3">
            <label class="form-label">Senha</label>

            <input
                id="password"
                type="password"
                name="password"
                class="form-control"
                required
                autocomplete="new-password"
            >

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar senha -->
        <div class="mb-3">
            <label class="form-label">Confirmar senha</label>

            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                class="form-control"
                required
                autocomplete="new-password"
            >

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Ações -->
        <div class="d-flex justify-content-between align-items-center mt-4">

            <!-- Link login -->
            <a
                href="{{ route('login') }}"
                class="text-decoration-none small"
            >
                Já tem conta?
            </a>

            <!-- Botão -->
            <x-primary-button>
                Registrar
            </x-primary-button>

        </div>

    </form>

</x-guest-layout>