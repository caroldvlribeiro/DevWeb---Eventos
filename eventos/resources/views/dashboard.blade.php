<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard — Eventos Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f6f9; }
        .topbar {
            background: #1a1a2e; color: white;
            padding: 14px 30px;
            display: flex; justify-content: space-between; align-items: center;
        }
        .topbar .brand { color: #e94560; font-weight: bold; font-size: 1.3rem; text-decoration: none; }
        .topbar a, .topbar button {
            color: white; text-decoration: none;
            background: none; border: none; cursor: pointer; font-size: 0.95rem;
        }
        .topbar a:hover, .topbar button:hover { color: #e94560; }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.07); }
        .card-header {
            background: white; border-bottom: 2px solid #f0f0f0;
            border-radius: 12px 12px 0 0 !important;
            padding: 20px 25px;
        }
        .table thead { background: #1a1a2e; color: white; }
        .table thead th { border: none; padding: 14px; }
        .table tbody tr:hover { background: #fff5f6; }
        .btn-novo {
            background: #e94560; color: white; border: none;
            border-radius: 8px; padding: 8px 20px; font-weight: bold;
            text-decoration: none;
        }
        .btn-novo:hover { background: #c73652; color: white; }
        .badge-local {
            background: #f0f0f0; color: #555;
            padding: 4px 10px; border-radius: 20px; font-size: 0.8rem;
        }
    </style>
</head>
<body>

<div class="topbar">
    <a href="/" class="brand">🎟 Eventos Online</a>
    <div class="d-flex gap-4 align-items-center">
        <span style="opacity:0.7; font-size:0.9rem;">Olá, {{ auth()->user()->name }}</span>
        <a href="{{ route('profile.edit') }}">Perfil</a>
        <a href="/">Início</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Sair</button>
        </form>
    </div>
</div>

<div class="container py-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0 fw-bold">Eventos Cadastrados</h4>
                <small class="text-muted">Gerencie todos os eventos do sistema</small>
            </div>
            <a href="{{ route('eventos.create') }}" class="btn-novo">+ Novo Evento</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Data</th>
                        <th>Local</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($eventos as $evento)
                    <tr>
                        <td class="align-middle text-muted">{{ $evento->id }}</td>
                        <td class="align-middle fw-semibold">{{ $evento->titulo }}</td>
                        <td class="align-middle">
                            📅 {{ \Carbon\Carbon::parse($evento->data_evento)->format('d/m/Y') }}
                        </td>
                        <td class="align-middle">
                            <span class="badge-local">📍 {{ $evento->local }}</span>
                        </td>
                        <td class="align-middle">
                            <a href="{{ route('eventos.edit', $evento->id) }}"
                               class="btn btn-sm btn-warning fw-bold me-1">✏️ Editar</a>
                            <form action="{{ route('eventos.destroy', $evento->id) }}"
                                  method="POST" style="display:inline"
                                  onsubmit="return confirm('Deseja excluir este evento?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger fw-bold">🗑 Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            Nenhum evento cadastrado ainda.
                            <a href="{{ route('eventos.create') }}" style="color:#e94560;">Criar primeiro evento</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>