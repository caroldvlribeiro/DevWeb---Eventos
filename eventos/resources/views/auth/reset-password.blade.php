<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="mb-3">
            <label class="form-label fw-semibold">Email</label>
            <input type="email" name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email', $request->email) }}" required autofocus>
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Nova Senha</label>
            <input type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror" required>
            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Confirmar Nova Senha</label>
            <input type="password" name="password_confirmation"
                   class="form-control" required>
        </div>

        <button type="submit" class="btn w-100 text-white fw-bold"
                style="background:#e94560; border:none; padding:12px; border-radius:8px;">
            Redefinir Senha
        </button>
    </form>
</x-guest-layout>