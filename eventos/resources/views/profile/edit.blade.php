<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold">
            Meu Perfil
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="row g-4">

            <div class="col-12">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="col-12">
                @include('profile.partials.update-password-form')
            </div>

            <div class="col-12">
                @include('profile.partials.delete-user-form')
            </div>

        </div>

    </div>

</x-app-layout>