<x-guest-layout>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">E-mail</label>

            <input
                id="email"
                type="email"
                name="email"
                class="form-control"
                value="{{ old('email', $request->email) }}"
                required
                autofocus
                autocomplete="username"
            >

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Nova senha -->
        <div class="mb-3">
            <label class="form-label">Nova senha</label>

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
            <label class="form-label">Confirmar nova senha</label>

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

        <!-- Botão -->
        <div class="d-flex justify-content-end mt-4">
            <x-primary-button>
                Redefinir senha
            </x-primary-button>
        </div>

    </form>

</x-guest-layout>