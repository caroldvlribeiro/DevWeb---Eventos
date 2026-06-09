<x-app-layout>

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold mb-0">Eventos</h2>
                <small class="text-muted">
                    Gerencie os eventos cadastrados no sistema.
                </small>
            </div>

            <a href="{{ route('eventos.create') }}"
               class="btn btn-success">
                + Novo Evento
            </a>
        </div>
    </x-slot>

    <div class="container py-4">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>
            </div>
        @endif

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Título</th>
                            <th>Data</th>
                            <th>Local</th>
                            <th width="180">Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($eventos as $evento)

                        <tr>

                            <td>{{ $evento->id }}</td>

                            <td>
                                <strong>{{ $evento->titulo }}</strong>
                            </td>

                            <td>{{ $evento->data_evento }}</td>

                            <td>{{ $evento->local }}</td>

                            <td>

                                <a href="{{ route('eventos.edit', $evento->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Editar
                                </a>

                                <form action="{{ route('eventos.destroy', $evento->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Deseja realmente excluir este evento?')">
                                        Excluir
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Nenhum evento cadastrado.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>