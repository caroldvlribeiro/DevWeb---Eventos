<section>

    <div class="card border-danger shadow-sm">

        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">
                Excluir Conta
            </h4>
        </div>

        <div class="card-body">

            <p class="text-muted">
                Ao excluir sua conta, todos os seus dados serão removidos
                permanentemente. Esta ação não poderá ser desfeita.
            </p>

            <button
                type="button"
                class="btn btn-danger"
                data-bs-toggle="modal"
                data-bs-target="#deleteAccountModal">
                Excluir Conta
            </button>

        </div>

    </div>

    <!-- Modal -->

    <div class="modal fade"
         id="deleteAccountModal"
         tabindex="-1"
         aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <form method="POST"
                      action="{{ route('profile.destroy') }}">

                    @csrf
                    @method('DELETE')

                    <div class="modal-header">

                        <h5 class="modal-title">
                            Confirmar Exclusão
                        </h5>

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal">
                        </button>

                    </div>

                    <div class="modal-body">

                        <p>
                            Tem certeza que deseja excluir sua conta?
                            Todos os dados serão removidos permanentemente.
                        </p>

                        <div class="mb-3">

                            <label class="form-label">
                                Digite sua senha
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control">

                            @if($errors->userDeletion->has('password'))
                                <div class="text-danger mt-1">
                                    {{ $errors->userDeletion->first('password') }}
                                </div>
                            @endif

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">
                            Cancelar
                        </button>

                        <button type="submit"
                                class="btn btn-danger">
                            Excluir Conta
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>
