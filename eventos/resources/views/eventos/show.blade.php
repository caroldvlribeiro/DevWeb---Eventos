<x-app-layout>

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-bold mb-0">
                Detalhes do Evento
            </h2>

            <a href="{{ route('dashboard') }}"
               class="btn btn-secondary">
                Voltar
            </a>
        </div>
    </x-slot>

    <div class="container py-4">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h1 class="fw-bold mb-3">
                    {{ $evento->titulo }}
                </h1>

                <p class="text-muted mb-4">
                    {{ $evento->descricao }}
                </p>

                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="card bg-light border-0">
                            <div class="card-body">
                                <small class="text-muted">Data</small>
                                <h6 class="mb-0">
                                    {{ $evento->data_evento }}
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-light border-0">
                            <div class="card-body">
                                <small class="text-muted">Local</small>
                                <h6 class="mb-0">
                                    {{ $evento->local }}
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-light border-0">
                            <div class="card-body">
                                <small class="text-muted">Valor</small>
                                <h6 class="mb-0 text-success">
                                    R$ {{ number_format($evento->valor, 2, ',', '.') }}
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-light border-0">
                            <div class="card-body">
                                <small class="text-muted">Vagas Disponíveis</small>
                                <h6 class="mb-0">
                                    {{ $evento->quantidade_vagas }}
                                </h6>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-4 d-flex gap-2">

                    <a href="{{ route('eventos.edit', $evento->id) }}"
                       class="btn btn-warning">
                        Editar Evento
                    </a>

                    <form action="{{ route('eventos.destroy', $evento->id) }}"
                          method="POST"
                          onsubmit="return confirm('Deseja excluir este evento?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger">
                            Excluir Evento
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>