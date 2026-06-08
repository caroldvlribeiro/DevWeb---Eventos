<!DOCTYPE html>
<html>
<head>
    <title>Eventos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h1>Lista de Eventos</h1>

    <a href="{{ route('eventos.create') }}"
       class="btn btn-primary mb-3">
       Novo Evento
    </a>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Data</th>
                <th>Local</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

        @foreach($eventos as $evento)

            <tr>
                <td>{{ $evento->id }}</td>
                <td>{{ $evento->titulo }}</td>
                <td>{{ $evento->data_evento }}</td>
                <td>{{ $evento->local }}</td>

                <td>
                    <a href="{{ route('eventos.edit', $evento->id) }}"
                       class="btn btn-warning btn-sm">
                        Editar
                    </a>

                    <form action="{{ route('eventos.destroy', $evento->id) }}"
                          method="POST"
                          style="display:inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">
                            Excluir
                        </button>

                    </form>
                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

</body>
</html>