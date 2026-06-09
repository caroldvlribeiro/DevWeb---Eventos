<x-guest-layout>

    <!-- Mensagem principal -->
    <div class="mb-4 text-muted">
        Obrigado por se registrar! Antes de começar, confirme seu e-mail clicando no link que enviamos.
        Se não recebeu, podemos reenviar para você.
    </div>

    <!-- Status -->
    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success mb-4">
            Um novo link de verificação foi enviado para seu e-mail.
        </div>
    @endif

    <!-- Ações -->
    <div class="d-flex justify-content-between align-items-center mt-4">

        <!-- Reenviar e-mail -->
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <x-primary-button>
                Reenviar e-mail de verificação
            </x-primary-button>
        </form>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-link text-decoration-none">
                Sair
            </button>
        </form>

    </div>

</x-guest-layout>