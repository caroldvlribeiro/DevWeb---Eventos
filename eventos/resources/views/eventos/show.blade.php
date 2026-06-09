<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold mb-0">
            Detalhes do Evento
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h1 class="mb-3">
                    {{ $evento->titulo }}
                </h1>

                <p class="text-muted">
                    {{ $evento->descricao }}
                </p>

                <hr>

                <p>
                    <strong>Data:</strong>
                    {{ $evento->data_evento }}
                </p>

                <p>
                    <strong>Local:</strong>
                    {{ $evento->local }}
                </p>

                <a href="{{ route('dashboard') }}"
                   class="btn btn-secondary">
                    Voltar
                </a>

                <a href="{{ route('eventos.edit', $evento->id) }}"
                   class="btn btn-warning">
                    Editar
                </a>

            </div>

        </div>

    </div>

</x-app-layout>