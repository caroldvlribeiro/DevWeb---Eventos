<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistema de Eventos') }}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="min-vh-100 d-flex align-items-center justify-content-center">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-5">

                <!-- CARD LOGIN -->
                <div class="card shadow border-0">

                    <div class="card-body p-4">

                        <!-- LOGO -->
                        <div class="text-center mb-4">
                            <a href="/">
                                <x-application-logo class="w-20 h-20 text-primary" />
                            </a>

                            <h4 class="mt-3 fw-bold">
                                Sistema de Eventos
                            </h4>

                            <p class="text-muted">
                                Faça login para acessar o sistema
                            </p>
                        </div>

                        <!-- SLOT (login/register/etc) -->
                        {{ $slot }}

                    </div>

                </div>

                <!-- LINK INSTITUCIONAL -->
                <div class="text-center mt-3">
                    <a href="/" class="text-decoration-none">
                        ← Voltar para página inicial
                    </a>
                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>