<x-guest-layout>

    <!-- Texto explicativo -->
    <div class="mb-4 text-muted">
        Esta é uma área protegida do sistema. Confirme sua senha para continuar.
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Senha -->
        <div class="mb-3">
            <label for="password" class="form-label">
                Senha
            </label>

            <input
                id="password"
                type="password"
                name="password"
                class="form-control"
                required
                autocomplete="current-password"
                autofocus
            >

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />
        </div>

        <!-- Botão -->
        <div class="d-flex justify-content-end">
            <x-primary-button>
                Confirmar
            </x-primary-button>
        </div>

    </form>

</x-guest-layout>