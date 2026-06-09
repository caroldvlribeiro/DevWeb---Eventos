<x-guest-layout>
    <p class="text-muted mb-4" style="font-size:0.9rem;">
        Esqueceu sua senha? Informe seu email e enviaremos um link para redefinição.
    </p>

    @if (session('status'))
        <div class="alert alert-success mb-3">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Email</label>
            <input type="email" name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}"
                   placeholder="seu@email.com"
                   required autofocus>
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn w-100 text-white fw-bold"
                style="background:#e94560; border:none; padding:12px; border-radius:8px;">
            Enviar Link de Redefinição
        </button>

        <hr>
        <div class="text-center">
            <small>
                <a href="{{ route('login') }}" style="color:#e94560; font-weight:bold;">
                    Voltar ao login
                </a>
            </small>
        </div>
    </form>
</x-guest-layout>