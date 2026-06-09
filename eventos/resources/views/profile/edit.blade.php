<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meu Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f6f9; }
        .topbar { background: #1a1a2e; color: white; padding: 14px 30px; display: flex; justify-content: space-between; align-items: center; }
        .topbar .brand { color: #e94560 !important; font-weight: bold; font-size: 1.3rem; text-decoration: none; }
        .topbar a, .topbar button { color: white; text-decoration: none; background: none; border: none; cursor: pointer; }
        .topbar a:hover, .topbar button:hover { color: #e94560; }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.07); }
        .card-header { background: #1a1a2e; border-radius: 12px 12px 0 0 !important; }
        .form-control:focus { border-color: #e94560; box-shadow: 0 0 0 0.2rem rgba(233,69,96,0.2); }
        .btn-salvar { background: #e94560; border: none; border-radius: 8px; padding: 10px 30px; font-weight: bold; }
        .btn-salvar:hover { background: #c73652; }
        .btn-danger-custom { background: #dc3545; border: none; border-radius: 8px; padding: 10px 20px; font-weight: bold; }
    </style>
</head>
<body>

<div class="topbar">
    <a href="/" class="brand">🎟 Eventos Online</a>
    <div class="d-flex gap-4 align-items-center">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Sair</button>
        </form>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">

            {{-- Atualizar informações --}}
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h5 class="text-white mb-0 fw-bold">👤 Informações do Perfil</h5>
                </div>
                <div class="card-body p-4">
                    @if (session('status') === 'profile-updated')
                        <div class="alert alert-success">Perfil atualizado com sucesso!</div>
                    @endif
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nome</label>
                            <input type="text" name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $user->name) }}"
                                   placeholder="Seu nome completo" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $user->email) }}"
                                   placeholder="seu@email.com" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <button type="submit" class="btn btn-salvar text-white">
                            💾 Salvar Informações
                        </button>
                    </form>
                </div>
            </div>

            {{-- Alterar senha --}}
            <div class="card mb-4">
                <div class="card-header py-3" style="background:#0f3460;">
                    <h5 class="text-white mb-0 fw-bold">🔒 Alterar Senha</h5>
                </div>
                <div class="card-body p-4">
                    @if (session('status') === 'password-updated')
                        <div class="alert alert-success">Senha atualizada com sucesso!</div>
                    @endif
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Senha Atual</label>
                            <input type="password" name="current_password"
                                   class="form-control @error('current_password') is-invalid @enderror"
                                   placeholder="••••••••">
                            @error('current_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nova Senha</label>
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Mínimo 8 caracteres">
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Confirmar Nova Senha</label>
                            <input type="password" name="password_confirmation"
                                   class="form-control" placeholder="Repita a nova senha">
                        </div>

                        <button type="submit" class="btn text-white fw-bold"
                                style="background:#0f3460; border:none; border-radius:8px; padding:10px 30px;">
                            🔑 Atualizar Senha
                        </button>
                    </form>
                </div>
            </div>

            {{-- Deletar conta --}}
            <div class="card">
                <div class="card-header py-3" style="background:#dc3545;">
                    <h5 class="text-white mb-0 fw-bold">⚠️ Excluir Conta</h5>
                </div>
                <div class="card-body p-4">
                    <p class="text-muted">Atenção: esta ação é irreversível. Todos os seus dados serão apagados permanentemente.</p>
                    <form method="POST" action="{{ route('profile.destroy') }}"
                          onsubmit="return confirm('Tem certeza que deseja excluir sua conta? Esta ação não pode ser desfeita.')">
                        @csrf
                        @method('delete')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Confirme sua senha para continuar</label>
                            <input type="password" name="password"
                                   class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                                   placeholder="••••••••">
                            @error('password', 'userDeletion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-danger fw-bold">
                            🗑 Excluir Minha Conta
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>