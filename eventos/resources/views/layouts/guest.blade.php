<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Eventos Online') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: linear-gradient(135deg, #1a1a2e, #e94560); min-height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div style="background: white; border-radius: 16px; box-shadow: 0 10px 40px rgba(0,0,0,0.3); width: 100%; max-width: 420px; overflow: hidden;">
        <div style="background: #e94560; padding: 30px; text-align: center;">
            <div style="font-size: 2rem;">🎟</div>
            <div style="color: white; font-size: 1.4rem; font-weight: bold; margin-top: 8px;">Eventos Online</div>
        </div>
        <div style="padding: 30px;">
            {{ $slot }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>