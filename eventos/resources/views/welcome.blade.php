<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eventos Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; margin: 0; }
        .navbar { background: #1a1a2e; }
        .navbar-brand { color: #e94560 !important; font-weight: bold; font-size: 1.4rem; }
        .nav-link { color: #fff !important; }
        .nav-link:hover { color: #e94560 !important; }
        .banner {
            background: linear-gradient(135deg, #1a1a2e, #e94560);
            color: white; text-align: center; padding: 100px 20px;
        }
        .banner h1 { font-size: 2.8rem; font-weight: bold; margin-bottom: 15px; }
        .banner p { font-size: 1.2rem; opacity: 0.9; margin-bottom: 30px; }
        .btn-cta {
            background: white; color: #e94560;
            padding: 14px 36px; border-radius: 50px;
            font-weight: bold; font-size: 1.1rem;
            text-decoration: none; border: none;
        }
        .btn-cta:hover { background: #f0f0f0; color: #c73652; }
        .section-title {
            border-left: 4px solid #e94560;
            padding-left: 12px; margin-bottom: 30px;
            font-weight: bold; font-size: 1.6rem;
        }
        .card-evento {
            border: none; border-top: 3px solid #e94560;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            border-radius: 10px; transition: transform 0.2s;
        }
        .card-evento:hover { transform: translateY(-4px); }
        .contato-section { background: #1a1a2e; color: white; }
        .contato-section a { color: #e94560; }
        footer { background: #111; color: #888; text-align: center; padding: 20px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">🎟 Eventos Online</a>
        <button class="navbar-toggler border-secondary" type="button"
                data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon" style="filter:invert(1)"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto align-items-center gap-2">
                <li class="nav-item"><a class="nav-link" href="#quem-somos">Quem Somos</a></li>
                <li class="nav-item"><a class="nav-link" href="#eventos">Eventos</a></li>
                <li class="nav-item"><a class="nav-link" href="#contato">Contato</a></li>
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('profile.edit') }}">Perfil</a></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-sm text-white fw-bold px-3"
                                    style="background:#e94560; border:none; border-radius:20px;">
                                Sair
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-sm text-white fw-bold px-3"
                           style="background:#e94560; border-radius:20px;"
                           href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="banner">
    <h1>Participe dos melhores eventos</h1>
    <p>Inscreva-se e acompanhe eventos exclusivos com vagas limitadas.</p>
    <a href="{{ route('register') }}" class="btn-cta">Cadastre-se Agora</a>
</div>

<section class="py-5 bg-light" id="quem-somos">
    <div class="container">
        <h2 class="section-title">Quem Somos</h2>
        <p class="lead">Somos uma plataforma especializada na divulgação e gestão de eventos presenciais e online.
        Nossa missão é conectar pessoas a experiências únicas de aprendizado, cultura e networking.
        Com anos de experiência no mercado, já reunimos milhares de participantes em eventos de todo o Brasil.</p>
    </div>
</section>

<section class="py-5" id="eventos">
    <div class="container">
        <h2 class="section-title">Próximos Eventos</h2>
        <div class="row">
            @forelse($eventos as $evento)
                <div class="col-md-4 mb-4">
                    <div class="card card-evento h-100">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $evento->titulo }}</h5>
                            <p class="text-muted mb-1">
                                📅 {{ \Carbon\Carbon::parse($evento->data_evento)->format('d/m/Y') }}
                            </p>
                            <p class="text-muted mb-2">📍 {{ $evento->local }}</p>
                            <p class="text-secondary" style="font-size:0.9rem;">
                                {{ Str::limit($evento->descricao, 100) }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Nenhum evento cadastrado ainda.</p>
            @endforelse
        </div>
    </div>
</section>

<section class="contato-section py-5" id="contato">
    <div class="container text-center">
        <h2 class="mb-4" style="border-left:4px solid #e94560; padding-left:12px; display:inline-block; text-align:left;">
            Fale Conosco
        </h2>
        <div class="row justify-content-center mt-3">
            <div class="col-md-4">
                <p>📧 contato@eventosonline.com.br</p>
                <p>📞 (13) 99999-9999</p>
                <p>📍 Rua das Flores, 123 – São Paulo, SP</p>
            </div>
            <div class="col-md-4">
                <p class="mt-2">
                    <a href="#" class="me-3 text-decoration-none">📸 Instagram</a>
                    <a href="#" class="text-decoration-none">👍 Facebook</a>
                </p>
            </div>
        </div>
    </div>
</section>

<footer>
    <p>© {{ date('Y') }} Eventos Online. Todos os direitos reservados.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>