<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <h1>{{ $evento->titulo }}</h1>

            <p>{{ $evento->descricao }}</p>

            <p>
                <strong>Data:</strong>
                {{ $evento->data }}
            </p>

            <a href="{{ route('eventos.index') }}"
               class="btn btn-secondary">
                Voltar
            </a>

        </div>

    </div>

</div>