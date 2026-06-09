<x-app-layout>

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-bold mb-0">
                Dashboard
            </h2>
    </x-slot>

    <div class="container py-4">

        <div class="row g-4">

            <div class="col-md-4">

                <div class="card shadow border-0">

                    <div class="card-body text-center">

                        <h6 class="text-muted">
                            Total de Eventos
                        </h6>

                        <h1 class="display-4 fw-bold text-primary">
                            {{ $totalEventos }}
                        </h1>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card shadow border-0">

                    <div class="card-body text-center">

                        <h6 class="text-muted">
                            Status
                        </h6>

                        <h3 class="text-success">
                            Sistema Online
                        </h3>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

               <div class="card shadow border-0">

    <div class="card-body text-center">

        <h6 class="text-muted">
            Usuário
        </h6>

        <h5 class="mb-3">
            {{ Auth::user()->name }}
        </h5>

        <a href="{{ route('profile.edit') }}"
           class="btn btn-outline-primary">
            Meu Perfil
        </a>

    </div>

</div>

            </div>

        </div>

        <div class="card shadow border-0 mt-4">

            <div class="card-header bg-primary text-white">
                Ações Rápidas
            </div>

            <div class="card-body">

                <a href="{{ route('eventos.index') }}"
                   class="btn btn-primary me-2">
                    Gerenciar Eventos
                </a>

                <a href="{{ route('eventos.create') }}"
                   class="btn btn-success">
                    Cadastrar Evento
                </a>
                
            </div>

        </div>
        <div class="card shadow border-0 mt-4">

    <div class="card-header">
        Eventos Recentes
    </div>

    <div class="card-body">

        <div class="row">

            @forelse($eventos as $evento)

                <div class="col-md-4 mb-3">

                    <a href="{{ route('eventos.show', $evento->id) }}"
                       class="text-decoration-none text-dark">

                        <div class="card h-100 shadow-sm">

                            <div class="card-body">

                                <h5 class="fw-bold">
                                    {{ $evento->titulo }}
                                </h5>

                                <p class="text-muted">
                                    {{ Str::limit($evento->descricao, 80) }}
                                </p>

                                <small>
                                    📅 {{ $evento->data_evento }}
                                </small>

                            </div>

                        </div>

                    </a>

                </div>

            @empty

                <div class="col-12 text-center text-muted">
                    Nenhum evento cadastrado.
                </div>

            @endforelse

        </div>

    </div>

</div>

        <div class="card shadow border-0 mt-4">

            <div class="card-header">
                Bem-vindo
            </div>

            <div class="card-body">

                <p class="mb-0">
                    Utilize este painel para cadastrar, editar e excluir
                    eventos do sistema.
                </p>

            </div>

        </div>

    </div>

</x-app-layout>