<x-guest-layout>

    <!-- Status da sessão -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">E-mail</label>

            <input
                type="email"
                name="email"
                class="form-control"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
            >

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Senha -->
        <div class="mb-3">
            <label class="form-label">Senha</label>

            <input
                type="password"
                name="password"
                class="form-control"
                required
                autocomplete="current-password"
            >

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Lembrar-me -->
        <div class="form-check mb-3">
            <input
                id="remember_me"
                type="checkbox"
                class="form-check-input"
                name="remember"
            >

            <label for="remember_me" class="form-check-label">
                Lembrar-me
            </label>
        </div>

        <!-- Esqueceu senha -->
        @if (Route::has('password.request'))
            <div class="mb-3 text-end">
                <a
                    href="{{ route('password.request') }}"
                    class="text-decoration-none"
                >
                    Esqueceu a senha?
                </a>
            </div>
        @endif

        <!-- Botão Entrar -->
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">
                Entrar
            </button>
        </div>

        <!-- Criar conta -->
        <div class="text-center mt-3">
            <span class="text-muted">Não possui conta?</span>
            <a
                href="{{ route('register') }}"
                class="text-decoration-none fw-semibold"
            >
                Criar conta
            </a>
        </div>

    </form>

</x-guest-layout>