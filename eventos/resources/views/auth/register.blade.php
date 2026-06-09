<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Nome</label>
            <input type="text" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}"
                   placeholder="Seu nome completo"
                   required autofocus>
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Email</label>
            <input type="email" name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}"
                   placeholder="seu@email.com"
                   required>
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Senha</label>
            <input type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="Mínimo 8 caracteres"
                   required>
            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Confirmar Senha</label>
            <input type="password" name="password_confirmation"
                   class="form-control"
                   placeholder="Repita a senha"
                   required>
        </div>

        <button type="submit" class="btn w-100 text-white fw-bold"
                style="background:#e94560; border:none; padding:12px; border-radius:8px;">
            Criar Conta
        </button>

        <hr>
        <div class="text-center">
            <small>Já tem conta?
                <a href="{{ route('login') }}" style="color:#e94560; font-weight:bold;">
                    Faça login
                </a>
            </small>
        </div>
    </form>
</x-guest-layout>