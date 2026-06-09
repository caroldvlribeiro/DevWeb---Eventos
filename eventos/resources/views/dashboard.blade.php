<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold">
            Dashboard
        </h2>
    </x-slot>

    <div class="container mt-4">

        <div class="row">

            <div class="col-md-4">

                <div class="card">

                    <div class="card-body">

                        <h5>Total de Eventos</h5>

                        <h1>{{ $totalEventos }}</h1>

                    </div>

                </div>

            </div>

        </div>

        <div class="mt-4">

            <a href="{{ route('eventos.index') }}"
               class="btn btn-primary">
                Gerenciar Eventos
            </a>

        </div>

    </div>

</x-app-layout>