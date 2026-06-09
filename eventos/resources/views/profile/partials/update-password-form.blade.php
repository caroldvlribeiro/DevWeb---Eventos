<section>

    <div class="card shadow-sm border-0">

        <div class="card-header">
            <h4 class="mb-0">
                Alterar Senha
            </h4>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('password.update') }}">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Senha Atual
                    </label>

                    <input
                        type="password"
                        name="current_password"
                        class="form-control">

                    @if($errors->updatePassword->has('current_password'))
                        <div class="text-danger mt-1">
                            {{ $errors->updatePassword->first('current_password') }}
                        </div>
                    @endif

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Nova Senha
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control">

                    @if($errors->updatePassword->has('password'))
                        <div class="text-danger mt-1">
                            {{ $errors->updatePassword->first('password') }}
                        </div>
                    @endif

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Confirmar Nova Senha
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control">

                    @if($errors->updatePassword->has('password_confirmation'))
                        <div class="text-danger mt-1">
                            {{ $errors->updatePassword->first('password_confirmation') }}
                        </div>
                    @endif

                </div>

                <button type="submit"
                        class="btn btn-warning">
                    Alterar Senha
                </button>

                @if (session('status') === 'password-updated')
                    <span class="text-success ms-3">
                        Senha atualizada com sucesso!
                    </span>
                @endif

            </form>

        </div>

    </div>

</section>
