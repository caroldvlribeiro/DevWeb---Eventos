<x-guest-layout>
    <p class="text-muted mb-4" style="font-size:0.9rem;">
        Obrigado por se cadastrar! Antes de continuar, verifique seu email clicando no link que enviamos.
        Se não recebeu, podemos reenviar.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success mb-3">
            Um novo link de verificação foi enviado para o seu email.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn w-100 text-white fw-bold mb-3"
                style="background:#e94560; border:none; padding:12px; border-radius:8px;">
            Reenviar Email de Verificação
        </button>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn w-100 btn-outline-secondary"
                style="border-radius:8px; padding:10px;">
            Sair
        </button>
    </form>
</x-guest-layout>