<section>

    <div class="card shadow-sm border-0">

        <div class="card-header">
            <h4 class="mb-0">
                Informações do Perfil
            </h4>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('profile.update') }}">

                @csrf
                @method('PATCH')

                <div class="mb-3">

                    <label class="form-label">
                        Nome
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $user->name) }}"
                        required>

                    @error('name')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        E-mail
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email', $user->email) }}"
                        required>

                    @error('email')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <button type="submit"
                        class="btn btn-primary">
                    Salvar Alterações
                </button>

                @if (session('status') === 'profile-updated')
                    <span class="text-success ms-3">
                        Perfil atualizado com sucesso!
                    </span>
                @endif

            </form>

        </div>

    </div>

</section>
