<!DOCTYPE html>
<html>
<head>
    <title>Novo Evento</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h1>Cadastrar Evento</h1>

    <form action="{{ route('eventos.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Título</label>
            <input type="text"
                   name="titulo"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Descrição</label>
            <textarea name="descricao"
                      class="form-control"
                      required></textarea>
        </div>

        <div class="mb-3">
            <label>Data do Evento</label>
            <input type="date"
                   name="data_evento"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label>Local</label>
            <input type="text"
                   name="local"
                   class="form-control"
                   required>
        </div>

        <button type="submit"
                class="btn btn-success">
            Salvar
        </button>

        <a href="{{ route('eventos.index') }}"
           class="btn btn-secondary">
           Voltar
        </a>

    </form>

</div>

</body>
</html>