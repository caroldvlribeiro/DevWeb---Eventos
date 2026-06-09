<x-guest-layout>
    <p class="text-muted mb-4" style="font-size:0.9rem;">
        Esta é uma área segura. Por favor, confirme sua senha antes de continuar.
    </p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Senha</label>
            <input type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror" required>
            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn w-100 text-white fw-bold"
                style="background:#e94560; border:none; padding:12px; border-radius:8px;">
            Confirmar
        </button>
    </form>
</x-guest-layout>