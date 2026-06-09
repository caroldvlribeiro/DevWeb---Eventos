<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f6f9; }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.07); }
        .card-header { background: #f0a500; border-radius: 12px 12px 0 0 !important; }
        .form-control:focus { border-color: #f0a500; box-shadow: 0 0 0 0.2rem rgba(240,165,0,0.2); }
        .btn-salvar { background: #f0a500; border: none; border-radius: 8px; padding: 10px 30px; font-weight: bold; }
        .btn-salvar:hover { background: #c98a00; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header py-3">
                    <h4 class="text-white mb-0 fw-bold">✏️ Editar Evento</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('eventos.update', $evento->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Título do Evento</label>
                            <input type="text" name="titulo"
                                   class="form-control @error('titulo') is-invalid @enderror"
                                   value="{{ old('titulo', $evento->titulo) }}"
                                   placeholder="Ex: Workshop de Laravel"
                                   required>
                            @error('titulo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Descrição</label>
                            <textarea name="descricao" rows="4"
                                      class="form-control @error('descricao') is-invalid @enderror"
                                      placeholder="Descreva o evento..."
                                      required>{{ old('descricao', $evento->descricao) }}</textarea>
                            @error('descricao')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Data do Evento</label>
                            <input type="date" name="data_evento"
                                   class="form-control @error('data_evento') is-invalid @enderror"
                                   value="{{ old('data_evento', $evento->data_evento) }}"
                                   required>
                            @error('data_evento')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Local</label>
                            <input type="text" name="local"
                                   class="form-control @error('local') is-invalid @enderror"
                                   value="{{ old('local', $evento->local) }}"
                                   placeholder="Ex: Centro de Convenções, São Paulo"
                                   required>
                            @error('local')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-salvar text-white">
                                💾 Salvar Alterações
                            </button>
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>