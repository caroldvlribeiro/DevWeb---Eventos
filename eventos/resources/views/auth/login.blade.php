<x-guest-layout>
    @if (session('status'))
        <div class="alert alert-success mb-3">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
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

        <div class="mb-3">
            <label class="form-label fw-semibold">Senha</label>
            <input type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="••••••••"
                   required>
            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="remember" id="remember">
            <label class="form-check-label" for="remember">Lembrar de mim</label>
        </div>

        <button type="submit" class="btn w-100 text-white fw-bold"
                style="background:#e94560; border:none; padding:12px; border-radius:8px;">
            Entrar
        </button>

        <div class="text-center mt-3">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" style="color:#e94560; font-size:0.9rem;">
                    Esqueceu sua senha?
                </a>
            @endif
        </div>

        <hr>
        <div class="text-center">
            <small>Não tem conta?
                <a href="{{ route('register') }}" style="color:#e94560; font-weight:bold;">
                    Cadastre-se
                </a>
            </small>
        </div>
    </form>
</x-guest-layout>