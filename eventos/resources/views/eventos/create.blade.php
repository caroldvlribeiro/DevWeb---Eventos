<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold mb-0">
            Cadastrar Evento
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <form action="{{ route('eventos.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">
                            Título
                        </label>

                        <input type="text"
                               name="titulo"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Descrição
                        </label>

                        <textarea name="descricao"
                                  class="form-control"
                                  rows="4"
                                  required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Data do Evento
                        </label>

                        <input type="date"
                               name="data_evento"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Local
                        </label>

                        <input type="text"
                               name="local"
                               class="form-control"
                               required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Valor (R$)</label>
                        <input
                            type="number"
                            step="0.01"
                            min="0"
                            name="valor"
                            class="form-control"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quantidade de Vagas</label>
                        <input
                            type="number"
                            min="1"
                            name="quantidade_vagas"
                            class="form-control"
                            required
                        >
                    </div>
                    <button type="submit"
                            class="btn btn-success">
                        Salvar
                    </button>

                    <a href="{{ route('dashboard') }}"
                       class="btn btn-secondary">
                        Voltar
                    </a>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>