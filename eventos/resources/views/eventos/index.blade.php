<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eventos — Eventos Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f6f9; font-family: Arial, sans-serif; }
        .topbar { background: #1a1a2e; padding: 14px 30px; display: flex; justify-content: space-between; align-items: center; }
        .topbar .brand { color: #e94560 !important; font-weight: bold; font-size: 1.3rem; text-decoration: none; }
        .topbar a, .topbar button { color: white; text-decoration: none; background: none; border: none; cursor: pointer; font-size: 0.95rem; }
        .topbar a:hover, .topbar button:hover { color: #e94560; }
        .page-header {
            background: linear-gradient(135deg, #1a1a2e, #e94560);
            color: white; padding: 50px 30px; text-align: center;
        }
        .page-header h1 { font-size: 2.2rem; font-weight: bold; }
        .card-evento {
            border: none; border-top: 3px solid #e94560;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: transform 0.2s;
        }
        .card-evento:hover { transform: translateY(-4px); }
        .badge-data { background: #fff0f3; color: #e94560; padding: 4px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: bold; }
        .badge-local { background: #f0f0f0; color: #555; padding: 4px 12px; border-radius: 20px; font-size: 0.85rem; }
        footer { background: #1a1a2e; color: #888; text-align: center; padding: 20px; margin-top: 60px; }
    </style>
</head>
<body>

<div class="topbar">
    <a href="/" class="brand">🎟 Eventos Online</a>
    <div class="d-flex gap-4 align-items-center">
        <a href="/#quem-somos">Quem Somos</a>
        <a href="/#contato">Contato</a>
        @auth
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('profile.edit') }}">Perfil</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Sair</button>
            </form>
        @else
            <a href="{{ route('login') }}"
               style="background:#e94560; color:white; padding:6px 18px; border-radius:20px; font-weight:bold;">
                Login
            </a>
        @endauth
    </div>
</div>

<div class="page-header">
    <h1>🎟 Todos os Eventos</h1>
    <p class="mb-0 opacity-75">Confira os eventos disponíveis e garanta sua vaga</p>
</div>

<div class="container py-5">

    @auth
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('eventos.create') }}"
           class="btn text-white fw-bold"
           style="background:#e94560; border:none; border-radius:8px; padding:10px 24px;">
            + Novo Evento
        </a>
    </div>
    @endauth

    <div class="row">
        @forelse($eventos as $evento)
            <div class="col-md-4 mb-4">
                <div class="card card-evento h-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold mb-3">{{ $evento->titulo }}</h5>
                        <div class="d-flex gap-2 flex-wrap mb-3">
                            <span class="badge-data">
                                📅 {{ \Carbon\Carbon::parse($evento->data_evento)->format('d/m/Y') }}
                            </span>
                            <span class="badge-local">
                                📍 {{ $evento->local }}
                            </span>
                        </div>
                        <p class="text-muted" style="font-size:0.9rem; line-height:1.6;">
                            {{ Str::limit($evento->descricao, 120) }}
                        </p>
                    </div>
                    @auth
                    <div class="card-footer bg-white border-0 pb-4 px-4">
                        <div class="d-flex gap-2">
                            <a href="{{ route('eventos.edit', $evento->id) }}"
                               class="btn btn-sm btn-warning fw-bold">✏️ Editar</a>
                            <form action="{{ route('eventos.destroy', $evento->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Deseja excluir este evento?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger fw-bold">🗑 Excluir</button>
                            </form>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div style="font-size:3rem;">🎭</div>
                <h4 class="text-muted mt-3">Nenhum evento cadastrado ainda.</h4>
                @auth
                    <a href="{{ route('eventos.create') }}" style="color:#e94560;">Criar primeiro evento</a>
                @endauth
            </div>
        @endforelse
    </div>
</div>

<footer>
    <p class="mb-0">© {{ date('Y') }} Eventos Online. Todos os direitos reservados.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>