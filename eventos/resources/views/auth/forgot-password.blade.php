<x-guest-layout>

    <!-- Texto explicativo -->
    <div class="mb-4 text-muted">
        Esqueceu sua senha? Sem problemas. Informe seu e-mail e enviaremos um link para redefinir sua senha.
    </div>

    <!-- Status da sessão -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

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
                autofocus
            >

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Botão -->
        <div class="d-flex justify-content-end">
            <x-primary-button>
                Enviar link de redefinição
            </x-primary-button>
        </div>

    </form>

</x-guest-layout>