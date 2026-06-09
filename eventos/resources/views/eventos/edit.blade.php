<!DOCTYPE html>
<html>
<head>
    <title>Editar Evento</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h1>Editar Evento</h1>

    <form action="{{ route('eventos.update', $evento->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Título</label>

            <input type="text"
                   name="titulo"
                   class="form-control"
                   value="{{ $evento->titulo }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Descrição</label>

            <textarea name="descricao"
                      class="form-control"
                      required>{{ $evento->descricao }}</textarea>
        </div>

        <div class="mb-3">
            <label>Data do Evento</label>

            <input type="date"
                   name="data_evento"
                   class="form-control"
                   value="{{ $evento->data_evento }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Local</label>

            <input type="text"
                   name="local"
                   class="form-control"
                   value="{{ $evento->local }}"
                   required>
        </div>

        <button type="submit" class="btn btn-success">
            Atualizar
        </button>

        <a href="{{ route('eventos.index') }}"
           class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

</body>
</html>