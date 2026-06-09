<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Eventos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">

    <div class="container">

        <a class="navbar-brand fw-bold" href="#">
            Sistema de Eventos
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="#quem-somos">
                        Quem Somos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#eventos">
                        Eventos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contato">
                        Contato
                    </a>
                </li>

            </ul>

            <a href="{{ route('login') }}"
               class="btn btn-light me-2">
                Entrar
            </a>

            <a href="{{ route('register') }}"
               class="btn btn-outline-light">
                Cadastrar
            </a>

        </div>

    </div>

</nav>

<!-- HERO -->
<section class="bg-primary text-white py-5">

    <div class="container text-center">

        <h1 class="display-4 fw-bold">
            Sistema de Eventos
        </h1>

        <p class="lead">
            Organize, divulgue e participe dos melhores eventos.
        </p>

        <a href="{{ route('register') }}"
           class="btn btn-light btn-lg mt-3">
            Começar Agora
        </a>

    </div>

</section>

<!-- QUEM SOMOS -->
<section id="quem-somos" class="py-5">

    <div class="container">

        <h2 class="text-center mb-4">
            Quem Somos
        </h2>

        <div class="card shadow border-0">

            <div class="card-body text-center p-4">

                <p class="lead mb-0">
                    Nossa plataforma permite divulgar, organizar e acompanhar
                    eventos de maneira simples, rápida e eficiente.
                </p>

            </div>

        </div>

    </div>

</section>

<!-- EVENTOS -->
<section id="eventos" class="py-5 bg-light">

    <div class="container">

        <h2 class="text-center mb-5">
            Eventos Disponíveis
        </h2>

        <div class="row">

            @forelse($eventos as $evento)

                <div class="col-md-4 mb-4">

                    <div class="card shadow-sm border-0 h-100">

                        <div class="card-body">

                            <h4 class="fw-bold">
                                {{ $evento->titulo }}
                            </h4>

                            <p class="text-muted">
                                {{ \Illuminate\Support\Str::limit($evento->descricao, 100) }}
                            </p>

                            <p class="mb-2">
                                <strong> Data:</strong>
                                {{ $evento->data_evento }}
                            </p>

                            <p class="mb-2">
                                <strong> Local:</strong>
                                {{ $evento->local }}
                            </p>

                            <p class="mb-2 text-success fw-bold">
                                 R$ {{ number_format($evento->valor, 2, ',', '.') }}
                            </p>

                            <p class="mb-0">
                                 {{ $evento->quantidade_vagas }} vagas disponíveis
                            </p>

                        </div>

                        <div class="card-footer bg-white border-0">

                            <a href="{{ route('login') }}"
                               class="btn btn-primary w-100">
                                Ver Detalhes
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-info text-center">

                        Nenhum evento cadastrado.

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

<!-- ESTATÍSTICAS -->
<section class="py-5">

    <div class="container">

        <div class="row text-center">

            <div class="col-md-4 mb-3">

                <div class="card shadow border-0">

                    <div class="card-body">

                        <h1 class="text-primary">
                            {{ count($eventos) }}
                        </h1>

                        <h5>Eventos</h5>

                    </div>

                </div>

            </div>

            <div class="col-md-4 mb-3">

                <div class="card shadow border-0">

                    <div class="card-body">

                        <h1 class="text-primary">
                            100+
                        </h1>

                        <h5>Participantes</h5>

                    </div>

                </div>

            </div>

            <div class="col-md-4 mb-3">

                <div class="card shadow border-0">

                    <div class="card-body">

                        <h1 class="text-primary">
                            24h
                        </h1>

                        <h5>Disponibilidade</h5>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- CONTATO -->
<section id="contato" class="bg-light py-5">

    <div class="container">

        <h2 class="text-center mb-4">
            Contato
        </h2>

        <div class="row text-center justify-content-center">

            <!-- E-mail -->
            <div class="col-md-3 mb-3">

                <div class="card shadow border-0 h-100">

                    <div class="card-body">

                        <h5> E-mail</h5>

                        <p class="mb-0">
                            contato@eventos.com
                        </p>

                    </div>

                </div>

            </div>

            <!-- Telefone -->
            <div class="col-md-3 mb-3">

                <div class="card shadow border-0 h-100">

                    <div class="card-body">

                        <h5> Telefone</h5>

                        <p class="mb-0">
                            (13) 99999-9999
                        </p>

                    </div>

                </div>

            </div>

            <!-- Localização -->
            <div class="col-md-3 mb-3">

                <div class="card shadow border-0 h-100">

                    <div class="card-body">

                        <h5> Localização</h5>

                        <p class="mb-0">
                            Santos - SP
                        </p>

                    </div>

                </div>

            </div>

            <!-- Redes Sociais -->
            <div class="col-md-3 mb-3">

                <div class="card shadow border-0 h-100">

                    <div class="card-body text-center">

                        <h5 class="text-nowrap"> Redes Sociais</h5>

                        <div class="d-flex justify-content-center gap-4 mt-4">

                            <a href="https://instagram.com"
                            target="_blank"
                            class="text-danger fs-2">
                                <i class="bi bi-instagram"></i>
                            </a>

                            <a href="https://facebook.com"
                            target="_blank"
                            class="text-primary fs-2">
                                <i class="bi bi-facebook"></i>
                            </a>

                            <a href="https://linkedin.com"
                            target="_blank"
                            class="text-info fs-2">
                                <i class="bi bi-linkedin"></i>
                            </a>

                        </div>

                    </div>

                </div>

            </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- RODAPÉ -->
<footer class="bg-dark text-white text-center py-4">

    <div class="container">

        <p class="mb-0">
            Sistema de Eventos © {{ date('Y') }}
        </p>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>